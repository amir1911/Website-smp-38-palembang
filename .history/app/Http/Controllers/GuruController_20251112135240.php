<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function guru()
    {
        // Menampilkan semua guru (kategori Guru)
        $gurus = Guru::where('kategori', 'Guru')->get();
        return view('guru.index', compact('gurus'));
    }

    public function staff()
    {
        // Menampilkan semua staff (kategori Staff)
        $gurus = Guru::where('kategori', 'Staff')->get();
        return view('guru.index', compact('gurus'));
    }
}
