@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<div class="w-full bg-gradient-to-b from-[#4E7DB5] via-[#CFE4FB] to-[#1D4E89] py-20 px-4">

    <!-- Card putih -->
    <div class="max-w-6xl mx-auto bg-white rounded-[30px] shadow-xl p-10 md:p-14">

        <div class="flex flex-col md:flex-row gap-10 items-center">

            <!-- GAMBAR -->
            <img 
                src="{{ asset('storage/bangunansekolah.jpg') }}" 
                class="w-full md:w-1/2 rounded-2xl shadow-md object-cover"
            >

            <!-- TEKS -->
            <div class="flex-1">

                <div class="inline-block bg-[#1D4E89] text-white px-6 py-3 rounded-full 
                            font-bold text-xl shadow-md mb-4">
                    SMP NEGERI 38 PALEMBANG
                </div>

                <p class="text-gray-700 leading-relaxed mb-3">
                    <strong>SMP Negeri 38 Palembang</strong> merupakan salah satu sekolah...
                </p>

                <p class="text-gray-700 leading-relaxed mb-4">
                    Sejak berdiri, SMP Negeri 38 Palembang berkomitmen...
                </p>

                <hr class="border-gray-300 my-4">

                <a href="/" 
                   class="inline-block bg-[#1D4E89] text-white px-6 py-2 rounded-full 
                          font-semibold shadow hover:bg-[#163A63] transition">
                    Kembali
                </a>

            </div>
        </div>

    </div>

</div>

@endsection
