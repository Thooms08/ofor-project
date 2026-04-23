<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Desain;
use App\Models\UserPayment;

class UserController extends Controller
{
    /**
     * Menampilkan halaman dashboard user
     */
    public function index()
    {
        $user = Auth::user();
        
        // Cek apakah user sudah bayar (status = success)
        $hasPaid = UserPayment::where('user_id', $user->id)->where('status', 'success')->exists();
        
        $desains = Desain::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();

        return view('user.index', compact('user', 'desains', 'hasPaid'));
    }

    public function createPayment()
    {
        $user = Auth::user();

        // Jika sudah pernah bayar dan sukses, cegah bayar lagi
        if (UserPayment::where('user_id', $user->id)->where('status', 'success')->exists()) {
            return redirect()->route('desain.index');
        }

        $invoiceNumber = 'OFOR-' . time() . '-' . strtoupper(Str::random(4));
        $amount = 500;

        // Simpan data transaksi ke database dengan status pending
        $paymentRecord = UserPayment::create([
            'user_id' => $user->id,
            'invoice_number' => $invoiceNumber,
            'amount' => $amount,
            'payment_method' => 'QRIS',
            'status' => 'pending',
        ]);

        // Hit API WijayaPay
        $apiKey = env('WIJAYAPAY_API_KEY');
        $merchantCode = env('WIJAYAPAY_MERCHANT_CODE');
        $url = "https://wijayapay.com/api/transaction/create";
        $signature = md5($merchantCode . $apiKey . $invoiceNumber);

        try {
            $response = Http::withHeaders([
                'X-Signature' => $signature,
                'Accept' => 'application/json',
            ])->asForm()->post($url, [
                'code_merchant' => $merchantCode,
                'api_key'       => $apiKey,
                'ref_id'        => $invoiceNumber,
                'nominal'       => $amount,
                'code_payment'  => 'QRIS', // WAJIB QRIS sesuai request
                'customer_name' => $user->name,
                'customer_email'=> $user->email ?? 'user@ofor.site',
                'customer_phone'=> '080000000000', // Default if empty
                'callback_url'  => url('/api/wijayapay/notification'),
               'return_url'    => route('user.dashboard'), // Kembali ke dashboard setelah selesai
            ]);

            $res = $response->json();

            if ($response->successful() && isset($res['success']) && $res['success'] == true) {
                $paymentData = $res['data'];
                $identifier = $paymentData['qr_image'] ?? '-';
                
                $paymentRecord->update(['payment_url' => $identifier]);

                // Arahkan ke halaman tunggu pembayaran
                return view('user.waiting-payment', [
                    'payment' => $paymentData,
                    'invoice' => $invoiceNumber
                ]);
            }

            Log::error('WijayaPay Error: ' . $response->body());
            return back()->with('error', 'Gagal memproses pembayaran. Coba lagi nanti.');

        } catch (\Exception $e) {
            Log::error('Payment Connection Error: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan sistem pembayaran.');
        }
    }
    
    // Asumsi fungsi untuk hapus kartu (tambahkan jika belum ada)
    public function destroy($id)
    {
        $desain = Desain::where('user_id', Auth::id())->findOrFail($id);
        $desain->delete();
        return redirect()->back()->with('success', 'Kartu berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->get('q'); // Ambil kata kunci ketikan user
        $userId = Auth::id();

        // Cari berdasarkan slug ATAU tanggal (timestamp)
        $desains = Desain::where('user_id', $userId)
            ->where(function($q) use ($query) {
                $q->where('slug', 'LIKE', "%{$query}%")
                  ->orWhereDate('created_at', 'LIKE', "%{$query}%") // Cari tahun-bulan-tanggal
                  ->orWhereDate('updated_at', 'LIKE', "%{$query}%");
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        // Format data agar mudah dirender oleh JavaScript menjadi HTML
        $formattedDesains = $desains->map(function($item) {
            // Logika Preview Background (Sama seperti yang kita perbaiki sebelumnya)
            $bg = $item->background ?? '#7e22ce';
            $isColor = str_starts_with($bg, '#') || str_starts_with($bg, 'rgb');
            
            return [
                'id' => $item->id,
                'slug' => $item->slug,
                'aspek_rasio' => $item->aspek_rasio == '16-9' ? '16:9' : '9:16',
                // Format timestamp jadi manusiawi, misal: "2 jam yang lalu" atau tanggalnya
                'updated_at' => $item->updated_at->diffForHumans(), 
                'show_url' => route('desain.show', $item->slug),
                'edit_url' => route('desain.edit', $item->slug),
                'delete_url' => route('desain.destroy', $item->id),
                'bg_style' => $isColor 
                                ? "background-color: {$bg};" 
                                : "background-image: url('".asset($bg)."'); background-size: cover; background-position: center;",
                'icon' => $isColor ? 'bi-palette2' : 'bi-image',
            ];
        });

        // Kembalikan dalam bentuk JSON
        return response()->json([
            'success' => true,
            'data' => $formattedDesains
        ]);
    }
}