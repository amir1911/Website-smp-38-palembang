<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use App\Models\Guru;
use App\Models\Galeri;
use App\Models\Pengumuman;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        // Jika tidak ada input
        if (!$query) {
            return redirect()->back()->with('error', 'Silakan masukkan kata kunci pencarian.');
        }

        // ✅ Ekstrakurikuler
        $ekstra = Ekstrakurikuler::select('id', 'nama_kegiatan as judul', 'deskripsi', 'foto')
            ->where('nama_kegiatan', 'like', "%{$query}%")
            ->orWhere('deskripsi', 'like', "%{$query}%")
            ->get()
            ->map(function ($item) {
                $item->tipe = 'Ekstrakurikuler';
                return $item;
            });

        // ✅ Guru
        $guru = Guru::select('id', 'nama as judul', 'jabatan as deskripsi', 'foto')
            ->where('nama', 'like', "%{$query}%")
            ->orWhere('mata_pelajaran', 'like', "%{$query}%")
            ->orWhere('jabatan', 'like', "%{$query}%")
            ->get()
            ->map(function ($item) {
                $item->tipe = 'Guru';
                return $item;
            });

        // ✅ Galeri
        $galeri = Galeri::select('id', 'judul', 'deskripsi', 'foto')
            ->where('judul', 'like', "%{$query}%")
            ->orWhere('deskripsi', 'like', "%{$query}%")
            ->get()
            ->map(function ($item) {
                $item->tipe = 'Galeri';
                return $item;
            });

        // ✅ Pengumuman
        $pengumuman = Pengumuman::select('id', 'judul', 'isi as deskripsi', 'foto')
            ->where('judul', 'like', "%{$query}%")
            ->orWhere('isi', 'like', "%{$query}%")
            ->get()
            ->map(function ($item) {
                $item->tipe = 'Pengumuman';
                $item->deskripsi = Str::limit(strip_tags($item->deskripsi), 150);
                return $item;
            });

        // ✅ Gabungkan semua hasil
        $results = collect()
            ->merge($ekstra)
            ->merge($guru)
            ->merge($galeri)
            ->merge($pengumuman);

        return view('frontend.search', compact('query', 'results'));
    }
}
