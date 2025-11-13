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
    <div class="bg-white shadow-2xl rounded-2xl p-8 mb-12 overflow-hidden border border-gray-200">
        <div class="flex items-center mb-8 pb-6 border-b-2 border-primary">
            <div class="bg-red-600 rounded-xl p-4 mr-4 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">
                    📄 Dokumen / File Pengumuman
                </h2>
                <p class="text-sm text-gray-500 mt-1">Download file PDF untuk informasi lengkap</p>
            </div>
        </div>
        
        <div class="overflow-x-auto rounded-xl shadow-lg border border-gray-200">
            <table class="min-w-full text-sm bg-white">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="px-6 py-5 text-center font-bold text-base">No</th>
                        <th class="px-6 py-5 text-left font-bold text-base">Judul Pengumuman</th>
                        <th class="px-6 py-5 text-center font-bold text-base">Kategori</th>
                        <th class="px-6 py-5 text-center font-bold text-base">Tanggal</th>
                        <th class="px-6 py-5 text-center font-bold text-base">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($pengumumanPdf as $index => $item)
                    <tr class="hover:bg-blue-50 transition-all duration-300 group">
                        <td class="px-6 py-5 text-center">
                            <div class="inline-flex items-center justify-center w-10 h-10 bg-primary text-white rounded-full font-bold shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all">
                                {{ $index + 1 }}
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-start">
                                <div class="bg-red-100 rounded-lg p-2.5 mr-3 group-hover:bg-red-200 transition-colors">
                                    <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800 group-hover:text-primary transition-colors text-base leading-relaxed">
                                        {{ $item->judul }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1.5 flex items-center">
                                        <span class="bg-red-100 text-red-700 px-2 py-0.5 rounded font-medium mr-2">PDF</span>
                                        Format: PDF Document
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-center">
                            <span class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-full text-xs font-bold shadow-md hover:shadow-lg hover:bg-blue-700 transition-all">
                                <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                                {{ $item->kategori?->nama_kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="px-6 py-5 text-center">
                            <div class="flex flex-col items-center">
                                <div class="bg-green-100 rounded-lg px-4 py-2.5 group-hover:bg-green-200 transition-colors shadow-sm">
                                    <svg class="w-4 h-4 text-green-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-xs font-semibold text-gray-700 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('pengumuman.show', $item->id) }}" 
                                   class="inline-flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Detail
                                </a>
                                <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center bg-green-600 text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:bg-green-700 transition-all duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1">
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
        <div class="mt-6 flex items-center justify-between bg-blue-50 rounded-xl p-4 border border-blue-100">
            <div class="flex items-center text-sm text-gray-700">
                <div class="bg-green-500 rounded-full w-2.5 h-2.5 mr-2 animate-pulse"></div>
                <span class="font-semibold">Total {{ $pengumumanPdf->count() }} dokumen tersedia untuk diunduh</span>
            </div>
            <div class="flex items-center space-x-2">
                <span class="bg-red-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-sm">
                    <i class="fas fa-file-pdf mr-1"></i>PDF
                </span>
                <span class="bg-green-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-sm">
                    <i class="fas fa-check-circle mr-1"></i>Verified
                </span>
            </div>
        </div>
    </div>
    @endif

    <!-- Bagian 2: Pengumuman Biasa -->
    @if ($pengumumanBiasa->count() > 0)
    <div>
        <div class="flex items-center mb-8 pb-6 border-b-2 border-primary">
            <div class="bg-blue-600 rounded-xl p-4 mr-4 shadow-lg">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">📰 Pengumuman Umum</h2>
                <p class="text-sm text-gray-500 mt-1">Informasi terkini dan update terbaru</p>
            </div>
        </div>

        <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
            @foreach ($pengumumanBiasa as $item)
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-200 group">
                <!-- Foto / Fallback -->
                <div class="relative overflow-hidden h-56 bg-primary">
                    <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                         alt="Foto Pengumuman"
                         class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-700">
                    
                    <!-- Overlay saat hover -->
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-500"></div>
                    
                    <!-- Badge Kategori -->
                    <div class="absolute top-4 right-4 z-10">
                        <span class="bg-white text-primary px-4 py-2 rounded-full text-xs font-bold shadow-lg backdrop-blur-sm">
                            {{ $item->kategori?->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>

                    <!-- Badge NEW di pojok kiri atas -->
                    <div class="absolute top-4 left-4 z-10">
                        <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg animate-pulse">
                            NEW
                        </span>
                    </div>
                </div>

                <!-- Konten -->
                <div class="p-6">
                    <!-- Tanggal -->
                    <div class="flex items-center text-xs text-gray-500 mb-3">
                        <svg class="w-4 h-4 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="font-semibold">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</span>
                    </div>

                    <!-- Judul -->
                    <h3 class="font-bold text-xl text-gray-800 mb-3 line-clamp-2 leading-tight group-hover:text-primary transition-colors duration-300">
                        {{ $item->judul }}
                    </h3>

                    <!-- Excerpt -->
                    <p class="text-sm text-gray-600 mb-5 line-clamp-3 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}
                    </p>

                    <!-- Divider -->
                    <div class="border-t border-gray-200 pt-4 mt-4">
                        <a href="{{ route('pengumuman.show', $item->id) }}" 
                           class="inline-flex items-center justify-center w-full bg-primary text-white px-6 py-3 rounded-xl text-sm font-bold hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-xl transform hover:-translate-y-1 group/button">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-4 h-4 ml-2 group-hover/button:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Footer Card -->
                {{-- <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-xs text-gray-600">
                            <svg class="w-4 h-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <span class="font-medium">Lihat Detail</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse mr-2"></span>
                            <span class="text-xs font-semibold text-green-600">Aktif</span>
                        </div>
                    </div>
                </div> --}}
            </div>
            @endforeach
        </div>

        <!-- Pagination untuk Pengumuman Biasa -->
        @if ($pengumumanBiasa instanceof \Illuminate\Pagination\LengthAwarePaginator && $pengumumanBiasa->hasPages())
        <div class="mt-12">
            <!-- Page Info di Atas -->
            <div class="text-center mb-6">
                <div class="inline-flex items-center bg-blue-50 border border-blue-200 rounded-xl px-6 py-3 shadow-sm">
                    <svg class="w-5 h-5 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm text-gray-700">
                        Menampilkan 
                        <span class="font-bold text-primary">{{ $pengumumanBiasa->firstItem() }} - {{ $pengumumanBiasa->lastItem() }}</span>
                        dari
                        <span class="font-bold text-primary">{{ $pengumumanBiasa->total() }}</span>
                        pengumuman
                    </span>
                </div>
            </div>

            <!-- Pagination Navigation -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white rounded-2xl p-6 shadow-xl border border-gray-200">
                {{-- Previous Button --}}
                <div class="flex items-center">
                    @if ($pengumumanBiasa->onFirstPage())
                        <span class="flex items-center px-5 py-3 bg-gray-200 text-gray-400 rounded-xl cursor-not-allowed font-medium">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Sebelumnya
                        </span>
                    @else
                        <a href="{{ $pengumumanBiasa->previousPageUrl() }}" 
                           class="flex items-center px-5 py-3 bg-primary text-white rounded-xl hover:bg-blue-700 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:-translate-x-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Sebelumnya
                        </a>
                    @endif
                </div>

                {{-- Page Numbers --}}
                <div class="flex items-center space-x-2">
                    @php
                        $start = max($pengumumanBiasa->currentPage() - 2, 1);
                        $end = min($pengumumanBiasa->currentPage() + 2, $pengumumanBiasa->lastPage());
                    @endphp

                    {{-- First Page --}}
                    @if ($start > 1)
                        <a href="{{ $pengumumanBiasa->url(1) }}" 
                           class="px-4 py-2 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:border-primary hover:text-primary hover:bg-blue-50 transition-all duration-300 font-medium shadow-sm hover:shadow-md">
                            1
                        </a>
                        @if ($start > 2)
                            <span class="px-2 text-gray-400 font-bold">...</span>
                        @endif
                    @endif

                    {{-- Page Range --}}
                    @for ($page = $start; $page <= $end; $page++)
                        @if ($page == $pengumumanBiasa->currentPage())
                            <span class="px-4 py-2 bg-primary text-white rounded-lg font-bold shadow-lg scale-110">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $pengumumanBiasa->url($page) }}" 
                               class="px-4 py-2 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:border-primary hover:text-primary hover:bg-blue-50 transition-all duration-300 font-medium shadow-sm hover:shadow-md">
                                {{ $page }}
                            </a>
                        @endif
                    @endfor

                    {{-- Last Page --}}
                    @if ($end < $pengumumanBiasa->lastPage())
                        @if ($end < $pengumumanBiasa->lastPage() - 1)
                            <span class="px-2 text-gray-400 font-bold">...</span>
                        @endif
                        <a href="{{ $pengumumanBiasa->url($pengumumanBiasa->lastPage()) }}" 
                           class="px-4 py-2 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:border-primary hover:text-primary hover:bg-blue-50 transition-all duration-300 font-medium shadow-sm hover:shadow-md">
                            {{ $pengumumanBiasa->lastPage() }}
                        </a>
                    @endif
                </div>

                {{-- Next Button --}}
                <div class="flex items-center">
                    @if ($pengumumanBiasa->hasMorePages())
                        <a href="{{ $pengumumanBiasa->nextPageUrl() }}" 
                           class="flex items-center px-5 py-3 bg-primary text-white rounded-xl hover:bg-blue-700 transition-all duration-300 font-medium shadow-md hover:shadow-lg transform hover:translate-x-1">
                            Selanjutnya
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    @else
                        <span class="flex items-center px-5 py-3 bg-gray-200 text-gray-400 rounded-xl cursor-not-allowed font-medium">
                            Selanjutnya
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    @endif
                </div>
            </div>

            <!-- Quick Jump di Bawah -->
            <div class="mt-6 text-center">
                <div class="inline-flex items-center bg-white border border-gray-300 rounded-xl px-4 py-3 shadow-md">
                    <span class="text-sm text-gray-600 mr-3 font-medium">Halaman:</span>
                    <select onchange="window.location.href=this.value" 
                            class="px-3 py-1.5 border-2 border-primary rounded-lg text-sm font-semibold text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent cursor-pointer hover:bg-blue-50 transition-colors">
                        @for ($i = 1; $i <= $pengumumanBiasa->lastPage(); $i++)
                            <option value="{{ $pengumumanBiasa->url($i) }}" {{ $i == $pengumumanBiasa->currentPage() ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                    <span class="text-sm text-gray-600 ml-3 font-medium">dari {{ $pengumumanBiasa->lastPage() }}</span>
                </div>
            </div>
        </div>
        @endif
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