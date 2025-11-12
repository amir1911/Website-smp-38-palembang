@extends('layouts.app')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-10">
    <div class="bg-white shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-bold text-primary mb-3">{{ $pengumuman->judul }}</h1>

        <div class="flex items-center text-sm text-gray-500 mb-4">
            <span>{{ $pengumuman->kategori?->nama_kategori ?? 'Tanpa Kategori' }}</span>
            <span class="mx-2">•</span>
            <span>{{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}</span>
        </div>

        @if ($pengumuman->gambar)
            <img src="{{ asset('storage/' . $pengumuman->gambar) }}" 
                 alt="Gambar Pengumuman" 
                 class="rounded-lg w-full max-h-96 object-cover mb-6">
        @endif

        <div class="prose max-w-none text-gray-800 leading-relaxed">
            {!! nl2br(e($pengumuman->isi)) !!}
        </div>

        @if ($pengumuman->file_pdf)
        <div class="mt-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Lampiran PDF:</h3>
            <iframe src="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                    class="w-full h-[600px] border rounded-lg"></iframe>
            <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" target="_blank" 
               class="inline-block mt-3 text-blue-600 hover:underline">Buka di Tab Baru</a>
        </div>
        @endif
    </div>

    <div class="mt-6">
        <a href="{{ url()->previous() }}" class="text-blue-600 hover:underline">
            ← Kembali ke Pengumuman
        </a>
    </div>
</section>
@endsection
