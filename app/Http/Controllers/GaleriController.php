<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = \App\Models\Galeri::with('kategori')->latest()->get();
        $kategori = \App\Models\KategoriGaleri::all(); // Ambil kategori

        return view('galeri.index', compact('galeri', 'kategori'));
    }

}
