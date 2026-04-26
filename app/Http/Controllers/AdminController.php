<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Total User (Kecuali Admin)
        $totalUser = User::where('role', '!=', 'admin')->count();

        // 2. User Sudah Bayar (Unique User)
        $userSudahBayar = DB::table('user_payments')
            ->where('status', 'success')
            ->distinct('user_id')
            ->count('user_id');

        // 3. User Belum Bayar
        $userBelumBayar = DB::table('users')
            ->where('role', '!=', 'admin')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('user_payments')
                      ->whereColumn('user_payments.user_id', 'users.id')
                      ->where('status', 'success');
            })
            ->count();

        $usersData = User::where('role', 'user')
            ->select('id', 'name', 'email') // Hanya ambil kolom yang dibutuhkan
            ->withCount('desains as total_aktivitas') // Alias count sebagai total_aktivitas
            ->with(['desains' => function ($query) {
                $query->select('user_id', 'slug'); // Hanya load user_id dan slug untuk menghemat memori
            }])
            ->get();

        // Kumpulan Quotes Motivasi Cyberpunk/Hacker style
        $quotes = [
            "Kode yang baik adalah seni. Tetap optimalkan sistem!",
            "Hari ini adalah hari yang bagus untuk merilis fitur baru.",
            "Amankan server, puaskan user.",
            "Debugging adalah investigasi di mana Anda adalah pembunuhnya.",
            "Data mengalir secepat pikiran. Selamat bekerja, Admin."
        ];
        $motivasi = $quotes[array_rand($quotes)];

        return view('admin.index', compact('totalUser', 'userSudahBayar', 'userBelumBayar', 'motivasi', 'usersData'));
    }
}