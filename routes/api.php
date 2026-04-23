<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Models\UserPayment;

// 1. Webhook WijayaPay (Menerima notifikasi otomatis kalau user udah bayar)
Route::post('/wijayapay/notification', function (Request $request) {
    $merchantCode = env('WIJAYAPAY_MERCHANT_CODE');
    $apiKey = env('WIJAYAPAY_API_KEY');
    
    $incomingSignature = $request->header('X-Signature');
    $refId = $request->input('data.ref_id'); 
    $status = $request->input('status');

    $mySignature = md5($merchantCode . $apiKey . $refId);

    if ($incomingSignature !== $mySignature) {
        Log::warning('WijayaPay Webhook: Signature Invalid');
        return response()->json(['status' => false, 'message' => 'Signature mismatch'], 403);
    }

    if (strtolower($status) === 'paid') {
        $payment = UserPayment::where('invoice_number', $refId)->first();
        if ($payment && $payment->status !== 'success') {
            $payment->update(['status' => 'success']);
            // Di sini kamu juga bisa trigger kirim email kuitansi jika mau
        }
    } 

    return response()->json(['status' => true]);
});

// 2. AJAX Polling (Mengecek status pembayaran di halaman QRIS)
Route::get('/check-payment-status/{invoice}', function($invoice) {
    $status = UserPayment::where('invoice_number', $invoice)->value('status');
    return response()->json(['status' => $status ?? 'pending']);
});