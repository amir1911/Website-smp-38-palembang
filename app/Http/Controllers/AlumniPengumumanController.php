<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;

class AlumniPengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::where('status', true)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('alumni.pengumuman', compact('pengumuman'));
    }
}
