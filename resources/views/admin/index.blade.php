<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD ADMIN | OFOR.SITE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="{{ asset('logo-ofor.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('logo-ofor.jpg') }}">
    
    <style>
        /* CYBERPUNK THEME CSS */
        :root {
            --bg-cyber: #0a0a0f;
            --neon-purple: #b026ff;
            --neon-purple-dark: #6D28D9;
            --neon-blue: #0ff;
            --text-light: #e0e0e0;
        }

        body {
            background-color: var(--bg-cyber);
            color: var(--text-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* Tambahan agar background tetap aman */
            position: relative;
            z-index: 0;
        }

        /* =========================================
           ANIMASI BACKGROUND CYBERPUNK (GRID 3D)
           ========================================= */
        .cyber-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -10;
            background-color: var(--bg-cyber);
            overflow: hidden;
        }

        .cyber-bg::before {
            content: "";
            position: absolute;
            bottom: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background-image: 
                linear-gradient(rgba(176, 38, 255, 0.2) 2px, transparent 2px),
                linear-gradient(90deg, rgba(176, 38, 255, 0.2) 2px, transparent 2px);
            background-size: 50px 50px;
            /* Membuat efek 3D grid yang membentang ke cakrawala */
            transform: perspective(600px) rotateX(60deg) translateY(0);
            animation: movingGrid 2s linear infinite;
        }

        .cyber-bg::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Gradient radial agar garis neon memudar di bagian ujung layar (vignette effect) */
            background: radial-gradient(circle at center, transparent 10%, var(--bg-cyber) 75%);
        }

        @keyframes movingGrid {
            0% { background-position: 0 0; }
            100% { background-position: 0 50px; } /* Bergerak terus menerus */
        }
        /* ========================================= */

        .text-purple { color: var(--neon-purple); }
        .bg-purple { background-color: var(--neon-purple-dark) !important; color: white; }

        .cyber-header {
            border-bottom: 2px solid var(--neon-purple-dark);
            box-shadow: 0 4px 20px rgba(176, 38, 255, 0.2);
            background: linear-gradient(90deg, #120b1f 0%, #0a0a0f 100%);
        }

        .neon-text {
            color: #fff;
            text-shadow: 0 0 5px var(--neon-purple), 0 0 15px var(--neon-purple), 0 0 30px var(--neon-purple-dark);
            font-weight: 800;
            letter-spacing: 2px;
        }

        .cyber-card {
            background: rgba(18, 11, 31, 0.8);
            border: 1px solid var(--neon-purple-dark);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .cyber-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 25px rgba(176, 38, 255, 0.4);
            border-color: var(--neon-purple);
        }

        /* UPDATE: Ukuran font diperkecil agar pas di HP */
        .stat-number {
            font-size: 2rem; /* Sebelumnya 3.5rem */
            font-weight: 900;
            color: #fff;
            background: -webkit-linear-gradient(45deg, #fff, var(--neon-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
        }

        .stat-label { 
            font-size: 0.85rem; /* Sebelumnya 1.1rem */
            color: #aaa; 
            text-transform: uppercase; 
            letter-spacing: 1px; 
        }
        
        .cyber-icon { 
            font-size: 2rem; /* Sebelumnya 2.5rem */
            color: var(--neon-purple); 
            opacity: 0.8; 
        }
        /* TABEL CYBERPUNK CSS */
        .cyber-table-container {
            background: rgba(18, 11, 31, 0.8);
            border: 1px solid var(--neon-purple-dark);
            border-radius: 16px;
            backdrop-filter: blur(10px);
            padding: 20px;
            margin-top: 40px;
        }

        .table-cyber { color: var(--text-light); margin-bottom: 0; }
        .table-cyber thead th {
            background: rgba(109, 40, 217, 0.2);
            color: var(--neon-purple);
            border-bottom: 2px solid var(--neon-purple);
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 15px;
        }
        .table-cyber tbody td {
            background: transparent;
            color: #fff;
            border-bottom: 1px solid rgba(109, 40, 217, 0.3);
            padding: 15px;
            vertical-align: middle;
        }
        .table-cyber tbody tr:hover td { background: rgba(176, 38, 255, 0.05); }

        /* BUTTONS */
        .btn-cyber {
            background: transparent;
            color: var(--neon-blue);
            border: 1px solid var(--neon-blue);
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 0 5px rgba(0, 255, 255, 0.2);
        }
        .btn-cyber:hover {
            background: var(--neon-blue);
            color: #000;
            box-shadow: 0 0 15px var(--neon-blue);
        }

        /* MODAL CYBERPUNK */
        .modal-cyber .modal-content {
            background: #120b1f;
            border: 1px solid var(--neon-purple);
            box-shadow: 0 0 30px rgba(176, 38, 255, 0.3);
            border-radius: 16px;
        }
        .modal-cyber .modal-header { border-bottom: 1px solid var(--neon-purple-dark); }
        .modal-cyber .modal-footer { border-top: 1px solid var(--neon-purple-dark); }
        .slug-list-item {
            background: rgba(10, 10, 15, 0.9);
            border: 1px solid var(--neon-purple-dark);
            color: var(--text-light);
            margin-bottom: 8px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .slug-list-item:hover {
            border-color: var(--neon-purple);
            box-shadow: 0 0 10px rgba(176, 38, 255, 0.2);
            color: #fff;
        }
        .slug-link { color: var(--neon-blue); text-decoration: none; }
        .slug-link:hover { color: #fff; text-shadow: 0 0 5px var(--neon-blue); }
        
        /* CYBERPUNK DANGER BUTTON (LOGOUT) */
        .btn-cyber-danger {
            background: transparent;
            color: #ff2a2a;
            border: 1px solid #ff2a2a;
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 0 5px rgba(255, 42, 42, 0.2);
        }
        .btn-cyber-danger:hover {
            background: #ff2a2a;
            color: #fff;
            box-shadow: 0 0 15px rgba(255, 42, 42, 0.8);
            transform: translateY(-2px);
        }
        /* CYBERPUNK SWEETALERT2 CSS */
        .cyber-swal-popup {
            border: 1px solid var(--neon-purple) !important;
            box-shadow: 0 0 30px rgba(176, 38, 255, 0.3) !important;
            border-radius: 16px !important;
        }
    </style>
</head>
<body>

<div class="cyber-bg"></div>

<div class="container-fluid py-5" style="min-height: 80vh; max-width: 1400px;">
    <div class="row mb-4">
        <div class="col-12">
            <div class="cyber-header p-4 rounded-4 d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start">
                
                <div class="mb-3 mb-md-0">
                    <h1 class="neon-text mb-2">Selamat Datang, Admin</h1>
                    <p class="text-secondary mb-0 fs-5 cyber-motivasi">
                        <i class="bi bi-terminal text-purple"></i> {{ $motivasi }}
                    </p>
                </div>

                <div>
                   <form action="{{ route('logout') }}" method="POST" id="form-logout-admin">
                        @csrf
                        <button type="button" id="btn-logout-admin" class="btn btn-cyber-danger">
                            <i class="bi bi-box-arrow-right"></i> LOGOUT
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="row g-3 justify-content-center">
        
        <div class="col-12 col-md-4">
            <div class="cyber-card p-3 h-100 d-flex align-items-center justify-content-between">
                <div>
                    <div class="stat-label mb-1">Total User</div>
                    <div class="stat-number count-anim">{{ number_format($totalUser) }}</div>
                </div>
                <div class="cyber-icon"><i class="bi bi-people-fill"></i></div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="cyber-card p-3 h-100 d-flex align-items-center justify-content-between">
                <div>
                    <div class="stat-label mb-1">Sudah Bayar</div>
                    <div class="stat-number count-anim">{{ number_format($userSudahBayar) }}</div>
                </div>
                <div class="cyber-icon text-success" style="text-shadow: 0 0 10px #0f0;"><i class="bi bi-check-circle-fill"></i></div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="cyber-card p-3 h-100 d-flex align-items-center justify-content-between">
                <div>
                    <div class="stat-label mb-1">Belum Bayar</div>
                    <div class="stat-number count-anim">{{ number_format($userBelumBayar) }}</div>
                </div>
                <div class="cyber-icon text-danger" style="text-shadow: 0 0 10px #f00;"><i class="bi bi-x-circle-fill"></i></div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-12">
            <div class="cyber-table-container table-anim">
                <h3 class="neon-text mb-4"><i class="bi bi-database-fill"></i> Data Pengguna & Aktivitas</h3>
                
                <div class="table-responsive border-0">
                    <table class="table table-cyber table-hover text-nowrap align-middle">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Lengkap</th>
                                <th>Email Akses</th>
                                <th class="text-center">Banyak Aktivitas</th>
                                <th class="text-center">Daftar Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usersData as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><span class="fw-bold">{{ $user->name }}</span></td>
                                <td class="text-secondary">{{ $user->email }}</td>
                                <td class="text-center">
                                    <span class="badge bg-purple px-3 py-2" style="font-size: 0.9rem;">
                                        {{ $user->total_aktivitas }} Desain
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-cyber btn-sm btn-show-slug" 
                                        data-name="{{ $user->name }}" 
                                        data-slugs="{{ json_encode($user->desains->pluck('slug')) }}">
                                        <i class="bi bi-link-45deg"></i> Lihat Slug
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada data user.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-cyber" id="slugModal" tabindex="-1" aria-labelledby="slugModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title neon-text" id="slugModalLabel">
                    <i class="bi bi-folder2-open"></i> Slug Milik <span id="modalUserName" class="text-white"></span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush" id="modalSlugList">
                    </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary text-white" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {

    // 1. Animasi Anime.js Card Header
    anime({
        targets: '.cyber-card',
        translateY: [50, 0],
        opacity: [0, 1],
        delay: anime.stagger(150, {start: 200}),
        easing: 'easeOutExpo',
        duration: 800
    });

    // 2. Animasi Looping pada teks Header (Neon Pulse effect)
    anime({
        targets: '.neon-text',
        textShadow: [
            '0 0 5px #b026ff, 0 0 15px #b026ff, 0 0 30px #6D28D9',
            '0 0 10px #b026ff, 0 0 20px #b026ff, 0 0 40px #6D28D9'
        ],
        direction: 'alternate',
        loop: true,
        easing: 'easeInOutSine',
        duration: 1500
    });

    // 3. Animasi ketik kalimat motivasi
    const motivasiEl = document.querySelector('.cyber-motivasi');
    motivasiEl.style.opacity = '0';
    anime({ targets: motivasiEl, opacity: [0, 1], translateX: [-20, 0], duration: 800, delay: 1000, easing: 'easeOutQuad' });

    // 4. Animasi Fade & Loop Glow Container Tabel
    anime({
        targets: '.table-anim',
        translateY: [40, 0],
        opacity: [0, 1],
        duration: 1000,
        delay: 800,
        easing: 'easeOutExpo'
    });
    
    // Looping glow box shadow tabel
    anime({
        targets: '.cyber-table-container',
        boxShadow: ['0 0 10px rgba(176, 38, 255, 0.1)', '0 0 25px rgba(176, 38, 255, 0.3)'],
        direction: 'alternate',
        loop: true,
        easing: 'easeInOutSine',
        duration: 2500
    });

    // 5. LOGIC MODAL SLUG (1 Modal dinamis untuk semua tombol)
    const slugModal = new bootstrap.Modal(document.getElementById('slugModal'));
    const modalSlugList = document.getElementById('modalSlugList');
    const modalUserName = document.getElementById('modalUserName');
    
    // Ambil base domain saat ini (misal: ofor.site/)
    const domainPrefix = "{{ request()->getHost() }}/"; 

    document.querySelectorAll('.btn-show-slug').forEach(button => {
        button.addEventListener('click', function() {
            const userName = this.getAttribute('data-name');
            const slugs = JSON.parse(this.getAttribute('data-slugs')); // Parse json dari PHP
            
            modalUserName.textContent = userName;
            modalSlugList.innerHTML = ''; // Reset list

            if(slugs.length === 0) {
                modalSlugList.innerHTML = '<li class="list-group-item slug-list-item text-center text-muted border-0 py-4">Pengguna belum memiliki desain / slug.</li>';
            } else {
                // Generate LI HTML untuk setiap slug
                slugs.forEach(slug => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item slug-list-item d-flex justify-content-between align-items-center';
                    
                    const fullUrl = `${domainPrefix}${slug}`;
                    
                    li.innerHTML = `
                        <span class="text-truncate me-3">
                            <i class="bi bi-globe2 text-purple me-2"></i> 
                            ${fullUrl}
                        </span>
                        <a href="http://${fullUrl}" target="_blank" class="slug-link btn btn-sm btn-outline-secondary" title="Kunjungi Link">
                            Buka <i class="bi bi-box-arrow-up-right ms-1"></i>
                        </a>
                    `;
                    modalSlugList.appendChild(li);
                });
            }
            
            // Tampilkan Modal
            slugModal.show();
        });
    });

    // 6. SWEETALERT2 CYBERPUNK LOGOUT
    const btnLogoutAdmin = document.getElementById('btn-logout-admin');
    if (btnLogoutAdmin) {
        btnLogoutAdmin.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah form langsung submit
            
            Swal.fire({
                title: 'SYSTEM LOGOUT?',
                text: "Sesi Admin akan diakhiri. Anda yakin?",
                icon: 'warning',
                background: '#120b1f', // Background gelap sesuai tema
                color: '#e0e0e0',      // Teks putih keabu-abuan
                iconColor: '#b026ff',  // Icon warning berwarna ungu neon
                showCancelButton: true,
                confirmButtonColor: '#ff2a2a', // Tombol confirm merah bahaya
                cancelButtonColor: '#6D28D9',  // Tombol cancel ungu
                confirmButtonText: '<i class="bi bi-box-arrow-right"></i> Ya, Keluar',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'cyber-swal-popup' // Memanggil class CSS neon border
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user klik "Ya", jalankan fungsi submit pada form logout
                    document.getElementById('form-logout-admin').submit();
                }
            });
        });
    }

});
</script>
</body>
</html>