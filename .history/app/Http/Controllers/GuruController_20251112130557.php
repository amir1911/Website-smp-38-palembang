<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // Halaman Guru
    public function guru()
    {
        $guru = Guru::where('kategori', 'guru')->get();

        return view('guru.index', [
            'title' => 'Tenaga Pendidik - Guru',
            'guru' => $guru
        ]);
    }

    // Halaman Staff
    public function staff()
    {
        $guru = Guru::where('kategori', 'staff')->get();

        return view('guru.index', [
            'title' => 'Tenaga Kependidikan - Staff',
            'guru' => $guru
        ]);
    }

    public function index()
{
    $gurus = Guru::where('kategori', 'Guru')->get();
    $staffs = Guru::where('kategori', 'Staff')->get();

    return view('guru.index', compact('gurus', 'staffs'));
}

}
