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
    <link rel="icon" type="image/jpeg" href="{{ asset('logo-ofor.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo-ofor.jpg') }}">
        
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
            justify-content: flex-start; /* FIX POTONG KIRI: Ubah dari center ke flex-start */
            align-items: flex-start; 
            padding: 30px 15px; 
            min-height: calc(100vh - 120px); 
            overflow: auto; 
            -webkit-overflow-scrolling: touch;
        }

        #card-canvas {
            margin: 0 auto; /* KUNCI: Biar otomatis ke tengah di PC, tapi nempel kiri di HP */
            background-color: white; 
            background-size: cover; 
            background-position: center;
            position: relative; 
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15); 
            border-radius: 12px;
            flex-shrink: 0; 
            
            /* Tambahan untuk efek Zoom Responsif */
            transform-origin: top center; 
            transition: transform 0.3s ease; 
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
            <button class="btn btn-warning btn-sm fw-bold text-dark px-2 px-sm-3 shadow-sm text-nowrap" onclick="openShareModal()">
                <i class="fa-solid fa-share-nodes"></i> <span class="d-none d-sm-inline">Bagikan</span>
            </button>
            <button class="btn btn-light btn-sm fw-bold text-purple-dark px-2 px-sm-3 shadow-sm text-nowrap" onclick="saveDesign()" id="btn-save">
               <i class="fa-solid fa-floppy-disk"></i><span class="d-none d-sm-inline"> Simpan</span>
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

            <button class="btn btn-sm btn-custom fw-bold text-nowrap" onclick="addText()"><i class="fa-solid fa-font"></i> Teks</button>
        </div>

        <div class="toolbar-group">
            <button class="btn btn-sm btn-custom fw-bold text-nowrap" onclick="document.getElementById('canvas-img-upload').click()"><i class="fa-solid fa-photo-film"></i> Gambar</button>
            <input type="file" id="canvas-img-upload" hidden accept="image/png, image/jpeg, image/jpg" onchange="addCanvasImage(this)">
            
            <button class="btn btn-sm btn-custom fw-bold text-nowrap" onclick="document.getElementById('canvas-vid-upload').click()"><i class="fa-solid fa-video"></i> Video</button>
            <input type="file" id="canvas-vid-upload" hidden accept="video/mp4, video/webm, video/ogg" onchange="addCanvasVideo(this)">
            
            <button id="btn-record" class="btn btn-sm btn-custom fw-bold text-nowrap" onclick="toggleRecord()">
                <i class="fa-solid fa-microphone"></i> Rekam Suara
            </button>
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
        <p class="text-muted small mb-3">Scan QR di bawah ini atau salin tautan.</p>
        
        <div id="qrcode-container" class="d-flex justify-content-center mb-3 bg-white p-2 rounded border"></div>
        
        <div class="input-group input-group-sm mb-3">
            <input type="text" id="share-link-result" class="form-control bg-light" readonly>
            <button class="btn btn-primary" onclick="copyShareLink()" title="Salin Tautan">
                <i class="fa-regular fa-copy"></i>
            </button>
        </div>
        
        <button class="btn btn-success btn-sm w-100 fw-bold" onclick="downloadQR()">
            <i class="fa-solid fa-download"></i> Download QR Code
        </button>
      </div>
    </div>
  </div>
</div>
<script>
    // ----- VARIABEL STATE & SISTEM -----
    let hasUnsavedChanges = false;
    let activeElement = null;
    let textCounter = 0;
    let imgCounter = 0;
    let canvasFiles = {}; 
    
    // Variabel Audio
    let mediaRecorder;
    let audioChunks = [];
    let audioBlob = null;
    let isRecording = false;
    const MAX_RECORD_SECONDS = 1800;
    // --- FITUR AUTO-ZOOM CANVA-STYLE ---
    let currentScale = 1; // Skala default

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
            btnSave.innerHTML = '<i class="fa-solid fa-paper-plane"></i> <span class="d-none d-sm-inline">Simpan*</span>';
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
    function addText(text = "Ketik di sini...", x = 20, y = 20, font = "'Inter', sans-serif", color = "#000000", size = 20, width = 150, height = null) {
        textCounter++;
        const div = document.createElement('div');
        div.className = 'design-element text-box';
        div.id = 'text-' + textCounter;
        div.setAttribute('data-x', x);
        div.setAttribute('data-y', y);
        div.style.transform = `translate(${x}px, ${y}px)`;
        div.style.width = width ? `${width}px` : '150px';
        if(height) div.style.height = `${height}px`;

        div.innerHTML = `
            <div class="el-btn-delete" onclick="deleteElement(event, '${div.id}')"><i class="fa-solid fa-xmark"></i></div>
            <div class="text-content" contenteditable="true" style="font-family: ${font}; color: ${color}; font-size: ${size}px; height: 100%; width: 100%;">${text}</div>
            <div class="el-handle-resize"></div>
        `;

        div.addEventListener('mousedown', function(e) { setActive(div); });
        document.getElementById('card-canvas').appendChild(div);
        
        div.querySelector('.text-content').addEventListener('input', markAsUnsaved);
        
        setActive(div);
        markAsUnsaved();
    }

    function updateActiveText() {
        if (activeElement && activeElement.classList.contains('text-box')) {
            const textNode = activeElement.querySelector('.text-content');
            textNode.style.fontFamily = document.getElementById('font-family').value;
            textNode.style.color = document.getElementById('text-color').value;
            textNode.style.fontSize = document.getElementById('text-size').value + 'px';
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
function addCanvasVideo(input) {
    if (input.files && input.files[0]) {
        const file = input.files[0];
        if(!file.type.match('video.*')) return Swal.fire('Error', 'Format file harus MP4/WebM/Ogg', 'error');

        // Batasi ukuran video (Maks 15MB)
        if(file.size > 15 * 1024 * 1024) return Swal.fire('Ukuran Terlalu Besar', 'Ukuran video maksimal 15MB!', 'error');

        const videoUrl = URL.createObjectURL(file);
        
        // Cek durasi video sebelum diproses
        const tempVideo = document.createElement('video');
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

function renderVideo(src, x, y, width, height, fileObject = null, existingPath = null) {
    imgCounter++; // Gunakan counter img yang sama agar id unik
    const vidId = 'vid-' + imgCounter;
    const div = document.createElement('div');
    div.className = 'design-element video-box';
    div.id = vidId;
    div.setAttribute('data-x', x);
    div.setAttribute('data-y', y);
    div.style.transform = `translate(${x}px, ${y}px)`;
    div.style.width = `${width}px`;
    div.style.height = `${height}px`;

    if (existingPath) div.setAttribute('data-existing', existingPath);

    div.innerHTML = `
        <div class="el-btn-delete" onclick="deleteElement(event, '${vidId}')"><i class="fa-solid fa-xmark"></i></div>
        <video src="${src}" class="video-content" controls muted loop></video>
        <div class="el-handle-resize"></div>
    `;

    if(fileObject) canvasFiles[vidId] = fileObject;

    div.addEventListener('mousedown', function(e) { setActive(div); });
    document.getElementById('card-canvas').appendChild(div);
    setActive(div);
}

    function renderImage(src, x, y, width, height, fileObject = null, existingPath = null) {
        imgCounter++;
        const imgId = 'img-' + imgCounter;
        const div = document.createElement('div');
        div.className = 'design-element image-box';
        div.id = imgId;
        div.setAttribute('data-x', x);
        div.setAttribute('data-y', y);
        div.style.transform = `translate(${x}px, ${y}px)`;
        div.style.width = `${width}px`;
        div.style.height = `${height}px`;

        if (existingPath) div.setAttribute('data-existing', existingPath);

        div.innerHTML = `
            <div class="el-btn-delete" onclick="deleteElement(event, '${imgId}')"><i class="fa-solid fa-xmark"></i></div>
            <img src="${src}" class="image-content">
            <div class="el-handle-resize"></div>
        `;

        if(fileObject) canvasFiles[imgId] = fileObject;

        div.addEventListener('mousedown', function(e) { setActive(div); });
        document.getElementById('card-canvas').appendChild(div);
        setActive(div);
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
        modifiers: [ interact.modifiers.restrictRect({ restriction: 'parent', endOnly: true }) ],
        autoScroll: true,
        listeners: {
            start(event) { setActive(event.target); },
            move(event) {
                const target = event.target;
                
                // KUNCI RESPONSIVITAS KORDINAT: 
                // Bagi gerakan jari (dx/dy) dengan currentScale agar elemen menempel sempurna di jari
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
        edges: { left: false, right: '.el-handle-resize', bottom: '.el-handle-resize', top: false },
        listeners: {
            move(event) {
                const target = event.target;
                
                // KUNCI RESIZE RESPONSIVITAS:
                let currentWidth = parseFloat(target.style.width) || target.offsetWidth;
                let currentHeight = parseFloat(target.style.height) || target.offsetHeight;
                
                let newWidth = currentWidth + (event.deltaRect.width / currentScale);
                let newHeight = currentHeight + (event.deltaRect.height / currentScale);

                target.style.width = `${newWidth}px`;
                target.style.height = `${newHeight}px`;
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
                    addText(t.text, t.position_x, t.position_y, t.font, t.color, t.size, t.width, t.height);
                });
            }

            if(desainData.images) {
                desainData.images.forEach(img => {
                    renderImage(`/${img.image}`, img.position_x, img.position_y, img.width, img.height, null, img.image);
                });
            }

            if(desainData.videos) {
                desainData.videos.forEach(vid => {
                    renderVideo(`/${vid.video}`, vid.position_x, vid.position_y, vid.width, vid.height, null, vid.video);
                });
            }

            if(desainData.voice) {
                createVoiceElement(`/${desainData.voice}`, desainData.voice_pos_x, desainData.voice_pos_y);
            }

            setTimeout(() => { 
                hasUnsavedChanges = false; 
                document.getElementById('btn-save').innerHTML = '<i class="fa-solid fa-paper-plane"></i> <span class="d-none d-sm-inline">Simpan</span>';
            }, 500);
        }
    });

    // ----- SIMPAN DATA -----
    async function saveDesign() {
        const slug = document.getElementById('slug-input').value;
        if (!slug) return Swal.fire('Oops!', 'Harap isi URL/Slug untuk kartu!', 'warning');

        document.getElementById('btn-save').innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...';
        document.getElementById('btn-save').disabled = true;

        const formData = new FormData();
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        formData.append('slug', slug);
        formData.append('aspek_rasio', document.querySelector('input[name="ratio"]:checked').value);
        
                // --- PERBAIKAN LOGIKA BACKGROUND ---
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
                existing_path: el.getAttribute('data-existing') || null
            };
            
            if(canvasFiles[vidId]) {
                formData.append(`canvas_videos[${vidIndex}]`, canvasFiles[vidId]);
            }
            canvasVideos.push(dataObj);
            vidIndex++;
        });
        formData.append('canvas_videos_data', JSON.stringify(canvasVideos));

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
                headers: { 'X-Requested-With': 'XMLHttpRequest','Accept': 'application/json', 'ngrok-skip-browser-warning': '69420' }
            });
            const result = await response.json();
            
             if (response.ok) {
                hasUnsavedChanges = false; 
                // Redirect dihilangkan, cukup tampilkan pop up sukses saja!
                Swal.fire('Berhasil!', 'Desain kartu tersimpan permanen.', 'success');
            } else {
                let errors = '';
                for(let key in result.errors) errors += result.errors[key][0] + '\n';
                Swal.fire('Error', errors || 'Terjadi kesalahan sistem.', 'error');
            }
        } catch (error) {
            Swal.fire('Error', 'Gagal terhubung ke server.', 'error');
        } finally {
            if(hasUnsavedChanges) { 
                document.getElementById('btn-save').innerHTML = '<i class="fa-solid fa-paper-plane"></i> <span class="d-none d-sm-inline">Simpan*</span>';
            } else {
                document.getElementById('btn-save').innerHTML = '<i class="fa-solid fa-paper-plane"></i> <span class="d-none d-sm-inline">Simpan</span>';
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
let qrCodeObj = null;

function openShareModal() {
    const slug = document.getElementById('slug-input').value;
    
    // Validasi kalau slug kosong atau belum disave (tandanya ada bintang *)
    if (!slug || hasUnsavedChanges) {
        return Swal.fire('Oops!', 'Silakan "Simpan" desain kamu terlebih dahulu sebelum membagikan!', 'warning');
    }

    // --- PERBAIKAN DI SINI ---
    // Pastikan nama variabelnya KONSISTEN (pakai fullUrl semua)
    const fullUrl = window.location.origin + '/' + slug; 
    document.getElementById('share-link-result').value = fullUrl; // Tadi lu tulis finalUrl

    // Bersihkan QR Code lama (jika ada)
    document.getElementById('qrcode-container').innerHTML = '';
    
    // Generate QR Code Baru
    qrCodeObj = new QRCode(document.getElementById("qrcode-container"), {
        text: fullUrl, // Tadi lu tulis finalUrl
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

document.getElementById('slug-input').addEventListener('input', function() {
    const slug = this.value;
    const feedback = document.getElementById('slug-feedback');
    const iconContainer = document.getElementById('slug-status-icon');
    const btnSave = document.getElementById('btn-save');

    if (slug.length < 3) {
        feedback.style.display = 'none';
        iconContainer.innerHTML = '';
        return;
    }

    clearTimeout(slugTimeout);

    slugTimeout = setTimeout(async () => {
        try {
            const response = await fetch(`{{ route('desain.checkSlug') }}?slug=${slug}`);
            const data = await response.json();

            feedback.style.display = 'block';
            
            if (data.available) {
                // Pakai Icon Ceklis Bootstrap (Warna Hijau)
                iconContainer.innerHTML = '<i class="bi bi-check-circle-fill text-success"></i>';
                feedback.innerHTML = '<i class="bi bi-check-lg"></i> URL tersedia!';
                feedback.className = 'small fw-bold mt-1 px-2 text-white'; // Teks putih agar terlihat di bg ungu
                btnSave.disabled = false;
            } else {
                // Pakai Icon Silang/Peringatan Bootstrap (Warna Merah)
                iconContainer.innerHTML = '<i class="bi bi-x-circle-fill text-danger"></i>';
                feedback.innerHTML = '<i class="bi bi-exclamation-triangle-fill"></i> URL sudah dipakai orang lain!';
                feedback.className = 'small fw-bold mt-1 px-2 text-warning';
                btnSave.disabled = true;
            }
        } catch (error) {
            console.error('Gagal mengecek slug');
        }
    }, 500); 
});
</script>
</body>
</html>