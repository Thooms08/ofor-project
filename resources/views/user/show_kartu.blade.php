<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Kartu Spesial Untukmu | OFOR.SITE</title>
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $desain->judul ?? 'Kartu Spesial Untukmu' }}">
    <meta property="og:description" content="{{ $desain->deskripsi ?? 'Buka tautan ini untuk melihat kartu digital interaktif yang dibuat khusus menggunakan OFOR.SITE!' }}">
    <meta property="og:image" content="{{ $desain->gambar_preview ? asset($desain->gambar_preview) : asset('preview.jpg') }}">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="720">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $desain->judul ?? 'Kartu Spesial Untukmu' }}">
    <meta name="twitter:description" content="{{ $desain->deskripsi ?? 'Buka tautan ini untuk melihat kartu digital interaktif yang dibuat khusus menggunakan OFOR.SITE!' }}">
    <meta name="twitter:image" content="{{ $desain->gambar_preview ? asset($desain->gambar_preview) : asset('preview.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Comic+Neue:wght@700&family=Inter:wght@400;600&family=Patrick+Hand&family=Poppins:wght@500&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Amatic+SC:wght@700&family=Bebas+Neue&family=Bitter:wght@400;600&family=Caveat:wght@600&family=Cinzel:wght@600&family=Comic+Neue:wght@700&family=Cookie&family=Courgette&family=Crimson+Text:wght@600&family=Dancing+Script:wght@600&family=EB+Garamond:wght@600&family=Fredoka:wght@500&family=Great+Vibes&family=Inter:wght@400;600&family=Josefin+Slab:wght@600&family=Kaushan+Script&family=Lato:wght@400;700&family=Lobster&family=Lora:wght@500;600&family=Merriweather:wght@400;700&family=Montserrat:wght@500;700&family=Noto+Serif:wght@400;700&family=Nunito:wght@600;700&family=Open+Sans:wght@400;600&family=Oswald:wght@500&family=Pacifico&family=Patrick+Hand&family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&family=PT+Serif:wght@400;700&family=Quicksand:wght@600&family=Raleway:wght@600&family=Righteous&family=Roboto:wght@400;500;700&family=Rubik:wght@400;500&family=Sacramento&family=Satisfy&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link rel="icon" type="image/jpeg" href="{{ asset('logo-ofor.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo-ofor.png') }}">

    <style>
        :root {
            --purple-primary: #7e22ce;
            --bg-light: #f3e8ff;
        }
        body { 
            background-color: var(--bg-light); 
            font-family: 'Inter', sans-serif; 
            margin: 0; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh;
            /* Menghindari scroll yang aneh saat scaling */
            overflow: hidden; 
        }

        .card-wrapper {
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .design-element {
            position: absolute;
            left: 0;
            top: 0;
            display: block;
            margin: 0;
            padding: 0;
            border: none;
            line-height: 1; /* Samakan dengan editor agar tinggi baris tidak geser */
        }

        .text-content {
            display: block;
            width: 100%;
            height: 100%;
            word-wrap: break-word;
            white-space: pre-wrap; /* Biar enter-nya sama */
            line-height: 1.2; /* Atur angka yang sama persis dengan di CSS editor */
            margin: 0;
            padding: 0;
        }

        /* --- MAGIC SCALING LOGIC --- */
        #card-canvas-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: auto;
        }

        #card-canvas {
            position: relative;
            overflow: hidden;
            transform-origin: top center; /* Ubah ke top center agar posisi vertikal lebih stabil saat di-scale */
            flex-shrink: 0;
        }

        /* Ukuran ini HARUS SAMA dengan yang ada di Editor */
        .ratio-9-16 { width: 360px; height: 640px; }
        .ratio-16-9 { width: 640px; height: 360px; }

        .design-element {
            position: absolute; /* Wajib absolute */
            display: block;
        }

      

        .text-content {
            line-height: 1.2;
            word-wrap: break-word;
            display: block;
            white-space: pre-wrap;
        }

        .image-content, .video-content {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .video-content { object-fit: cover; pointer-events: auto; }

        .voice-box { pointer-events: auto; z-index: 100; }
        .voice-pill {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(5px);
            border-radius: 50px;
            padding: 8px;
            display: flex;
            align-items: center;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        audio { height: 35px; width: 180px; }

        .brand-footer {
        user-select: none; /* Mencegah teks terblok/tersorot tidak sengaja agar lebih rapi */
        cursor: default;   /* Memastikan kursor tetap panah biasa, bukan tanda tangan (pointer) */
    }

    /* Styling & Hover khusus untuk Tombol CTA */
    .cta-buat-kartu {
        background: linear-gradient(135deg, #7e22ce 0%, #581c87 100%);
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        text-decoration: none;
        /* Tambahkan Animasi Disini */
        animation: pulse-cta 2s infinite;
    }

    .cta-buat-kartu:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(126, 34, 206, 0.4) !important;
        color: #ffffff;
        opacity: 0.95;
        /* Matikan animasi saat di-hover */
        animation: none; 
    }

    /* Animasi Pulse Looping Warna Ungu Ofor.site */
    @keyframes pulse-cta {
        0% {
            box-shadow: 0 0 0 0 rgba(126, 34, 206, 0.6);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(126, 34, 206, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(126, 34, 206, 0);
        }
    }
    </style>
</head>
<body>

<div class="card-wrapper">
    <div id="card-canvas-container">
        
        {{-- PHP Helper untuk memastikan background ter-render sempurna --}}
        @php
            $bg = $desain->background ?? '#ffffff';
            if (str_starts_with($bg, '#') || str_starts_with($bg, 'rgb')) {
                // Jika background berupa kode warna
                $bgStyle = "background-color: {$bg} !important; background-image: none !important;";
            } else {
                // Jika background berupa file gambar
                $bgUrl = asset($bg);
                $bgStyle = "background-image: url('{$bgUrl}') !important; background-color: transparent !important; background-size: cover !important; background-position: center !important;";
            }
        @endphp

        <div id="card-canvas" class="{{ $desain->aspek_rasio == '16-9' ? 'ratio-16-9' : 'ratio-9-16' }}" style="{{ $bgStyle }}">
            
           {{-- 1. Render Teks --}}
            @foreach($desain->texts as $t)
                {{-- PERBAIKAN: Hapus rotate dari wrapper, ubah tinggi jadi auto --}}
                <div class="design-element" style="transform: translate({{ $t->position_x }}px, {{ $t->position_y }}px); width: {{ $t->width }}px; height: auto; z-index: 50;">
                    {{-- PERBAIKAN: Pindahkan rotate ke dalam text-content --}}
                    <div class="text-content" 
                        style="transform: rotate({{ $t->rotation ?? 0 }}deg); font-family: {{ $t->font }} !important; color: {{ $t->color }}; font-size: {{ $t->size }}px;">{!! $t->text !!}</div>
                </div>
            @endforeach
            
            {{-- 2. Render Gambar --}}
            @foreach($desain->images as $img)
            {{-- PERBAIKAN: Hapus rotate dari wrapper --}}
            <div class="design-element" 
                 style="transform: translate({{ $img->position_x }}px, {{ $img->position_y }}px); width: {{ $img->width }}px; height: {{ $img->height }}px; left: 0; top: 0; z-index: 45;">
                {{-- PERBAIKAN: Pindahkan rotate ke dalam img --}}
                <img src="{{ asset($img->image) }}" class="image-content" style="transform: rotate({{ $img->rotation ?? 0 }}deg);">
            </div>
            @endforeach

            {{-- 3. Render Video --}}
            @foreach($desain->videos as $vid)
            {{-- PERBAIKAN: Hapus rotate dari wrapper --}}
            <div class="design-element" 
                 style="transform: translate({{ $vid->position_x }}px, {{ $vid->position_y }}px); width: {{ $vid->width }}px; height: {{ $vid->height }}px; pointer-events: auto; left: 0; top: 0; z-index: 40;">
                {{-- PERBAIKAN: Pindahkan rotate ke dalam video --}}
                <video src="{{ asset($vid->video) }}" class="video-content" style="transform: rotate({{ $vid->rotation ?? 0 }}deg);" controls loop muted autoplay playsinline></video>
            </div>
            @endforeach

            {{-- 4. Render Voice Note --}}
            @if($desain->voice)
            <div class="design-element voice-box" 
                 style="transform: translate({{ $desain->voice_pos_x }}px, {{ $desain->voice_pos_y }}px); left: 0; top: 0;">
                <div class="voice-pill">
                    <audio controls src="{{ asset($desain->voice) }}"></audio>
                </div>
            </div>
            @endif
            {{-- 5. Render Icon --}}
            @if(isset($desain->icons))
                @foreach($desain->icons as $icon)
                <div class="design-element" 
                     style="transform: translate({{ $icon->position_x }}px, {{ $icon->position_y }}px); 
                            width: {{ $icon->size }}px; height: {{ $icon->size }}px; 
                            left: 0; top: 0; color: {{ $icon->color }}; z-index: 45;">
                    <div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; transform: rotate({{ $icon->rotation ?? 0 }}deg);">
                        <iconify-icon icon="{{ $icon->icon_name }}" style="font-size: {{ $icon->size }}px; width: 100%; height: 100%;"></iconify-icon>
                    </div>
                </div>
                @endforeach
            @endif

            {{-- 6. Render Element (Shapes) --}}
            @if(isset($desain->elements))
                @foreach($desain->elements as $el)
                <div class="design-element shape-display" data-shape-type="{{ $el->type }}" 
                     style="transform: translate({{ $el->position_x }}px, {{ $el->position_y }}px); 
                            width: {{ $el->size }}px; height: {{ $el->size }}px; 
                            left: 0; top: 0; color: {{ $el->color }}; z-index: 40;">
                    <div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; transform: rotate({{ $el->rotation ?? 0 }}deg);">
                        <svg viewBox="0 0 100 100" preserveAspectRatio="none" fill="currentColor" style="width:100%; height:100%;"></svg>
                    </div>
                </div>
                @endforeach
            @endif
            
        </div>
    </div>
    <div class="watermark-container text-center mt-5 mb-4">
    <!-- Watermark Text Saja -->
    <div class="brand-footer mb-3">
        <span class="text-secondary fw-medium" style="font-size: 0.9rem; text-shadow: 0 1px 2px rgba(255,255,255,0.8);">
            Dibuat dengan <strong style="color: #7e22ce;">OFOR.SITE</strong>
        </span>
    </div>

    <!-- Tombol dengan class animasi -->
    <div class="d-block"></div> 
    <a href="{{ url('/') }}" class="btn cta-buat-kartu rounded-pill px-4 py-2 text-white border-0 mt-1">
        <i class="bi bi-magic me-2"></i> Buat Desain Kartu Disini!
    </a>
</div>

<script>
   function autoScaleCard() {
    const canvas = document.getElementById('card-canvas');
    if (!canvas) return;

    const baseWidth = canvas.classList.contains('ratio-16-9') ? 640 : 360;
    const baseHeight = canvas.classList.contains('ratio-16-9') ? 360 : 640;
    
    const windowWidth = window.innerWidth * 0.9;
    const windowHeight = window.innerHeight * 0.8;

    const scale = Math.min(windowWidth / baseWidth, windowHeight / baseHeight, 1);

    canvas.style.transform = `scale(${scale})`;
}

window.addEventListener('load', autoScaleCard);
window.addEventListener('resize', autoScaleCard);

// --- DICTIONARY ELEMENT (SHAPES) ---
    const shapeDictionary = {
        'rectangle': '<rect width="100" height="100" />',
        'circle': '<circle cx="50" cy="50" r="50" />',
        'triangle': '<polygon points="50,0 100,100 0,100" />',
        'star': '<polygon points="50,5 61,35 98,35 68,57 79,91 50,70 21,91 32,57 2,35 39,35" />',
        'blob1': '<path d="M74,22 C84,33 90,49 84,62 C78,74 58,82 41,83 C24,84 10,78 4,63 C-2,48 4,24 17,14 C29,4 47,-1 61,7 C75,15 84,11 74,22 Z" />',
        'blob2': '<path d="M82,28 C89,40 85,55 76,66 C67,77 53,84 39,81 C25,78 12,65 7,50 C2,35 8,18 20,9 C31,0 49,-1 63,6 C77,13 74,15 82,28 Z" />',
        'pentagon': '<polygon points="50,0 100,38 82,100 18,100 0,38" />',
        'hexagon': '<polygon points="50,0 93,25 93,75 50,100 7,75 7,25" />',
        'heptagon': '<polygon points="50,0 89,19 99,60 72,97 28,97 1,60 11,19" />',
        'octagon': '<polygon points="30,0 70,0 100,30 100,70 70,100 30,100 0,70 0,30" />',
        'decagon': '<polygon points="50,0 79,10 98,35 98,65 79,90 50,100 21,90 2,65 2,35 21,10" />',
        'rhombus': '<polygon points="50,0 100,50 50,100 0,50" />',
        'parallelogram': '<polygon points="20,0 100,0 80,100 0,100" />',
        'trapezoid': '<polygon points="20,0 80,0 100,100 0,100" />',
        'diamond': '<polygon points="50,0 80,50 50,100 20,50" />',
        'heart': '<path d="M50,88 C100,60 100,20 50,40 C0,20 0,60 50,88 Z" />',
        'moon': '<path d="M80,50 C80,77 58,100 31,100 C15,100 0,91 0,91 C27,88 49,66 49,38 C49,23 41,9 41,9 C64,13 80,30 80,50 Z" />',
        'droplet': '<path d="M50,0 C50,0 10,50 10,70 C10,92 28,100 50,100 C72,100 90,92 90,70 C90,50 50,0 50,0 Z" />',
        'cloud': '<path d="M30,40 C30,20 60,20 70,30 C90,30 90,60 80,70 C90,80 70,100 50,90 C30,100 10,80 20,70 C0,60 0,30 30,40 Z" />',
        'cross': '<polygon points="35,0 65,0 65,35 100,35 100,65 65,65 65,100 35,100 35,65 0,65 0,35 35,35" />',
        'shield': '<path d="M10,0 L90,0 L90,50 C90,80 50,100 50,100 C50,100 10,80 10,50 Z" />',
        'pill': '<rect x="10" y="25" width="80" height="50" rx="25" ry="25" />',
        'arch': '<path d="M20,100 L20,50 C20,20 80,20 80,50 L80,100 Z" />',
        'message': '<path d="M0,20 C0,9 9,0 20,0 L80,0 C91,0 100,9 100,20 L100,70 C100,81 91,90 80,90 L40,90 L10,100 L15,78 C6,70 0,58 0,45 Z" />',
        'bookmark': '<polygon points="20,0 80,0 80,100 50,75 20,100" />',
        'badge': '<path d="M50,10 L80,25 L80,75 L50,90 L20,75 L20,25 Z M50,0 L90,20 L90,80 L50,100 L10,80 L10,20 Z" />',
        'ticket': '<path d="M0,10 L100,10 L100,40 A10,10 0 0,0 100,60 L100,90 L0,90 L0,60 A10,10 0 0,0 0,40 Z" />',
        'banner': '<polygon points="0,20 100,20 100,80 0,80 15,50" />',
        'ribbon': '<path d="M10,90 L30,50 L10,10 L90,10 L70,50 L90,90 Z" />',
        'arrow-right': '<polygon points="0,35 60,35 60,15 100,50 60,85 60,65 0,65" />',
        'arrow-left': '<polygon points="100,35 40,35 40,15 0,50 40,85 40,65 100,65" />',
        'arrow-up': '<polygon points="35,100 35,40 15,40 50,0 85,40 65,40 65,100" />',
        'arrow-down': '<polygon points="35,0 35,60 15,60 50,100 85,60 65,60 65,0" />',
        'wave': '<path d="M0,50 C20,20 40,80 60,50 C80,20 100,50 100,50 L100,100 L0,100 Z" />',
        'zigzag': '<polygon points="0,50 20,20 40,80 60,20 80,80 100,50 100,100 0,100" />',
        'blob3': '<path d="M78,25 C88,38 96,55 88,68 C80,81 57,90 38,85 C19,80 4,61 1,44 C-2,27 9,12 24,5 C39,-2 58,-1 68,12 C78,25 68,12 78,25 Z" />',
        'blob4': '<path d="M70,18 C83,28 97,42 94,56 C91,70 70,84 53,88 C36,92 23,86 13,73 C3,60 -4,40 2,24 C8,8 24,-4 40,-2 C56,0 57,8 70,18 Z" />',
        'blob5': '<path d="M68,23 C79,35 84,52 76,65 C68,78 46,87 29,80 C12,73 0,50 3,33 C6,16 23,5 40,2 C57,-1 57,11 68,23 Z" />'
    };

    // Render inner SVG berdasarkan tipe shape-nya secara instan
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.shape-display').forEach(el => {
            const type = el.getAttribute('data-shape-type');
            if (shapeDictionary[type]) {
                el.querySelector('svg').innerHTML = shapeDictionary[type];
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>