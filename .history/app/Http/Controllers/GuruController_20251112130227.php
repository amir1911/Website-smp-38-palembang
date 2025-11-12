<?php

namespace App\Http\Controllers;

use App\Models\Guru;

class GuruController extends Controller
{
    public function guru()
    {
        $gurus = Guru::where('kategori', 'Guru')->get();
        return view('guru.index', compact('gurus'))
            ->with('title', 'Data Guru');
    }

    public function staff()
    {
        $gurus = Guru::where('kategori', 'Staff')->get();
        return view('guru.index', compact('gurus'))
            ->with('title', 'Data Staff');
    }
}
