<?php

namespace App\Http\Controllers;

use App\Models\Desain;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserDesainController extends Controller
{
    // Fungsi Kompresi Gambar Native (Tanpa library tambahan)
    private function compressImage($sourcePath, $destinationPath, $quality = 65) {
        $info = getimagesize($sourcePath);
        if (!$info) return false;

        $mime = $info['mime'];
        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($sourcePath);
                imagejpeg($image, $destinationPath, $quality); // Quality 0-100
                break;
            case 'image/png':
                $image = imagecreatefrompng($sourcePath);
                imagealphablending($image, false);
                imagesavealpha($image, true);
                $pngQuality = round((100 - $quality) / 10); // PNG Quality 0-9
                imagepng($image, $destinationPath, $pngQuality);
                break;
            default:
                // Jika format lain (seperti GIF/WebP), langsung copy saja
                copy($sourcePath, $destinationPath);
                break;
        }
        if(isset($image)) imagedestroy($image);
        return true;
    }

    private function compressVideo($sourcePath, $destinationPath) {
        // Perintah dasar FFmpeg untuk kompresi ringan (CRF 28)
        $command = "ffmpeg -i " . escapeshellarg($sourcePath) . " -vcodec libx264 -crf 28 -preset fast " . escapeshellarg($destinationPath) . " 2>&1";
        exec($command, $output, $return_var);

        // Jika return_var = 0 berarti FFmpeg sukses
        if ($return_var === 0 && file_exists($destinationPath)) {
            return true;
        } else {
            // Fallback: Jika FFmpeg gagal/tidak ada, copy file aslinya saja
            copy($sourcePath, $destinationPath);
            return false;
        }
    }

    public function index($slug = null) {
        $desain = null;
        if ($slug) {
            $desain = Desain::with(['texts', 'images', 'videos'])
                        ->where('slug', $slug)
                        ->where('user_id', Auth::id())
                        ->firstOrFail(); 
        }
        return view('user.desain', compact('desain'));
    }

    public function store(Request $request) {
        // --- SINKRONISASI VALIDASI BACKEND ---
        $request->validate([
            'slug' => 'required',
            'aspek_rasio' => 'required',
            // Gambar Max 2MB (2048 KB)
            'background_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
            // Voice Max 50MB (51200 KB) untuk mengamankan durasi 30 menit
            'voice' => 'nullable|mimes:mp3,webm,wav,ogg|max:51200',
            // Validasi Array Gambar (Max 2MB)
            'canvas_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // Validasi Array Video (Max 15MB)
            'canvas_videos.*' => 'nullable|mimes:mp4,webm,ogg|max:15360',
        ]);

        $desain = Desain::firstOrNew([
            'slug' => Str::slug($request->slug),
            'user_id' => Auth::id()
        ]);
        
        $desain->aspek_rasio = $request->aspek_rasio;

        // 1. Handle & Kompres Background Image
        if ($request->hasFile('background_file')) {
            $file = $request->file('background_file');
            $filename = Str::random(10) . '.' . $file->extension();
            $destination = public_path('assets/background/' . $filename);
            
            // Panggil fungsi kompresi gambar (kualitas 65%)
            $this->compressImage($file->getPathname(), $destination, 65);
            $desain->background = 'assets/background/' . $filename;
        } else if ($request->background_color) {
            $desain->background = $request->background_color;
        }

        // 2. Handle Voice Note
        if ($request->hasFile('voice')) {
            $voicePath = $request->file('voice')->move(public_path('assets/voice'), Str::random(10).'.'.$request->file('voice')->extension());
            $desain->voice = 'assets/voice/'.basename($voicePath);
        }
        
        if ($request->has('voice_pos_x')) {
            $desain->voice_pos_x = $request->voice_pos_x;
            $desain->voice_pos_y = $request->voice_pos_y;
        }

        $desain->save();
        $desain->texts()->delete();
        $desain->images()->delete();
        $desain->videos()->delete();
        
        // 3. Simpan Teks
        if ($request->filled('texts_data')) {
            $texts = json_decode($request->texts_data, true);
            if (is_array($texts)) {
                foreach ($texts as $t) {
                    $desain->texts()->create([
                        'text' => $t['text'],
                        'font' => $t['font'],
                        'color' => $t['color'],
                        'size' => $t['size'] ?? 20,
                        'width' => $t['width'] ?? null,
                        'height' => $t['height'] ?? null,
                        'position_x' => $t['x'],
                        'position_y' => $t['y'],
                    ]);
                }
            }
        }

        // 4. Handle & Kompres Gambar Canvas Tambahan
        if ($request->filled('canvas_images_data')) {
            $imgData = json_decode($request->canvas_images_data, true);

            foreach ($imgData as $index => $data) {
                $imgPath = $data['existing_path'] ?? null;

                if ($request->hasFile("canvas_images.{$index}")) {
                    $file = $request->file("canvas_images.{$index}");
                    $filename = Str::random(10) . '.' . $file->extension();
                    $destination = public_path('assets/image/' . $filename);
                    
                    // Kompres gambar canvas tambahan
                    $this->compressImage($file->getPathname(), $destination, 65);
                    $imgPath = 'assets/image/' . $filename;
                }

                if ($imgPath) {
                    $desain->images()->create([
                        'image' => $imgPath,
                        'position_x' => $data['x'],
                        'position_y' => $data['y'],
                        'width' => $data['width'] ?? 150,
                        'height' => $data['height'] ?? 150,
                    ]);
                }
            }
        }

        // 5. Handle & Kompres Video Canvas Tambahan
        if ($request->filled('canvas_videos_data')) {
            $vidData = json_decode($request->canvas_videos_data, true);
            
            // Buat folder jika belum ada
            if (!file_exists(public_path('assets/video'))) {
                mkdir(public_path('assets/video'), 0777, true);
            }

            foreach ($vidData as $index => $data) {
                $vidPath = $data['existing_path'] ?? null;

                if ($request->hasFile("canvas_videos.{$index}")) {
                    $file = $request->file("canvas_videos.{$index}");
                    $filename = Str::random(10) . '.' . $file->extension();
                    $destination = public_path('assets/video/' . $filename);
                    
                    // Panggil fungsi kompresi video
                    $this->compressVideo($file->getPathname(), $destination);
                    $vidPath = 'assets/video/' . $filename;
                }

                if ($vidPath) {
                    $desain->videos()->create([
                        'video' => $vidPath,
                        'position_x' => $data['x'],
                        'position_y' => $data['y'],
                        'width' => $data['width'] ?? 200,
                        'height' => $data['height'] ?? 150,
                    ]);
                }
            }
        }

        return response()->json([
            'success' => true, 
            'message' => 'Desain berhasil disimpan!',
            'slug' => $desain->slug,
            'url' => route('desain.show', $desain->slug)
        ]);
    }

    public function checkSlug(Request $request) {
    $slug = Str::slug($request->slug);
    
    // Daftar kata yang dilarang jadi slug
    $reserved = ['login', 'register', 'logout', 'dashboard', 'admin', 'user', 'assets', 'api'];

    if (in_array($slug, $reserved)) {
        return response()->json(['available' => false, 'message' => 'URL ini dilarang!']);
    }

    $exists = Desain::where('slug', $slug)->where('user_id', '!=', Auth::id())->exists();
    return response()->json(['available' => !$exists]);
}

    public function show($slug) {
        $desain = Desain::with(['texts', 'images', 'videos'])->where('slug', $slug)->firstOrFail();
        return view('user.show_kartu', compact('desain'));
    }

   public function edit($slug)
    {
        // Cari desain berdasarkan slug dan pastikan itu milik user yang sedang login
        // TAMBAHKAN with() UNTUK MEMANGGIL RELASI KONTENNYA
        $desain = Desain::with(['texts', 'images', 'videos']) 
                        ->where('slug', $slug)
                        ->where('user_id', Auth::id())
                        ->firstOrFail(); 

        // Kembalikan ke view desain.blade.php (editor) dengan membawa data desain lama
        return view('user.desain', compact('desain'));
    }

    /**
     * Menghapus desain kartu
     */
    public function destroy($id)
    {
        // Cari desain berdasarkan ID dan pastikan milik user tersebut
        $desain = Desain::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->first();

        if ($desain) {
            // Opsional: Hapus file fisik (gambar/video/audio) dari storage jika ingin hemat server
            // Storage::delete($desain->background); 
            
            $desain->delete();
            return redirect()->back()->with('success', 'Kartu berhasil dihapus bro!');
        }

        return redirect()->back()->with('error', 'Gagal menghapus kartu, data tidak ditemukan.');
    }
}