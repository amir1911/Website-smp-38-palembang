<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Ekstrakurikuler;
use App\Models\Statistik; // ⬅️ Tambahkan ini
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        // Ambil data carousel yang aktif
        $carousels = Carousel::where('aktif', true)
            ->orderBy('urutan', 'asc')
            ->get();

        // Ambil data ekstrakurikuler terbaru
        $ekstrakurikulers = Ekstrakurikuler::orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        // Ambil data statistik (baris pertama saja)
        $statistik = Statistik::first();

        // Kirim semua data ke view
        return view('frontend.home', compact('carousels', 'ekstrakurikulers', 'statistik'));
    }
}
