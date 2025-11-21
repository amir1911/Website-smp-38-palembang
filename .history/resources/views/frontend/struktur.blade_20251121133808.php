@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')

<!-- Background Gradient Section -->
<div class="w-full px-4 sm:px-6 md:px-12 lg:px-20 py-12 sm:py-16 md:py-24 -mb-20"
     style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">

    <div class="max-w-4xl mx-auto">

        <!-- ========== CARD STRUKTUR ========== -->
        <div class="rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden mx-2 sm:mx-0"
             style="background: linear-gradient(180deg, #3A6EA5 0%, #5A8BBF 30%, #7AA8D4 60%, #9AC5E8 100%);">
            
            <!-- Title Section -->
            <div class="text-center pt-6 sm:pt-8 md:pt-10 pb-4 sm:pb-6 px-4">
                <!-- Badge Title -->
                <div class="inline-block bg-white/20 backdrop-blur-sm px-5 sm:px-6 md:px-8 py-1.5 sm:py-2 rounded-full mb-2 sm:mb-3 border border-white/30">
                    <h1 class="text-white text-xs sm:text-sm md:text-base lg:text-lg font-bold tracking-wide">
                        STRUKTUR ORGANISASI
                    </h1>
                </div>
                <!-- Subtitle -->
                <h2 class="text-white text-base sm:text-lg md:text-xl lg:text-2xl font-bold tracking-wide">
                    SMP NEGERI 38 PALEMBANG
                </h2>
            </div>

            <!-- Gambar Struktur Organisasi -->
            <div class="px-4 sm:px-6 md:px-8 pb-6 sm:pb-8 md:pb-10">
                <img 
                    src="{{ asset('storage/struktursmp38.jpg') }}"
                    alt="Bagan Struktur Organisasi SMP Negeri 38 Palembang"
                    class="w-full h-auto rounded-lg sm:rounded-xl shadow-lg"
                >
            </div>

        </div>

        <!-- ========== TOMBOL KEMBALI ========== -->
        <div class="flex justify-center mt-6 sm:mt-8 md:mt-10">
            <a href="/" 
               class="inline-block text-white px-6 sm:px-7 md:px-8 py-2 sm:py-2.5 rounded-full font-semibold 
                      shadow-md hover:shadow-lg transition-all duration-300 text-sm sm:text-base"
               style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 50%, #1A4E8A 100%);">
                Kembali
            </a>
        </div>

    </div>

</div>

@endsection