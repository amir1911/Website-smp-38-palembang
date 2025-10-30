<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    // Halaman utama Guru
    public function index()
    {
        $gurus = Guru::all();
        return view('guru.index', compact('gurus'));
    }
}
