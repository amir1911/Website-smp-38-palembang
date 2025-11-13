<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\KategoriPengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        // Pisahkan pengumuman PDF dan pengumuman biasa, sudah pakai PAGINATION
        $pengumumanPdf = Pengumuman::whereNotNull('file_pdf')
            ->orderBy('tanggal', 'desc')
            ->paginate(5, ['*'], 'pdf_page'); // pagination untuk PDF terpisah

        $pengumumanBiasa = Pengumuman::whereNull('file_pdf')
            ->orderBy('tanggal', 'desc')
            ->paginate(3, ['*'], 'biasa_page'); // pagination untuk card pengumuman biasa

        $kategoriList = KategoriPengumuman::all();

        return view('frontend.pengumuman', compact('pengumumanPdf', 'pengumumanBiasa', 'kategoriList'));
    }

    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('frontend.pengumuman_show', compact('pengumuman'));
    }

    public function byKategori($id)
    {
        $kategori = KategoriPengumuman::findOrFail($id);

        $pengumumanPdf = Pengumuman::where('kategori_id', $id)
            ->whereNotNull('file_pdf')
            ->orderBy('tanggal', 'desc')
            ->paginate(3, ['*'], 'pdf_page');

        $pengumumanBiasa = Pengumuman::where('kategori_id', $id)
            ->whereNull('file_pdf')
            ->orderBy('tanggal', 'desc')
            ->paginate(3, ['*'], 'biasa_page');

        $kategoriList = KategoriPengumuman::all();

        return view('frontend.pengumuman', compact('pengumumanPdf', 'pengumumanBiasa', 'kategori', 'kategoriList'));
    }
}
