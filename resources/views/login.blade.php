@extends('layouts.app')

@section('title', 'Masuk ke Akun | OFFOR.SITE')

@section('content')
<div class="container py-5 min-vh-100 d-flex align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-md-8 col-lg-5">
            
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="bg-purple py-2"></div>
                
                <div class="card-body p-4 p-md-5 bg-white">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-purple mb-2">Masuk ke Akun</h2>
                        <p class="text-muted small">Selamat datang kembali! Silakan masuk untuk membuat kartu digital Mu Bro!.</p>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger rounded-3 small">
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium text-secondary small">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope text-muted"></i>
                                </span>
                                <input type="email" class="form-control form-control-lg bg-light border-start-0 rounded-end-3" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-medium text-secondary small">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock text-muted"></i>
                                </span>
                                <input type="password" class="form-control form-control-lg bg-light border-start-0 border-end-0" id="password" name="password" placeholder="Masukkan password" required>
                                <button class="btn btn-light bg-light border border-start-0 rounded-end-3" type="button" id="togglePassword">
                                    <i class="bi bi-eye-slash text-muted" id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input border-secondary" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label text-muted small" for="remember">Ingat Saya</label>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-purple btn-lg fw-bold rounded-3 shadow-sm">
                                Masuk
                            </button>
                        </div>
                    </form>

                    <div class="position-relative my-4 text-center">
                        <hr class="text-muted opacity-25">
                        <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted small">Atau</span>
                    </div>

                    <div class="d-grid gap-2 mb-4">
                        <a href="{{ route('google.login') }}" class="btn btn-outline-dark btn-lg rounded-3 d-flex align-items-center justify-content-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="20px" height="20px">
                                <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
                                <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/>
                                <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/>
                                <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/>
                            </svg>
                            Login dengan Google
                        </a>
                    </div>

                    <div class="text-center">
                        <p class="text-muted small mb-0">
                            Belum punya akun? <a href="{{ route('register') }}" class="text-purple fw-bold text-decoration-none">Register di sini</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        togglePassword.addEventListener('click', function () {
            // Cek tipe input saat ini
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Ganti Ikon (bi-eye / bi-eye-slash)
            if (type === 'text') {
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        });
    });
</script>
@endsection