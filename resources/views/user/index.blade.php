<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard User | OFFOR.SITE</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-purple: #7e22ce;
            --light-purple: #f3e8ff;
            --dark-purple: #581c87;
        }
        
        body {
            background-color: var(--light-purple);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            padding-bottom: 50px;
        }

        .text-purple { color: var(--primary-purple) !important; }
        .bg-purple { background-color: var(--primary-purple) !important; color: white; }

        /* Navbar Sederhana */
        .top-nav {
            background: white;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Styling Tombol CTA */
        .btn-purple {
            background-color: var(--primary-purple);
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-purple:hover {
            background-color: var(--dark-purple);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(126, 34, 206, 0.3);
        }

        /* Styling Card List */
        .desain-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(126, 34, 206, 0.1);
        }
        .desain-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(126, 34, 206, 0.15) !important;
        }

        .qr-wrapper {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            display: inline-block;
            border: 2px dashed var(--primary-purple);
        }
    </style>
</head>
<body>

<div class="top-nav mb-4">
    <div class="fw-bolder fs-4 text-purple" style="letter-spacing: 1px;">OFOR.SITE</div>
        <div>
            <span class="me-3 text-muted d-none d-md-inline">
                Halo, <b>{{ $user->name }}</b>
                @if($hasPaid)
                    <i class="bi bi-patch-check-fill text-primary ms-1" title="Akun Premium" style="color: #7e22ce !important;"></i>
                @endif
            </span>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline m-0">
            @csrf
            <button type="button" onclick="confirmLogout()" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-medium shadow-sm">
                <i class="bi bi-box-arrow-right me-1"></i> Keluar
            </button>
        </form>
        </div>
    </div>

    <div class="container">

        <div class="row mb-4 align-items-center">
            <div class="col-md-8 mb-3 mb-md-0">
                <h2 class="fw-bolder text-purple mb-1">Koleksi Kartu Digitalmu</h2>
                <p class="text-muted mb-0">Kelola, edit, atau bagikan desain kartu interaktif yang sudah kamu buat.</p>
            </div>
            <div class="col-md-4 text-md-end">
                @if($hasPaid)
                    <a href="{{ route('desain.index') }}" class="btn btn-purple btn-lg rounded-pill fw-bold shadow-sm">
                        <i class="bi bi-plus-lg me-1"></i> Buat Kartu Baru
                    </a>
                @else
                    <button onclick="promptPayment()" class="btn btn-purple btn-lg rounded-pill fw-bold shadow-sm">
                        <i class="bi bi-lock-fill me-1"></i> Buat Kartu Baru
                    </button>
                @endif
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6 col-lg-4">
                <div class="input-group shadow-sm">
                    <span class="input-group-text bg-white border-end-0 text-muted">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="searchInput" class="form-control border-start-0 shadow-none" placeholder="Cari url-kartu...">
                </div>
            </div>
        </div>
</div>

        <div class="row g-4 mt-3 px-4" id="cardContainer">
            @forelse($desains as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card desain-card border-0 shadow-sm rounded-4 h-100 bg-white overflow-hidden">
                        
                        @php
                            $bg = $item->background ?? '#7e22ce'; 
                            if (str_starts_with($bg, '#') || str_starts_with($bg, 'rgb')) {
                                $bgStyle = "background-color: {$bg};";
                                $previewIcon = "bi-palette2"; 
                            } else {
                                $bgStyle = "background-image: url('".asset($bg)."'); background-size: cover; background-position: center;";
                                $previewIcon = "bi-image"; 
                            }
                        @endphp

                        <div class="d-flex align-items-center justify-content-center position-relative" style="height: 140px; {{ $bgStyle }}">
                            <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.15);"></div>
                            <i class="bi {{ $previewIcon }} text-white opacity-50 position-relative z-1" style="font-size: 2.5rem;"></i>
                            <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-normal small shadow-sm z-1">
                                <i class="bi bi-aspect-ratio me-1"></i> {{ $item->aspek_rasio == '16-9' ? '16:9' : '9:16' }}
                            </span>
                        </div>

                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="fw-bold mb-1 text-truncate" title="{{ $item->slug }}">
                                /{{ $item->slug }}
                            </h5>
                            
                            <div class="text-muted small mb-4">
                                <i class="bi bi-clock-history me-1"></i> Terakhir diupdate:<br>
                                <span class="text-dark fw-medium">
                                    {{ \Carbon\Carbon::parse($item->updated_at)->timezone('Asia/Jakarta')->locale('id')->translatedFormat('H:i | l, d F Y') }}
                                </span>
                            </div>

                            <div class="d-flex gap-2 mt-auto">
                                <button onclick="openShareModal('{{ $item->slug }}')" class="btn btn-primary btn-sm flex-fill rounded-pill fw-medium">
                                    <i class="bi bi-share"></i> Share
                                </button>
                                
                                <a href="{{ url('/desain/'.$item->slug) }}" class="btn btn-outline-secondary btn-sm flex-fill rounded-pill fw-medium">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>

                                <form action="{{ url('/dashboard/desain/'.$item->id) }}" method="POST" class="d-inline" id="delete-form-{{ $item->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $item->id }})" class="btn btn-outline-danger btn-sm rounded-pill px-3" title="Hapus Kartu">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                        <img src="https://cdn-icons-png.flaticon.com/512/7486/7486747.png" alt="Kosong" width="120" class="opacity-50 mb-3">
                        <h4 class="text-muted fw-bold">Belum ada kartu yang dibuat</h4>
                        <p class="text-muted mb-4">Yuk, klik tombol di atas untuk membuat desain pertamamu!</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <div class="modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold text-purple"><i class="bi bi-share me-2"></i> Bagikan Kartu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center pt-3 pb-4">
                    <p class="text-muted small mb-3">Scan QR Code ini atau salin tautan untuk membagikan kartu spesialmu.</p>
                    
                    <div class="qr-wrapper mb-4 shadow-sm" id="qrcode-container"></div>

                    <div class="input-group mb-3 px-3">
                        <input type="text" id="share-link-result" class="form-control bg-light text-muted" readonly>
                        <button class="btn btn-purple" type="button" onclick="copyShareLink()">
                            <i class="bi bi-clipboard"></i> Salin
                        </button>
                    </div>

                    <button class="btn btn-outline-secondary rounded-pill px-4" id="btn-download-qr">
                        <i class="bi bi-download me-1"></i> Download QR Code
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // --- FITUR SHARE & QR CODE ---
        let currentModalObj = null;

        function openShareModal(slug) {
            const fullUrl = window.location.origin + '/' + slug;
            document.getElementById('share-link-result').value = fullUrl;
            
            const qrContainer = document.getElementById('qrcode-container');
            qrContainer.innerHTML = '';
            
            new QRCode(qrContainer, {
                text: fullUrl,
                width: 180,
                height: 180,
                colorDark : "#581c87", 
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });

            document.getElementById('btn-download-qr').onclick = function() {
                setTimeout(() => {
                    const canvas = document.querySelector('#qrcode-container canvas');
                    if(canvas) {
                        const url = canvas.toDataURL("image/png");
                        const a = document.createElement('a');
                        a.download = `QR-oforsite-${slug}.png`;
                        a.href = url;
                        a.click();
                    }
                }, 300); 
            };

            currentModalObj = new bootstrap.Modal(document.getElementById('shareModal'));
            currentModalObj.show();
        }

        // --- FITUR COPY LINK ---
        function copyShareLink() {
            const copyText = document.getElementById("share-link-result");
            copyText.select();
            copyText.setSelectionRange(0, 99999); 
            navigator.clipboard.writeText(copyText.value);
            
            Swal.fire({
                toast: true, position: 'top-end', icon: 'success', 
                title: 'Tautan berhasil disalin!', showConfirmButton: false, timer: 1500
            });
        }

        // --- FITUR KONFIRMASI HAPUS ---
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Kartu?',
                text: "Kartu yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }

        // --- FITUR PENCARIAN AJAX ---
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById('searchInput');
            const cardContainer = document.getElementById('cardContainer');
            // Sekarang Javascript bisa ngambil token ini dengan aman karena sudah dipasang di <head>
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            searchInput.addEventListener('input', function(e) {
                let query = e.target.value;

                if(query.length > 0) {
                    cardContainer.style.opacity = '0.5';
                }

                fetch(`/dashboard/search?q=${query}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(res => {
                    cardContainer.innerHTML = ''; 
                    cardContainer.style.opacity = '1'; 

                    if (res.data.length === 0) {
                        cardContainer.innerHTML = `
                            <div class="col-12">
                                <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                                    <i class="bi bi-search text-muted mb-3 d-block" style="font-size: 3rem;"></i>
                                    <h5 class="text-muted fw-bold">Kartu tidak ditemukan</h5>
                                    <p class="text-muted small">Coba gunakan kata kunci lain.</p>
                                </div>
                            </div>`;
                        return;
                    }

                    res.data.forEach(item => {
                        // Desain card di-update mengikuti tampilan terbarumu (ada border radius, tombol bulet, dll)
                        let cardHtml = `
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card desain-card border-0 shadow-sm rounded-4 h-100 bg-white overflow-hidden">
                                <div class="d-flex align-items-center justify-content-center position-relative" style="height: 140px; ${item.bg_style}">
                                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.15);"></div>
                                    <i class="bi ${item.icon} text-white opacity-50 position-relative z-1" style="font-size: 2.5rem;"></i>
                                    <span class="badge bg-dark bg-opacity-75 position-absolute top-0 end-0 m-2 fw-normal small shadow-sm z-1">
                                        <i class="bi bi-aspect-ratio me-1"></i> ${item.aspek_rasio}
                                    </span>
                                </div>
                                <div class="card-body p-4 d-flex flex-column">
                                    <h5 class="fw-bold mb-1 text-truncate" title="/${item.slug}">
                                        /${item.slug}
                                    </h5>
                                    <div class="text-muted small mb-4">
                                        <i class="bi bi-clock-history me-1"></i> Terakhir diupdate:<br>
                                        <span class="text-dark fw-medium">${item.updated_at}</span>
                                    </div>
                                    <div class="d-flex gap-2 mt-auto">
                                        <button onclick="openShareModal('${item.slug}')" class="btn btn-primary btn-sm flex-fill rounded-pill fw-medium">
                                            <i class="bi bi-share"></i> Share
                                        </button>
                                        <a href="${item.edit_url}" class="btn btn-outline-secondary btn-sm flex-fill rounded-pill fw-medium">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="${item.delete_url}" method="POST" class="d-inline" id="delete-form-${item.id}">
                                            <input type="hidden" name="_token" value="${csrfToken}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="button" onclick="confirmDelete(${item.id})" class="btn btn-outline-danger btn-sm rounded-pill px-3" title="Hapus Kartu">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        cardContainer.insertAdjacentHTML('beforeend', cardHtml);
                    });
                })
                .catch(error => {
                    console.error('Error saat pencarian:', error);
                    cardContainer.style.opacity = '1';
                });
            });
        });

         function promptPayment() {
        Swal.fire({
            title: '<h4 class="fw-bold text-purple mb-0">Akses Premium</h4>',
            html: '<p class="text-muted mt-2">Untuk mengakses fitur pembuatan kartu tanpa batas, silakan lakukan pembayaran sebesar <b>Rp 15.000</b> (Sekali Bayar) melalui QRIS.</p>',
            iconHtml: '<i class="bi bi-qr-code-scan text-purple"></i>',
            customClass: { icon: 'border-0' },
            showCancelButton: true,
            confirmButtonColor: '#7e22ce',
            cancelButtonColor: '#e2e8f0',
            confirmButtonText: '<i class="bi bi-credit-card-fill me-1"></i> Bayar Sekarang',
            cancelButtonText: '<span class="text-dark">Nanti Saja</span>',
            reverseButtons: true,
            padding: '2em',
            borderRadius: '1.5rem'
        }).then((result) => {
            if (result.isConfirmed) {
                // Tampilkan Loading
                Swal.fire({
                    title: 'Memproses...',
                    text: 'Menyiapkan halaman pembayaran aman untukmu.',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => { Swal.showLoading() }
                });
                
                // Redirect ke function createPayment di Controller
                window.location.href = "{{ route('user.payment.create') }}";
            }
        });
    }

    // --- FITUR KONFIRMASI LOGOUT ---
        function confirmLogout() {
            Swal.fire({
                title: '<h5 class="fw-bold mb-0">Yakin ingin keluar?</h5>',
                text: "Sesi kamu akan diakhiri dan harus login kembali.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545', // Warna merah danger
                cancelButtonColor: '#6c757d',  // Warna abu-abu secondary
                confirmButtonText: '<i class="bi bi-box-arrow-right me-1"></i> Ya, Keluar',
                cancelButtonText: 'Batal',
                reverseButtons: true, // Posisi tombol "Batal" di kiri, "Ya" di kanan
                padding: '2em',
                borderRadius: '1.5rem'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kalau di-klik "Ya", eksekusi form logout-nya
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
</body>
</html>