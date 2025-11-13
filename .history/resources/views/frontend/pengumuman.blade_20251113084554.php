@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-10">

    <!-- Judul Halaman -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-primary mb-3 animate-fade-in">Pengumuman</h1>
        <p class="text-gray-600 text-lg">Informasi terbaru dari SMPN 38 Palembang</p>
    </div>

    <!-- Filter Kategori -->
    <div class="flex flex-wrap justify-center gap-3 mb-12">
        <a href="{{ route('pengumuman.index') }}" 
           class="px-6 py-2.5 rounded-full text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-sm {{ !isset($kategori) ? 'bg-primary text-white shadow-lg' : 'bg-gray-100 hover:bg-primary hover:text-white hover:shadow-md' }}">
           Semua
        </a>

        @foreach ($kategoriList as $kat)
            <a href="{{ route('pengumuman.byKategori', $kat->id) }}" 
               class="px-6 py-2.5 rounded-full text-sm font-medium transition-all duration-300 transform hover:scale-105 shadow-sm
                      {{ isset($kategori) && $kategori->id == $kat->id ? 'bg-primary text-white shadow-lg' : 'bg-gray-100 hover:bg-primary hover:text-white hover:shadow-md' }}">
                {{ $kat->nama_kategori }}
            </a>
        @endforeach
    </div>

    <!-- Bagian 1: Pengumuman dengan File PDF -->
    @if ($pengumumanPdf->count() > 0)
    <div class="bg-white shadow-xl rounded-2xl p-8 mb-12 overflow-hidden border border-gray-100">
        <div class="flex items-center mb-6 pb-4 border-b-2 border-primary">
            <div class="bg-primary bg-opacity-10 rounded-lg p-3 mr-3">
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Dokumen / File Pengumuman</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-primary to-blue-600 text-white">
                        <th class="px-6 py-4 text-center rounded-tl-lg font-semibold">No</th>
                        <th class="px-6 py-4 text-left font-semibold">Judul</th>
                        <th class="px-6 py-4 text-left font-semibold">Kategori</th>
                        <th class="px-6 py-4 text-left font-semibold">Tanggal</th>
                        <th class="px-6 py-4 text-center rounded-tr-lg font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($pengumumanPdf as $index => $item)
                    <tr class="hover:bg-blue-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-center font-medium text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ $item->judul }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">
                                {{ $item->kategori?->nama_kategori ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            <i class="fas fa-calendar-alt mr-2 text-primary"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('pengumuman.show', $item->id) }}" 
                               class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg text-xs font-medium hover:bg-blue-700 transition-colors mr-2">
                                <i class="fas fa-eye mr-1"></i> Detail
                            </a>
                            <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                               target="_blank" 
                               class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg text-xs font-medium hover:bg-green-700 transition-colors">
                                <i class="fas fa-download mr-1"></i> Download
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <!-- Bagian 2: Pengumuman Biasa -->
    @if ($pengumumanBiasa->count() > 0)
    <div>
        <div class="flex items-center mb-6 pb-4 border-b-2 border-primary">
            <div class="bg-primary bg-opacity-10 rounded-lg p-3 mr-3">
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Pengumuman Umum</h2>
        </div>

        <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
            @foreach ($pengumumanBiasa as $item)
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                <!-- Foto / Fallback -->
                <div class="relative overflow-hidden h-48 bg-gradient-to-br from-primary to-blue-600">
                    <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                         alt="Foto Pengumuman"
                         class="h-full w-full object-cover hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-3 right-3">
                        <span class="bg-white bg-opacity-90 text-primary px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                            {{ $item->kategori?->nama_kategori ?? '-' }}
                        </span>
                    </div>
                </div>

                <!-- Konten -->
                <div class="p-6">
                    <h3 class="font-bold text-xl text-primary mb-3 line-clamp-2 hover:text-blue-700 transition-colors">
                        {{ $item->judul }}
                    </h3>
                    <p class="text-sm text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}
                    </p>
                    <a href="{{ route('pengumuman.show', $item->id) }}" 
                       class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors group">
                        Baca Selengkapnya 
                        <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Footer Card -->
                <div class="px-6 py-3 bg-gradient-to-r from-gray-50 to-gray-100 text-xs text-gray-600 flex justify-between items-center border-t">
                    <span class="flex items-center">
                        <i class="fas fa-calendar-alt mr-2 text-primary"></i> 
                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                    </span>
                    <span class="text-primary font-medium">
                        <i class="fas fa-clock mr-1"></i> Baru
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Jika Kosong -->
    @if ($pengumumanPdf->count() == 0 && $pengumumanBiasa->count() == 0)
        <div class="text-center py-16">
            <div class="bg-gray-100 rounded-full w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
            </div>
            <p class="text-gray-500 text-lg font-medium">Belum ada pengumuman untuk saat ini.</p>
            <p class="text-gray-400 text-sm mt-2">Silakan cek kembali nanti</p>
        </div>
    @endif

</section>

<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection