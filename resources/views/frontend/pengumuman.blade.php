@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-12">

    <!-- Judul Halaman -->
    <div class="text-center mb-14">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 tracking-tight">
            📢 Pengumuman Sekolah
        </h1>
        <p class="text-gray-500 mt-4 text-lg">
            Dapatkan informasi terbaru dari 
            <span class="font-semibold text-primary">SMPN 38 Palembang</span>
        </p>
    </div>

    <!-- Filter Kategori -->
    <div class="flex flex-wrap justify-center gap-3 mb-14">
        <a href="{{ route('pengumuman.index') }}" 
           class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 shadow-sm
           {{ !isset($kategori)
               ? 'bg-primary text-white ring-2 ring-primary'
               : 'bg-gray-100 text-gray-700 hover:bg-primary hover:text-white hover:ring-2 hover:ring-primary' }}">
           Semua
        </a>

        @foreach ($kategoriList as $kat)
            <a href="{{ route('pengumuman.byKategori', $kat->id) }}" 
               class="px-5 py-2.5 rounded-full text-sm font-medium transition-all duration-300 shadow-sm
               {{ isset($kategori) && $kategori->id == $kat->id
                   ? 'bg-primary text-white ring-2 ring-primary'
                   : 'bg-gray-100 text-gray-700 hover:bg-primary hover:text-white hover:ring-2 hover:ring-primary' }}">
                {{ $kat->nama_kategori }}
            </a>
        @endforeach
    </div>

    <!-- Bagian 1: Pengumuman dengan File PDF -->
    @if ($pengumumanPdf->count() > 0)
    <div class="bg-white shadow-xl rounded-2xl p-8 mb-16 border border-gray-100">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-1 h-7 bg-primary rounded"></div>
            <h2 class="text-2xl font-semibold text-gray-800">📄 Dokumen / File Pengumuman</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm text-left">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 border text-center">No</th>
                        <th class="px-4 py-3 border">Judul</th>
                        <th class="px-4 py-3 border">Kategori</th>
                        <th class="px-4 py-3 border">Tanggal</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($pengumumanPdf as $index => $item)
                    <tr class="border-b hover:bg-gray-50 transition">
                        <td class="px-4 py-3 text-center font-medium">{{ $index + 1 }}</td>
                        <td class="px-4 py-3">{{ $item->judul }}</td>
                        <td class="px-4 py-3">{{ $item->kategori?->nama_kategori ?? '-' }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d F Y') }}</td>
                        <td class="px-4 py-3 text-center space-x-3">
                            <a href="{{ route('pengumuman.show', $item->id) }}" 
                               class="inline-block text-blue-600 hover:text-blue-800 font-medium transition">Detail</a>
                            <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                               target="_blank" class="inline-block text-green-600 hover:text-green-800 font-medium transition">PDF</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <!-- Bagian 2: Pengumuman Umum -->
    @if ($pengumumanBiasa->count() > 0)
    <div>
        <div class="flex items-center gap-3 mb-6">
            <div class="w-1 h-7 bg-primary rounded"></div>
            <h2 class="text-2xl font-semibold text-gray-800">📰 Pengumuman Umum</h2>
        </div>

        <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
            @foreach ($pengumumanBiasa as $item)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1 overflow-hidden border border-gray-100">

                <!-- Foto Pengumuman Full -->
              @if ($item->foto)
    <img src="{{ asset('storage/' . $item->foto) }}" 
         alt="Gambar Pengumuman" 
         class="w-full aspect-[4/3] object-cover rounded-t-lg transition duration-300 hover:scale-105">
@endif


                <!-- Konten -->
                <div class="p-6">
                    <h3 class="font-bold text-xl text-primary mb-2 line-clamp-2">{{ $item->judul }}</h3>
                    <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}
                    </p>
                    <a href="{{ route('pengumuman.show', $item->id) }}" 
                       class="inline-block text-sm font-semibold text-blue-600 hover:text-blue-800 transition">
                       Baca Selengkapnya →
                    </a>
                </div>

                <!-- Footer -->
                <div class="px-6 py-3 bg-gray-50 text-xs text-gray-500 border-t flex items-center justify-between">
                  <td class="px-4 py-3">
                     {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d F Y') }}
                </td>

                    @if ($item->kategori)
                        <span class="bg-primary/10 text-primary text-[11px] px-2 py-1 rounded-md">
                            {{ $item->kategori->nama_kategori }}
                        </span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Jika Tidak Ada Pengumuman -->
    @if ($pengumumanPdf->count() == 0 && $pengumumanBiasa->count() == 0)
        <div class="text-center text-gray-500 mt-20">
            <p class="text-lg">🚫 Belum ada pengumuman untuk saat ini.</p>
        </div>
    @endif
</section>
@endsection
