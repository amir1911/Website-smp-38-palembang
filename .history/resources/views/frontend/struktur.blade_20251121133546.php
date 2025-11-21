@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')

<!-- Background Gradient Section -->
<div class="w-full px-4 sm:px-6 md:px-12 lg:px-20 py-12 sm:py-16 md:py-24 -mb-20"
     style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">

    <div class="max-w-4xl mx-auto">

        <!-- ========== TITLE SECTION ========== -->
        <div class="flex justify-center mb-6 sm:mb-8 md:mb-10">
            <h2 class="inline-block text-white text-sm sm:text-base md:text-lg lg:text-xl font-bold 
                        px-4 sm:px-6 md:px-8 lg:px-10 py-2 sm:py-2.5 md:py-3 rounded-full shadow-lg text-center"
                  style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 50%, #1A4E8A 100%);">
                Struktur Organisasi SMP Negeri 38 Palembang
            </h2>
        </div>

        <!-- ========== CARD STRUKTUR ========== -->
        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-4 sm:p-6 md:p-8 lg:p-10 mx-2 sm:mx-0">
            
            <!-- Gambar Struktur Organisasi -->
            <div class="w-full">
                <img 
                    src="{{ asset('storage/struktursmp38.jpg') }}"
                    alt="Bagan Struktur Organisasi SMP Negeri 38 Palembang"
                    class="w-full h-auto rounded-xl sm:rounded-2xl shadow-md hover:shadow-lg transition-shadow duration-300"
                >
            </div>

            <!-- Caption (optional) -->
            <p class="text-gray-400 text-xs sm:text-sm text-center mt-4 sm:mt-6">
                Bagan Struktur Organisasi SMP Negeri 38 Palembang
            </p>

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