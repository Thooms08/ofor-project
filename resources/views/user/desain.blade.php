<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Editor Kartu | OFOR.SITE</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Caveat:wght@600&family=Comic+Neue:wght@700&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Amatic+SC:wght@700&family=Bebas+Neue&family=Bitter:wght@400;600&family=Caveat:wght@600&family=Cinzel:wght@600&family=Comic+Neue:wght@700&family=Cookie&family=Courgette&family=Crimson+Text:wght@600&family=Dancing+Script:wght@600&family=EB+Garamond:wght@600&family=Fredoka:wght@500&family=Great+Vibes&family=Inter:wght@400;600&family=Josefin+Slab:wght@600&family=Kaushan+Script&family=Lato:wght@400;700&family=Lobster&family=Lora:wght@500;600&family=Merriweather:wght@400;700&family=Montserrat:wght@500;700&family=Noto+Serif:wght@400;700&family=Nunito:wght@600;700&family=Open+Sans:wght@400;600&family=Oswald:wght@500&family=Pacifico&family=Patrick+Hand&family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&family=PT+Serif:wght@400;700&family=Quicksand:wght@600&family=Raleway:wght@600&family=Righteous&family=Roboto:wght@400;500;700&family=Rubik:wght@400;500&family=Sacramento&family=Satisfy&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <link rel="icon" type="image/jpeg" href="{{ asset('logo-ofor.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo-ofor.png') }}">
        
    <style>
        :root { 
            --purple-primary: #7e22ce; 
            --purple-dark: #581c87;
            --purple-light: #f3e8ff;
            --bg-light: #f8f9fa; 
        }
        body { background: var(--bg-light); font-family: 'Inter', sans-serif; overflow-x: hidden; }
        
        /* Toolbar Styling Refactored for Mobile */
        .toolbar { 
            background: linear-gradient(135deg, var(--purple-primary) 0%, var(--purple-dark) 100%);
            padding: 12px 15px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        .btn-custom {
            background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3); transition: 0.3s;
        }
        .btn-custom:hover, .btn-custom:focus { background: white; color: var(--purple-primary); }
        
        .toolbar-group { 
            background: rgba(255,255,255,0.15); 
            padding: 6px 12px; 
            border-radius: 8px; 
            display: flex; 
            gap: 8px; 
            align-items: center;
            white-space: nowrap;
            flex-shrink: 0; /* Mencegah tombol menyusut/hilang di HP */
        }

        /* Sembunyikan scrollbar tapi tetap bisa di-scroll sangat mulus di HP */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { 
            -ms-overflow-style: none; 
            scrollbar-width: none; 
            -webkit-overflow-scrolling: touch; /* Efek scroll mulus di iOS/Android */
        }

        .canvas-container { 
            display: flex; 
            justify-content: flex-start; 
            align-items: flex-start; 
            padding: 30px 15px; 
            min-height: calc(100vh - 120px); 
            overflow: auto; 
            -webkit-overflow-scrolling: touch;
        }

        #card-canvas {
            margin: 0 auto; 
            background-color: white; 
            background-size: cover; 
            background-position: center;
            position: relative; 
            overflow: hidden; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.15); 
            border-radius: 12px;
            flex-shrink: 0; 
            transform-origin: top center; 
            transition: transform 0.3s ease; 
        }


        .el-btn-delete {
            position: absolute; top: -15px; right: -15px; background: #ef4444; color: white;
            border-radius: 50%; width: 30px; height: 30px; font-size: 14px; display: none; /* Diperbesar untuk HP */
            align-items: center; justify-content: center; cursor: pointer; z-index: 10;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .el-handle-resize {
            position: absolute; bottom: -12px; right: -12px; background: var(--purple-primary);
            width: 30px; height: 30px; border-radius: 50%; display: none; cursor: se-resize; z-index: 10; /* Diperbesar untuk HP */
            box-shadow: 0 2px 5px rgba(0,0,0,0.2); border: 2px solid white;
            align-items: center; justify-content: center;
        }

        /* Tambahan Icon Panah di tombol resize agar jelas arah tarikannya */
        .el-handle-resize::after {
            content: "⤡"; color: white; font-size: 14px; font-weight: bold; transform: rotate(90deg);
        }
        
        /* GANTI INI: Gunakan ukuran lebar dan tinggi mutlak, bukan max-width & aspect-ratio */
        .ratio-9-16 { width: 360px; height: 640px; }
        .ratio-16-9 { width: 640px; height: 360px; }
        
        .design-element { 
            position: absolute; cursor: grab; user-select: none; touch-action: none; 
            border: 2px dashed transparent; min-width: 50px; min-height: 30px; padding: 5px;
        }
        .design-element.active-element { border-color: var(--purple-primary); background: rgba(126, 34, 206, 0.05); z-index: 50;}
        .design-element:active { cursor: grabbing; }
        
        .text-content { outline: none; display: block; word-wrap: break-word; line-height: 1.2;}
        .image-content { width: 100%; height: 100%; object-fit: contain; pointer-events: none;}
        
        .el-btn-delete {
            position: absolute; top: -12px; right: -12px; background: #ef4444; color: white;
            border-radius: 50%; width: 24px; height: 24px; font-size: 12px; display: none;
            align-items: center; justify-content: center; cursor: pointer; z-index: 10;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .el-handle-resize {
            position: absolute; bottom: -8px; right: -8px; background: var(--purple-primary);
            width: 18px; height: 18px; border-radius: 50%; display: none; cursor: se-resize; z-index: 10;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2); border: 2px solid white;
        }
        .active-element .el-btn-delete, .active-element .el-handle-resize { display: flex; }

        .voice-pill {
            background: rgba(255, 255, 255, 0.9); border-radius: 50px;
            padding: 5px; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .video-content { width: 100%; height: 100%; object-fit: cover; pointer-events: auto; }
        audio { height: 40px; width: 220px; outline: none; }
        .recording-pulse { animation: pulse 1.5s infinite; color: #ff4757; }
        @keyframes pulse { 0% { transform: scale(1); } 50% { transform: scale(1.1); } 100% { transform: scale(1); } }
        .input-purple {
        background-color: #fcfaff;
        border: 1px solid #d8b4fe;
        color: #333;
        transition: all 0.3s ease;
    }
    .input-purple:focus {
        background-color: #ffffff;
        border-color: var(--primary-purple);
        box-shadow: 0 0 0 0.25rem rgba(126, 34, 206, 0.25);
        outline: 0;
    }
    .image-upload-wrapper {
        border: 2px dashed #d8b4fe;
        background-color: #fcfaff;
        border-radius: 12px;
        padding: 12px;
        transition: all 0.3s ease;
    }
    .image-upload-wrapper:hover {
        border-color: var(--primary-purple);
        background-color: var(--light-purple);
    }

        /* Shape Styling */
    .shape-content { width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; pointer-events: none;}
    .shape-content svg { width: 100%; height: 100%; transition: fill 0.2s; }
    .shape-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(70px, 1fr)); gap: 15px; }
    .shape-item { background: white; border: 1px solid #ddd; border-radius: 10px; padding: 15px; cursor: pointer; transition: 0.2s; display: flex; justify-content: center; align-items: center; aspect-ratio: 1; }
    .shape-item:hover { border-color: var(--purple-primary); box-shadow: 0 4px 10px rgba(126,34,206,0.15); transform: translateY(-3px); }
    .shape-item svg { width: 100%; height: 100%; fill: var(--purple-dark); }
    /* --- ANIMASI ERROR USER FRIENDLY --- */
@keyframes shake-error {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-8px); }
    50% { transform: translateX(8px); }
    75% { transform: translateX(-8px); }
}

.input-error-shake {
    animation: shake-error 0.4s ease-in-out;
    border: 2px solid #dc3545 !important;
    background-color: #fff4f4 !important;
}

.error-hint-box {
    background-color: #fff4f4;
    color: #dc3545;
    border: 1px solid #dc3545;
    border-radius: 6px;
    padding: 6px 10px;
    font-size: 12px;
    font-weight: bold;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    animation: fadeIn 0.3s;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Mencegah toolbar ter-scroll saat menggeser slider di HP */
        input[type="range"].form-range {
            touch-action: none !important;
        }

        /* Tambahkan kode ini di dalam <style> */
        .text-box .text-content {
            white-space: pre-wrap !important; 
            word-wrap: break-word !important;
        }

        .text-box.active-element::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -6px; 
            transform: translateY(-50%);
            width: 8px; 
            height: 30px; 
            background-color: #ffffff;
            border: 2px solid #6D28D9; 
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            cursor: ew-resize; 
            z-index: 10;
        }
    </style>
</head>
<body>

<div class="toolbar sticky-top">
    <div class="d-flex justify-content-between align-items-center mb-2 gap-2">
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('user.dashboard') }}" class="btn btn-custom btn-sm rounded-circle d-flex align-items-center justify-content-center" title="Kembali ke Dashboard" style="width: 32px; height: 32px;">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <div class="fw-bold text-white d-flex align-items-center gap-1" style="font-size: 1.05rem; white-space: nowrap;">
                <i class="fa-solid fa-wand-magic-sparkles text-warning"></i> 
                <span>OFOR <span class="fw-light">EDITOR</span></span>
            </div>
        </div>

        <div class="d-flex gap-2">
            
            <button class="btn btn-warning btn-sm fw-bold text-dark px-2 px-sm-3 shadow-sm text-nowrap" onclick="shareCard()">
                <i class="fa-solid fa-share-nodes"></i> <span class="d-none d-sm-inline">Bagikan</span>
            </button>

            <button class="btn btn-light btn-sm fw-bold text-purple-dark px-2 px-sm-3 shadow-sm text-nowrap" data-bs-toggle="modal" data-bs-target="#metaModal">
                <i class="fa-solid fa-gear"></i> <span class="d-none d-sm-inline">Pengaturan</span>
            </button>
            
            <button class="btn btn-light btn-sm fw-bold text-purple-dark px-2 px-sm-3 shadow-sm text-nowrap" onclick="saveDesign()" id="btn-save">
               <i class="fa-solid fa-floppy-disk"></i><span> Simpan</span>
            </button>
        </div>
    </div>

    <div class="position-relative mb-2 w-100" style="max-width: 400px; margin: 0 auto;">
    <div class="input-group input-group-sm shadow-sm">
        <span class="input-group-text bg-white border-0 text-muted px-2" style="font-size: 0.8rem; font-weight: 600;">ofor.site/</span>
        <input type="text" id="slug-input" class="form-control border-0 ps-1" placeholder="nama-kartu" value="{{ $desain->slug ?? '' }}" autocomplete="off">
        <span class="input-group-text bg-white border-0" id="slug-status-icon"></span>
    </div>
    <div id="slug-feedback" class="small fw-bold mt-1 px-2" style="display:none; font-size: 11px;"></div>
    
    <div id="slug-error-hint" class="error-hint-box mt-2 d-none position-absolute w-100 text-center" style="z-index: 10;">
        <i class="fa-solid fa-arrow-up"></i> Bro, URL/Slug ini wajib diisi buat link kartumu!
    </div>
</div>

    <div class="d-flex gap-2 overflow-x-auto hide-scrollbar pb-1 align-items-center flex-nowrap w-100">
        
        <div class="toolbar-group">
            <div class="btn-group btn-group-sm shadow-sm" role="group">
                <input type="radio" class="btn-check ratio-toggle" name="ratio" id="ratio-potrait" value="9-16" {{ (!isset($desain) || $desain->aspek_rasio == '9-16') ? 'checked' : '' }}>
                <label class="btn btn-outline-light px-2" for="ratio-potrait" title="Potrait (9:16)"><i class="fa-solid fa-mobile-screen"></i></label>

                <input type="radio" class="btn-check ratio-toggle" name="ratio" id="ratio-landscape" value="16-9" {{ (isset($desain) && $desain->aspek_rasio == '16-9') ? 'checked' : '' }}>
                <label class="btn btn-outline-light px-2" for="ratio-landscape" title="Landscape (16:9)"><i class="fa-solid fa-tv"></i></label>
            </div>

            <input type="color" id="bg-color" class="form-control form-control-color form-control-sm border-0 p-0 m-0 shadow-sm" value="#ffffff" title="Warna Background">
            <button class="btn btn-sm btn-custom text-nowrap" onclick="document.getElementById('img-upload').click()" title="Upload Background"><i class="fa-solid fa-image"></i> BG</button>
            <input type="file" id="img-upload" hidden accept="image/png, image/jpeg, image/jpg" onchange="uploadBackground(this)">
        </div>

        <div class="toolbar-group">
            <select id="font-family" class="form-select form-select-sm w-auto bg-transparent text-white border-light shadow-none" style="min-width: 90px;" onchange="updateActiveText()">
                <optgroup label="Standar">
                    <option value="'Inter', sans-serif" class="text-dark" style="font-family:'Inter', sans-serif;">Default (Inter)</option>
                    <option value="'Poppins', sans-serif" class="text-dark" style="font-family:'Poppins', sans-serif;">Modern (Poppins)</option>
                    <option value="'Comic Neue', cursive" class="text-dark" style="font-family:'Comic Neue', cursive;">Lucu (Comic)</option>
                    <option value="'Caveat', cursive" class="text-dark" style="font-family: 'Caveat', cursive;">Menarik (Caveat)</option>
                </optgroup>

                <optgroup label="Sans Serif (Bersih & Modern)">
                    <option value="'Roboto', sans-serif" class="text-dark" style="font-family: 'Roboto', sans-serif;">Roboto</option>
                    <option value="'Open Sans', sans-serif" class="text-dark" style="font-family: 'Open Sans', sans-serif;">Open Sans</option>
                    <option value="'Lato', sans-serif" class="text-dark" style="font-family: 'Lato', sans-serif;">Lato</option>
                    <option value="'Montserrat', sans-serif" class="text-dark" style="font-family: 'Montserrat', sans-serif;">Montserrat</option>
                    <option value="'Oswald', sans-serif" class="text-dark" style="font-family: 'Oswald', sans-serif;">Oswald</option>
                    <option value="'Raleway', sans-serif" class="text-dark" style="font-family: 'Raleway', sans-serif;">Raleway</option>
                    <option value="'Nunito', sans-serif" class="text-dark" style="font-family: 'Nunito', sans-serif;">Nunito</option>
                    <option value="'Quicksand', sans-serif" class="text-dark" style="font-family: 'Quicksand', sans-serif;">Quicksand</option>
                    <option value="'Ubuntu', sans-serif" class="text-dark" style="font-family: 'Ubuntu', sans-serif;">Ubuntu</option>
                    <option value="'Rubik', sans-serif" class="text-dark" style="font-family: 'Rubik', sans-serif;">Rubik</option>
                </optgroup>

                <optgroup label="Serif (Klasik & Elegan)">
                    <option value="'Playfair Display', serif" class="text-dark" style="font-family: 'Playfair Display', serif;">Playfair Display</option>
                    <option value="'Merriweather', serif" class="text-dark" style="font-family: 'Merriweather', serif;">Merriweather</option>
                    <option value="'Lora', serif" class="text-dark" style="font-family: 'Lora', serif;">Lora</option>
                    <option value="'PT Serif', serif" class="text-dark" style="font-family: 'PT Serif', serif;">PT Serif</option>
                    <option value="'Noto Serif', serif" class="text-dark" style="font-family: 'Noto Serif', serif;">Noto Serif</option>
                    <option value="'EB Garamond', serif" class="text-dark" style="font-family: 'EB Garamond', serif;">EB Garamond</option>
                    <option value="'Bitter', serif" class="text-dark" style="font-family: 'Bitter', serif;">Bitter</option>
                    <option value="'Crimson Text', serif" class="text-dark" style="font-family: 'Crimson Text', serif;">Crimson Text</option>
                    <option value="'Josefin Slab', serif" class="text-dark" style="font-family: 'Josefin Slab', serif;">Josefin Slab</option>
                </optgroup>

                <optgroup label="Handwriting (Tulisan Tangan)">
                    <option value="'Pacifico', cursive" class="text-dark" style="font-family: 'Pacifico', cursive;">Pacifico</option>
                    <option value="'Dancing Script', cursive" class="text-dark" style="font-family: 'Dancing Script', cursive;">Dancing Script</option>
                    <option value="'Satisfy', cursive" class="text-dark" style="font-family: 'Satisfy', cursive;">Satisfy</option>
                    <option value="'Great Vibes', cursive" class="text-dark" style="font-family: 'Great Vibes', cursive;">Great Vibes</option>
                    <option value="'Amatic SC', cursive" class="text-dark" style="font-family: 'Amatic SC', cursive;">Amatic SC</option>
                    <option value="'Patrick Hand', cursive" class="text-dark" style="font-family: 'Patrick Hand', cursive;">Patrick Hand</option>
                    <option value="'Courgette', cursive" class="text-dark" style="font-family: 'Courgette', cursive;">Courgette</option>
                    <option value="'Kaushan Script', cursive" class="text-dark" style="font-family: 'Kaushan Script', cursive;">Kaushan Script</option>
                    <option value="'Cookie', cursive" class="text-dark" style="font-family: 'Cookie', cursive;">Cookie</option>
                    <option value="'Sacramento', cursive" class="text-dark" style="font-family: 'Sacramento', cursive;">Sacramento</option>
                </optgroup>

                <optgroup label="Display (Unik & Dekoratif)">
                    <option value="'Bebas Neue', sans-serif" class="text-dark" style="font-family: 'Bebas Neue', sans-serif;">Bebas Neue</option>
                    <option value="'Lobster', cursive" class="text-dark" style="font-family: 'Lobster', cursive;">Lobster</option>
                    <option value="'Righteous', cursive" class="text-dark" style="font-family: 'Righteous', cursive;">Righteous</option>
                    <option value="'Fredoka', sans-serif" class="text-dark" style="font-family: 'Fredoka', sans-serif;">Fredoka</option>
                    <option value="'Abril Fatface', display" class="text-dark" style="font-family: 'Abril Fatface', display;">Abril Fatface</option>
                    <option value="'Cinzel', serif" class="text-dark" style="font-family: 'Cinzel', serif;">Cinzel</option>
                </optgroup>
            </select>
            
            <input type="color" id="text-color" class="form-control form-control-color form-control-sm border-0 p-0 m-0 shadow-sm" value="#000000" onchange="updateActiveText()" title="Warna Teks">
            
            <div class="d-flex align-items-center gap-1 mx-1" style="width: 70px;">
                <i class="fa-solid fa-text-height text-white-50" style="font-size: 11px;"></i>
                <input type="range" class="form-range" id="text-size" min="12" max="72" value="20" oninput="updateActiveText()" title="Ukuran Teks">
            </div>
            <div class="d-flex align-items-center gap-1 mx-1" style="width: 70px;">
                <i class="fa-solid fa-rotate-right text-white-50" style="font-size: 11px;" title="Rotasi Teks"></i>
                <input type="range" class="form-range" id="text-rotation" min="0" max="360" value="0" oninput="updateActiveText()" title="Rotasi Teks">
            </div>

            <button class="btn btn-sm btn-custom fw-bold text-nowrap" onclick="addText()"><i class="fa-solid fa-font"></i> Teks</button>
        </div>

        <div class="toolbar-group">
            <div class="d-flex align-items-center gap-1 mx-1" style="width: 70px;">
                <i class="fa-solid fa-rotate-right text-white-50" style="font-size: 11px;" title="Rotasi Gambar"></i>
                <input type="range" class="form-range" id="image-rotation" min="0" max="360" value="0" oninput="updateActiveImage()" title="Rotasi Gambar">
            </div>
            <button class="btn btn-sm btn-custom fw-bold text-nowrap" onclick="document.getElementById('canvas-img-upload').click()"><i class="fa-solid fa-photo-film"></i> Gambar</button>
            <input type="file" id="canvas-img-upload" hidden accept="image/png, image/jpeg, image/jpg" onchange="addCanvasImage(this)">

            <div class="d-flex align-items-center gap-1 mx-1" style="width: 70px;">
                <i class="fa-solid fa-rotate-right text-white-50" style="font-size: 11px;" title="Rotasi Video"></i>
                <input type="range" class="form-range" id="video-rotation" min="0" max="360" value="0" oninput="updateActiveVideo()" title="Rotasi Video">
            </div>
            <button class="btn btn-sm btn-custom fw-bold text-nowrap" onclick="document.getElementById('canvas-vid-upload').click()"><i class="fa-solid fa-video"></i> Video</button>
            <input type="file" id="canvas-vid-upload" hidden accept="video/mp4, video/webm, video/ogg" onchange="addCanvasVideo(this)">
            
            <button id="btn-record" class="btn btn-sm btn-custom fw-bold text-nowrap" onclick="toggleRecord()">
                <i class="fa-solid fa-microphone"></i> Rekam Suara
            </button>
        </div>
        <div class="toolbar-group">
            <input type="color" id="icon-color" class="form-control form-control-color form-control-sm border-0 p-0 m-0 shadow-sm" value="#7e22ce" onchange="updateActiveIcon()" title="Warna Icon">
            
            <div class="d-flex align-items-center gap-1 mx-1" style="width: 70px;">
                <i class="fa-solid fa-expand text-white-50" style="font-size: 11px;" title="Ukuran Icon"></i>
                <input type="range" class="form-range" id="icon-size" min="20" max="300" value="60" oninput="updateActiveIcon()" title="Ukuran Icon">
            </div>

            <div class="d-flex align-items-center gap-1 mx-1" style="width: 70px;">
                <i class="fa-solid fa-rotate-right text-white-50" style="font-size: 11px;" title="Rotasi Icon"></i>
                <input type="range" class="form-range" id="icon-rotation" min="0" max="360" value="0" oninput="updateActiveIcon()" title="Rotasi Icon">
            </div>

            <button class="btn btn-sm btn-custom fw-bold text-nowrap" data-bs-toggle="modal" data-bs-target="#iconModal">
                <i class="fa-solid fa-icons"></i> Icon
            </button>
        </div>
        <div class="toolbar-group">
            <button class="btn btn-sm btn-custom fw-bold text-nowrap text-nowrap" data-bs-toggle="modal" data-bs-target="#elementModal"><i class="fa-solid fa-shapes"></i> Element</button>
            <input type="color" id="element-color" class="form-control form-control-color form-control-sm border-0 p-0 m-0 shadow-sm" value="#7e22ce" onchange="updateActiveShape()" title="Warna Element">
            <div class="d-flex align-items-center gap-1 mx-1" style="width: 50px;">
                <i class="fa-solid fa-expand text-white-50" style="font-size: 11px;"></i>
                <input type="range" class="form-range" id="element-size" min="20" max="400" value="100" oninput="updateActiveShape()">
            </div>
            <div class="d-flex align-items-center gap-1 mx-1" style="width: 50px;">
                <i class="fa-solid fa-rotate-right text-white-50" style="font-size: 11px;"></i>
                <input type="range" class="form-range" id="element-rotation" min="0" max="360" value="0" oninput="updateActiveShape()">
            </div>
        </div>

    </div>
</div>

<div class="canvas-container" id="canvas-area">
    <div id="card-canvas" class="{{ isset($desain) && $desain->aspek_rasio == '16-9' ? 'ratio-16-9' : 'ratio-9-16' }}" onclick="deselectAll(event)">
        </div>
</div>

<div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-purple-dark"><i class="fa-solid fa-share-nodes"></i> Bagikan Kartumu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center pt-2 pb-4">
        <p class="text-muted small mb-3">Scan QR di bawah ini atau bagikan langsung.</p>
        
        <div id="qrcode-container" class="d-flex justify-content-center mb-3 bg-white p-2 rounded border"></div>
        
        <div class="d-flex gap-2 mb-3">
            <button class="btn btn-primary btn-sm flex-fill fw-bold shadow-sm" onclick="shareCard()">
                <i class="fa-solid fa-share-nodes"></i> Bagikan Ke...
            </button>
            <button class="btn btn-success btn-sm flex-fill fw-bold shadow-sm" onclick="downloadCard(this)">
                <i class="fa-solid fa-image"></i> Download Kartu
            </button>
        </div>
        
        <button class="btn btn-outline-secondary btn-sm w-100 fw-bold" onclick="downloadQR()">
            <i class="fa-solid fa-qrcode"></i> Download QR Code
        </button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="metaModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
      
      <div class="modal-header bg-purple text-white border-0 py-3">
        <h5 class="modal-title fw-bold"><i class="fa-solid fa-sliders me-2"></i> Pengaturan Kartu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body bg-light-purple p-3 p-md-4">
        
        <div class="card border-0 shadow-sm rounded-4 p-3 mb-3">
            <label class="form-label fw-bold text-purple-dark small mb-2">Judul Kartu <span class="text-danger">*</span></label>
            <input type="text" id="judul-input" class="form-control input-purple py-2" placeholder="Contoh: Undangan Pernikahan Romeo & Juliet" maxlength="80" value="{{ $desain->judul ?? '' }}">
            
            <div id="judul-error-hint" class="text-danger mt-1 fw-bold d-none" style="font-size: 12px;">
                <i class="fa-solid fa-arrow-up"></i> Wah kelupaan nih, Judul kartunya wajib diisi ya!
            </div>

            <div class="d-flex justify-content-end mt-2">
                <small id="judul-counter" class="text-muted" style="font-size: 11px;">0 / 80</small>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-3 mb-3">
            <label class="form-label fw-bold text-purple-dark small mb-2">Deskripsi Singkat <span class="text-muted fw-normal">(Opsional)</span></label>
            <textarea id="deskripsi-input" class="form-control input-purple py-2" rows="3" placeholder="Tuliskan pesan singkat atau keterangan kartu di sini..." maxlength="150">{{ $desain->deskripsi ?? '' }}</textarea>
            <div class="d-flex justify-content-end mt-2">
                <small id="deskripsi-counter" class="text-muted" style="font-size: 11px;">0 / 150</small>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 p-3">
            <label class="form-label fw-bold text-purple-dark small mb-1">Gambar Preview <span class="text-muted fw-normal">(Opsional)</span></label>
            <p class="text-muted mb-3" style="font-size: 12px;">Maksimal 2MB. Gambar akan otomatis di-compress (± 80KB).</p>
            
            <div class="image-upload-wrapper d-flex flex-column align-items-center w-100">
                <img id="preview-image-display" src="{{ isset($desain->gambar_preview) ? asset($desain->gambar_preview) : asset('logo-ofor.jpg') }}" alt="Preview" class="rounded-3 mb-3 shadow-sm" style="width: 100%; max-height: 160px; object-fit: cover;">
                
                <button type="button" class="btn btn-outline-purple btn-sm w-100 fw-bold py-2" onclick="document.getElementById('preview-upload').click()">
                    <i class="fa-solid fa-cloud-arrow-up me-1"></i> Pilih Gambar Baru
                </button>
                <input type="file" id="preview-upload" hidden accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>

      </div>
      
      <div class="modal-footer border-0 bg-white py-3">
        <button type="button" class="btn btn-purple w-100 fw-bold rounded-3 py-2" data-bs-dismiss="modal">Selesai & Tutup</button>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="iconModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
      <div class="modal-header bg-purple text-white border-0 py-3">
        <h5 class="modal-title fw-bold"><i class="fa-solid fa-icons me-2"></i> Pilih Icon</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body bg-light text-center p-4">
          <div class="d-flex flex-wrap justify-content-center gap-3" id="icon-list">
              </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="elementModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
      <div class="modal-header bg-warning text-dark border-0 py-3">
        <h5 class="modal-title fw-bold"><i class="fa-solid fa-shapes me-2"></i> Pilih Element</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body bg-light p-4">
          <div class="shape-grid" id="element-list"></div>
      </div>
    </div>
  </div>
</div>
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
  <div id="successToast" class="toast align-items-center text-white bg-success border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
    <div class="d-flex">
      <div class="toast-body fw-bold d-flex align-items-center">
        <i class="fa-solid fa-check-circle me-2 fs-5"></i> 
        <span>Desain kartu berhasil disimpan!</span>
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>
<script>
    // ----- VARIABEL STATE & SISTEM -----
    let hasUnsavedChanges = false;
    let activeElement = null;
    let textCounter = 0;
    let imgCounter = 0;
    let vidCounter = 0;
    let canvasFiles = {}; 
    
    // Variabel Audio
    let mediaRecorder;
    let audioChunks = [];
    let audioBlob = null;
    let isRecording = false;
    const MAX_RECORD_SECONDS = 1800;
    // --- FITUR AUTO-ZOOM CANVA-STYLE ---
    let currentScale = 1; // Skala default
    const iconList = [
    'mdi:heart', 'mdi:star', 'mdi:check-circle', 'mdi:account', 'mdi:email', 'mdi:camera', 
    'mdi:bell', 'mdi:settings', 'mdi:magnify', 'mdi:home', 'mdi:music', 'mdi:video', 
    'mdi:flower', 'mdi:fire', 'mdi:water', 'mdi:earth', 'mdi:airplane', 'mdi:car', 
    'mdi:bike', 'mdi:cart', 'mdi:gift', 'mdi:cake', 'mdi:coffee', 'mdi:food', 
    'mdi:laptop', 'mdi:cellphone', 'mdi:gamepad', 'mdi:book', 'mdi:pencil', 'mdi:briefcase'
];

let shapeCounter = 0;
const shapeDictionary = {
    // --- BENTUK DASAR YANG SUDAH ADA ---
    'rectangle': '<rect width="100" height="100" />',
    'circle': '<circle cx="50" cy="50" r="50" />',
    'triangle': '<polygon points="50,0 100,100 0,100" />',
    'star': '<polygon points="50,5 61,35 98,35 68,57 79,91 50,70 21,91 32,57 2,35 39,35" />',
    'blob1': '<path d="M74,22 C84,33 90,49 84,62 C78,74 58,82 41,83 C24,84 10,78 4,63 C-2,48 4,24 17,14 C29,4 47,-1 61,7 C75,15 84,11 74,22 Z" />',
    'blob2': '<path d="M82,28 C89,40 85,55 76,66 C67,77 53,84 39,81 C25,78 12,65 7,50 C2,35 8,18 20,9 C31,0 49,-1 63,6 C77,13 74,15 82,28 Z" />',

    // --- TAMBAHAN 30 BENTUK BARU ---
    // 1. Geometri Lanjutan
    'pentagon': '<polygon points="50,0 100,38 82,100 18,100 0,38" />',
    'hexagon': '<polygon points="50,0 93,25 93,75 50,100 7,75 7,25" />',
    'heptagon': '<polygon points="50,0 89,19 99,60 72,97 28,97 1,60 11,19" />',
    'octagon': '<polygon points="30,0 70,0 100,30 100,70 70,100 30,100 0,70 0,30" />',
    'decagon': '<polygon points="50,0 79,10 98,35 98,65 79,90 50,100 21,90 2,65 2,35 21,10" />',
    'rhombus': '<polygon points="50,0 100,50 50,100 0,50" />',
    'parallelogram': '<polygon points="20,0 100,0 80,100 0,100" />',
    'trapezoid': '<polygon points="20,0 80,0 100,100 0,100" />',
    'diamond': '<polygon points="50,0 80,50 50,100 20,50" />',

    // 2. Simbol Populer
    'heart': '<path d="M50,88 C100,60 100,20 50,40 C0,20 0,60 50,88 Z" />',
    'moon': '<path d="M80,50 C80,77 58,100 31,100 C15,100 0,91 0,91 C27,88 49,66 49,38 C49,23 41,9 41,9 C64,13 80,30 80,50 Z" />',
    'droplet': '<path d="M50,0 C50,0 10,50 10,70 C10,92 28,100 50,100 C72,100 90,92 90,70 C90,50 50,0 50,0 Z" />',
    'cloud': '<path d="M30,40 C30,20 60,20 70,30 C90,30 90,60 80,70 C90,80 70,100 50,90 C30,100 10,80 20,70 C0,60 0,30 30,40 Z" />',
    'cross': '<polygon points="35,0 65,0 65,35 100,35 100,65 65,65 65,100 35,100 35,65 0,65 0,35 35,35" />',
    'shield': '<path d="M10,0 L90,0 L90,50 C90,80 50,100 50,100 C50,100 10,80 10,50 Z" />',

    // 3. UI / Elemen Ornamen Desain
    'pill': '<rect x="10" y="25" width="80" height="50" rx="25" ry="25" />',
    'arch': '<path d="M20,100 L20,50 C20,20 80,20 80,50 L80,100 Z" />',
    'message': '<path d="M0,20 C0,9 9,0 20,0 L80,0 C91,0 100,9 100,20 L100,70 C100,81 91,90 80,90 L40,90 L10,100 L15,78 C6,70 0,58 0,45 Z" />',
    'bookmark': '<polygon points="20,0 80,0 80,100 50,75 20,100" />',
    'badge': '<path d="M50,10 L80,25 L80,75 L50,90 L20,75 L20,25 Z M50,0 L90,20 L90,80 L50,100 L10,80 L10,20 Z" />',
    'ticket': '<path d="M0,10 L100,10 L100,40 A10,10 0 0,0 100,60 L100,90 L0,90 L0,60 A10,10 0 0,0 0,40 Z" />',
    'banner': '<polygon points="0,20 100,20 100,80 0,80 15,50" />',
    'ribbon': '<path d="M10,90 L30,50 L10,10 L90,10 L70,50 L90,90 Z" />',
    
    // 4. Arah (Panah)
    'arrow-right': '<polygon points="0,35 60,35 60,15 100,50 60,85 60,65 0,65" />',
    'arrow-left': '<polygon points="100,35 40,35 40,15 0,50 40,85 40,65 100,65" />',
    'arrow-up': '<polygon points="35,100 35,40 15,40 50,0 85,40 65,40 65,100" />',
    'arrow-down': '<polygon points="35,0 35,60 15,60 50,100 85,60 65,60 65,0" />',

    // 5. Dekoratif / Abstrak
    'wave': '<path d="M0,50 C20,20 40,80 60,50 C80,20 100,50 100,50 L100,100 L0,100 Z" />',
    'zigzag': '<polygon points="0,50 20,20 40,80 60,20 80,80 100,50 100,100 0,100" />',
    'blob3': '<path d="M78,25 C88,38 96,55 88,68 C80,81 57,90 38,85 C19,80 4,61 1,44 C-2,27 9,12 24,5 C39,-2 58,-1 68,12 C78,25 68,12 78,25 Z" />',
    'blob4': '<path d="M70,18 C83,28 97,42 94,56 C91,70 70,84 53,88 C36,92 23,86 13,73 C3,60 -4,40 2,24 C8,8 24,-4 40,-2 C56,0 57,8 70,18 Z" />',
    'blob5': '<path d="M68,23 C79,35 84,52 76,65 C68,78 46,87 29,80 C12,73 0,50 3,33 C6,16 23,5 40,2 C57,-1 57,11 68,23 Z" />'
};

// Merender list icon ke modal saat load
document.addEventListener("DOMContentLoaded", function() {
    const iconContainer = document.getElementById('icon-list');
    iconList.forEach(icon => {
        let btn = document.createElement('button');
        btn.className = 'btn btn-outline-secondary d-flex align-items-center justify-content-center p-2 shadow-sm bg-white';
        btn.style.width = '50px'; btn.style.height = '50px'; btn.style.borderRadius = '12px';
        btn.innerHTML = `<iconify-icon icon="${icon}" style="font-size: 28px; color: #581c87;"></iconify-icon>`;
        btn.onclick = () => {
            addIcon(icon);
            bootstrap.Modal.getInstance(document.getElementById('iconModal')).hide();
        };
        iconContainer.appendChild(btn);
    });
});

    function autoZoomCanvas() {
        const container = document.getElementById('canvas-area');
        const canvas = document.getElementById('card-canvas');
        
        // Hitung lebar layar HP yang tersedia (dikurangi padding kiri-kanan 30px)
        const screenWidth = container.clientWidth - 30; 
        
        // Tentukan lebar asli kertas saat ini
        const isLandscape = canvas.classList.contains('ratio-16-9');
        const canvasWidth = isLandscape ? 640 : 360;
        
        // Jika layar HP lebih sempit dari kertas, lakukan Zoom Out!
        if (screenWidth < canvasWidth) {
            currentScale = screenWidth / canvasWidth;
        } else {
            currentScale = 1; // Ukuran normal di layar besar
        }
        
        // Terapkan Zoom
        canvas.style.transform = `scale(${currentScale})`;
        
        // PENTING: Pangkas sisa ruang kosong di bawah kanvas setelah diciutkan
        const canvasHeight = isLandscape ? 360 : 640;
        container.style.height = (canvasHeight * currentScale + 100) + "px";
        container.style.minHeight = "auto"; 
    }

    // Otomatis menyesuaikan saat layar di-rotate / di-resize
    window.addEventListener('resize', autoZoomCanvas);

    // ----- FUNGSI PERINGATAN KELUAR (UNSAVED CHANGES) -----
    function markAsUnsaved() {
        hasUnsavedChanges = true;
        const btnSave = document.getElementById('btn-save');
        if (!btnSave.innerHTML.includes('*')) {
            // Sesuaikan dengan UI baru yang ada d-none d-sm-inline
            btnSave.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> <span>Simpan*</span>';
        }
    }

    window.addEventListener('beforeunload', function (e) {
        if (hasUnsavedChanges) {
            e.preventDefault();
            e.returnValue = 'Perubahan belum disimpan. Yakin ingin meninggalkan halaman?';
        }
    });

    document.querySelectorAll('.ratio-toggle').forEach(radio => {
        radio.addEventListener('change', function() {
            document.getElementById('card-canvas').className = this.value === '9-16' ? 'ratio-9-16' : 'ratio-16-9';
            autoZoomCanvas();
            markAsUnsaved();
        });
    });

   document.getElementById('bg-color').addEventListener('input', function() {
    const canvas = document.getElementById('card-canvas');
    canvas.style.backgroundImage = 'none';
    canvas.style.backgroundColor = this.value;
    document.getElementById('img-upload').value = ''; 
    markAsUnsaved();
});

   function uploadBackground(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        if(!file.type.match('image.*')) return Swal.fire('Error', 'Format file harus JPG/PNG', 'error');
        
        // Batasi gambar background (Maks 2MB)
        if(file.size > 2 * 1024 * 1024) return Swal.fire('Ukuran Terlalu Besar', 'Ukuran gambar background maksimal 2MB!', 'error');
        
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('card-canvas').style.backgroundImage = `url(${e.target.result})`;
            markAsUnsaved();
        };
        reader.readAsDataURL(file);
    }
}

    // ----- FUNGSI ELEMEN AKTIF & DESELECT -----
    function setActive(el) {
        document.querySelectorAll('.design-element').forEach(node => node.classList.remove('active-element'));
        el.classList.add('active-element');
        activeElement = el;

        if (el.classList.contains('text-box')) {
            const textNode = el.querySelector('.text-content');
            document.getElementById('font-family').value = textNode.style.fontFamily || "'Inter', sans-serif";
            document.getElementById('text-color').value = rgbToHex(textNode.style.color || window.getComputedStyle(textNode).color);
            document.getElementById('text-size').value = parseInt(window.getComputedStyle(textNode).fontSize) || 20;
            document.getElementById('text-rotation').value = el.getAttribute('data-rotation') || 0;
        }else if (el.classList.contains('image-box')) {
            document.getElementById('image-rotation').value = el.getAttribute('data-rotation') || 0;
        }else if (el.classList.contains('video-box')) {
            document.getElementById('video-rotation').value = el.getAttribute('data-rotation') || 0;
        }else if (el.classList.contains('shape-box')) {
            document.getElementById('element-color').value = rgbToHex(el.style.color);
            document.getElementById('element-rotation').value = el.getAttribute('data-rotation');
            document.getElementById('element-size').value = parseFloat(el.style.width);
        }
    }

    function deselectAll(e) {
        if (e.target.id === 'card-canvas') {
            document.querySelectorAll('.design-element').forEach(node => node.classList.remove('active-element'));
            activeElement = null;
        }
    }

    function deleteElement(e, id) {
        e.stopPropagation();
        const el = document.getElementById(id);
        if(el) {
            if(canvasFiles[id]) delete canvasFiles[id]; 
            el.remove();
            markAsUnsaved();
        }
    }

    // ----- MANAJEMEN TEKS & UKURAN -----
   // Tambahkan parameter rotation = 0 di fungsinya
    function addText(text = "Ketik di sini...", x = 20, y = 20, font = "'Inter', sans-serif", color = "#000000", size = 20, width = 150, height = null, rotation = 0) {
        textCounter++;
        const div = document.createElement('div');
        div.className = 'design-element text-box';
        div.id = 'text-' + textCounter;
        div.setAttribute('data-x', x);
        div.setAttribute('data-y', y);
        div.setAttribute('data-rotation', rotation); // Simpan rotasi di atribut HTML
        div.style.transform = `translate(${x}px, ${y}px)`;
        div.style.width = width ? `${width}px` : '150px';
        if(height) div.style.height = `${height}px`;

        // Tambahkan transform rotate di element text-content
        div.innerHTML = `
            <div class="el-btn-delete" onclick="deleteElement(event, '${div.id}')"><i class="fa-solid fa-xmark"></i></div>
            <div class="text-content" contenteditable="true" style="font-family: ${font}; color: ${color}; font-size: ${size}px; transform: rotate(${rotation}deg); height: 100%; width: 100%;">${text}</div>
            <div class="el-handle-resize"></div>
        `;

        div.addEventListener('mousedown', function(e) { setActive(div); });
        document.getElementById('card-canvas').appendChild(div);
        
        div.querySelector('.text-content').addEventListener('input', markAsUnsaved);
        
        setActive(div);
        document.getElementById('text-rotation').value = rotation; // Set value slider default
        markAsUnsaved();
    }

    function updateActiveText() {
        if (activeElement && activeElement.classList.contains('text-box')) {
            const textNode = activeElement.querySelector('.text-content');
            const rotation = document.getElementById('text-rotation').value; // Ambil nilai slider rotasi
            
            textNode.style.fontFamily = document.getElementById('font-family').value;
            textNode.style.color = document.getElementById('text-color').value;
            textNode.style.fontSize = document.getElementById('text-size').value + 'px';
            
            // Terapkan efek rotasinya ke elemen
            textNode.style.transform = `rotate(${rotation}deg)`;
            activeElement.setAttribute('data-rotation', rotation); 
            
            markAsUnsaved();
        }
    }
    // ----- MANAJEMEN GAMBAR CANVAS -----
   function addCanvasImage(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        if(!file.type.match('image.*')) return Swal.fire('Error', 'Format file harus JPG/PNG', 'error');
        
        // Batasi gambar canvas (Maks 2MB)
        if(file.size > 2 * 1024 * 1024) return Swal.fire('Ukuran Terlalu Besar', 'Ukuran gambar maksimal 2MB!', 'error');

        const reader = new FileReader();
        reader.onload = function(e) {
            renderImage(e.target.result, 20, 20, 150, 150, file);
            markAsUnsaved();
        };
        reader.readAsDataURL(file);
        input.value = ''; 
    }
}

    // ----- MANAJEMEN VIDEO CANVAS -----
// ----- MANAJEMEN VIDEO CANVAS -----
    function addCanvasVideo(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            if(!file.type.match('video.*')) return Swal.fire('Error', 'Format file harus MP4/WebM/Ogg', 'error');

            // Batasi ukuran video (Maks 15MB)
            if(file.size > 15 * 1024 * 1024) return Swal.fire('Ukuran Terlalu Besar', 'Ukuran video maksimal 15MB!', 'error');

            const videoUrl = URL.createObjectURL(file);
            
            // Cek durasi video sebelum diproses
            const tempVideo = document.createElement('video');
            tempVideo.preload = 'metadata'; // <--- TAMBAHKAN INI BIAR BROWSER PASTI BACA DURASINYA
            tempVideo.src = videoUrl;
            tempVideo.onloadedmetadata = function() {
                // Batas durasi video 30 detik
                if (tempVideo.duration > 30) {
                    return Swal.fire('Durasi Kepanjangan', 'Durasi video maksimal adalah 30 detik!', 'error');
                }
                
                // Lanjut render kalau lolos pengecekan
                renderVideo(videoUrl, 20, 20, 200, 150, file);
                markAsUnsaved();
            };

            input.value = ''; 
        }
    }

// Tambahkan parameter rotation = 0 di akhir
    function renderVideo(src, x, y, width, height, fileObject = null, existingPath = null, rotation = 0) {
        vidCounter++;
        const vidId = 'vid-' + vidCounter;
        const div = document.createElement('div');
        div.className = 'design-element video-box';
        div.id = vidId;
        div.setAttribute('data-x', x);
        div.setAttribute('data-y', y);
        div.setAttribute('data-rotation', rotation); // Simpan rotasi
        div.style.transform = `translate(${x}px, ${y}px)`;
        div.style.width = `${width}px`;
        div.style.height = `${height}px`;

        if (existingPath) div.setAttribute('data-existing', existingPath);

        // Tambahkan style transform rotate pada tag video-nya
        div.innerHTML = `
            <div class="el-btn-delete" onclick="deleteElement(event, '${vidId}')"><i class="fa-solid fa-xmark"></i></div>
            <video src="${src}" class="video-content" style="width: 100%; height: 100%; object-fit: cover; transform: rotate(${rotation}deg);" controls></video>
            <div class="el-handle-resize"></div>
        `;

        if(fileObject) canvasFiles[vidId] = fileObject;

        div.addEventListener('mousedown', function(e) { setActive(div); });
        document.getElementById('card-canvas').appendChild(div);
        
        setActive(div);
        document.getElementById('video-rotation').value = rotation; // Set slider ke nilai saat ini
        markAsUnsaved();
    }

    function updateActiveVideo() {
        if (activeElement && activeElement.classList.contains('video-box')) {
            const rotation = document.getElementById('video-rotation').value;
            activeElement.querySelector('.video-content').style.transform = `rotate(${rotation}deg)`;
            activeElement.setAttribute('data-rotation', rotation);
            markAsUnsaved();
        }
    }
   // Tambahkan parameter rotation = 0
    function renderImage(src, x, y, width, height, fileObject = null, existingPath = null, rotation = 0) {
        imgCounter++;
        const imgId = 'img-' + imgCounter;
        const div = document.createElement('div');
        div.className = 'design-element image-box';
        div.id = imgId;
        div.setAttribute('data-x', x);
        div.setAttribute('data-y', y);
        div.setAttribute('data-rotation', rotation); // Simpan rotasi
        div.style.transform = `translate(${x}px, ${y}px)`;
        div.style.width = `${width}px`;
        div.style.height = `${height}px`;

        if (existingPath) div.setAttribute('data-existing', existingPath);

        // Tambahkan style transform rotate pada img
        div.innerHTML = `
            <div class="el-btn-delete" onclick="deleteElement(event, '${imgId}')"><i class="fa-solid fa-xmark"></i></div>
            <img src="${src}" class="image-content" style="transform: rotate(${rotation}deg);">
            <div class="el-handle-resize"></div>
        `;

        if(fileObject) canvasFiles[imgId] = fileObject;

        div.addEventListener('mousedown', function(e) { setActive(div); });
        document.getElementById('card-canvas').appendChild(div);
        
        setActive(div);
        document.getElementById('image-rotation').value = rotation; // Set value slider default
        markAsUnsaved();
    }

    function updateActiveImage() {
        if (activeElement && activeElement.classList.contains('image-box')) {
            const rotation = document.getElementById('image-rotation').value;
            activeElement.querySelector('.image-content').style.transform = `rotate(${rotation}deg)`;
            activeElement.setAttribute('data-rotation', rotation);
            markAsUnsaved();
        }
    }

    // ----- FITUR VOICE NOTE -----
   async function toggleRecord() {
    const btn = document.getElementById('btn-record');
    
    if (!isRecording) {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
            mediaRecorder = new MediaRecorder(stream);
            audioChunks = [];
            mediaRecorder.ondataavailable = e => { if (e.data.size > 0) audioChunks.push(e.data); };
            mediaRecorder.onstop = () => {
                audioBlob = new Blob(audioChunks, { type: 'audio/mp3' });
                createVoiceElement(URL.createObjectURL(audioBlob));
                markAsUnsaved();
            };
            mediaRecorder.start();
            isRecording = true;
            btn.innerHTML = '<i class="fa-solid fa-stop recording-pulse"></i> Stop Rekam';
            btn.classList.add('bg-danger');

            // Set batas waktu otomatis berhenti setelah 30 Menit
            recordTimeout = setTimeout(() => {
                if (isRecording) {
                    toggleRecord(); // Panggil fungsi ini lagi untuk stop
                    Swal.fire('Waktu Habis', 'Rekaman suara dibatasi maksimal 30 menit.', 'info');
                }
            }, MAX_RECORD_SECONDS * 1000);

        } catch (err) {
            Swal.fire('Akses Ditolak', 'Harap izinkan akses mikrofon untuk merekam suara.', 'warning');
        }
    } else {
        mediaRecorder.stop();
        isRecording = false;
        clearTimeout(recordTimeout); // Bersihkan timer
        btn.innerHTML = '<i class="fa-solid fa-microphone"></i> Rekam Suara';
        btn.classList.remove('bg-danger');
    }
}

    function createVoiceElement(audioUrl, x = 20, y = 20) {
        const oldVoice = document.getElementById('voice-element');
        if (oldVoice) oldVoice.remove();

        const div = document.createElement('div');
        div.className = 'design-element voice-box';
        div.id = 'voice-element';
        div.setAttribute('data-x', x);
        div.setAttribute('data-y', y);
        div.style.transform = `translate(${x}px, ${y}px)`;
        
        div.innerHTML = `
            <div class="el-btn-delete" onclick="deleteVoice(event)"><i class="fa-solid fa-xmark"></i></div>
            <div class="voice-pill">
                <audio controls src="${audioUrl}"></audio>
            </div>
        `;
        
        div.addEventListener('mousedown', function(e) { setActive(div); });
        document.getElementById('card-canvas').appendChild(div);
    }

    function deleteVoice(e) {
        e.stopPropagation();
        document.getElementById('voice-element').remove();
        audioBlob = null;
        document.getElementById('btn-record').innerHTML = '<i class="fa-solid fa-microphone"></i> Rekam Suara';
        markAsUnsaved();
    }

    // ----- INTERACT.JS (DRAG & RESIZE) -----
    interact('.design-element')
    .draggable({
        inertia: true,
        autoScroll: true,
        listeners: {
            start(event) { setActive(event.target); },
            move(event) {
                const target = event.target;
                
                const x = (parseFloat(target.getAttribute('data-x')) || 0) + (event.dx / currentScale);
                const y = (parseFloat(target.getAttribute('data-y')) || 0) + (event.dy / currentScale);
                
                target.style.transform = `translate(${x}px, ${y}px)`;
                target.setAttribute('data-x', x);
                target.setAttribute('data-y', y);
            },
            end(event) { markAsUnsaved(); }
        }
    })
    .resizable({
        // KUNCI 1: Ubah right menjadi 'true' agar garis sisi kanan kotak bisa ditarik langsung
        edges: { left: false, right: true, bottom: '.el-handle-resize', top: false },
        listeners: {
            move(event) {
                const target = event.target;
                let currentWidth = parseFloat(target.style.width) || target.offsetWidth;
                let currentHeight = parseFloat(target.style.height) || target.offsetHeight;
                
                let newWidth = currentWidth + (event.deltaRect.width / currentScale);
                let newHeight = currentHeight + (event.deltaRect.height / currentScale);

                // KUNCI 2: Deteksi bagian mana yang ditarik user
                // Jika event.edges.bottom bernilai true, berarti user menarik tombol di pojok bawah.
                // Jika false, berarti user cuma menarik sisi pinggir kanannya saja.
                let isCornerDrag = event.edges.bottom; 

                // LOGIKA TEKS
                if (target.classList.contains('text-box')) {
                    let textNode = target.querySelector('.text-content');
                    
                    // JIKA DITARIK DARI POJOK BAWAH -> Besarkan ukuran Font secara proporsional
                    if (isCornerDrag) {
                        let currentFontSize = parseFloat(window.getComputedStyle(textNode).fontSize) || 20;
                        let scaleRatio = newWidth / currentWidth;
                        let newFontSize = currentFontSize * scaleRatio;
                        if (newFontSize < 10) newFontSize = 10;

                        textNode.style.fontSize = `${newFontSize}px`;
                        if (target.classList.contains('active-element')) {
                            document.getElementById('text-size').value = Math.round(newFontSize);
                        }
                    }
                    
                    // APAPUN YANG DITARIK (Pojok / Sisi) -> Lebar kotak akan ikut berubah!
                    // Hasilnya: Jika user cuma menarik sisi kanan, font tidak berubah, tapi kotaknya menyempit & teks turun ke bawah.
                    target.style.width = `${newWidth}px`;
                    target.style.height = 'auto'; // Tinggi otomatis menyesuaikan isi teks
                } 
                // LOGIKA ICON & SHAPE
                else if (target.classList.contains('icon-box') || target.classList.contains('shape-box')) {
                    // Agar gambar/shape tidak penyok, kita hanya izinkan resize dari pojok saja
                    if (isCornerDrag) { 
                        target.style.width = `${newWidth}px`; 
                        target.style.height = `${newWidth}px`;
                        
                        if(target.classList.contains('icon-box')) {
                            target.querySelector('iconify-icon').style.fontSize = `${newWidth}px`;
                            if (target.classList.contains('active-element')) document.getElementById('icon-size').value = Math.round(newWidth);
                        } else {
                            if (target.classList.contains('active-element')) document.getElementById('element-size').value = Math.round(newWidth);
                        }
                    }
                } 
                // LOGIKA GAMBAR / VIDEO
                else {
                    if (isCornerDrag) { // Hanya izinkan resize dari pojok
                        target.style.width = `${newWidth}px`;
                        target.style.height = `${newHeight}px`;
                    }
                }
            },
            end(event) { markAsUnsaved(); }
        }
    })
    // Fitur pinch-to-zoom di HP (2 jari)
    .gesturable({
        listeners: {
            start(event) { setActive(event.target); },
            move(event) {
                const target = event.target;
                let currentWidth = parseFloat(target.style.width) || target.offsetWidth;
                let currentHeight = parseFloat(target.style.height) || target.offsetHeight;
                
                let newWidth = currentWidth * (1 + event.ds);
                let newHeight = currentHeight * (1 + event.ds);

                // LOGIKA BARU UNTUK MOBILE PINCH ZOOM TEKS
                if (target.classList.contains('text-box')) {
                    let textNode = target.querySelector('.text-content');
                    let currentFontSize = parseFloat(window.getComputedStyle(textNode).fontSize) || 20;
                    
                    let newFontSize = currentFontSize * (1 + event.ds);
                    if (newFontSize < 10) newFontSize = 10;

                    textNode.style.fontSize = `${newFontSize}px`;
                    target.style.width = `${newWidth}px`;
                    target.style.height = 'auto';

                    if (target.classList.contains('active-element')) {
                        document.getElementById('text-size').value = Math.round(newFontSize);
                    }
                }
                else if (target.classList.contains('icon-box') || target.classList.contains('shape-box')) {
                    target.style.width = `${newWidth}px`; 
                    target.style.height = `${newWidth}px`;
                    if(target.classList.contains('icon-box')) {
                        target.querySelector('iconify-icon').style.fontSize = `${newWidth}px`;
                        if (target.classList.contains('active-element')) document.getElementById('icon-size').value = Math.round(newWidth);
                    }
                } else {
                    target.style.width = `${newWidth}px`;
                    target.style.height = `${newHeight}px`;
                }
            },
            end(event) { markAsUnsaved(); }
        }
    });
    // ----- LOAD DATA PERSISTENCE SAAT HALAMAN DIBUKA -----
    document.addEventListener("DOMContentLoaded", function() {
        autoZoomCanvas();
        const desainData = @json($desain ?? null);
        if(desainData) {
            const canvas = document.getElementById('card-canvas');
            if(desainData.background.startsWith('#')) {
                canvas.style.backgroundColor = desainData.background;
                document.getElementById('bg-color').value = desainData.background;
            } else {
                canvas.style.backgroundImage = `url('/${desainData.background}')`;
            }

            if(desainData.texts) {
                desainData.texts.forEach(t => {
                    addText(t.text, t.position_x, t.position_y, t.font, t.color, t.size, t.width, t.height, t.rotation);
                });
            }

            if(desainData.images) {
                desainData.images.forEach(img => {
                    renderImage(`/${img.image}`, img.position_x, img.position_y, img.width, img.height, null, img.image, img.rotation);
                });
            }

            if(desainData.videos) {
                desainData.videos.forEach(vid => {
                    renderVideo(`/${vid.video}`, vid.position_x, vid.position_y, vid.width, vid.height, null, vid.video, vid.rotation);
                });
            }

            if(desainData.voice) {
                createVoiceElement(`/${desainData.voice}`, desainData.voice_pos_x, desainData.voice_pos_y);
            }

            if(desainData.icons) {
                    desainData.icons.forEach(i => {
                        addIcon(i.icon_name, i.position_x, i.position_y, i.color, i.size, i.rotation);
                    });
                }

            if(desainData.elements) {
                desainData.elements.forEach(e => addShape(e.type, e.position_x, e.position_y, e.color, e.size, e.rotation));
            }

            setTimeout(() => { 
                hasUnsavedChanges = false; 
                document.getElementById('btn-save').innerHTML = '<i class="fa-solid fa-floppy-disk"></i> <span>Simpan</span>';
            }, 500);
        }
    });
document.getElementById('judul-input').addEventListener('input', function() {
    this.classList.remove('input-error-shake');
    document.getElementById('judul-error-hint').classList.add('d-none');
});

// ----- SIMPAN DATA -----
async function saveDesign() {
    const slugInput = document.getElementById('slug-input');
    const judulInput = document.getElementById('judul-input');
    const slug = slugInput.value.trim();
    const judulValue = judulInput.value.trim();

    // 1. Reset Error State dulu
    slugInput.classList.remove('input-error-shake');
    judulInput.classList.remove('input-error-shake');
    document.getElementById('slug-error-hint').classList.add('d-none');
    document.getElementById('judul-error-hint').classList.add('d-none');

    // 2. Logika Jika Slug Kosong
    if (!slug) {
        slugInput.classList.add('input-error-shake');
        document.getElementById('slug-error-hint').classList.remove('d-none');
        
        // Auto Scroll ke atas & fokus
        window.scrollTo({ top: 0, behavior: 'smooth' });
        setTimeout(() => slugInput.focus(), 400);

        Swal.fire({
            toast: true, position: 'top-end', icon: 'warning',
            title: 'Ups! Slug/URL belum diisi.', showConfirmButton: false, timer: 3000
        });
        return; // Stop proses simpan
    }

    // 3. Logika Jika Judul Kosong (Otomatis Buka Modal)
    if (!judulValue) {
        const metaModalEl = document.getElementById('metaModal');
        let metaModal = bootstrap.Modal.getInstance(metaModalEl);
        if (!metaModal) metaModal = new bootstrap.Modal(metaModalEl);
        
        metaModal.show(); // Buka Modal Paksa

        // Tunggu animasi modal selesai baru kasih getar & fokus
        metaModalEl.addEventListener('shown.bs.modal', function onModalShown() {
            judulInput.classList.add('input-error-shake');
            document.getElementById('judul-error-hint').classList.remove('d-none');
            judulInput.focus();
            
            // Hapus event listener biar gak ke-trigger berkali-kali
            metaModalEl.removeEventListener('shown.bs.modal', onModalShown);
        });

        Swal.fire({
            toast: true, position: 'top-end', icon: 'warning',
            title: 'Ups! Judul kartu kelupaan.', showConfirmButton: false, timer: 3000
        });
        return; // Stop proses simpan
    }

    // ===============================================
    // JIKA AMAN, LANJUTKAN PROSES SIMPAN SEPERTI BIASA
    // ===============================================
    document.getElementById('btn-save').innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...';
    document.getElementById('btn-save').disabled = true;

    const formData = new FormData();
        
        // 2. MASUKKAN SEMUA DATA
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append('slug', slug);
        formData.append('aspek_rasio', document.querySelector('input[name="ratio"]:checked').value);
        formData.append('judul', judulValue);
        formData.append('deskripsi', document.getElementById('deskripsi-input').value.trim());

        const previewFile = document.getElementById('preview-upload').files[0];
        if(previewFile) {
            formData.append('gambar_preview', previewFile);
        }
        
        // --- LOGIKA BACKGROUND ---
        const canvasElement = document.getElementById('card-canvas');
        const bgFile = document.getElementById('img-upload').files[0];

        // Cek visual aslinya: apakah di canvas ada background-image atau tidak?
        const isUsingImage = canvasElement.style.backgroundImage && canvasElement.style.backgroundImage !== 'none';

        if (isUsingImage && bgFile) {
            // Jika canvas pakai gambar DAN ada file baru
            formData.append('background_file', bgFile);
        } else if (!isUsingImage) {
            // Jika canvas pakai warna, paksa kirim kode warnanya
            formData.append('background_color', document.getElementById('bg-color').value);
            // Tambahkan flag agar Controller tahu gambar lama harus dihanguskan
            formData.append('hapus_gambar_lama', 'true'); 
        }

        // Extract Texts
        const texts = [];
        document.querySelectorAll('.text-box').forEach(el => {
            const textNode = el.querySelector('.text-content');
            texts.push({
                text: textNode.innerHTML,
                font: textNode.style.fontFamily,
                color: textNode.style.color,
                size: parseFloat(textNode.style.fontSize) || 20,
                rotation: parseFloat(el.getAttribute('data-rotation')) || 0,
                x: parseFloat(el.getAttribute('data-x')) || 0,
                y: parseFloat(el.getAttribute('data-y')) || 0,
                width: parseFloat(el.style.width) || null,
                height: parseFloat(el.style.height) || null
            });
        });
        formData.append('texts_data', JSON.stringify(texts));

        // Extract Images Canvas
        const canvasImgs = [];
        let imgIndex = 0;
        document.querySelectorAll('.image-box').forEach(el => {
            const imgId = el.id;
            const dataObj = {
                x: parseFloat(el.getAttribute('data-x')) || 0,
                y: parseFloat(el.getAttribute('data-y')) || 0,
                width: parseFloat(el.style.width) || 150,
                height: parseFloat(el.style.height) || 150,
                rotation: parseFloat(el.getAttribute('data-rotation')) || 0,
                existing_path: el.getAttribute('data-existing') || null
            };
            
            if(canvasFiles[imgId]) {
                formData.append(`canvas_images[${imgIndex}]`, canvasFiles[imgId]);
            }
            canvasImgs.push(dataObj);
            imgIndex++;
        });
        formData.append('canvas_images_data', JSON.stringify(canvasImgs));

        // Extract Videos Canvas
        const canvasVideos = [];
        let vidIndex = 0;
        document.querySelectorAll('.video-box').forEach(el => {
            const vidId = el.id;
            const dataObj = {
                x: parseFloat(el.getAttribute('data-x')) || 0,
                y: parseFloat(el.getAttribute('data-y')) || 0,
                width: parseFloat(el.style.width) || 200,
                height: parseFloat(el.style.height) || 150,
                rotation: parseFloat(el.getAttribute('data-rotation')) || 0,
                existing_path: el.getAttribute('data-existing') || null
            };
            
            if(canvasFiles[vidId]) {
                formData.append(`canvas_videos[${vidIndex}]`, canvasFiles[vidId]);
            }
            canvasVideos.push(dataObj);
            vidIndex++;
        });
        formData.append('canvas_videos_data', JSON.stringify(canvasVideos));

        // Extract Icons
        const savedIcons = [];
        document.querySelectorAll('.icon-box').forEach(el => {
            savedIcons.push({
                icon_name: el.getAttribute('data-icon-name'),
                color: rgbToHex(el.style.color),
                size: parseFloat(el.style.width) || 60,
                rotation: parseFloat(el.getAttribute('data-rotation')) || 0,
                x: parseFloat(el.getAttribute('data-x')) || 0,
                y: parseFloat(el.getAttribute('data-y')) || 0
            });
        });
        formData.append('icons_data', JSON.stringify(savedIcons));

        // ELEMENTS (SHAPES)
        const elements = []; 
        document.querySelectorAll('.shape-box').forEach(el => {
            elements.push({ 
                type: el.getAttribute('data-shape-type'), 
                color: rgbToHex(el.style.color), 
                size: parseFloat(el.style.width)||100, 
                rotation: parseFloat(el.getAttribute('data-rotation'))||0, 
                x: parseFloat(el.getAttribute('data-x'))||0, 
                y: parseFloat(el.getAttribute('data-y'))||0 
            });
        }); 
        formData.append('elements_data', JSON.stringify(elements));

        // Extract Voice
        if (audioBlob) {
            formData.append('voice', audioBlob, 'voice-note.mp3');
        }
        const voiceEl = document.getElementById('voice-element');
        if (voiceEl) {
            formData.append('voice_pos_x', parseFloat(voiceEl.getAttribute('data-x')) || 0);
            formData.append('voice_pos_y', parseFloat(voiceEl.getAttribute('data-y')) || 0);
        }

        try {
    const response = await fetch("{{ route('desain.store') }}", {
        method: 'POST',
        body: formData,
        headers: { 
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json', 
            'ngrok-skip-browser-warning': '69420' 
        }
    });

    // 1. CEK ERROR DARI SERVER DULU SEBELUM DI-PARSE KE JSON
    if (!response.ok) {
        const errortext = await response.text(); 
        console.error("🔥 ERROR ASLI DARI LARAVEL:\n\n", errortext);

        try {
            // Coba lihat apakah error-nya berupa JSON (misal validasi dari Laravel)
            const errorJson = JSON.parse(errortext);
            let errors = '';
            if (errorJson.errors) {
                for(let key in errorJson.errors) errors += errorJson.errors[key][0] + '\n';
            }
            // Lempar error ke blok catch
            throw new Error(errors || errorJson.message || "Terjadi kesalahan di server.");
        } catch (parseError) {
            // Jika masuk ke sini, berarti server mengembalikan HTML (Syntax Error PHP / 500 Server Error)
            throw new Error("Pesan Error PHP! Silakan tekan F12 dan buka tab 'Console' untuk melihat detail aslinya.");
        }
    }

    // 2. JIKA SUKSES, BARU BACA SEBAGAI JSON
    const result = await response.json();
    
    hasUnsavedChanges = false; 
    
    // 3. Tampilkan Toast Bootstrap (Sukses)
    const toastEl = document.getElementById('successToast');
    if (toastEl) {
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
    }

    // 4. Langsung otomatis buka Modal QR & Share
    if (typeof openShareModal === "function") {
        openShareModal();
    }

} catch (error) {
    // SEKARANG ERROR ASLINYA AKAN MUNCUL DI SINI
    console.error("Kesalahan Fetch:", error);
    Swal.fire('Error', error.message, 'error');
} finally {
    if(hasUnsavedChanges) { 
        document.getElementById('btn-save').innerHTML = '<i class="fa-solid fa-floppy-disk"></i> <span>Simpan*</span>';
    } else {
        document.getElementById('btn-save').innerHTML = '<i class="fa-solid fa-floppy-disk"></i> <span>Simpan</span>';
    }
    document.getElementById('btn-save').disabled = false;
}
    }
    function rgbToHex(rgb) {
        if(rgb.startsWith('#')) return rgb;
        let a = rgb.split("(")[1].split(")")[0].split(",");
        return "#" + a.map(x => {
            x = parseInt(x).toString(16);
            return (x.length==1) ? "0"+x : x;
        }).join("");
    }

    // ----- FITUR SHARE & QR CODE -----
// --- FITUR SHARE & QR CODE ---
let qrCodeObj = null;

function openShareModal() {
    const slug = document.getElementById('slug-input').value;
    
    // Validasi kalau slug kosong atau belum disave (tandanya ada bintang *)
    if (!slug || hasUnsavedChanges) {
        return Swal.fire('Oops!', 'Silakan "Simpan" desain kamu terlebih dahulu sebelum membagikan!', 'warning');
    }

    const fullUrl = window.location.origin + '/' + slug; 

    // BARIS YANG BIKIN ERROR (document.getElementById('share-link-result').value = fullUrl) SUDAH DIHAPUS DI SINI

    // Bersihkan QR Code lama (jika ada)
    document.getElementById('qrcode-container').innerHTML = '';
    
    // Generate QR Code Baru
    qrCodeObj = new QRCode(document.getElementById("qrcode-container"), {
        text: fullUrl,
        width: 180,
        height: 180,
        colorDark : "#581c87", 
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });

    // Tampilkan Modal
    const shareModal = new bootstrap.Modal(document.getElementById('shareModal'));
    shareModal.show();
}

function copyShareLink() {
    const copyText = document.getElementById("share-link-result");
    copyText.select();
    copyText.setSelectionRange(0, 99999); // Untuk Mobile
    navigator.clipboard.writeText(copyText.value);
    
    Swal.fire({
        toast: true, position: 'top-end', icon: 'success', 
        title: 'Tautan disalin!', showConfirmButton: false, timer: 1500
    });
}

function downloadQR() {
    // Ambil elemen canvas dari dalam container QR
    const canvas = document.querySelector('#qrcode-container canvas');
    if (canvas) {
        const url = canvas.toDataURL("image/png");
        const a = document.createElement('a');
        a.download = `QR-oforsite-${document.getElementById('slug-input').value}.png`;
        a.href = url;
        a.click();
    }
}

let slugTimeout = null;

// --- FUNGSI VALIDASI SLUG (TERPADU) ---
document.getElementById('slug-input').addEventListener('input', function(e) {
    const slug = this.value;
    const feedback = document.getElementById('slug-feedback');
    const iconContainer = document.getElementById('slug-status-icon');
    const btnSave = document.getElementById('btn-save');

    // 1. Hilangkan animasi error merah jika user mulai mengetik ulang
    this.classList.remove('input-error-shake');
    document.getElementById('slug-error-hint').classList.add('d-none');

    // 2. CEK SPASI (Real-time)
    if (slug.includes(' ')) {
        feedback.style.display = 'block';
        iconContainer.innerHTML = '<i class="bi bi-x-circle-fill text-danger"></i>';
        feedback.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> URL tidak boleh memakai spasi!';
        feedback.className = 'small fw-bold mt-1 px-2 text-danger';
        btnSave.disabled = true; // Kunci tombol simpan
        
        // Fitur Auto-Fix: Otomatis ubah spasi jadi strip "-" (Hapus // di bawah ini jika mau diaktifkan)
        // this.value = slug.replace(/\s+/g, '-'); 
        
        clearTimeout(slugTimeout); // Batalkan request AJAX ke server
        return; 
    }

    // 3. Cek minimal karakter (misal: harus lebih dari 2 huruf)
    if (slug.length < 3) {
        feedback.style.display = 'none';
        iconContainer.innerHTML = '';
        btnSave.disabled = false;
        return;
    }

    // 4. JALANKAN AJAX UNTUK CEK KE DATABASE KALO FORMAT SUDAH BENAR
    clearTimeout(slugTimeout);
    slugTimeout = setTimeout(async () => {
        try {
            const response = await fetch(`{{ route('desain.checkSlug') }}?slug=${slug}`);
            const data = await response.json();

            feedback.style.display = 'block';
            
            if (data.available) {
                iconContainer.innerHTML = '<i class="bi bi-check-circle-fill text-success"></i>';
                feedback.innerHTML = '<i class="bi bi-check-lg"></i> URL tersedia!';
                feedback.className = 'small fw-bold mt-1 px-2 text-white'; 
                btnSave.disabled = false; // Buka kunci tombol simpan
            } else {
                iconContainer.innerHTML = '<i class="bi bi-x-circle-fill text-danger"></i>';
                feedback.innerHTML = '<i class="bi bi-exclamation-triangle-fill"></i> URL sudah dipakai orang lain!';
                feedback.className = 'small fw-bold mt-1 px-2 text-warning';
                btnSave.disabled = true; // Kunci tombol simpan
            }
        } catch (error) {
            console.error('Gagal mengecek slug');
        }
    }, 500); 
});
// --- SCRIPT COUNTER & PREVIEW GAMBAR ---
document.addEventListener("DOMContentLoaded", function() {
    const judulInput = document.getElementById('judul-input');
    const judulCounter = document.getElementById('judul-counter');
    const deskripsiInput = document.getElementById('deskripsi-input');
    const deskripsiCounter = document.getElementById('deskripsi-counter');
    const previewUpload = document.getElementById('preview-upload');
    const previewDisplay = document.getElementById('preview-image-display');
    // Render Shape ke Modal
    const sContainer = document.getElementById('element-list');
    for(let key in shapeDictionary) {
        let btn = document.createElement('div');
        btn.className = 'shape-item';
        btn.innerHTML = `<svg viewBox="0 0 100 100" preserveAspectRatio="none">${shapeDictionary[key]}</svg>`;
        btn.onclick = () => { addShape(key); bootstrap.Modal.getInstance(document.getElementById('elementModal')).hide(); };
        sContainer.appendChild(btn);
    }

    // Fungsi update counter realtime
    const updateCounter = (input, counter, max) => {
        let len = input.value.length;
        counter.innerText = `${len} / ${max}`;
        counter.className = len >= max ? "text-danger fw-bold" : "text-muted";
        if (len > 0) markAsUnsaved();
    };

    judulInput.addEventListener('input', () => updateCounter(judulInput, judulCounter, 80));
    deskripsiInput.addEventListener('input', () => updateCounter(deskripsiInput, deskripsiCounter, 150));

    // Initialize counter di awal (jika mode edit)
    updateCounter(judulInput, judulCounter, 80);
    updateCounter(deskripsiInput, deskripsiCounter, 150);

    // Live Preview Image saat dipilih
    previewUpload.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const file = this.files[0];
            if(file.size > 2 * 1024 * 1024) {
                this.value = ''; // Reset input
                return Swal.fire('Ukuran Terlalu Besar', 'Gambar preview maksimal 2MB!', 'error');
            }
            previewDisplay.src = URL.createObjectURL(file);
            markAsUnsaved();
        }
    });
});

let iconCounter = 0;

function addIcon(iconName, x = 50, y = 50, color = "#7e22ce", size = 60, rotation = 0) {
    iconCounter++;
    const div = document.createElement('div');
    div.className = 'design-element icon-box';
    div.id = 'icon-' + iconCounter;
    div.setAttribute('data-icon-name', iconName);
    div.setAttribute('data-rotation', rotation);
    div.setAttribute('data-x', x);
    div.setAttribute('data-y', y);
    
    div.style.transform = `translate(${x}px, ${y}px)`;
    div.style.width = `${size}px`;
    div.style.height = `${size}px`;
    div.style.color = color;

    // KUNCI: Set font-size dengan variable size agar skala icon sama dengan ukuran pembungkusnya
    div.innerHTML = `
        <div class="el-btn-delete" onclick="deleteElement(event, '${div.id}')"><i class="fa-solid fa-xmark"></i></div>
        <div class="icon-content w-100 h-100 d-flex align-items-center justify-content-center" style="transform: rotate(${rotation}deg);">
            <iconify-icon icon="${iconName}" style="font-size: ${size}px; width: 100%; height: 100%; transition: font-size 0.1s;"></iconify-icon>
        </div>
        <div class="el-handle-resize"></div>
    `;

    // Ambil data saat elemen di-klik
    div.addEventListener('mousedown', function(e) { 
        setActive(div); 
        document.getElementById('icon-color').value = rgbToHex(div.style.color);
        document.getElementById('icon-rotation').value = div.getAttribute('data-rotation');
        document.getElementById('icon-size').value = parseFloat(div.style.width); // Update value slider
    });

    document.getElementById('card-canvas').appendChild(div);
    setActive(div);
    
    // Set parameter toolbar saat dibuat
    document.getElementById('icon-size').value = size;
    document.getElementById('icon-rotation').value = rotation;
    
    markAsUnsaved();
}

function updateActiveIcon() {
    if (activeElement && activeElement.classList.contains('icon-box')) {
        const color = document.getElementById('icon-color').value;
        const rotation = document.getElementById('icon-rotation').value;
        const size = document.getElementById('icon-size').value;

        // Ubah warna, rotasi, lebar pembungkus, dan yang terpenting: Ukuran Font Iconify
        activeElement.style.color = color;
        activeElement.setAttribute('data-rotation', rotation);
        activeElement.style.width = `${size}px`;
        activeElement.style.height = `${size}px`;
        activeElement.querySelector('.icon-content').style.transform = `rotate(${rotation}deg)`;
        
        // Atur font-size dari iconify itu sendiri
        activeElement.querySelector('iconify-icon').style.fontSize = `${size}px`;
        
        markAsUnsaved();
    }
}

function addShape(type, x = 100, y = 100, color = "#7e22ce", size = 100, rotation = 0) {
    if(!shapeDictionary[type]) return;
    shapeCounter++;
    const div = document.createElement('div');
    div.className = 'design-element shape-box';
    div.id = 'shape-' + shapeCounter;
    div.setAttribute('data-shape-type', type);
    div.setAttribute('data-rotation', rotation);
    div.setAttribute('data-x', x);
    div.setAttribute('data-y', y);
    
    div.style.transform = `translate(${x}px, ${y}px)`;
    div.style.width = `${size}px`;
    div.style.height = `${size}px`;
    div.style.color = color;

    div.innerHTML = `
        <div class="el-btn-delete" onclick="deleteElement(event, '${div.id}')"><i class="fa-solid fa-xmark"></i></div>
        <div class="shape-content" style="transform: rotate(${rotation}deg);">
            <svg viewBox="0 0 100 100" preserveAspectRatio="none" fill="currentColor">${shapeDictionary[type]}</svg>
        </div>
        <div class="el-handle-resize"></div>
    `;

    div.addEventListener('mousedown', function(e) { setActive(div); });
    document.getElementById('card-canvas').appendChild(div);
    setActive(div);
    document.getElementById('element-size').value = size;
    document.getElementById('element-rotation').value = rotation;
    document.getElementById('element-color').value = color;
    markAsUnsaved();
}

function updateActiveShape() {
    if (activeElement && activeElement.classList.contains('shape-box')) {
        const color = document.getElementById('element-color').value;
        const rotation = document.getElementById('element-rotation').value;
        const size = document.getElementById('element-size').value;

        activeElement.style.color = color;
        activeElement.setAttribute('data-rotation', rotation);
        activeElement.style.width = `${size}px`;
        activeElement.style.height = `${size}px`;
        activeElement.querySelector('.shape-content').style.transform = `rotate(${rotation}deg)`;
        markAsUnsaved();
    }
}

// --- FUNGSI SHARE NATIVE API (DARI DALAM MODAL) ---
function shareCard() {
    const slug = document.getElementById('slug-input').value;
    const fullUrl = window.location.origin + '/' + slug;
    const title = document.getElementById('judul-input').value || 'Kartu Digital OFOR.SITE';

    if (navigator.share) {
        // Jika browser/HP support Share API
        navigator.share({
            title: title,
            text: 'Halo! Lihat kartu digital interaktif yang saya buat di OFOR.SITE.',
            url: fullUrl
        }).catch((error) => console.log('Share error/batal:', error));
    } else {
        // Fallback: Jika dibuka di PC/Browser lama, otomatis Copy Link
        navigator.clipboard.writeText(fullUrl);
        Swal.fire({
            toast: true, position: 'top-end', icon: 'success', 
            title: 'Tautan disalin ke clipboard!', showConfirmButton: false, timer: 1500
        });
    }
}

// --- FUNGSI DOWNLOAD KARTU SEBAGAI PNG (DARI DALAM MODAL) ---
function downloadCard(btn) {
    const canvasElement = document.getElementById('card-canvas');
    const originalText = btn.innerHTML;

    // Bersihkan state active agar garis kotak editing tidak ikut ter-download
    document.querySelectorAll('.design-element').forEach(node => node.classList.remove('active-element'));
    activeElement = null;

    // Ubah tombol jadi status loading biar user tau sistem lagi memproses
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Proses...';
    btn.disabled = true;

    // Render HTML Canvas ke Gambar
    html2canvas(canvasElement, {
        useCORS: true, 
        scale: 2, // Resolusi tinggi (jernih)
        backgroundColor: canvasElement.style.backgroundColor !== 'rgba(0, 0, 0, 0)' ? canvasElement.style.backgroundColor : '#ffffff'
    }).then(canvas => {
        const link = document.createElement('a');
        const slug = document.getElementById('slug-input').value || 'kartu';
        link.download = `OFOR-${slug}.png`;
        link.href = canvas.toDataURL('image/png');
        link.click();
    }).catch(err => {
        Swal.fire('Error', 'Gagal merender gambar kartu.', 'error');
        console.error(err);
    }).finally(() => {
        // Kembalikan tombol seperti semula
        btn.innerHTML = originalText;
        btn.disabled = false;
    });
}
// --- FIX SLIDER MOBILE: Cegah toolbar ikut bergeser saat slider disentuh ---
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('input[type="range"]').forEach(range => {
            // Hentikan perambatan event sentuh agar tidak sampai ke parent (toolbar)
            range.addEventListener('touchstart', function(e) { e.stopPropagation(); }, {passive: true});
            range.addEventListener('touchmove', function(e) { e.stopPropagation(); }, {passive: true});
        });
    });
</script>
</body>
</html>