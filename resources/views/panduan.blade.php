@extends('layouts.app')

@section('title', 'Panduan Penggunaan Ofor.site - Cara Membuat Kartu Digital')
@section('meta_description', 'Pelajari panduan lengkap cara membuat kartu digital interaktif di Ofor.site. Langkah mudah membuat kartu ucapan digital kreatif untuk berbagai momen.')
@section('meta_keywords', 'panduan kartu digital, cara membuat kartu digital, platform kartu digital, kartu ucapan digital, tutorial ofor.site')

@section('content')
<style>
    :root {
        --primary-purple: #7e22ce;
        --dark-purple: #581c87;
        --light-purple: #f3e8ff;
        --soft-shadow: 0 10px 30px rgba(126, 34, 206, 0.08);
    }

    /* Hero Section */
    .guide-hero {
        background: linear-gradient(135deg, var(--dark-purple) 0%, var(--primary-purple) 100%);
        padding: 80px 0;
        color: white;
        text-align: center;
        border-radius: 0 0 50px 50px;
    }

    .guide-hero h1 {
        font-weight: 800;
        font-size: 2.8rem;
        margin-bottom: 20px;
    }

    /* General Styling */
    .section-title {
        color: var(--dark-purple);
        font-weight: 700;
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 30px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background: var(--primary-purple);
        border-radius: 2px;
    }

    .section-title.text-start::after {
        left: 0;
        transform: none;
    }

    /* Cards & Steps */
    .guide-card {
        border: none;
        border-radius: 20px;
        box-shadow: var(--soft-shadow);
        transition: transform 0.3s ease;
        background: #ffffff;
        height: 100%;
    }

    .guide-card:hover {
        transform: translateY(-5px);
    }

    .step-number {
        width: 50px;
        height: 50px;
        background: var(--primary-purple);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 20px;
        box-shadow: 0 4px 10px rgba(126, 34, 206, 0.3);
    }

    .feature-icon {
        font-size: 2.5rem;
        color: var(--primary-purple);
        margin-bottom: 20px;
    }

    /* Timeline style steps */
    .step-item {
        position: relative;
        padding-left: 40px;
        border-left: 2px dashed var(--light-purple);
        padding-bottom: 40px;
    }

    .step-item:last-child {
        border-left: none;
    }

    .step-circle {
        position: absolute;
        left: -11px;
        top: 0;
        width: 20px;
        height: 20px;
        background: var(--primary-purple);
        border-radius: 50%;
        border: 4px solid white;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .guide-hero h1 { font-size: 2rem; }
        .guide-hero { border-radius: 0 0 30px 30px; padding: 60px 0; }
        .step-item { padding-left: 30px; }
    }

    .bg-soft-purple {
        background-color: var(--light-purple);
    }
</style>

<header class="guide-hero">
    <div class="container px-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white opacity-75 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">Panduan</li>
            </ol>
        </nav>
        <h1 class="animate__animated animate__fadeInDown">Panduan Penggunaan Ofor.site</h1>
        <p class="lead opacity-75 mx-auto" style="max-width: 700px;">
            Ofor.site adalah platform digital untuk membuat kartu digital kreatif dengan mudah, cepat, dan fleksibel.
        </p>
    </div>
</header>

<section class="py-5">
    <div class="container py-lg-4">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <h2 class="section-title">Tentang Ofor.site</h2>
                <p class="fs-5 text-secondary px-md-5">
                    Platform inovatif yang dirancang untuk membantu Anda mengekspresikan diri melalui kartu ucapan digital yang interaktif. Tidak perlu keahlian desain khusus untuk menghasilkan karya yang memukau.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-soft-purple shadow-inner">
    <div class="container">
        <h2 class="section-title text-center">Cara Memulai</h2>
        <div class="row g-4 mt-2">
            <div class="col-md-6">
                <div class="card guide-card p-4">
                    <div class="feature-icon"><i class="bi bi-person-plus-fill"></i></div>
                    <h3 class="h5 fw-bold">1. Registrasi Akun</h3>
                    <p class="text-muted">
                        Daftar akun terlebih dahulu melalui halaman registrasi, atau gunakan <strong>Login Google</strong> untuk proses yang lebih cepat dan praktis.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card guide-card p-4">
                    <div class="feature-icon"><i class="bi bi-send-check-fill"></i></div>
                    <h3 class="h5 fw-bold">2. Akses Dashboard</h3>
                    <p class="text-muted">
                        Setelah berhasil masuk, pengguna dapat langsung membuat kartu digital dan membagikannya dalam bentuk tautan (link) atau QR code yang dapat diakses oleh siapa saja.
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="alert bg-white border-0 rounded-4 p-4 shadow-sm">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 me-3 text-warning fs-1">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <div>
                            <p class="mb-0 text-dark">
                                Pembuatan kartu pertama dapat dilakukan secara <strong>gratis</strong>. Namun, untuk mengedit kartu atau membuat kartu baru tanpa batas, diperlukan upgrade ke versi <strong>Premium</strong> dengan biaya terjangkau sebesar <strong>Rp15.000</strong>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="tutorial">
    <div class="container py-lg-5">
        <h2 class="section-title text-center">Langkah Membuat Kartu Digital</h2>
        
        <div class="row mt-5">
            <div class="col-lg-10 mx-auto">
                
                <article class="step-item">
                    <div class="step-circle"></div>
                    <div class="row">
                        <div class="col-md-7">
                            <h3 class="h4 fw-bold">1. Mulai Membuat Kartu</h3>
                            <p class="text-secondary">Klik tombol <strong>"BUAT KARTU"</strong> di bagian atas halaman. Pengguna akan langsung diarahkan ke halaman desain interaktif kami untuk mulai berkreasi.</p>
                        </div>
                    </div>
                </article>

                <article class="step-item">
                    <div class="step-circle"></div>
                    <div class="row">
                        <div class="col-md-7">
                            <h3 class="h4 fw-bold">2. Atur Rasio Tampilan</h3>
                            <p class="text-secondary">Pilih rasio desain yang sesuai dengan kebutuhan Anda:</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-display me-2 text-purple"></i> <strong>16:9</strong> (Tampilan Desktop/Landscape)</li>
                                <li class="mb-2"><i class="bi bi-phone me-2 text-purple"></i> <strong>9:16</strong> (Tampilan Mobile/Potrait)</li>
                            </ul>
                            <small class="text-muted italic">Tombol tersedia dalam ikon berbentuk HP atau desktop pada editor.</small>
                        </div>
                    </div>
                </article>

                <article class="step-item">
                    <div class="step-circle"></div>
                    <div class="row">
                        <div class="col-md-7">
                            <h3 class="h4 fw-bold">3. Ubah Background</h3>
                            <p class="text-secondary">Klik tombol <strong>"BG"</strong> untuk mengatur latar belakang agar kartu terlihat lebih menarik. Anda bisa memilih warna solid yang elegan atau mengunggah <strong>gambar custom</strong> sendiri.</p>
                        </div>
                    </div>
                </article>

                <article class="step-item">
                    <div class="step-circle"></div>
                    <div class="row">
                        <div class="col-md-7">
                            <h3 class="h4 fw-bold">4. Tambahkan Elemen Konten</h3>
                            <p class="text-secondary">Personalisasi kartu Anda dengan menambahkan berbagai elemen menarik:</p>
                            <div class="row g-2 mt-2">
                                <div class="col-6 col-sm-3 text-center">
                                    <div class="p-2 border rounded-3 bg-light"><i class="bi bi-type"></i><br><small>Teks</small></div>
                                </div>
                                <div class="col-6 col-sm-3 text-center">
                                    <div class="p-2 border rounded-3 bg-light"><i class="bi bi-image"></i><br><small>Gambar</small></div>
                                </div>
                                <div class="col-6 col-sm-3 text-center">
                                    <div class="p-2 border rounded-3 bg-light"><i class="bi bi-play-btn"></i><br><small>Video</small></div>
                                </div>
                                <div class="col-6 col-sm-3 text-center">
                                    <div class="p-2 border rounded-3 bg-light"><i class="bi bi-mic"></i><br><small>Voice Note</small></div>
                                </div>
                            </div>
                            <p class="small text-muted mt-3">Semua elemen dapat diatur posisi, ukuran, dan warnanya langsung di area desain.</p>
                        </div>
                    </div>
                </article>

                <article class="step-item">
                    <div class="step-circle"></div>
                    <div class="row">
                        <div class="col-md-7">
                            <h3 class="h4 fw-bold">5. Simpan & Bagikan</h3>
                            <p class="text-secondary">Setelah desain selesai, saatnya mempublikasikan karya Anda:</p>
                            <ul class="list-group list-group-flush bg-transparent">
                                <li class="list-group-item bg-transparent border-0 ps-0"><i class="bi bi-link-45deg text-purple"></i> Buat <strong>slug / URL custom</strong> unik Anda.</li>
                                <li class="list-group-item bg-transparent border-0 ps-0"><i class="bi bi-save2 text-purple"></i> Klik tombol <strong>"Simpan"</strong>.</li>
                                <li class="list-group-item bg-transparent border-0 ps-0"><i class="bi bi-share text-purple"></i> Klik tombol <strong>"Bagikan"</strong>.</li>
                            </ul>
                            <p class="mt-3 text-dark fw-medium">Hasil akhir berupa Link kartu digital dan QR Code yang siap dikirimkan!</p>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-purple text-white text-center mb-0 mt-4" style="border-radius: 50px 50px 0 0;">
    <div class="container px-4">
        <h2 class="fw-bold mb-3">Siap Membuat Kartu Digital Anda?</h2>
        <p class="lead opacity-75 mb-4">Kartu digital dapat dibagikan ke teman, keluarga, atau untuk kebutuhan profesional lainnya.</p>
        <div class="d-grid d-sm-flex justify-content-center gap-3">
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 rounded-pill fw-bold text-purple shadow">Daftar Sekarang</a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endpush