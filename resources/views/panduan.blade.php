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

    /* Helper Classes yang sebelumnya hilang */
    .text-purple { color: var(--primary-purple) !important; }
    .bg-purple { background-color: var(--primary-purple) !important; color: white; }
    .bg-soft-purple { background-color: var(--light-purple); }

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

    .feature-icon {
        font-size: 2.5rem;
        color: var(--primary-purple);
        margin-bottom: 20px;
    }

    /* Timeline style steps */
    .step-item {
        position: relative;
        padding-left: 45px;
        border-left: 2px dashed var(--primary-purple);
        padding-bottom: 40px;
    }

    .step-item:last-child {
        border-left: 2px dashed transparent; /* Agar tetap lurus tanpa garis bawah */
    }

    .step-circle {
        position: absolute;
        left: -11px; /* Center with border */
        top: 0;
        width: 20px;
        height: 20px;
        background: var(--primary-purple);
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 0 0 3px var(--light-purple);
    }

    /* Element Box di Langkah 4 */
    .element-box {
        padding: 15px 10px;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        background: #fff;
        transition: all 0.2s;
    }
    .element-box:hover {
        border-color: var(--primary-purple);
        box-shadow: 0 4px 12px rgba(126, 34, 206, 0.1);
        transform: translateY(-2px);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .guide-hero h1 { font-size: 2rem; }
        .guide-hero { border-radius: 0 0 30px 30px; padding: 60px 0; }
        .step-item { padding-left: 35px; }
    }

    .bg-dots {
        background-image: radial-gradient(rgba(255, 255, 255, 0.2) 2px, transparent 2px);
        background-size: 30px 30px;
    }
</style>

<main>

    <header class="bg-purple py-5 mb-5 position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dots"></div>
        <div class="container py-5 text-center position-relative" style="z-index: 2;">
            <h1 class="display-4 fw-bold mb-3">Panduan Penggunaan Ofor.site</h1>
            <p class="lead fw-normal mb-0 opacity-75"> Ofor.site adalah platform digital untuk membuat kartu digital kreatif dengan mudah, cepat, dan fleksibel.</p>
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

<section class="py-5 bg-soft-purple shadow-sm">
    <div class="container">
        <h2 class="section-title text-center">Cara Memulai</h2>
        <div class="row g-4 mt-2 justify-content-center">
            <div class="col-md-5">
                <div class="card guide-card p-4">
                    <div class="feature-icon"><i class="bi bi-person-plus-fill"></i></div>
                    <h3 class="h5 fw-bold">1. Registrasi Akun</h3>
                    <p class="text-muted">
                        Daftar akun terlebih dahulu melalui halaman registrasi, atau gunakan <strong>Login Google</strong> untuk proses yang lebih cepat dan praktis.
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card guide-card p-4">
                    <div class="feature-icon"><i class="bi bi-send-check-fill"></i></div>
                    <h3 class="h5 fw-bold">2. Akses Dashboard</h3>
                    <p class="text-muted">
                        Setelah berhasil masuk, pengguna dapat langsung membuat kartu digital dan membagikannya dalam bentuk tautan (link) atau QR code yang dapat diakses oleh siapa saja.
                    </p>
                </div>
            </div>
            <div class="col-md-10">
                <div class="alert bg-white border border-warning rounded-4 p-4 shadow-sm mb-0">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink0 me-3 text-warning fs-1">
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
            <div class="col-lg-8 mx-auto">
                
                <article class="step-item">
                    <div class="step-circle"></div>
                    <div>
                        <h3 class="h4 fw-bold text-dark">1. Mulai Membuat Kartu</h3>
                        <p class="text-secondary">Klik tombol <strong>"BUAT KARTU"</strong> di bagian atas halaman. Anda akan langsung diarahkan ke halaman desain interaktif kami untuk mulai berkreasi.</p>
                    </div>
                </article>

                <article class="step-item">
                    <div class="step-circle"></div>
                    <div>
                        <h3 class="h4 fw-bold text-dark">2. Atur Rasio Tampilan</h3>
                        <p class="text-secondary">Pilih rasio desain yang sesuai dengan kebutuhan Anda:</p>
                        <ul class="list-unstyled mb-2">
                            <li class="mb-2"><i class="bi bi-display me-2 text-purple"></i> <strong>16:9</strong> (Tampilan Desktop/Landscape)</li>
                            <li class="mb-2"><i class="bi bi-phone me-2 text-purple"></i> <strong>9:16</strong> (Tampilan Mobile/Potrait)</li>
                        </ul>
                        <small class="text-muted fst-italic">Tombol tersedia dalam ikon berbentuk HP atau Desktop pada editor.</small>
                    </div>
                </article>

                <article class="step-item">
                    <div class="step-circle"></div>
                    <div>
                        <h3 class="h4 fw-bold text-dark">3. Ubah Background</h3>
                        <p class="text-secondary">Klik tombol <strong>"BG"</strong> untuk mengatur latar belakang agar kartu terlihat lebih menarik. Anda bisa memilih warna solid yang elegan atau mengunggah <strong>gambar custom</strong> sendiri.</p>
                    </div>
                </article>

                <article class="step-item">
                    <div class="step-circle"></div>
                    <div>
                        <h3 class="h4 fw-bold text-dark">4. Tambahkan Elemen Konten</h3>
                        <p class="text-secondary">Personalisasi kartu Anda dengan menambahkan berbagai elemen menarik:</p>
                        
                        <div class="row g-2 mt-2 mb-3">
                            <div class="col-4 col-sm-4 col-md-2 text-center">
                                <div class="element-box shadow-sm"><i class="bi bi-type fs-4 text-purple"></i><br><small class="fw-semibold">Teks</small></div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-2 text-center">
                                <div class="element-box shadow-sm"><i class="bi bi-image fs-4 text-purple"></i><br><small class="fw-semibold">Gambar</small></div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-2 text-center">
                                <div class="element-box shadow-sm"><i class="bi bi-play-btn fs-4 text-purple"></i><br><small class="fw-semibold">Video</small></div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-2 text-center">
                                <div class="element-box shadow-sm"><i class="bi bi-mic fs-4 text-purple"></i><br><small class="fw-semibold">Voice</small></div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-2 text-center">
                                <div class="element-box shadow-sm"><i class="bi bi-hexagon-fill fs-4 text-purple"></i><br><small class="fw-semibold">Shape</small></div>
                            </div>
                            <div class="col-4 col-sm-4 col-md-2 text-center">
                                <div class="element-box shadow-sm"><i class="bi bi-emoji-smile-fill fs-4 text-purple"></i><br><small class="fw-semibold">Icon</small></div>
                            </div>
                        </div>

                        <div class="p-3 bg-soft-purple rounded-3 border border-light shadow-sm">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-stars text-purple fs-3 me-3 mt-1"></i>
                                <div>
                                    <h5 class="fw-bold text-dark mb-1">Fitur Element (Shape) & Icon Modern!</h5>
                                    <p class="mb-0 text-secondary" style="font-size: 0.95rem;">Jelajahi berbagai macam bentuk dasar (Shape) dan ratusan pilihan Icon yang modern & interaktif. Anda bisa dengan mudah melakukan <i>drag</i>, <i>resize</i>, <i>rotate</i> (memutar), hingga mengubah warna sesuai preferensi desain agar kartu digital terlihat makin hidup.</p>
                                </div>
                            </div>
                        </div>
                        <p class="small text-muted mt-3"><i class="bi bi-info-circle me-1"></i> Semua elemen dapat diatur posisi, ukuran, dan warnanya langsung di area desain.</p>
                    </div>
                </article>

                <article class="step-item border-left-0">
                    <div class="step-circle"></div>
                    <div>
                        <h3 class="h4 fw-bold text-dark">5. Simpan & Bagikan</h3>
                        <p class="text-secondary">Setelah desain selesai, saatnya mempublikasikan karya Anda:</p>
                        <ul class="list-group list-group-flush bg-transparent mb-3">
                            <li class="list-group-item bg-transparent border-0 ps-0 py-1"><i class="bi bi-check-circle-fill text-purple me-2"></i> Buat <strong>slug / URL custom</strong> unik Anda.</li>
                            <li class="list-group-item bg-transparent border-0 ps-0 py-1"><i class="bi bi-check-circle-fill text-purple me-2"></i> Klik tombol <strong>"Simpan"</strong>.</li>
                            <li class="list-group-item bg-transparent border-0 ps-0 py-1"><i class="bi bi-check-circle-fill text-purple me-2"></i> Klik tombol <strong>"Bagikan"</strong>.</li>
                        </ul>
                        <div class="alert alert-success border-0 py-2 d-inline-block">
                            <i class="bi bi-emoji-sunglasses me-2"></i> Hasil akhir berupa Link kartu dan QR Code siap dikirimkan!
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light border-top">
    <div class="container text-center py-4">
        <span class="badge bg-purple px-3 py-2 rounded-pill mb-3">Video Panduan</span>
        <h2 class="section-title">Tutorial Lengkap Penggunaan</h2>
        <p class="text-secondary mb-5">Tonton video di bawah ini untuk melihat simulasi panduan pembuatan kartu digital dari awal hingga selesai.</p>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="ratio ratio-16x9 shadow-lg rounded-4 overflow-hidden border-4 border-white">
                    <iframe src="https://www.youtube.com/embed/wXtedKctcSM?si=LV2Pqz25SddQ4u9O" title="YouTube video tutorial Ofor.site" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-purple text-center mb-0" style="border-radius: 50px 50px 0 0;">
    <div class="container px-4 py-3">
        <h2 class="fw-bold text-white mb-3">Siap Membuat Kartu Digital Anda?</h2>
        <p class="lead text-white-50 mb-4 mx-auto" style="max-width: 600px;">Kartu digital interaktif kini dapat dibuat dan dibagikan ke teman, keluarga, atau untuk kebutuhan profesional lainnya dalam hitungan menit.</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('register') }}" class="btn btn-light btn-lg px-5 rounded-pill fw-bold text-purple shadow-sm">Daftar Sekarang <i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</section>

</main>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endpush