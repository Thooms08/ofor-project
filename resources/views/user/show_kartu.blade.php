<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Kartu Spesial Untukmu | OFOR.SITE</title>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&family=Comic+Neue:wght@700&family=Inter:wght@400;600&family=Patrick+Hand&family=Poppins:wght@500&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Amatic+SC:wght@700&family=Bebas+Neue&family=Bitter:wght@400;600&family=Caveat:wght@600&family=Cinzel:wght@600&family=Comic+Neue:wght@700&family=Cookie&family=Courgette&family=Crimson+Text:wght@600&family=Dancing+Script:wght@600&family=EB+Garamond:wght@600&family=Fredoka:wght@500&family=Great+Vibes&family=Inter:wght@400;600&family=Josefin+Slab:wght@600&family=Kaushan+Script&family=Lato:wght@400;700&family=Lobster&family=Lora:wght@500;600&family=Merriweather:wght@400;700&family=Montserrat:wght@500;700&family=Noto+Serif:wght@400;700&family=Nunito:wght@600;700&family=Open+Sans:wght@400;600&family=Oswald:wght@500&family=Pacifico&family=Patrick+Hand&family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&family=PT+Serif:wght@400;700&family=Quicksand:wght@600&family=Raleway:wght@600&family=Righteous&family=Roboto:wght@400;500;700&family=Rubik:wght@400;500&family=Sacramento&family=Satisfy&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="{{ asset('logo-ofor.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo-ofor.jpg') }}">

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
            position: fixed;
            bottom: 20px;
            color: var(--purple-primary);
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            opacity: 0.8;
            z-index: 1000;
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
                <div class="design-element" style="transform: translate({{ $t->position_x }}px, {{ $t->position_y }}px); width: {{ $t->width }}px; min-height: {{ $t->height }}px;  z-index: 50;">
                    {{-- PERBAIKAN FONT: Gunakan {{ }} bukan {!! !!} agar tanda kutip font tidak merusak tag HTML --}}
                    <div class="text-content" 
                        style="font-family: {{ $t->font }} !important; color: {{ $t->color }}; font-size: {{ $t->size }}px;">{!! $t->text !!}</div>
                </div>
            @endforeach
            
            {{-- 2. Render Gambar --}}
            @foreach($desain->images as $img)
            <div class="design-element" 
                 style="transform: translate({{ $img->position_x }}px, {{ $img->position_y }}px); width: {{ $img->width }}px; height: {{ $img->height }}px; left: 0; top: 0;">
                <img src="{{ asset($img->image) }}" class="image-content">
            </div>
            @endforeach

            {{-- 3. Render Video --}}
            @foreach($desain->videos as $vid)
            <div class="design-element" 
                 style="transform: translate({{ $vid->position_x }}px, {{ $vid->position_y }}px); width: {{ $vid->width }}px; height: {{ $vid->height }}px; pointer-events: auto; left: 0; top: 0;">
                <video src="{{ asset($vid->video) }}" class="video-content" controls loop muted autoplay playsinline></video>
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
            
        </div>
    </div>
    <a href="/" class="brand-footer">
        <i class="fa-solid fa-wand-magic-sparkles"></i> Dibuat dengan OFOR.SITE
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
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>