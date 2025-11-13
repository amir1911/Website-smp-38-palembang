<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\KategoriPengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        // Pisahkan pengumuman berdasarkan ada atau tidaknya file PDF
        $pengumumanPdf = Pengumuman::whereNotNull('file_pdf')
            ->orderBy('tanggal', 'desc')
            ->get();

        $pengumumanBiasa = Pengumuman::whereNull('file_pdf')
            ->orderBy('tanggal', 'desc')
            ->get();

        // Ambil semua kategori untuk navigasi/filter
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

        // Filter berdasarkan kategori yang dipilih
        $pengumumanPdf = Pengumuman::where('kategori_id', $id)
            ->whereNotNull('file_pdf')
            ->orderBy('tanggal', 'desc')
            ->get();

        $pengumumanBiasa = Pengumuman::where('kategori_id', $id)
            ->whereNull('file_pdf')
            ->orderBy('tanggal', 'desc')
            ->get();

        $kategoriList = KategoriPengumuman::all();

        return view('frontend.pengumuman', compact('pengumumanPdf', 'pengumumanBiasa', 'kategori', 'kategoriList'));
    }
}
