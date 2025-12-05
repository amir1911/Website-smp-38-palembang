<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function guru()
    {
        // Menampilkan semua guru (kategori Guru) + Pagination
        $gurus = Guru::where('kategori', 'Guru')->paginate(9);
        return view('guru.index', compact('gurus'));
    }

    public function staff()
    {
        // Menampilkan semua staff (kategori Staff) + Pagination
        $gurus = Guru::where('kategori', 'Staff')->paginate(9);
        return view('guru.index', compact('gurus'));
    }
}
