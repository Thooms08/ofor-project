@extends('layouts.app')

@section('title', 'Tentang Ofor.site - Platform Kartu Digital Kreatif')
@section('meta_description', 'Ofor.site adalah platform digital inovatif untuk membuat kartu digital dan kartu ucapan online tanpa batas. Buat pesan interaktif dengan mudah.')

@section('content')

<style>
    /* Custom Styling untuk Ofor.site */
    :root {
        --ofor-purple: #6f42c1;
        --ofor-purple-dark: #59339d;
        --ofor-purple-light: #f4effa;
    }
    
    .bg-purple {
        background-color: var(--ofor-purple) !important;
        color: #ffffff;
    }
    
    .bg-purple-light {
        background-color: var(--ofor-purple-light) !important;
    }
    
    .text-purple {
        color: var(--ofor-purple) !important;
    }
    
    .btn-purple {
        background-color: var(--ofor-purple);
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-purple:hover {
        background-color: var(--ofor-purple-dark);
        color: white;
        transform: translateY(-2px);
    }
    
    /* Hover Card Animations */
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(111, 66, 193, 0.1);
    }
    
    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 3rem rgba(111, 66, 193, 0.15) !important;
        border-color: rgba(111, 66, 193, 0.3);
    }
    
    /* Icon Box */
    .icon-box {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 64px;
        height: 64px;
        border-radius: 16px;
        background-color: var(--ofor-purple-light);
        color: var(--ofor-purple);
        font-size: 28px;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .card-hover:hover .icon-box {
        background-color: var(--ofor-purple);
        color: white;
        transform: scale(1.1);
    }
</style>

<main>
    <header class="bg-purple py-5 mb-5 position-relative overflow-hidden">
        <div class="container py-5 text-center position-relative" style="z-index: 2;">
            <h1 class="display-4 fw-bold mb-3">Tentang Ofor.site</h1>
            <p class="lead fw-normal mb-0 opacity-75">Platform Digital Inovatif untuk Kartu Ucapan Digital Interaktif</p>
        </div>
        <div class="position-absolute rounded-circle bg-white opacity-10" style="width: 300px; height: 300px; top: -100px; left: -50px;"></div>
        <div class="position-absolute rounded-circle bg-white opacity-10" style="width: 200px; height: 200px; bottom: -50px; right: -50px;"></div>
    </header>

    <section class="container mb-5 py-4">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-md-11">
                <h2 class="fw-bold text-purple mb-4">Apa itu Ofor.site?</h2>
                <p class="lead text-secondary" style="line-height: 1.8;">
                    <strong>Ofor.site</strong> adalah platform digital inovatif yang memungkinkan Anda untuk membuat <strong>kartu digital</strong> kreatif tanpa batas (unlimited) dengan mudah, cepat, dan fleksibel. 
                </p>
                <p class="text-secondary fs-5" style="line-height: 1.8;">
                    Website ini dirancang untuk siapa saja yang ingin menyampaikan pesan secara unik, personal, dan lebih berkesan dibandingkan kartu konvensional. Dengan Ofor.site, Anda tidak hanya membuat kartu online biasa, Anda dapat menciptakan pengalaman digital yang interaktif.
                </p>
            </div>
        </div>
    </section>

    <section class="container mb-5 pb-4">
        <div class="text-center mb-5">
            <span class="badge bg-purple-light text-purple px-3 py-2 rounded-pill mb-2">Eksplorasi Keunggulan</span>
            <h2 class="fw-bold text-dark">Fitur Utama Ofor.site</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm card-hover p-4 bg-white rounded-4">
                    <div class="icon-box">
                        <i class="bi bi-infinity"></i>
                    </div>
                    <h3 class="h5 fw-bold">Tanpa Batas</h3>
                    <p class="text-muted mb-0">Pembuatan kartu digital tanpa batas. Buat sebanyak apapun yang Anda inginkan untuk momen apapun.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm card-hover p-4 bg-white rounded-4">
                    <div class="icon-box">
                        <i class="bi bi-palette"></i>
                    </div>
                    <h3 class="h5 fw-bold">Desain Bebas & Fleksibel</h3>
                    <p class="text-muted mb-0">Bebas menambahkan <strong>Video, Voice notes, Teks, dan Gambar</strong> untuk membuat kartu lebih hidup.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm card-hover p-4 bg-white rounded-4">
                    <div class="icon-box">
                        <i class="bi bi-link-45deg"></i>
                    </div>
                    <h3 class="h5 fw-bold">Custom URL</h3>
                    <p class="text-muted mb-0">Personalisasi link kartu Anda agar lebih spesial (contoh: <em>ofor.site/kartu-cinta</em>).</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm card-hover p-4 bg-white rounded-4">
                    <div class="icon-box">
                        <i class="bi bi-share"></i>
                    </div>
                    <h3 class="h5 fw-bold">Sharing Tanpa Download</h3>
                    <p class="text-muted mb-0">Bagikan kartu langsung melalui link tanpa mengharuskan penerima mengunduh aplikasi apapun.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm card-hover p-4 bg-white rounded-4">
                    <div class="icon-box">
                        <i class="bi bi-qr-code"></i>
                    </div>
                    <h3 class="h5 fw-bold">QR Code Otomatis</h3>
                    <p class="text-muted mb-0">Setiap kartu dilengkapi dengan QR Code otomatis yang mempermudah proses scanning dan akses.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm card-hover p-4 bg-white rounded-4">
                    <div class="icon-box">
                        <i class="bi bi-images"></i>
                    </div>
                    <h3 class="h5 fw-bold">Kustomisasi Background</h3>
                    <p class="text-muted mb-0">Ubah tampilan sesuai tema dengan penyesuaian warna solid maupun gambar latar belakang.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-purple-light py-5 mb-5">
        <div class="container py-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold text-dark mb-4">Cocok Untuk Momen Apa Saja?</h2>
                    <ul class="list-group list-group-flush border-0 bg-transparent gap-2">
                        <li class="list-group-item bg-white border-0 rounded-3 shadow-sm py-3 px-4 d-flex align-items-center mb-2">
                            <i class="bi bi-heart-fill text-danger me-3 fs-4"></i>
                            <span class="fw-medium">Menyatakan perasaan kepada seseorang</span>
                        </li>
                        <li class="list-group-item bg-white border-0 rounded-3 shadow-sm py-3 px-4 d-flex align-items-center mb-2">
                            <i class="bi bi-emoji-smile-fill text-warning me-3 fs-4"></i>
                            <span class="fw-medium">Kejutan atau prank interaktif</span>
                        </li>
                        <li class="list-group-item bg-white border-0 rounded-3 shadow-sm py-3 px-4 d-flex align-items-center mb-2">
                            <i class="bi bi-gift-fill text-primary me-3 fs-4"></i>
                            <span class="fw-medium">Ucapan ulang tahun / anniversary</span>
                        </li>
                        <li class="list-group-item bg-white border-0 rounded-3 shadow-sm py-3 px-4 d-flex align-items-center mb-2">
                            <i class="bi bi-envelope-paper-heart-fill text-purple me-3 fs-4"></i>
                            <span class="fw-medium">Undangan digital yang elegan</span>
                        </li>
                        <li class="list-group-item bg-white border-0 rounded-3 shadow-sm py-3 px-4 d-flex align-items-center mb-2">
                            <i class="bi bi-chat-left-quote-fill text-success me-3 fs-4"></i>
                            <span class="fw-medium">Pesan personal yang mendalam</span>
                        </li>
                    </ul>
                </div>
                
                <div class="col-lg-6">
                    <h2 class="fw-bold text-dark mb-4">Kenapa Memilih Ofor.site?</h2>
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-white p-3 rounded-circle shadow-sm me-3 text-purple">
                                    <i class="bi bi-person-hearts fs-4"></i>
                                </div>
                                <div>
                                    <h4 class="h6 fw-bold mb-1 mt-2">Personal</h4>
                                    <p class="text-muted small">Desain sesuai karakter Anda dan penerima.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-white p-3 rounded-circle shadow-sm me-3 text-purple">
                                    <i class="bi bi-lightbulb fs-4"></i>
                                </div>
                                <div>
                                    <h4 class="h6 fw-bold mb-1 mt-2">Kreatif</h4>
                                    <p class="text-muted small">Ruang tanpa batas untuk ide-ide gila Anda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-white p-3 rounded-circle shadow-sm me-3 text-purple">
                                    <i class="bi bi-cursor fs-4"></i>
                                </div>
                                <div>
                                    <h4 class="h6 fw-bold mb-1 mt-2">Interaktif</h4>
                                    <p class="text-muted small">Lebih dari sekadar gambar diam atau teks.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start">
                                <div class="bg-white p-3 rounded-circle shadow-sm me-3 text-purple">
                                    <i class="bi bi-patch-check fs-4"></i>
                                </div>
                                <div>
                                    <h4 class="h6 fw-bold mb-1 mt-2">Profesional</h4>
                                    <p class="text-muted small">Hasil akhir elegan yang dapat diandalkan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection