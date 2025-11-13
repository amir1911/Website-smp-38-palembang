<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\KategoriPengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
   public function index()
{
    // Pengumuman dengan PDF
    $pengumumanPdf = Pengumuman::whereNotNull('file_pdf')
        ->orderBy('tanggal', 'desc')
        ->paginate(5, ['*'], 'pdf_page');

    // Pengumuman biasa (card)
    $pengumumanBiasa = Pengumuman::whereNull('file_pdf')
        ->orderBy('tanggal', 'desc')
        ->paginate(9, ['*'], 'biasa_page');

    $kategoriList = KategoriPengumuman::all();

    return view('frontend.pengumuman', compact('pengumumanPdf', 'pengumumanBiasa', 'kategoriList'));
}


public function byKategori($id)
{
    $kategori = KategoriPengumuman::findOrFail($id);

    $pengumumanPdf = Pengumuman::where('kategori_id', $id)
        ->whereNotNull('file_pdf')
        ->orderBy('tanggal', 'desc')
        ->paginate(5, ['*'], 'pdf_page');

    $pengumumanBiasa = Pengumuman::where('kategori_id', $id)
        ->whereNull('file_pdf')
        ->orderBy('tanggal', 'desc')
        ->paginate(, ['*'], 'biasa_page');

    $kategoriList = KategoriPengumuman::all();

    return view('frontend.pengumuman', compact('pengumumanPdf', 'pengumumanBiasa', 'kategori', 'kategoriList'));
}

}
