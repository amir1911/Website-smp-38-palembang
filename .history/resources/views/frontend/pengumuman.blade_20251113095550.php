@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Header Section --}}
    <div class="text-center mb-12 animate-fade-in">
        <h1 class="text-4xl font-bold text-primary mb-3">Pengumuman</h1>
        <p class="text-gray-600 text-lg">Informasi terbaru dari SMPN 38 Palembang</p>
    </div>

    {{-- Filter Kategori --}}
    <div class="flex flex-wrap justify-center gap-3 mb-12">
        <a href="{{ route('pengumuman.index') }}" 
           class="px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 transform hover:scale-105 shadow-sm 
                  {{ !isset($kategori) ? 'bg-primary text-white shadow-lg' : 'bg-white hover:bg-primary hover:text-white border-2 border-gray-200' }}">
           Semua
        </a>

        @foreach ($kategoriList as $kat)
            <a href="{{ route('pengumuman.byKategori', $kat->id) }}" 
               class="px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 transform hover:scale-105 shadow-sm
                      {{ isset($kategori) && $kategori->id == $kat->id ? 'bg-primary text-white shadow-lg' : 'bg-white hover:bg-primary hover:text-white border-2 border-gray-200' }}">
                {{ $kat->nama_kategori }}
            </a>
        @endforeach
    </div>

    {{-- Section: Pengumuman dengan File PDF --}}
    @if ($pengumumanPdf->count() > 0)
    <div class="bg-white shadow-2xl rounded-2xl p-6 lg:p-8 mb-12 border border-gray-100">
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-8 pb-6 border-b-2 border-primary">
            <div class="bg-red-600 rounded-xl p-4 shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-800">📄 Dokumen Pengumuman</h2>
                <p class="text-sm text-gray-500 mt-1">Download file PDF untuk informasi lengkap</p>
            </div>
        </div>
        
        {{-- Table --}}
        <div class="overflow-x-auto rounded-xl shadow-md border border-gray-200">
            <table class="min-w-full text-sm bg-white">
                <thead>
                    <tr class="bg-primary text-white">
                        <th class="px-4 py-4 text-center font-bold whitespace-nowrap">No</th>
                        <th class="px-4 py-4 text-left font-bold">Judul Pengumuman</th>
                        <th class="px-4 py-4 text-center font-bold whitespace-nowrap">Kategori</th>
                        <th class="px-4 py-4 text-center font-bold whitespace-nowrap">Tanggal</th>
                        <th class="px-4 py-4 text-center font-bold whitespace-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($pengumumanPdf as $index => $item)
                    <tr class="hover:bg-blue-50 transition-all duration-200 group">
                        <td class="px-4 py-4 text-center">
                            <div class="inline-flex items-center justify-center w-10 h-10 bg-primary text-white rounded-full font-bold shadow-md group-hover:shadow-lg group-hover:scale-110 transition-all">
                                {{ $index + 1 }}
                            </div>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-start gap-3">
                                <div class="bg-red-100 rounded-lg p-2 group-hover:bg-red-200 transition-colors shrink-0">
                                    <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="min-w-0">
                                    <p class="font-bold text-gray-800 group-hover:text-primary transition-colors leading-relaxed">
                                        {{ $item->judul }}
                                    </p>
                                    <span class="inline-block bg-red-100 text-red-700 px-2 py-0.5 rounded text-xs font-semibold mt-1">PDF</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center bg-blue-600 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-sm hover:shadow-md hover:bg-blue-700 transition-all whitespace-nowrap">
                                {{ $item->kategori?->nama_kategori ?? 'Umum' }}
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex flex-col items-center">
                                <div class="bg-green-100 rounded-lg px-3 py-2 group-hover:bg-green-200 transition-colors shadow-sm">
                                    <svg class="w-4 h-4 text-green-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-xs font-semibold text-gray-700 whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center justify-center gap-2 flex-wrap">
                                <a href="{{ route('pengumuman.show', $item->id) }}" 
                                   class="inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Detail
                                </a>
                                <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center bg-green-600 text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-green-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 whitespace-nowrap">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
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

        {{-- Footer Info --}}
        <div class="mt-6 bg-white rounded-2xl p-6 border-2 border-gray-200 shadow-md">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                {{-- Left: Document Count --}}
                <div class="flex items-center gap-4">
                    <div class="bg-blue-100 rounded-xl p-3">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-primary">{{ $pengumumanPdf->count() }}</p>
                        <p class="text-sm text-gray-600 font-medium">Dokumen Tersedia</p>
                    </div>
                </div>

                {{-- Middle: Status Badges --}}
                <div class="flex flex-wrap items-center gap-3">
                    <div class="flex items-center bg-red-50 border-2 border-red-200 rounded-xl px-4 py-2.5 gap-2">
                        <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm font-bold text-red-700">Format PDF</span>
                    </div>
                    
                    <div class="flex items-center bg-green-50 border-2 border-green-200 rounded-xl px-4 py-2.5 gap-2">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm font-bold text-green-700">Terverifikasi</span>
                    </div>
                </div>

                {{-- Right: Download Info --}}
                <div class="flex items-center gap-2 bg-blue-50 rounded-xl px-4 py-3 border border-blue-200">
                    <div class="bg-green-500 rounded-full w-2 h-2 animate-pulse"></div>
                    <span class="text-sm font-semibold text-gray-700">Siap diunduh</span>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Section: Pengumuman Umum --}}
    @if ($pengumumanBiasa->count() > 0)
    <div>
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-8 pb-6 border-b-2 border-primary">
            <div class="bg-blue-600 rounded-xl p-4 shadow-lg">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-800">📰 Pengumuman Umum</h2>
                <p class="text-sm text-gray-500 mt-1">Informasi terkini dan update terbaru</p>
            </div>
        </div>

        {{-- Grid Cards --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach ($pengumumanBiasa as $item)
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-gray-100 group">
                {{-- Image --}}
                <div class="relative overflow-hidden h-52 bg-gray-200">
                    <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                         alt="{{ $item->judul }}"
                         class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-700">
                    
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-500"></div>
                    
                    {{-- Badges --}}
                    <div class="absolute top-3 right-3 z-10">
                        <span class="bg-white text-primary px-3 py-1.5 rounded-full text-xs font-bold shadow-lg">
                            {{ $item->kategori?->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>
                    <div class="absolute top-3 left-3 z-10">
                        <span class="bg-red-600 text-white px-2.5 py-1 rounded-full text-xs font-bold shadow-lg animate-pulse">
                            NEW
                        </span>
                    </div>
                </div>

                {{-- Content --}}
                <div class="p-5">
                    {{-- Date --}}
                    <div class="flex items-center text-xs text-gray-500 mb-3">
                        <svg class="w-4 h-4 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="font-semibold">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</span>
                    </div>

                    {{-- Title --}}
                    <h3 class="font-bold text-lg text-gray-800 mb-3 line-clamp-2 leading-tight group-hover:text-primary transition-colors duration-300">
                        {{ $item->judul }}
                    </h3>

                    {{-- Excerpt --}}
                    <p class="text-sm text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}
                    </p>

                    {{-- Button --}}
                    <a href="{{ route('pengumuman.show', $item->id) }}" 
                       class="inline-flex items-center justify-center w-full bg-primary text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-blue-700 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 group/btn">
                        <span>Baca Selengkapnya</span>
                        <svg class="w-4 h-4 ml-2 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if ($pengumumanBiasa instanceof \Illuminate\Pagination\LengthAwarePaginator && $pengumumanBiasa->hasPages())
        <div class="mt-12 space-y-6">
            {{-- Info --}}
            <div class="text-center">
                <div class="inline-flex items-center bg-blue-50 border-2 border-blue-200 rounded-xl px-5 py-3 shadow-sm">
                    <svg class="w-5 h-5 text-primary mr-2 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm text-gray-700">
                        Menampilkan 
                        <span class="font-bold text-primary">{{ $pengumumanBiasa->firstItem() }}-{{ $pengumumanBiasa->lastItem() }}</span>
                        dari
                        <span class="font-bold text-primary">{{ $pengumumanBiasa->total() }}</span>
                        pengumuman
                    </span>
                </div>
            </div>

            {{-- Navigation --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white rounded-2xl p-5 lg:p-6 shadow-xl border border-gray-200">
                {{-- Previous --}}
                @if ($pengumumanBiasa->onFirstPage())
                    <span class="flex items-center px-5 py-2.5 bg-gray-200 text-gray-400 rounded-xl cursor-not-allowed font-semibold text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Sebelumnya
                    </span>
                @else
                    <a href="{{ $pengumumanBiasa->previousPageUrl() }}" 
                       class="flex items-center px-5 py-2.5 bg-primary text-white rounded-xl hover:bg-blue-700 transition-all duration-300 font-semibold text-sm shadow-md hover:shadow-lg transform hover:-translate-x-1">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Sebelumnya
                    </a>
                @endif

                {{-- Numbers --}}
                <div class="flex items-center gap-2 flex-wrap justify-center">
                    @php
                        $start = max($pengumumanBiasa->currentPage() - 2, 1);
                        $end = min($pengumumanBiasa->currentPage() + 2, $pengumumanBiasa->lastPage());
                    @endphp

                    @if ($start > 1)
                        <a href="{{ $pengumumanBiasa->url(1) }}" 
                           class="px-3 py-2 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:border-primary hover:text-primary hover:bg-blue-50 transition-all font-semibold text-sm shadow-sm hover:shadow-md">
                            1
                        </a>
                        @if ($start > 2)
                            <span class="px-2 text-gray-400 font-bold">...</span>
                        @endif
                    @endif

                    @for ($page = $start; $page <= $end; $page++)
                        @if ($page == $pengumumanBiasa->currentPage())
                            <span class="px-3 py-2 bg-primary text-white rounded-lg font-bold shadow-lg text-sm">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $pengumumanBiasa->url($page) }}" 
                               class="px-3 py-2 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:border-primary hover:text-primary hover:bg-blue-50 transition-all font-semibold text-sm shadow-sm hover:shadow-md">
                                {{ $page }}
                            </a>
                        @endif
                    @endfor

                    @if ($end < $pengumumanBiasa->lastPage())
                        @if ($end < $pengumumanBiasa->lastPage() - 1)
                            <span class="px-2 text-gray-400 font-bold">...</span>
                        @endif
                        <a href="{{ $pengumumanBiasa->url($pengumumanBiasa->lastPage()) }}" 
                           class="px-3 py-2 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:border-primary hover:text-primary hover:bg-blue-50 transition-all font-semibold text-sm shadow-sm hover:shadow-md">
                            {{ $pengumumanBiasa->lastPage() }}
                        </a>
                    @endif
                </div>

                {{-- Next --}}
                @if ($pengumumanBiasa->hasMorePages())
                    <a href="{{ $pengumumanBiasa->nextPageUrl() }}" 
                       class="flex items-center px-5 py-2.5 bg-primary text-white rounded-xl hover:bg-blue-700 transition-all duration-300 font-semibold text-sm shadow-md hover:shadow-lg transform hover:translate-x-1">
                        Selanjutnya
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @else
                    <span class="flex items-center px-5 py-2.5 bg-gray-200 text-gray-400 rounded-xl cursor-not-allowed font-semibold text-sm">
                        Selanjutnya
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                @endif
            </div>

            {{-- Quick Jump --}}
            <div class="text-center">
                <div class="inline-flex items-center bg-white border-2 border-gray-300 rounded-xl px-4 py-3 shadow-md">
                    <span class="text-sm text-gray-600 mr-3 font-semibold">Halaman:</span>
                    <select onchange="window.location.href=this.value" 
                            class="px-3 py-1.5 border-2 border-primary rounded-lg text-sm font-bold text-primary focus:outline-none focus:ring-2 focus:ring-primary cursor-pointer hover:bg-blue-50 transition-colors">
                        @for ($i = 1; $i <= $pengumumanBiasa->lastPage(); $i++)
                            <option value="{{ $pengumumanBiasa->url($i) }}" {{ $i == $pengumumanBiasa->currentPage() ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                    <span class="text-sm text-gray-600 ml-3 font-semibold">dari {{ $pengumumanBiasa->lastPage() }}</span>
                </div>
            </div>
        </div>
        @endif
    </div>
    @endif

    {{-- Empty State --}}
    @if ($pengumumanPdf->count() == 0 && $pengumumanBiasa->count() == 0)
        <div class="text-center py-20">
            <div class="bg-gray-100 rounded-full w-24 h-24 mx-auto mb-6 flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
            </div>
            <p class="text-gray-500 text-lg font-semibold">Belum ada pengumuman untuk saat ini</p>
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