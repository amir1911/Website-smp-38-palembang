<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Ekstrakurikuler;
use App\Models\Statistik;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    // ========================
    // Halaman utama (home)
    // ========================
    public function index()
    {
        $carousels = Carousel::where('aktif', true)
            ->orderBy('urutan', 'asc')
            ->get();

        $ekstrakurikulers = Ekstrakurikuler::orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $statistik = Statistik::first();

        return view('frontend.home', compact('carousels', 'ekstrakurikulers', 'statistik'));
    }

    // ========================
    // Endpoint pencarian AJAX
    // ========================
    public function searchEkstrakurikuler(Request $request)
    {
        $keyword = $request->input('search');

        $results = Ekstrakurikuler::when($keyword, function ($query, $keyword) {
                $query->where('nama', 'like', "%{$keyword}%")
                      ->orWhere('deskripsi', 'like', "%{$keyword}%");
            })
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return response()->json($results);
    }
}
