@extends('layouts.app')

@section('title', 'Syarat & Ketentuan | Ofor.site')
@section('meta_description', 'Baca syarat dan ketentuan penggunaan layanan Ofor.site. Pahami aturan dan kebijakan platform kartu online dan pembuatan kartu digital kami.')

@section('content')

<style>
    :root {
        --ofor-purple: #6f42c1;
        --ofor-purple-dark: #59339d;
        --ofor-purple-light: #f4effa;
        --ofor-text-gray: #6c757d;
    }
    
    .bg-purple {
        background-color: var(--ofor-purple) !important;
        color: #ffffff;
    }
    
    .text-purple {
        color: var(--ofor-purple) !important;
    }

    .border-purple-start {
        border-left: 4px solid var(--ofor-purple) !important;
    }

    .tc-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .tc-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 .5rem 1rem rgba(111, 66, 193, 0.1) !important;
    }

    .icon-wrapper {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background-color: var(--ofor-purple-light);
        color: var(--ofor-purple);
        font-size: 1.5rem;
        flex-shrink: 0;
    }
</style>

<main>
    <header class="bg-purple py-5 mb-5 position-relative overflow-hidden">
        <div class="container py-4 text-center position-relative" style="z-index: 2;">
            <h1 class="display-5 fw-bold mb-3">Syarat & Ketentuan</h1>
            <p class="lead fw-normal mb-0 opacity-75">Panduan Penggunaan Layanan Ofor.site</p>
        </div>
    </header>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <section class="mb-5 text-center">
                    <h2 class="fw-bold text-dark mb-3">Selamat datang di Ofor.site</h2>
                    <p class="text-muted" style="line-height: 1.8;">
                        Dengan mengakses dan menggunakan layanan kami, Anda dianggap telah membaca, memahami, dan menyetujui seluruh <strong>syarat dan ketentuan</strong> yang berlaku di halaman ini. Jika Anda tidak menyetujui sebagian atau seluruh isi ketentuan ini, kami menyarankan untuk tidak menggunakan layanan Ofor.site.
                    </p>
                </section>

                <div class="d-flex flex-column gap-4">
                    
                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-info-circle"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-2">1. Definisi Layanan</h3>
                                <p class="text-muted mb-0">Ofor.site adalah platform digital yang menyediakan layanan pembuatan <strong>kartu digital</strong> interaktif dengan fitur seperti teks, gambar, video, voice note, custom URL, dan QR Code.</p>
                            </div>
                        </div>
                    </article>

                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-person-check"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-3">2. Persyaratan Pengguna</h3>
                                <ul class="text-muted mb-0 ps-3">
                                    <li class="mb-1">Tanpa batasan usia</li>
                                    <li class="mb-1">Menggunakan layanan untuk tujuan sah</li>
                                    <li>Bertanggung jawab atas konten</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-3">3. Akun Pengguna</h3>
                                <ul class="text-muted mb-0 ps-3">
                                    <li class="mb-1">Wajib registrasi</li>
                                    <li class="mb-1">Menjaga keamanan akun</li>
                                    <li>Aktivitas akun menjadi tanggung jawab pengguna</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-credit-card"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-3">4. Sistem Pembayaran</h3>
                                <ul class="text-muted mb-0 ps-3">
                                    <li class="mb-1">Gratis 1 kali percobaan</li>
                                    <li class="mb-1">Biaya: Rp15.000 (sekali bayar)</li>
                                    <li class="mb-1">Akses penuh setelah pembayaran</li>
                                    <li>Non-refundable (Tidak dapat dikembalikan)</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-3">5. Penggunaan Layanan</h3>
                                <p class="text-muted mb-2 fw-medium">Dilarang:</p>
                                <ul class="text-muted mb-3 ps-3">
                                    <li class="mb-1">Konten ilegal, pornografi, SARA, kekerasan, ujaran kebencian</li>
                                    <li class="mb-1">Penipuan, spam</li>
                                    <li class="mb-1">Pelanggaran hak cipta</li>
                                    <li>Penyalahgunaan sistem</li>
                                </ul>
                                <div class="alert alert-danger mb-0 py-2 small border-0 bg-opacity-10 text-danger">
                                    <i class="bi bi-info-circle-fill me-1"></i> Kami berhak menghapus konten atau akun tanpa pemberitahuan.
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-journal-bookmark"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-3">6. Hak Kekayaan Intelektual</h3>
                                <ul class="text-muted mb-0 ps-3">
                                    <li class="mb-1">Sistem milik Ofor.site</li>
                                    <li class="mb-1">Konten milik pengguna</li>
                                    <li>Dilarang menyalin platform tanpa izin</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-cloud-check"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-3">7. Ketersediaan Layanan</h3>
                                <ul class="text-muted mb-0 ps-3">
                                    <li class="mb-1">Tidak menjamin bebas error</li>
                                    <li>Bisa maintenance kapan saja</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-shield-x"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-3">8. Batasan Tanggung Jawab</h3>
                                <p class="text-muted mb-2 fw-medium">Ofor.site tidak bertanggung jawab atas:</p>
                                <ul class="text-muted mb-0 ps-3">
                                    <li class="mb-1">Konten pengguna</li>
                                    <li class="mb-1">Kerugian penggunaan</li>
                                    <li>Penyalahgunaan oleh pihak lain</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-3">9. Perubahan Ketentuan</h3>
                                <ul class="text-muted mb-0 ps-3">
                                    <li class="mb-1">Dapat berubah sewaktu-waktu</li>
                                    <li>Berlaku setelah dipublikasikan</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-door-closed"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-2">10. Penutupan Akun</h3>
                                <p class="text-muted mb-0">Akun bisa ditangguhkan/dihapus jika melanggar ketentuan yang berlaku pada <strong>platform kartu online</strong> ini.</p>
                            </div>
                        </div>
                    </article>

                    <article class="card border-0 shadow-sm rounded-4 tc-card border-purple-start">
                        <div class="card-body p-4 d-flex gap-3">
                            <div class="icon-wrapper">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div>
                                <h3 class="h5 fw-bold mb-2">11. Kontak</h3>
                                <p class="text-muted mb-0">Hubungi melalui platform resmi Ofor.site untuk pertanyaan lebih lanjut.</p>
                            </div>
                        </div>
                    </article>

                </div>

                <section class="mt-5 text-center p-4 bg-light rounded-4 shadow-sm border border-light">
                    <i class="bi bi-check-circle-fill text-success fs-1 mb-3 d-block"></i>
                    <p class="text-dark fw-medium mb-0">
                        Dengan menggunakan Ofor.site, Anda menyetujui seluruh ketentuan yang berlaku dan siap menggunakan layanan secara bijak dan sesuai hukum.
                    </p>
                </section>

            </div>
        </div>
    </div>
</main>

@endsection