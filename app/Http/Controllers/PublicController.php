<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function tentang()
    {
     return view('tentang');
    }

    public function SyaratKetentuan()
    {
        return view('syarat-ketentuan');
    }

    public function KeamananPrivasi()
    {
        return view('keamanan-privasi');
    }

    public function faq()
    {
        return view('faq');
    }

    public function panduan()
    {
        return view('panduan');
    }
}
