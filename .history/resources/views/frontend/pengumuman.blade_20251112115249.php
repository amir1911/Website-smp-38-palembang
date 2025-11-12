@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-10">

    <!-- Judul Halaman -->
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-primary">Pengumuman</h1>
        <p class="text-gray-600 mt-2">Informasi terbaru dari SMPN 38 Palembang</p>
    </div>

    <!-- Filter Kategori -->
    <div class="flex flex-wrap justify-center gap-3 mb-10">
        <a href="{{ route('pengumuman.index') }}" 
           class="px-4 py-2 rounded-full text-sm font-medium {{ !isset($kategori) ? 'bg-primary text-white' : 'bg-gray-200 hover:bg-primary hover:text-white' }}">
           Semua
        </a>

        @foreach ($kategoriList as $kat)
            <a href="{{ route('pengumuman.byKategori', $kat->id) }}" 
               class="px-4 py-2 rounded-full text-sm font-medium 
                      {{ isset($kategori) && $kategori->id == $kat->id ? 'bg-primary text-white' : 'bg-gray-200 hover:bg-primary hover:text-white' }}">
                {{ $kat->nama_kategori }}
            </a>
        @endforeach
    </div>

    <!-- Bagian 1: Pengumuman dengan File PDF -->
    @if ($pengumumanPdf->count() > 0)
    <div class="bg-white shadow-md rounded-lg p-6 mb-10 overflow-x-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">📄 Dokumen / File Pengumuman</h2>
        <table class="min-w-full border border-gray-200 text-sm text-left">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-4 py-2 border text-center">No</th>
                    <th class="px-4 py-2 border">Judul</th>
                    <th class="px-4 py-2 border">Kategori</th>
                    <th class="px-4 py-2 border">Tanggal</th>
                    <th class="px-4 py-2 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengumumanPdf as $index => $item)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border font-semibold">{{ $item->judul }}</td>
                    <td class="px-4 py-2 border">{{ $item->kategori?->nama_kategori ?? '-' }}</td>
                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('pengumuman.show', $item->id) }}" 
                           class="text-blue-600 hover:underline">Detail</a> |
                        <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                           target="_blank" class="text-green-600 hover:underline">Download PDF</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <!-- Bagian 2: Pengumuman Biasa -->
    @if ($pengumumanBiasa->count() > 0)
    <div>
        <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">📰 Pengumuman Umum</h2>

        <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
            @foreach ($pengumumanBiasa as $item)
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition">
                <!-- Foto / Fallback -->
                <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                     alt="Foto Pengumuman"
                     class="h-48 w-full object-cover">

                <!-- Konten -->
                <div class="p-4">
                    <h3 class="font-bold text-lg text-primary mb-2">{{ $item->judul }}</h3>
                    <p class="text-sm text-gray-600 mb-3">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}
                    </p>
                    <a href="{{ route('pengumuman.show', $item->id) }}" 
                       class="text-sm text-blue-600 hover:underline">Baca Selengkapnya →</a>
                </div>

                <!-- Footer Card -->
                <div class="px-4 py-2 bg-gray-100 text-xs text-gray-500 flex justify-between items-center">
                    <span><i class="fas fa-calendar-alt mr-1"></i> {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</span>
                    <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded">{{ $item->kategori?->nama_kategori ?? '-' }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Jika Kosong -->
    @if ($pengumumanPdf->count() == 0 && $pengumumanBiasa->count() == 0)
        <p class="text-center text-gray-500 mt-10">Belum ada pengumuman untuk saat ini.</p>
    @endif

</section>
@endsection
