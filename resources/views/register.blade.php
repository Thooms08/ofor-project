@extends('layouts.app') @section('title', 'Buat Akun | OFFOR.SITE')

@section('content')
<div class="container py-5 min-vh-100 d-flex align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-md-8 col-lg-5">
            
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="bg-purple py-2"></div>
                
                <div class="card-body p-4 p-md-5 bg-white">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-purple mb-2">Buat Akun</h2>
                        <p class="text-muted small">Bergabunglah dan buat kartu interaktifmu sekarang!</p>
                    </div>

                    <div id="alertSuccess" class="alert alert-success d-none text-center rounded-3 mb-4" role="alert">
                    </div>

                    <form id="formRegister" method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label fw-medium text-secondary small">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-lg rounded-3" id="name" name="name" placeholder="Masukkan nama Anda">
                            <div class="invalid-feedback" id="error-name"></div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-medium text-secondary small">Email</label>
                            <input type="email" class="form-control form-control-lg rounded-3" id="email" name="email" placeholder="nama@email.com">
                            <div class="invalid-feedback" id="error-email"></div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-medium text-secondary small">Password</label>
                            <input type="password" class="form-control form-control-lg rounded-3" id="password" name="password" placeholder="Minimal 6 karakter">
                            <div class="invalid-feedback" id="error-password"></div>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-medium text-secondary small">Konfirmasi Password</label>
                            <input type="password" class="form-control form-control-lg rounded-3" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password">
                            <div class="invalid-feedback" id="error-password_confirmation"></div>
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" id="btnSubmit" class="btn btn-purple btn-lg fw-bold rounded-3 shadow-sm">
                                Daftar Sekarang
                            </button>
                        </div>

                        <div class="text-center">
                            <p class="text-muted small mb-0">
                                Sudah punya akun? <a href="{{ route('login') }}" class="text-purple fw-bold text-decoration-none">Login di sini</a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formRegister');
    const btnSubmit = document.getElementById('btnSubmit');
    const alertSuccess = document.getElementById('alertSuccess');

    form.addEventListener('submit', async function (e) {
        e.preventDefault(); // Mencegah form reload

        // Reset Error State
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('.invalid-feedback').forEach(el => el.innerHTML = '');
        alertSuccess.classList.add('d-none');

        // Ubah state tombol menjadi loading
        const originalBtnText = btnSubmit.innerHTML;
        btnSubmit.disabled = true;
        btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Memproses...';

        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // Menandakan ini request AJAX ke Laravel
                    'Accept': 'application/json'
                },
                body: formData
            });

            const result = await response.json();

            if (response.status === 422) {
                // Tangkap error validasi
                for (const field in result.errors) {
                    const inputField = document.getElementById(field);
                    const errorBox = document.getElementById('error-' + field);
                    
                    if (inputField && errorBox) {
                        inputField.classList.add('is-invalid');
                        errorBox.innerHTML = result.errors[field][0]; // Ambil pesan error pertama
                    }
                }
            } else if (response.ok) {
                // Jika sukses
                alertSuccess.classList.remove('d-none');
                alertSuccess.innerHTML = result.message;
                form.reset();
                
                // Redirect setelah 2 detik
                setTimeout(() => {
                    window.location.href = result.redirect;
                }, 2000);
            } else {
                throw new Error('Terjadi kesalahan pada server.');
            }
        } catch (error) {
            alert('Gagal memproses data. Silakan coba lagi.');
            console.error(error);
        } finally {
            // Kembalikan tombol ke state awal jika tidak sukses/sedang error
            if (alertSuccess.classList.contains('d-none')) {
                btnSubmit.disabled = false;
                btnSubmit.innerHTML = originalBtnText;
            }
        }
    });
});
</script>
@endsection