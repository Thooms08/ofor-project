@extends('layouts.app')

@section('title', 'Keamanan & Privasi Ofor.site | Platform Kartu Digital Aman')
@section('meta_description', 'Kebijakan keamanan data dan privasi pengguna di Ofor.site. Kami berkomitmen penuh melindungi informasi Anda serta memastikan pengalaman penggunaan platform yang aman.')
@section('meta_keywords', 'keamanan data, privasi pengguna, kartu digital, keamanan website, privasi Ofor.site')

@section('content')
<style>
    :root {
        --ofor-purple: #6f42c1;
        --ofor-purple-dark: #59339d;
        --ofor-purple-light: #f4effa;
    }

    .bg-purple {
        background-color: var(--ofor-purple) !important;
        color: #ffffff;
    }

    .text-purple {
        color: var(--ofor-purple) !important;
    }

    .privacy-card {
        border: 1px solid rgba(111, 66, 193, 0.1);
        transition: all 0.3s ease;
        background-color: #ffffff;
    }

    .privacy-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(111, 66, 193, 0.1) !important;
        border-color: rgba(111, 66, 193, 0.2);
    }

    .icon-box-purple {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 54px;
        height: 54px;
        border-radius: 14px;
        background-color: var(--ofor-purple-light);
        color: var(--ofor-purple);
        font-size: 24px;
        flex-shrink: 0;
    }
    
    .privacy-list li {
        margin-bottom: 0.5rem;
        position: relative;
    }
    
    .bg-dots {
        background-image: radial-gradient(rgba(255, 255, 255, 0.2) 2px, transparent 2px);
        background-size: 30px 30px;
    }
</style>

<main class="bg-light pb-5">
    <header class="bg-purple py-5 mb-5 position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dots"></div>
        <div class="container py-5 text-center position-relative" style="z-index: 2;">
            <span class="badge bg-white text-purple px-3 py-2 rounded-pill mb-3 shadow-sm">Legal & Kebijakan</span>
            <h1 class="display-4 fw-bold mb-3 text-white">Keamanan & Privasi Ofor.site</h1>
            <p class="lead fw-normal mb-0 opacity-75 mx-auto" style="max-width: 700px;">Komitmen kami dalam melindungi data dan memberikan pengalaman digital yang aman untuk Anda.</p>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <section class="bg-white p-4 p-md-5 rounded-4 shadow-sm mb-5 border-0">
                    <p class="text-secondary fs-5 mb-3" style="line-height: 1.8;">
                        Di <strong>Ofor.site</strong>, kami memahami bahwa keamanan data dan privasi pengguna adalah hal yang sangat penting. Oleh karena itu, kami berkomitmen untuk melindungi informasi Anda serta memastikan pengalaman penggunaan platform yang aman dan terpercaya.
                    </p>
                    <p class="text-secondary fs-5 mb-0" style="line-height: 1.8;">
                        Dengan menggunakan layanan Ofor.site, Anda menyetujui praktik keamanan dan privasi yang dijelaskan pada halaman ini.
                    </p>
                </section>

                <div class="d-flex flex-column gap-4">

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-clipboard-data"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-3 text-dark">1. Informasi yang Kami Kumpulkan</h2>
                                <p class="text-muted mb-3">Kami mengumpulkan beberapa jenis informasi untuk meningkatkan kualitas layanan, di antaranya:</p>
                                <ul class="text-muted privacy-list mb-0">
                                    <li><strong>Informasi Akun:</strong> Seperti nama, email, dan data registrasi.</li>
                                    <li><strong>Data Penggunaan:</strong> Aktivitas pembuatan kartu digital.</li>
                                    <li><strong>Konten Pengguna:</strong> Teks, gambar, video, voice notes.</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-gear-fill"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-3 text-dark">2. Penggunaan Informasi</h2>
                                <p class="text-muted mb-3">Informasi yang kami kumpulkan digunakan untuk:</p>
                                <ul class="text-muted privacy-list mb-3">
                                    <li>Mengelola layanan</li>
                                    <li>Meningkatkan fitur</li>
                                    <li>Menjaga keamanan sistem</li>
                                    <li>Memberikan dukungan teknis</li>
                                </ul>
                                <div class="alert alert-info bg-purple-light border-0 text-purple mb-0">
                                    <i class="bi bi-info-circle-fill me-2"></i> Kami tidak menggunakan data Anda untuk tujuan yang merugikan atau melanggar privasi.
                                </div>
                            </div>
                        </div>
                    </article>

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-shield-lock-fill"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-3 text-dark">3. Keamanan Data</h2>
                                <ul class="text-muted privacy-list mb-3">
                                    <li><strong>Server terproteksi</strong> dari akses tidak sah.</li>
                                    <li>Menggunakan <strong>Teknologi enkripsi</strong> untuk transmisi data.</li>
                                    <li><strong>Pembatasan akses data</strong> internal secara ketat.</li>
                                </ul>
                                <p class="text-muted small mb-0 fst-italic">
                                    *Catatan: Meskipun kami mengimplementasikan standar keamanan tinggi, tidak ada sistem transmisi internet yang 100% aman dari risiko digital.
                                </p>
                            </div>
                        </div>
                    </article>

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-file-earmark-lock"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-3 text-dark">4. Privasi Konten Kartu Digital</h2>
                                <ul class="text-muted privacy-list mb-0">
                                    <li>Hanya bisa diakses melalui custom URL atau QR Code.</li>
                                    <li>Tidak dibagikan ke pihak lain oleh sistem kami.</li>
                                    <li>Pengguna memiliki kontrol penuh atas konten yang dibuat.</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-person-bounding-box"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-3 text-dark">5. Perlindungan Akun Pengguna</h2>
                                <ul class="text-muted privacy-list mb-3">
                                    <li>Gunakan <strong>Password kuat</strong>.</li>
                                    <li><strong>Jangan bagikan login</strong> Anda kepada siapapun.</li>
                                    <li>Segera <strong>Ubah password jika mencurigakan</strong> ada aktivitas tidak dikenal.</li>
                                </ul>
                                <p class="text-danger small mb-0 fw-medium">
                                    Disclaimer: Kelalaian pengguna dalam menjaga kerahasiaan login menjadi tanggung jawab pengguna sepenuhnya.
                                </p>
                            </div>
                        </div>
                    </article>

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-cookie"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-3 text-dark">6. Penggunaan Cookies</h2>
                                <p class="text-muted mb-3">Kami menggunakan cookies pada browser Anda untuk keperluan:</p>
                                <ul class="text-muted privacy-list mb-0">
                                    <li>Mengingat preferensi pengguna</li>
                                    <li>Meningkatkan performa website</li>
                                    <li>Memberikan pengalaman optimal selama berselancar</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-share-fill"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-3 text-dark">7. Berbagi Informasi dengan Pihak Ketiga</h2>
                                <p class="text-muted fw-bold mb-2">Kami dengan tegas menyatakan bahwa kami:</p>
                                <ul class="text-muted privacy-list mb-3">
                                    <li class="text-danger">Tidak menjual data Anda.</li>
                                    <li class="text-danger">Tidak menyewakan data Anda.</li>
                                </ul>
                                <p class="text-muted mb-2">Data hanya akan dibagikan dalam kondisi pengecualian berikut:</p>
                                <ul class="text-muted privacy-list mb-0">
                                    <li>Kebutuhan hukum / permintaan otoritas berwenang</li>
                                    <li>Keamanan platform dan perlindungan hak cipta</li>
                                    <li>Layanan pihak ketiga pendukung (seperti gateway pembayaran yang aman)</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-server"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-3 text-dark">8. Penyimpanan dan Penghapusan Data</h2>
                                <ul class="text-muted privacy-list mb-0">
                                    <li>Data disimpan dengan aman selama akun Anda aktif.</li>
                                    <li>Data bisa dihapus kapan saja atas permintaan Anda.</li>
                                    <li>Beberapa data spesifik bisa tetap disimpan jika diwajibkan oleh hukum yang berlaku.</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-2 text-dark">9. Perubahan Kebijakan Privasi</h2>
                                <p class="text-muted mb-0">Kebijakan privasi ini dapat diperbarui sewaktu-waktu untuk menyesuaikan dengan pengembangan fitur atau regulasi baru. Kami menyarankan Anda untuk meninjau halaman ini secara berkala.</p>
                            </div>
                        </div>
                    </article>

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-2 text-dark">10. Persetujuan Pengguna</h2>
                                <p class="text-muted mb-0">Dengan terus menggunakan platform Ofor.site, pengguna menyatakan setuju dan memahami seluruh kebijakan keamanan dan privasi yang tertulis di sini.</p>
                            </div>
                        </div>
                    </article>

                    <article class="card privacy-card rounded-4 shadow-sm">
                        <div class="card-body p-4 p-md-5 d-flex gap-4 flex-column flex-sm-row">
                            <div class="icon-box-purple">
                                <i class="bi bi-envelope-paper-fill"></i>
                            </div>
                            <div>
                                <h2 class="h4 fw-bold mb-2 text-dark">11. Kontak</h2>
                                <p class="text-muted mb-0">Jika Anda memiliki pertanyaan mengenai kebijakan keamanan dan privasi ini, silakan hubungi kami melalui saluran resmi yang tersedia di platform Ofor.site.</p>
                            </div>
                        </div>
                    </article>

                </div>

                <section class="mt-5 text-center p-5 bg-purple rounded-4 shadow-lg text-white">
                    <i class="bi bi-shield-check display-3 mb-3 d-block"></i>
                    <h3 class="fw-bold mb-3">Komitmen Ofor.site</h3>
                    <p class="lead mb-0 opacity-75">
                        Ofor.site berkomitmen untuk menjaga kepercayaan Anda dengan memberikan layanan yang aman, transparan, dan profesional. Privasi Anda adalah prioritas kami.
                    </p>
                </section>

            </div>
        </div>
    </div>
</main>
@endsection