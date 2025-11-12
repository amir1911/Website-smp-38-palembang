@extends('layouts.app')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-10">
    <div class="bg-white shadow-md rounded-lg p-8">
        <!-- Judul Pengumuman -->
        <h1 class="text-3xl font-bold text-primary mb-4">{{ $pengumuman->judul }}</h1>

        <!-- Info Kategori & Tanggal -->
        <div class="flex flex-wrap items-center text-sm text-gray-500 mb-6">
            <span class="flex items-center gap-1">
                <i class="fas fa-folder-open"></i> 
                {{ $pengumuman->kategori?->nama_kategori ?? 'Tanpa Kategori' }}
            </span>
            <span class="mx-2">•</span>
            <span class="flex items-center gap-1">
                <i class="fas fa-calendar-alt"></i> 
                {{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}
            </span>
        </div>

        <!-- Gambar Utama / Fallback -->
        <div class="mb-6">
            <img 
                src="{{ $pengumuman->foto ? asset('storage/' . $pengumuman->foto) : asset('images/default.jpg') }}" 
                alt="Foto Pengumuman" 
                class="rounded-lg w-full max-h-[450px] object-cover shadow-sm"
            >
        </div>

        <!-- Isi Pengumuman -->
        <div class="prose max-w-none text-gray-800 leading-relaxed text-justify">
            {!! nl2br(e($pengumuman->isi ?? 'Tidak ada isi pengumuman.')) !!}
        </div>

        <!-- File PDF Viewer -->
        @if ($pengumuman->file_pdf)
        <div class="mt-10 border-t pt-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center gap-2">
                <i class="fas fa-file-pdf text-red-500"></i> Lampiran PDF:
            </h3>

            <!-- Viewer PDF -->
            <iframe 
                src="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                class="w-full h-[600px] border rounded-lg shadow-sm"
            ></iframe>

            <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" target="_blank" 
               class="inline-block mt-4 bg-primary text-white px-5 py-2 rounded-lg font-semibold hover:bg-primary-dark transition">
               <i class="fas fa-external-link-alt mr-2"></i> Buka PDF di Tab Baru
            </a>
        </div>
        @endif
    </div>

    <!-- Tombol Kembali -->
    <div class="mt-8 text-center">
        <a href="{{ route('pengumuman.index') }}" 
           class="inline-flex items-center gap-2 text-primary hover:text-primary-dark font-medium transition">
           <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pengumuman
        </a>
    </div>
</section>
@endsection
