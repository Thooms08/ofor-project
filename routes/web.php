<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDesainController;
use App\Http\Controllers\AdminController;

// Halaman Landing Page (Beranda OFFOR.SITE)
Route::get('/', function () {
    return view('index'); 
})->name('home');

Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');
Route::get('/syarat-ketentuan', [PublicController::class, 'SyaratKetentuan'])->name('syarat-ketentuan');
Route::get('/keamanan-privasi', [PublicController::class, 'KeamananPrivasi'])->name('keamanan-privasi');
Route::get('/faq', [PublicController::class, 'faq'])->name('faq');
Route::get('/panduan', [PublicController::class, 'panduan'])->name('panduan');

// Middleware Guest (Belum Login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Middleware User (Sudah Login)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/desain/editor/{slug?}', [UserDesainController::class, 'index'])->name('desain.index');
    Route::post('/desain/store', [UserDesainController::class, 'store'])->name('desain.store');
    Route::get('/check-slug', [UserDesainController::class, 'checkSlug'])->name('desain.checkSlug');
    Route::get('/desain/{slug}', [UserDesainController::class, 'edit'])->name('desain.edit');
    Route::delete('/dashboard/desain/{id}', [UserDesainController::class, 'destroy'])->name('desain.destroy');
    Route::get('/dashboard/search', [UserController::class, 'search'])->name('user.dashboard.search');
    Route::get('/dashboard/payment', [UserController::class, 'createPayment'])->name('user.payment.create');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/{slug}', [App\Http\Controllers\UserDesainController::class, 'show'])->name('desain.show');