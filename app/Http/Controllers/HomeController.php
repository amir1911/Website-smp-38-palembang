<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Pengumuman;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data aktif dari database
        $carousels = Carousel::where('aktif', true)->orderBy('urutan')->get();
        $pengumuman = Pengumuman::where('status', true)
            ->orderBy('tanggal', 'desc')
            ->take(6)
            ->get();

        return view('home', compact('carousels', 'pengumuman'));
    }

   
}
