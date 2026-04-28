@extends('layouts.app')

@section('title', 'Ofor.site - Platform Pembuatan Kartu Digital Interaktif')
@section('meta_description', 'Ofor.site adalah platform digital inovatif untuk membuat kartu digital interaktif dan kartu ucapan digital tanpa batas dengan desain fleksibel secara gratis.')
@section('meta_keywords', 'kartu digital gratis, kartu ucapan digital, platform kartu online, kartu digital interaktif')

@section('content')

<style>
    /* Styling Khusus Index/Homepage */
    :root {
        --dark-purple: #581c87;
        --primary-purple: #7e22ce;
        --light-purple: #f3e8ff;
    }

    /* Hero Section Baru: Grid Layout, bukan Overlay */
    .hero-carousel {
        background: linear-gradient(135deg, var(--dark-purple) 0%, #3b0764 100%);
        position: relative;
    }
    
    .hero-slide-container {
        min-height: 85vh;
        display: flex;
        align-items: center;
        padding-top: 80px;
        padding-bottom: 60px;
    }

    .hero-gif {
        width: 100%;
        max-height: 480px;
        object-fit: cover;
        border-radius: 1.5rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        border: 4px solid rgba(255, 255, 255, 0.1);
        transition: transform 0.4s ease;
    }

    .hero-gif:hover {
        transform: translateY(-10px);
    }

    .carousel-indicators {
        margin-bottom: 1.5rem;
    }

    .carousel-indicators [data-bs-target] {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.5);
        border: none;
        margin: 0 6px;
    }

    .carousel-indicators .active {
        background-color: white;
        transform: scale(1.2);
    }
    
    /* Modern Cards */
    .modern-card {
        border-radius: 1.25rem;
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05) !important;
    }
    .modern-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 3rem rgba(126, 34, 206, 0.12) !important;
        border-color: var(--light-purple) !important;
    }
    .icon-wrapper {
        width: 64px;
        height: 64px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        font-size: 1.75rem;
    }

    /* Optimasi Spacing Mobile */
    @media (max-width: 991px) {
        .hero-slide-container {
            padding-top: 40px;
            padding-bottom: 40px;
            min-height: auto;
        }
        .hero-gif {
            max-width: 80%;
            margin-top: 20px;
        }
        .display-4 {
            font-size: 2.5rem;
        }
    }
</style>

<header id="heroCarousel" class="carousel slide carousel-fade hero-carousel" data-bs-ride="carousel" data-bs-interval="10000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container hero-slide-container">
                <div class="row align-items-center w-100 g-5">
                    <div class="col-lg-6 text-center text-lg-start z-1">
                        <span class="badge bg-white text-purple px-3 py-2 rounded-pill mb-4 shadow-sm fw-bold tracking-wide">
                            <i class="bi bi-stars me-1"></i> #1 Platform Kartu Online
                        </span>
                        <h1 class="display-4 fw-bold text-white mb-4 lh-sm">
                            Buat Kartu Digital <br class="d-none d-lg-block"> Interaktif Tanpa Batas
                        </h1>
                        <p class="lead text-white-50 mb-5 fw-normal" style="line-height: 1.8;">
                            Ofor.site adalah platform digital inovatif yang memungkinkan Anda untuk membuat kartu digital kreatif tanpa batas (unlimited) dengan mudah, cepat, dan fleksibel.
                        </p>
                        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                            <a href="{{ route('register') }}" class="btn btn-light btn-lg text-purple fw-bold rounded-3 px-4 shadow py-3">Mulai Sekarang</a>
                            <a href="#fitur" class="btn btn-outline-light btn-lg fw-bold rounded-3 px-4 py-3">Lihat Fitur</a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center z-1">
                        <img src="{{ asset('assets/gif/gif1.gif') }}" class="hero-gif" alt="Kartu Digital Interaktif Ofor.site" loading="lazy" onerror="this.src='https://via.placeholder.com/600x480/7e22ce/ffffff?text=Ofor.site';">
                    </div>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <div class="container hero-slide-container">
                <div class="row align-items-center w-100 g-5">
                    <div class="col-lg-6 text-center text-lg-start z-1">
                        <span class="badge bg-white text-purple px-3 py-2 rounded-pill mb-4 shadow-sm fw-bold tracking-wide">
                            <i class="bi bi-heart-fill me-1 text-danger"></i> Unik & Personal
                        </span>
                        <h2 class="display-4 fw-bold text-white mb-4 lh-sm">
                            Ciptakan Pengalaman <br class="d-none d-lg-block"> Digital Berbeda
                        </h2>
                        <p class="lead text-white-50 mb-5 fw-normal" style="line-height: 1.8;">
                            Sampaikan pesan secara unik, personal, dan lebih berkesan dibandingkan kartu konvensional. Cocok untuk semua momen berharga Anda.
                        </p>
                        <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-lg text-white fw-bold rounded-3 px-4 shadow py-3" style="background-color: #9333ea; border:none;">Buat Kartumu Sekarang</a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center z-1">
                        <img src="{{ asset('assets/gif/gif2.gif') }}" class="hero-gif" alt="Kartu Ucapan Digital Unik" loading="lazy" onerror="this.src='https://via.placeholder.com/600x480/7e22ce/ffffff?text=Ofor.site';">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-lg-8 col-md-10">
                <span class="text-purple fw-bold mb-2 d-block text-uppercase tracking-wide small">Tentang Ofor.site</span>
                <h2 class="fw-bold mb-4 text-dark display-6">Lebih Dari Sekadar Kartu Biasa</h2>
                <p class="text-secondary fs-5 mb-4" style="line-height: 1.8;">
                    Ofor.site adalah platform digital inovatif yang memungkinkan Anda untuk membuat <strong>kartu digital kreatif</strong> tanpa batas (unlimited) dengan mudah, cepat, dan fleksibel.
                </p>
                <div class="alert bg-light-purple border-0 rounded-4 p-4 mt-5 shadow-sm text-start text-md-center">
                    <p class="mb-0 text-dark fw-medium fs-5">
                        <i class="bi bi-quote text-purple fs-2 me-1"></i> Dengan Ofor.site, Anda tidak hanya membuat kartu biasa, Anda dapat menciptakan pengalaman digital yang interaktif.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="fitur" class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5 pb-3">
            <span class="text-purple fw-bold mb-2 d-block text-uppercase tracking-wide small">Layanan Kami</span>
            <h2 class="fw-bold mb-3 display-6">Fitur Utama Ofor.site</h2>
            <p class="text-muted lead">Jelajahi keunggulan fitur yang kami rancang khusus untuk Anda.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <article class="card h-100 modern-card p-4 bg-white">
                    <div class="icon-wrapper mb-4 text-purple bg-light-purple"><i class="bi bi-infinity"></i></div>
                    <h3 class="h5 fw-bold text-dark">Tanpa Batas</h3>
                    <p class="text-muted mb-0">Pembuatan kartu digital tanpa batas. Buat untuk setiap momen berharga Anda tanpa ragu.</p>
                </article>
            </div>
            <div class="col-md-6 col-lg-4">
                <article class="card h-100 modern-card p-4 bg-white">
                    <div class="icon-wrapper mb-4 text-purple bg-light-purple"><i class="bi bi-palette-fill"></i></div>
                    <h3 class="h5 fw-bold text-dark">Desain Bebas & Fleksibel</h3>
                    <p class="text-muted mb-0">Bebas masukkan elemen interaktif: <strong>Video, Voice note, Teks, dan Gambar</strong>.</p>
                </article>
            </div>
            <div class="col-md-6 col-lg-4">
                <article class="card h-100 modern-card p-4 bg-white">
                    <div class="icon-wrapper mb-4 text-purple bg-light-purple"><i class="bi bi-link-45deg"></i></div>
                    <h3 class="h5 fw-bold text-dark">Custom URL</h3>
                    <p class="text-muted mb-0">Personalisasi link kartu sesuka Anda (contoh: <span class="text-purple fw-medium">ofor.site/kartu-cinta</span>).</p>
                </article>
            </div>
            <div class="col-md-6 col-lg-4">
                <article class="card h-100 modern-card p-4 bg-white">
                    <div class="icon-wrapper mb-4 text-purple bg-light-purple"><i class="bi bi-share-fill"></i></div>
                    <h3 class="h5 fw-bold text-dark">Sharing Tanpa Download</h3>
                    <p class="text-muted mb-0">Kirim langsung link ke penerima tanpa mengharuskan mereka mengunduh aplikasi.</p>
                </article>
            </div>
            <div class="col-md-6 col-lg-4">
                <article class="card h-100 modern-card p-4 bg-white">
                    <div class="icon-wrapper mb-4 text-purple bg-light-purple"><i class="bi bi-qr-code-scan"></i></div>
                    <h3 class="h5 fw-bold text-dark">QR Code Otomatis</h3>
                    <p class="text-muted mb-0">Sistem menggenerate QR Code otomatis untuk setiap kartu agar mudah dibagikan cetak maupun digital.</p>
                </article>
            </div>
            <div class="col-md-6 col-lg-4">
                <article class="card h-100 modern-card p-4 bg-white">
                    <div class="icon-wrapper mb-4 text-purple bg-light-purple"><i class="bi bi-image"></i></div>
                    <h3 class="h5 fw-bold text-dark">Background Custom</h3>
                    <p class="text-muted mb-0">Kustomisasi latar belakang kartu digital dengan pilihan warna atau gambar Anda sendiri.</p>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <span class="text-purple fw-bold mb-2 d-block text-uppercase tracking-wide small">Penggunaan</span>
                <h2 class="fw-bold mb-4 text-dark display-6">Cocok Untuk Momen Apa Saja?</h2>
                <p class="text-muted mb-4">Kartu digital Ofor.site sangat serbaguna dan dapat disesuaikan untuk berbagai kegiatan atau sekadar pesan hangat.</p>
                <ul class="list-group list-group-flush border-0 pe-lg-4">
                    <li class="list-group-item bg-transparent border-0 d-flex align-items-center mb-3 p-0">
                        <div class="icon-wrapper bg-light-purple text-danger me-3" style="width: 48px; height: 48px; font-size: 1.2rem;"><i class="bi bi-heart-fill"></i></div>
                        <span class="fs-5 text-dark fw-medium">Menyatakan perasaan</span>
                    </li>
                    <li class="list-group-item bg-transparent border-0 d-flex align-items-center mb-3 p-0">
                        <div class="icon-wrapper bg-light-purple text-warning me-3" style="width: 48px; height: 48px; font-size: 1.2rem;"><i class="bi bi-emoji-smile-fill"></i></div>
                        <span class="fs-5 text-dark fw-medium">Kejutan / prank lucu</span>
                    </li>
                    <li class="list-group-item bg-transparent border-0 d-flex align-items-center mb-3 p-0">
                        <div class="icon-wrapper bg-light-purple text-primary me-3" style="width: 48px; height: 48px; font-size: 1.2rem;"><i class="bi bi-gift-fill"></i></div>
                        <span class="fs-5 text-dark fw-medium">Ulang tahun / anniversary</span>
                    </li>
                    <li class="list-group-item bg-transparent border-0 d-flex align-items-center mb-3 p-0">
                        <div class="icon-wrapper bg-light-purple text-purple me-3" style="width: 48px; height: 48px; font-size: 1.2rem;"><i class="bi bi-envelope-paper-heart-fill"></i></div>
                        <span class="fs-5 text-dark fw-medium">Undangan digital</span>
                    </li>
                    <li class="list-group-item bg-transparent border-0 d-flex align-items-center p-0">
                        <div class="icon-wrapper bg-light-purple text-success me-3" style="width: 48px; height: 48px; font-size: 1.2rem;"><i class="bi bi-chat-left-quote-fill"></i></div>
                        <span class="fs-5 text-dark fw-medium">Pesan personal</span>
                    </li>
                </ul>
            </div>

            <div class="col-lg-7">
                <div class="bg-light p-4 p-md-5 rounded-4 border border-light shadow-sm">
                    <h2 class="fw-bold mb-5 text-dark h3">Kenapa Memilih Ofor.site?</h2>
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start modern-card p-3 bg-white h-100">
                                <i class="bi bi-person-hearts text-purple fs-2 me-3 mt-1"></i>
                                <div>
                                    <h4 class="fw-bold h5 text-dark mb-1">Personal</h4>
                                    <p class="small text-muted mb-0">Terasa lebih dekat dan sesuai karakter Anda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start modern-card p-3 bg-white h-100">
                                <i class="bi bi-lightbulb text-warning fs-2 me-3 mt-1"></i>
                                <div>
                                    <h4 class="fw-bold h5 text-dark mb-1">Kreatif</h4>
                                    <p class="small text-muted mb-0">Bebas berekspresi dan eksplorasi ide tanpa batas.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start modern-card p-3 bg-white h-100">
                                <i class="bi bi-cursor text-primary fs-2 me-3 mt-1"></i>
                                <div>
                                    <h4 class="fw-bold h5 text-dark mb-1">Interaktif</h4>
                                    <p class="small text-muted mb-0">Padukan visual dan audio jadi satu halaman keren.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-start modern-card p-3 bg-white h-100">
                                <i class="bi bi-patch-check text-success fs-2 me-3 mt-1"></i>
                                <div>
                                    <h4 class="fw-bold h5 text-dark mb-1">Profesional</h4>
                                    <p class="small text-muted mb-0">Sistem handal, tersimpan rapih dan responsif.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection