@extends('layouts.app')

@section('title', 'Beranda | OFFOR.SITE')

@section('content')

<section class="py-5 bg-light-purple position-relative overflow-hidden">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-2 order-lg-1 text-center text-lg-start">
                <span class="badge bg-purple text-white rounded-pill px-3 py-2 mb-3">#1 Digital Card Builder</span>
                <h1 class="display-4 fw-bold mb-3 text-dark">
                    Bikin Momen Lebih Berkesan dengan <span class="text-purple">Kartu Digital Interaktif</span>
                </h1>
                <p class="lead text-muted mb-4">
                    OFFOR.SITE adalah platform pembuatan kartu digital interaktif. Hanya dengan <strong>Rp15.000 (sekali bayar)</strong>, kamu bisa membuat karya yang personal dan unik!
                </p>
                
                <ul class="list-unstyled text-start d-inline-block d-lg-block mb-4">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> Custom background (gambar atau warna)</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> Pilihan berbagai jenis font estetik</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-purple me-2"></i> Bebas isi teks, gambar, hingga pesan suara!</li>
                </ul>

                <div>
                    <a href="{{route('register')}}" class="btn btn-purple btn-lg w-100 w-sm-auto mb-3 mb-sm-0 me-sm-2 shadow-sm">
                        Buat Kartu Sekarang <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <div class="bg-white p-4 rounded-4 shadow-lg mx-auto" style="max-width: 350px; border: 1px solid var(--light-purple);">
                    <div class="bg-light-purple rounded-3 p-3 mb-3" style="height: 180px; display:flex; align-items:center; justify-content:center;">
                        <i class="bi bi-image text-purple" style="font-size: 3rem;"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Happy Birthday! 🎉</h5>
                    <p class="text-muted small mb-3">Semoga harimu menyenangkan dan selalu diberikan kebahagiaan.</p>
                    <div class="d-flex align-items-center justify-content-between p-2 bg-light rounded">
                        <span class="small text-muted"><i class="bi bi-play-circle-fill text-purple me-1"></i> Pesan Suara</span>
                        <span class="badge bg-purple">0:30</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="fitur" class="py-5 bg-white">
    <div class="container py-5">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">Satu Kartu, Beragam Kebutuhan!</h2>
                <p class="lead text-muted">
                    Bagikan kartumu dengan super gampang. Bisa lewat <strong>QR Code</strong>, atau pakai link unik khusus buat kamu, contohnya: <span class="text-purple fw-bold bg-light-purple px-2 py-1 rounded">offor.site/nama-kartu</span>.
                </p>
            </div>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 border rounded-4 bg-light h-100">
                    <i class="bi bi-envelope-paper-heart text-purple" style="font-size: 2.5rem;"></i>
                    <h4 class="fw-bold mt-3">Undangan</h4>
                    <p class="text-muted">Undangan pernikahan, ulang tahun, atau event seru lainnya jadi lebih elegan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-4 bg-light h-100">
                    <i class="bi bi-balloon-heart text-purple" style="font-size: 2.5rem;"></i>
                    <h4 class="fw-bold mt-3">Ucapan Selamat</h4>
                    <p class="text-muted">Kasih kejutan ucapan selamat kelulusan, hari ibu, atau anniversary.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-4 bg-light h-100">
                    <i class="bi bi-emoji-smile text-purple" style="font-size: 2.5rem;"></i>
                    <h4 class="fw-bold mt-3">Kartu Spesial</h4>
                    <p class="text-muted">Atau bahkan bikin kartu spesial buat nagih hutang ke teman 😄</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="keunggulan" class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-2">Kenapa Memilih OFFOR.SITE?</h2>
            <p class="text-muted">Fitur premium dengan harga terjangkau untuk semua orang.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card card-feature p-4 text-center">
                    <div class="icon-box mx-auto">
                        <i class="bi bi-infinity"></i>
                    </div>
                    <h5 class="fw-bold">Unlimited Kartu</h5>
                    <p class="text-muted small mb-0">Bikin kartu sebanyak apapun tanpa ada batasan kuota. Bebas berekspresi!</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card card-feature p-4 text-center">
                    <div class="icon-box mx-auto">
                        <i class="bi bi-magic"></i>
                    </div>
                    <h5 class="fw-bold">Mudah Digunakan</h5>
                    <p class="text-muted small mb-0">Interface ramah pemula, tinggal drag & drop, kartu keren langsung jadi.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card card-feature p-4 text-center">
                    <div class="icon-box mx-auto">
                        <i class="bi bi-palette"></i>
                    </div>
                    <h5 class="fw-bold">Desain Fleksibel</h5>
                    <p class="text-muted small mb-0">Ubah background, tata letak teks, sampai warna sesuka hatimu.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card card-feature p-4 text-center">
                    <div class="icon-box mx-auto">
                        <i class="bi bi-share"></i>
                    </div>
                    <h5 class="fw-bold">Praktis Dibagikan</h5>
                    <p class="text-muted small mb-0">Sekali klik, sebarkan via sosmed, chat, atau tunjukkan QR codenya.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-purple text-white text-center">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">Udah Punya Ide Mau Bikin Kartu Apa?</h2>
                <p class="lead mb-5 opacity-75">
                    Jangan ditunda lagi, mending cobain sekarang dan lihat sendiri betapa gampangnya bikin orang terdekatmu tersenyum lewat OFFOR.SITE!
                </p>
                <a href="{{route('register')}}" class="btn btn-light btn-lg text-purple fw-bold px-5 py-3 rounded-pill shadow">
                    Mulai Sekarang <i class="bi bi-rocket-takeoff ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection