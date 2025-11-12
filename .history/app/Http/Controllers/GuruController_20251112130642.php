<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        // Ambil data guru dan staff dari database
        $gurus = Guru::where('kategori', 'Guru')->get();
        $staffs = Guru::where('kategori', 'Staff')->get();

        // Kirim ke view
        return view('guru.index', compact('gurus', 'staffs'));
    }
}
