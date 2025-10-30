@extends('layouts.app')

@section('content')
<!-- Font Awesome untuk ikon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<section class="py-20 bg-gray-50 font-[Poppins]">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Tombol kembali -->
        <div class="mb-8">
            <a href="{{ route('pengumuman.index') }}" class="inline-flex items-center text-primary hover:text-blue-700 transition">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Pengumuman
            </a>
        </div>

        <!-- Konten pengumuman -->
        <div class="bg-white shadow-lg rounded-2xl p-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-4 leading-snug">{{ $pengumuman->judul }}</h1>
            <p class="text-gray-500 mb-6">
                <i class="fa-regular fa-calendar-days mr-1"></i>
                {{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }} 
                • <span class="text-primary font-medium">SMPN 38 Palembang</span>
            </p>

            @if($pengumuman->foto)
                <img src="{{ asset('storage/' . $pengumuman->foto) }}" 
                     alt="Gambar Pengumuman" 
                     class="w-full rounded-lg shadow mb-8 object-cover">
            @endif

            <div class="text-gray-700 leading-relaxed text-justify">
                {!! nl2br(e($pengumuman->isi)) !!}
            </div>
        </div>

        <!-- Media sosial -->
        <div class="mt-12 text-center border-t pt-8">
            <p class="text-gray-700 mb-4 font-medium">Bagikan ke media sosial</p>
            <div class="flex justify-center space-x-6 text-2xl">
                <a href="#" class="text-blue-600 hover:text-blue-800 transition"><i class="fab fa-facebook-square"></i></a>
                <a href="#" class="text-pink-500 hover:text-pink-700 transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-blue-400 hover:text-blue-600 transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-red-600 hover:text-red-800 transition"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
