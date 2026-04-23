@extends('layouts.app')

@section('title', 'FAQ Ofor.site | Pertanyaan yang Sering Diajukan')
@section('meta_description', 'Temukan jawaban lengkap untuk FAQ kartu digital Ofor.site. Pelajari cara membuat kartu digital online, fitur platform kartu digital, dan penggunaan kartu ucapan digital.')
@section('meta_keywords', 'FAQ kartu digital, kartu digital online, platform kartu digital, kartu ucapan digital')

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
    
    /* Accordion Custom Styling */
    .ofor-accordion .accordion-item {
        border: none;
        border-radius: 1rem !important;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        margin-bottom: 1rem;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .ofor-accordion .accordion-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(111, 66, 193, 0.1);
    }
    
    .ofor-accordion .accordion-button {
        font-weight: 600;
        color: #333;
        padding: 1.25rem 1.5rem;
        background-color: #fff;
        border-radius: 1rem !important;
        box-shadow: none !important;
    }
    
    .ofor-accordion .accordion-button:not(.collapsed) {
        color: var(--ofor-purple);
        background-color: var(--ofor-purple-light);
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }
    
    .ofor-accordion .accordion-button::after {
        transition: transform 0.3s ease;
    }
    
    .ofor-accordion .accordion-body {
        background-color: #fff;
        padding: 1.5rem;
        color: #6c757d;
        line-height: 1.7;
    }

    .ofor-accordion .list-custom {
        padding-left: 1.2rem;
        margin-bottom: 0;
    }

    .ofor-accordion .list-custom li {
        margin-bottom: 0.5rem;
    }
    
    .bg-dots {
        background-image: radial-gradient(rgba(255, 255, 255, 0.2) 2px, transparent 2px);
        background-size: 30px 30px;
    }
</style>

<main class="bg-light min-vh-100 pb-5">
    
    <header class="bg-purple py-5 mb-5 position-relative overflow-hidden">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dots"></div>
        <div class="container py-4 text-center position-relative" style="z-index: 2;">
            <span class="badge bg-white text-purple px-3 py-2 rounded-pill mb-3 shadow-sm">Pusat Bantuan</span>
            <h1 class="display-5 fw-bold mb-3 text-white">FAQ Ofor.site</h1>
            <h2 class="h4 fw-normal text-white opacity-75 mx-auto" style="max-width: 600px;">Pertanyaan yang Sering Diajukan</h2>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <section class="text-center mb-5">
                    <p class="text-secondary fs-5" style="line-height: 1.8;">
                        Temukan jawaban atas berbagai pertanyaan seputar penggunaan Ofor.site, platform <strong>kartu digital online</strong> interaktif yang modern, fleksibel, dan tanpa batas.
                    </p>
                </section>

                <section class="accordion ofor-accordion" id="faqAccordion">
                    
                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                1. Apa itu Ofor.site?
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ofor.site adalah platform yang memungkinkan Anda membuat <strong>kartu digital</strong> interaktif dengan berbagai elemen seperti teks, gambar, video, dan voice note. Kartu dapat dibagikan melalui link custom atau QR Code tanpa perlu diunduh.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2. Apakah Ofor.site gratis?
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Tidak. Ofor.site menggunakan sistem akses premium dengan biaya <strong>Rp15.000 (sekali bayar)</strong>. Setelah pembayaran, Anda dapat membuat kartu digital tanpa batas dan mengakses semua fitur.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3. Apa saja fitur yang tersedia di Ofor.site?
                            </button>
                        </h3>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Beberapa fitur utama platform kartu digital ini:
                                <ul class="list-custom mt-2">
                                    <li>Pembuatan kartu digital unlimited</li>
                                    <li>Custom URL</li>
                                    <li>QR Code otomatis</li>
                                    <li>Tambah video, gambar, teks, dan voice note</li>
                                    <li>Background custom</li>
                                    <li>Sharing tanpa download</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                4. Bagaimana cara membuat kartu digital?
                            </button>
                        </h3>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Langkah pembuatan:
                                <ol class="list-custom mt-2">
                                    <li>Daftar/login</li>
                                    <li>Lakukan pembayaran</li>
                                    <li>Buat kartu</li>
                                    <li>Bagikan via link atau QR Code</li>
                                </ol>
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5. Apakah bisa membuat lebih dari satu kartu?
                            </button>
                        </h3>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, unlimited setelah premium aktif.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                6. Apakah harus download kartu?
                            </button>
                        </h3>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Tidak, cukup share link atau QR Code.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                7. Apakah kartu aman?
                            </button>
                        </h3>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, hanya bisa diakses melalui link/QR yang dibagikan.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                8. Bisa edit kartu?
                            </button>
                        </h3>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, selama akun aktif.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                9. Apakah pembayaran bisa dikembalikan?
                            </button>
                        </h3>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Tidak, bersifat non-refundable.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                10. Digunakan untuk apa?
                            </button>
                        </h3>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Kartu ucapan digital ini bisa digunakan untuk berbagai keperluan:
                                <ul class="list-custom mt-2">
                                    <li>Ulang tahun</li>
                                    <li>Anniversary</li>
                                    <li>Menyatakan perasaan</li>
                                    <li>Prank</li>
                                    <li>Undangan digital</li>
                                    <li>Pesan personal</li>
                                </ul>
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingEleven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                11. Bisa upload gambar sendiri?
                            </button>
                        </h3>
                        <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, bisa.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingTwelve">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                12. Bisa diakses di HP?
                            </button>
                        </h3>
                        <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Ya, semua device.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingThirteen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                13. Lupa password?
                            </button>
                        </h3>
                        <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Gunakan fitur reset password.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingFourteen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                14. Apakah data aman?
                            </button>
                        </h3>
                        <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Kami menjaga keamanan, namun pengguna juga harus menjaga akun.
                            </div>
                        </div>
                    </article>

                    <article class="accordion-item">
                        <h3 class="accordion-header" id="headingFifteen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                                15. Cara menghubungi?
                            </button>
                        </h3>
                        <div id="collapseFifteen" class="accordion-collapse collapse" aria-labelledby="headingFifteen" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Melalui platform resmi Ofor.site.
                            </div>
                        </div>
                    </article>

                </section>

                <section class="mt-5 p-4 p-md-5 bg-white rounded-4 shadow-sm text-center border-top border-4 border-purple">
                    <h3 class="h4 fw-bold text-dark mb-3">Butuh Bantuan Lain?</h3>
                    <p class="text-secondary mb-0">
                        Kami berkomitmen memberikan pengalaman terbaik dalam membuat kartu digital yang kreatif, personal, dan profesional. Jika ada pertanyaan lain, silakan hubungi kami.
                    </p>
                </section>

            </div>
        </div>
    </div>
</main>

@endsection