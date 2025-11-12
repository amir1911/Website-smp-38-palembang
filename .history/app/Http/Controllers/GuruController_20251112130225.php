<?php

namespace App\Http\Controllers;

use App\Models\Guru;

// Controller
public function guru() {
    $guru = Guru::where('kategori', 'guru')->get();
    return view('guru.index', [
        'title' => 'Tenaga Pendidik - Guru',
        'guru' => $guru
    ]);
}

public function staff() {
    $guru = Guru::where('kategori', 'staff')->get();
    return view('guru.index', [
        'title' => 'Tenaga Pendidik - Staff',
        'guru' => $guru
    ]);
}

