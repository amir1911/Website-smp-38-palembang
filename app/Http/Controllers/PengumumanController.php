<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::orderBy('tanggal', 'desc')->get();
        return view('frontend.pengumuman', compact('pengumuman'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('frontend.pengumuman_show', compact('pengumuman'));
    }

    public function byKategori($id)
{
    $kategori = \App\Models\KategoriPengumuman::findOrFail($id);
    $pengumuman = \App\Models\Pengumuman::where('kategori_id', $id)->orderBy('tanggal', 'desc')->get();

    return view('frontend.pengumuman', compact('pengumuman', 'kategori'));
}
}
