<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="OFOR.SITE - Platform pembuatan kartu digital interaktif, praktis, dan desain fleksibel.">
    <title>@yield('title', 'OFFOR.SITE - Kartu Digital Interaktif')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary-purple: #7e22ce; /* Ungu utama yang modern */
            --dark-purple: #581c87;
            --light-purple: #f3e8ff; /* Ungu pastel untuk background */
        }
        
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #333;
            background-color: #ffffff;
        }

        /* Color Helpers */
        .text-purple { color: var(--primary-purple) !important; }
        .bg-purple { background-color: var(--primary-purple) !important; }
        .bg-light-purple { background-color: var(--light-purple) !important; }

        /* Buttons */
        .btn-purple {
            background-color: var(--primary-purple);
            color: white;
            font-weight: 500;
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-purple:hover {
            background-color: var(--dark-purple);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(126, 34, 206, 0.3);
        }
        .btn-outline-purple {
            border: 2px solid var(--primary-purple);
            color: var(--primary-purple);
            font-weight: 500;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            background: transparent;
            transition: all 0.3s ease;
        }
        .btn-outline-purple:hover {
            background-color: var(--primary-purple);
            color: white;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 2px 15px rgba(0,0,0,0.04);
        }
        .navbar-brand {
            font-weight: 800;
            letter-spacing: 1px;
            color: var(--primary-purple) !important;
            font-size: 1.5rem;
        }
        .nav-link {
            font-weight: 500;
            color: #555 !important;
            margin: 0 0.5rem;
            transition: color 0.3s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary-purple) !important;
        }

        /* Cards */
        .card-feature {
            border: none;
            border-radius: 16px;
            background: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            height: 100%;
        }
        .card-feature:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(126, 34, 206, 0.15);
        }
        .icon-box {
            width: 65px;
            height: 65px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            background-color: var(--light-purple);
            color: var(--primary-purple);
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
        }

        /* Footer */
        footer {
            background-color: var(--dark-purple);
            color: white;
        }
        footer a {
            color: var(--light-purple);
            text-decoration: none;
            transition: 0.3s;
        }
        footer a:hover {
            color: white;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <i class="bi bi-layers-fill me-2"></i> OFOR.SITE
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#harga">Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                </ul>
            <div class="d-flex flex-column flex-lg-row align-items-center gap-2 mt-3 mt-lg-0">
                {{-- Jika belum login (guest), tampilkan tombol Login & Register --}}
                @guest
                    <a href="{{route('login')}}" class="btn btn-outline-purple w-100 w-lg-auto">Login</a>
                    <a href="{{route('register')}}" class="btn btn-purple w-100 w-lg-auto">Register</a>
                @endguest

                {{-- Jika sudah login (auth), tampilkan tombol Dashboard & Logout --}}
                @auth
                    <a href="{{route('user.dashboard')}}" class="btn btn-outline-purple w-100 w-lg-auto">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="w-100 w-lg-auto m-0">
                        @csrf
                        <button type="submit" class="btn btn-purple w-100">Logout</button>
                    </form>
                @endauth
            </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="py-4 mt-auto">
        <div class="container text-center text-md-start">
            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <h5 class="fw-bold mb-1"><i class="bi bi-layers-fill me-2"></i>OFOR.SITE</h5>
                    <p class="mb-0 text-white-50 small">Platform pembuat kartu digital interaktif terbaik.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 small text-white-50">
                        &copy; {{ date('Y') }} OFOR.SITE. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>