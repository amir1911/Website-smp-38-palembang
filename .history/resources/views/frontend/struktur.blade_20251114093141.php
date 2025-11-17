@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')
<section class="bg-gradient-to-b from-blue-50 to-white py-16 md:py-20 px-6 md:px-10">
    <div class="max-w-6xl mx-auto text-center">

        {{-- Judul Halaman --}}
        <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 font-semibold px-4 py-1.5 rounded-full text-sm shadow-sm mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A13.937 13.937 0 0112 15c2.57 0 4.968.723 6.879 1.967M12 15v6m0-6a13.937 13.937 0 00-6.879 1.967M12 3v3m0 0a13.937 13.937 0 016.879 1.967M12 6a13.937 13.937 0 00-6.879 1.967" />
            </svg>
            Struktur Organisasi
        </div>

        <h2 class="text-3xl md:text-4xl font-bold text-blue-700 mb-12">
            Struktur Organisasi SMP Negeri 38 Palembang
        </h2>

        {{-- Gambar Bagan Struktur --}}
        <div class="max-w-4xl mx-auto mb-10">
            <img src="{{ asset('storage/struktursmp38.jpg) }}"" 
                 alt="Bagan Struktur Organisasi SMP Negeri 38 Palembang"
                 class="w-full rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
            <p class="text-gray-500 text-sm mt-2">Bagan Struktur Organisasi SMP Negeri 38 Palembang</p>
        </div>

       
    </div>
</section>
@endsection
