@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header Section --}}
        <div class="text-center mb-16 animate-fade-in">
            <div class="inline-block mb-4">
                <span class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg">
                    📢 Informasi Terkini
                </span>
            </div>
            <h1 class="text-5xl md:text-6xl font-extrabold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent mb-4">
                Pengumuman
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Dapatkan informasi terbaru dan penting dari SMPN 38 Palembang
            </p>
        </div>

        {{-- Filter Kategori --}}
        <div class="flex flex-wrap justify-center gap-3 mb-16">
            <a href="{{ route('pengumuman.index') }}" 
               class="group relative px-8 py-3 rounded-full text-sm font-bold transition-all duration-300 transform hover:scale-105 overflow-hidden
                      {{ !isset($kategori) ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-xl' : 'bg-white hover:bg-gray-50 text-gray-700 border-2 border-gray-200 shadow-md' }}">
                <span class="relative z-10">Semua Kategori</span>
                @if(!isset($kategori))
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                @endif
            </a>

            @foreach ($kategoriList as $kat)
                <a href="{{ route('pengumuman.byKategori', $kat->id) }}" 
                   class="group relative px-8 py-3 rounded-full text-sm font-bold transition-all duration-300 transform hover:scale-105 overflow-hidden
                          {{ isset($kategori) && $kategori->id == $kat->id ? 'bg-gradient-to-r from-blue-600 to-indigo-600 text-white shadow-xl' : 'bg-white hover:bg-gray-50 text-gray-700 border-2 border-gray-200 shadow-md' }}">
                    <span class="relative z-10">{{ $kat->nama_kategori }}</span>
                    @if(isset($kategori) && $kategori->id == $kat->id)
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    @endif
                </a>
            @endforeach
        </div>

        {{-- Section: Pengumuman dengan File PDF --}}
        @if ($pengumumanPdf->count() > 0)
        <div class="mb-16 animate-slide-up">
            <div class="bg-white backdrop-blur-lg bg-opacity-90 shadow-2xl rounded-3xl p-8 border border-gray-100 hover:shadow-3xl transition-shadow duration-500">
                
                {{-- Header --}}
                <div class="flex flex-col sm:flex-row items-center gap-6 mb-10 pb-8 border-b-2 border-gradient">
                    <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-5 shadow-2xl transform hover:rotate-3 transition-transform duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="text-center sm:text-left">
                        <h2 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-red-600 to-pink-600 bg-clip-text text-transparent mb-2">
                            📄 Dokumen Pengumuman
                        </h2>
                        <p class="text-gray-500 font-medium">Download file PDF untuk informasi lengkap</p>
                    </div>
                </div>
                
                {{-- Table --}}
                <div class="overflow-x-auto rounded-2xl shadow-xl border-2 border-gray-100">
                    <table class="min-w-full text-sm bg-white">
                        <thead>
                            <tr class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                                <th class="px-6 py-5 text-center font-bold whitespace-nowrap text-base">No</th>
                                <th class="px-6 py-5 text-left font-bold text-base">Judul Pengumuman</th>
                                <th class="px-6 py-5 text-center font-bold whitespace-nowrap text-base">Kategori</th>
                                <th class="px-6 py-5 text-center font-bold whitespace-nowrap text-base">Tanggal</th>
                                <th class="px-6 py-5 text-center font-bold whitespace-nowrap text-base">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach ($pengumumanPdf as $index => $item)
                            <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 group">
                                <td class="px-6 py-5 text-center">
                                    <div class="inline-flex items-center justify-center w-12 h-12 bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-2xl font-bold shadow-lg group-hover:shadow-2xl group-hover:scale-110 transition-all duration-300">
                                        {{ $index + 1 }}
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="bg-gradient-to-br from-red-100 to-pink-100 rounded-xl p-3 group-hover:from-red-200 group-hover:to-pink-200 transition-all duration-300 shrink-0">
                                            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300 text-base leading-relaxed">
                                                {{ $item->judul }}
                                            </p>
                                            <div class="flex items-center gap-2 mt-2">
                                                <span class="inline-flex items-center bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-lg text-xs font-bold shadow-md">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                                                    </svg>
                                                    PDF
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="inline-flex items-center bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 whitespace-nowrap">
                                        {{ $item->kategori?->nama_kategori ?? 'Umum' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex flex-col items-center">
                                        <div class="bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl px-4 py-3 group-hover:from-green-200 group-hover:to-emerald-200 transition-all duration-300 shadow-md">
                                            <svg class="w-5 h-5 text-green-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-sm font-bold text-gray-700 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center justify-center gap-3 flex-wrap">
                                        <a href="{{ route('pengumuman.show', $item->id) }}" 
                                           class="inline-flex items-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 whitespace-nowrap">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Detail
                                        </a>
                                        <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                                           target="_blank" 
                                           class="inline-flex items-center bg-gradient-to-r from-green-600 to-emerald-600 text-white px-5 py-2.5 rounded-xl text-xs font-bold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 whitespace-nowrap">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border-2 border-blue-100 shadow-lg">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        {{-- Document Count --}}
                        <div class="flex items-center gap-4">
                            <div class="bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl p-4 shadow-xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                    {{ $pengumumanPdf->count() }}
                                </p>
                                <p class="text-sm text-gray-600 font-bold">Dokumen Tersedia</p>
                            </div>
                        </div>

                        {{-- Status Badges --}}
                        <div class="flex flex-wrap items-center gap-3">
                            <div class="flex items-center bg-white border-2 border-red-200 rounded-xl px-5 py-3 gap-2 shadow-md hover:shadow-lg transition-shadow">
                                <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm font-bold text-red-700">Format PDF</span>
                            </div>
                            
                            <div class="flex items-center bg-white border-2 border-green-200 rounded-xl px-5 py-3 gap-2 shadow-md hover:shadow-lg transition-shadow">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm font-bold text-green-700">Terverifikasi</span>
                            </div>
                        </div>

                        {{-- Download Status --}}
                        <div class="flex items-center gap-3 bg-white rounded-xl px-5 py-3 border-2 border-green-200 shadow-md">
                            <div class="relative">
                                <div class="bg-green-500 rounded-full w-3 h-3 animate-ping absolute"></div>
                                <div class="bg-green-500 rounded-full w-3 h-3"></div>
                            </div>
                            <span class="text-sm font-bold text-gray-700">Siap Diunduh</span>
                        </div>
                    </div>
                </div>

                {{-- Pagination untuk PDF --}}
                @if ($pengumumanPdf instanceof \Illuminate\Pagination\LengthAwarePaginator && $pengumumanPdf->hasPages())
                <div class="mt-8">
                    <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl p-6 shadow-lg">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                            {{-- Previous --}}
                            @if ($pengumumanPdf->onFirstPage())
                                <button disabled class="flex items-center gap-2 px-6 py-3 bg-gray-200 text-gray-400 rounded-xl cursor-not-allowed font-bold text-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    Sebelumnya
                                </button>
                            @else
                                <a href="{{ $pengumumanPdf->previousPageUrl() }}" 
                                   class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-bold text-sm shadow-lg hover:shadow-xl transform hover:-translate-x-1 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    Sebelumnya
                                </a>
                            @endif

                            {{-- Page Info --}}
                            <div class="flex items-center gap-3 bg-white rounded-xl px-6 py-3 shadow-md">
                                <span class="text-sm font-bold text-gray-700">
                                    Halaman <span class="text-blue-600">{{ $pengumumanPdf->currentPage() }}</span> dari <span class="text-blue-600">{{ $pengumumanPdf->lastPage() }}</span>
                                </span>
                            </div>

                            {{-- Next --}}
                            @if ($pengumumanPdf->hasMorePages())
                                <a href="{{ $pengumumanPdf->nextPageUrl() }}" 
                                   class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-bold text-sm shadow-lg hover:shadow-xl transform hover:translate-x-1 transition-all duration-300">
                                    Selanjutnya
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            @else
                                <button disabled class="flex items-center gap-2 px-6 py-3 bg-gray-200 text-gray-400 rounded-xl cursor-not-allowed font-bold text-sm">
                                    Selanjutnya
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif

        {{-- Section: Pengumuman Umum --}}
        @if ($pengumumanBiasa->count() > 0)
        <div class="animate-slide-up" style="animation-delay: 0.2s;">
            {{-- Header --}}
            <div class="flex flex-col sm:flex-row items-center gap-6 mb-10 pb-8 border-b-2 border-gradient">
                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-5 shadow-2xl transform hover:rotate-3 transition-transform duration-300">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <div class="text-center sm:text-left">
                    <h2 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">
                        📰 Pengumuman Umum
                    </h2>
                    <p class="text-gray-500 font-medium">Informasi terkini dan update terbaru untuk Anda</p>
                </div>
            </div>

            {{-- Grid Cards --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                @foreach ($pengumumanBiasa as $item)
                <div class="bg-white shadow-xl rounded-3xl overflow-hidden hover:shadow-3xl transition-all duration-500 transform hover:-translate-y-3 border border-gray-100 group">
                    {{-- Image --}}
                    <div class="relative overflow-hidden h-56 bg-gradient-to-br from-gray-200 to-gray-300">
                        <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                             alt="{{ $item->judul }}"
                             class="h-full w-full object-cover group-hover:scale-125 transition-transform duration-700 ease-out">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                        
                        {{-- Badges --}}
                        <div class="absolute top-4 right-4 z-10">
                            <span class="bg-white/95 backdrop-blur-sm text-blue-600 px-4 py-2 rounded-full text-xs font-bold shadow-2xl border border-blue-100">
                                {{ $item->kategori?->nama_kategori ?? 'Umum' }}
                            </span>
                        </div>
                        <div class="absolute top-4 left-4 z-10">
                            <span class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1.5 rounded-full text-xs font-bold shadow-2xl animate-pulse-slow">
                                ● BARU
                            </span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-6">
                        {{-- Date --}}
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <div class="bg-gradient-to-r from-blue-100 to-indigo-100 rounded-lg px-3 py-2 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="font-bold text-gray-700">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</span>
                            </div>
                        </div>

                        {{-- Title --}}
                        <h3 class="font-extrabold text-xl text-gray-800 mb-3 line-clamp-2 leading-tight group-hover:text-blue-600 transition-colors duration-300">
                            {{ $item->judul }}
                        </h3>

                        {{-- Excerpt --}}
                        <p class="text-sm text-gray-600 mb-6 line-clamp-3 leading-relaxed">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}
                        </p>

                        {{-- Button --}}
                        <a href="{{ route('pengumuman.show', $item->id) }}" 
                           class="inline-flex items-center justify-center w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3.5 rounded-2xl text-sm font-bold hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-1 group/btn">
                            <span>Baca Selengkapnya</span>
                            <svg class="w-5 h-5 ml-2 group-hover/btn:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($pengumumanBiasa instanceof \Illuminate\Pagination\LengthAwarePaginator && $pengumumanBiasa->hasPages())
            <div class="space-y-8">
                {{-- Info --}}
                <div class="text-center">
                    <div class="inline-flex items-center bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-blue-200 rounded-2xl px-6 py-4 shadow-lg">
                        <svg class="w-6 h-6 text-blue-600 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm text-gray-700 font-medium">
                            Menampilkan 
                            <span class="font-extrabold text-blue-600">{{ $pengumumanBiasa->firstItem() }}-{{ $pengumumanBiasa->lastItem() }}</span>
                            dari
                            <span class="font-extrabold text-blue-600">{{ $pengumumanBiasa->total() }}</span>
                            pengumuman
                        </span>
                    </div>
                </div>

                {{-- Navigation --}}
                <div class="bg-white rounded-3xl p-8 shadow-2xl border-2 border-gray-100">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                        {{-- Previous Button --}}
                        <div class="flex items-center">
                            @if ($pengumumanBiasa->onFirstPage())
                                <button disabled class="flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-400 rounded-xl cursor-not-allowed font-bold text-sm shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    Sebelumnya
                                </button>
                            @else
                                <a href="{{ $pengumumanBiasa->previousPageUrl() }}" 
                                   class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-bold text-sm shadow-lg hover:shadow-2xl transform hover:-translate-x-1 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    Sebelumnya
                                </a>
                            @endif
                        </div>

                        {{-- Page Numbers --}}
                        <div class="flex items-center gap-2 flex-wrap justify-center">
                            @php
                                $start = max($pengumumanBiasa->currentPage() - 2, 1);
                                $end = min($pengumumanBiasa->currentPage() + 2, $pengumumanBiasa->lastPage());
                            @endphp

                            {{-- First Page --}}
                            @if ($start > 1)
                                <a href="{{ $pengumumanBiasa->url(1) }}" 
                                   class="w-12 h-12 flex items-center justify-center bg-white border-2 border-gray-300 text-gray-700 rounded-xl hover:border-blue-600 hover:text-blue-600 hover:bg-blue-50 transition-all font-bold text-sm shadow-md hover:shadow-xl transform hover:scale-110">
                                    1
                                </a>
                                @if ($start > 2)
                                    <span class="px-2 text-gray-400 font-extrabold text-lg">···</span>
                                @endif
                            @endif

                            {{-- Page Range --}}
                            @for ($page = $start; $page <= $end; $page++)
                                @if ($page == $pengumumanBiasa->currentPage())
                                    <span class="w-12 h-12 flex items-center justify-center bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-extrabold shadow-2xl text-sm transform scale-110">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $pengumumanBiasa->url($page) }}" 
                                       class="w-12 h-12 flex items-center justify-center bg-white border-2 border-gray-300 text-gray-700 rounded-xl hover:border-blue-600 hover:text-blue-600 hover:bg-blue-50 transition-all font-bold text-sm shadow-md hover:shadow-xl transform hover:scale-110">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endfor

                            {{-- Last Page --}}
                            @if ($end < $pengumumanBiasa->lastPage())
                                @if ($end < $pengumumanBiasa->lastPage() - 1)
                                    <span class="px-2 text-gray-400 font-extrabold text-lg">···</span>
                                @endif
                                <a href="{{ $pengumumanBiasa->url($pengumumanBiasa->lastPage()) }}" 
                                   class="w-12 h-12 flex items-center justify-center bg-white border-2 border-gray-300 text-gray-700 rounded-xl hover:border-blue-600 hover:text-blue-600 hover:bg-blue-50 transition-all font-bold text-sm shadow-md hover:shadow-xl transform hover:scale-110">
                                    {{ $pengumumanBiasa->lastPage() }}
                                </a>
                            @endif
                        </div>

                        {{-- Next Button --}}
                        <div class="flex items-center">
                            @if ($pengumumanBiasa->hasMorePages())
                                <a href="{{ $pengumumanBiasa->nextPageUrl() }}" 
                                   class="flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-bold text-sm shadow-lg hover:shadow-2xl transform hover:translate-x-1 transition-all duration-300">
                                    Selanjutnya
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            @else
                                <button disabled class="flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-400 rounded-xl cursor-not-allowed font-bold text-sm shadow-md">
                                    Selanjutnya
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Quick Jump --}}
                <div class="text-center">
                    <div class="inline-flex items-center bg-white border-2 border-gray-300 rounded-2xl px-6 py-4 shadow-xl hover:shadow-2xl transition-shadow duration-300">
                        <span class="text-sm text-gray-600 mr-4 font-bold">Langsung ke halaman:</span>
                        <select onchange="window.location.href=this.value" 
                                class="px-4 py-2 border-2 border-blue-600 rounded-xl text-sm font-bold text-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-200 cursor-pointer hover:bg-blue-50 transition-all shadow-md">
                            @for ($i = 1; $i <= $pengumumanBiasa->lastPage(); $i++)
                                <option value="{{ $pengumumanBiasa->url($i) }}" {{ $i == $pengumumanBiasa->currentPage() ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                        <span class="text-sm text-gray-600 ml-4 font-bold">dari {{ $pengumumanBiasa->lastPage() }}</span>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endif

        {{-- Empty State --}}
        @if ($pengumumanPdf->count() == 0 && $pengumumanBiasa->count() == 0)
            <div class="text-center py-24">
                <div class="bg-gradient-to-br from-gray-100 to-gray-200 rounded-full w-32 h-32 mx-auto mb-8 flex items-center justify-center shadow-2xl">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-700 mb-3">Belum Ada Pengumuman</h3>
                <p class="text-gray-500 text-lg mb-2">Saat ini belum ada pengumuman untuk ditampilkan</p>
                <p class="text-gray-400 text-sm">Silakan cek kembali nanti untuk informasi terbaru</p>
            </div>
        @endif

    </div>
</section>

<style>
@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slide-up {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse-slow {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0.7;
    }
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out;
}

.animate-slide-up {
    animation: slide-up 0.8s ease-out;
    animation-fill-mode: both;
}

.animate-pulse-slow {
    animation: pulse-slow 2s ease-in-out infinite;
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

.border-gradient {
    border-image: linear-gradient(to right, #3B82F6, #6366F1) 1;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 10px;
    height: 10px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #3B82F6, #6366F1);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #2563EB, #4F46E5);
}

/* Smooth transitions for all interactive elements */
* {
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Hover effect for cards */
.group:hover {
    z-index: 10;
}
</style>
@endsection