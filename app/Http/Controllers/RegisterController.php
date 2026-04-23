<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman form register
     */
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Memproses data registrasi user baru
     */
    public function register(Request $request)
    {
        // 1. Validasi Input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // 'confirmed' akan mengecek field 'password_confirmation'
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // 2. Cek jika validasi gagal
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        // 3. Simpan data user ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'role' tidak perlu diisi karena otomatis menjadi 'user' sesuai default di Migration
        ]);

        // 4. Return response JSON jika menggunakan AJAX
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Akun berhasil dibuat! Mengalihkan ke halaman login...',
                'redirect' => route('login') // Pastikan Anda memiliki route('login')
            ], 200);
        }

        // Return fallback jika tidak menggunakan AJAX
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }
}