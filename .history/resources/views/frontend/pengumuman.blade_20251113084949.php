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
    <div class="bg-gradient-to-br from-white to-gray-50 shadow-2xl rounded-3xl p-8 mb-12 overflow-hidden border-2 border-gray-100">
        <div class="flex items-center mb-8 pb-6 border-b-2 border-gradient-to-r from-primary via-blue-500 to-primary">
            <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-4 mr-4 shadow-xl">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-bold bg-gradient-to-r from-primary to-blue-600 bg-clip-text text-transparent">
                    📄 Dokumen / File Pengumuman
                </h2>
                <p class="text-sm text-gray-500 mt-1">Download file PDF untuk informasi lengkap</p>
            </div>
        </div>
        
        <div class="overflow-x-auto rounded-2xl shadow-lg">
            <table class="min-w-full text-sm bg-white">
                <thead>
                    <tr class="bg-gradient-to-r from-primary via-blue-600 to-primary text-white">
                        <th class="px-6 py-5 text-center font-bold text-base">No</th>
                        <th class="px-6 py-5 text-left font-bold text-base">Judul Pengumuman</th>
                        <th class="px-6 py-5 text-center font-bold text-base">Kategori</th>
                        <th class="px-6 py-5 text-center font-bold text-base">Tanggal</th>
                        <th class="px-6 py-5 text-center font-bold text-base">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($pengumumanPdf as $index => $item)
                    <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 group">
                        <td class="px-6 py-5 text-center">
                            <div class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-br from-primary to-blue-600 text-white rounded-full font-bold shadow-md group-hover:scale-110 transition-transform">
                                {{ $index + 1 }}
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-start">
                                <div class="bg-red-100 rounded-lg p-2 mr-3 group-hover:bg-red-200 transition-colors">
                                    <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800 group-hover:text-primary transition-colors text-base">
                                        {{ $item->judul }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        <i class="fas fa-file-pdf text-red-500 mr-1"></i>
                                        Format: PDF Document
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-center">
                            <span class="inline-flex items-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-md hover:shadow-lg transition-all">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                {{ $item->kategori?->nama_kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="px-6 py-5 text-center">
                            <div class="flex flex-col items-center">
                                <div class="bg-green-100 rounded-lg px-3 py-2 group-hover:bg-green-200 transition-colors">
                                    <svg class="w-4 h-4 text-green-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-xs font-semibold text-gray-700">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('pengumuman.show', $item->id) }}" 
                                   class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1 hover:scale-105">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Detail
                                </a>
                                <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-700 text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:from-green-700 hover:to-emerald-800 transition-all duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1 hover:scale-105">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Footer Info -->
        <div class="mt-6 flex items-center justify-between bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4">
            <div class="flex items-center text-sm text-gray-600">
                <div class="bg-green-500 rounded-full w-2 h-2 mr-2 animate-pulse"></div>
                <span class="font-medium">Total {{ $pengumumanPdf->count() }} dokumen tersedia untuk diunduh</span>
            </div>
            <div class="flex items-center space-x-2">
                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">
                    <i class="fas fa-file-pdf mr-1"></i>PDF
                </span>
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">
                    <i class="fas fa-check-circle mr-1"></i>Verified
                </span>
            </div>
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