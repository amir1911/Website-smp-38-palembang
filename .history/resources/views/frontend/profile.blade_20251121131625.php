@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<!-- WRAPPER DENGAN GRADIENT PANJANG -->
<div class="bg-gradient-to-b from-[#4E7DB5] via-[#BFD9F3] to-[#BFD9F3] 
            min-h-screen w-full pt-20 pb-40 px-4">

    <!-- Card putih -->
    <div class="max-w-6xl mx-auto bg-white rounded-[30px] shadow-xl p-10 md:p-14">

        <div class="flex flex-col md:flex-row gap-10 items-center">

            <!-- Gambar -->
            <div class="w-full md:w-1/2">
                <img 
                    src="{{ asset('storage/bangunansekolah.jpg') }}" 
                    class="rounded-2xl shadow-md w-full object-cover"
                >
            </div>

            <!-- Isi teks -->
            <div class="flex-1">

                <!-- Title pill -->
                <div class="inline-block bg-[#1D4E89] text-white text-lg md:text-xl font-bold 
                            px-6 py-3 rounded-full shadow-md mb-4">
                    SMP NEGERI 38 PALEMBANG
                </div>

                <p class="text-gray-700 leading-relaxed mb-3">
                    <strong>SMP Negeri 38 Palembang</strong> merupakan salah satu sekolah 
                    menengah pertama negeri yang berada di bawah naungan Dinas Pendidikan Kota Palembang.
                    Sekolah ini berdiri sebagai wujud dari upaya pemerintah dalam memperluas akses
                    pendidikan bagi masyarakat Palembang, khususnya di wilayah yang terus berkembang.
                </p>

                <p class="text-gray-700 leading-relaxed mb-4">
                    Sejak berdiri, SMP Negeri 38 Palembang berkomitmen untuk menjadi lembaga pendidikan
                    yang unggul dalam prestasi akademik maupun nonakademik, serta berperan aktif
                    dalam membentuk generasi muda yang berkarakter, beriman, dan berwawasan luas.
                </p>

                <!-- Garis tipis -->
                <hr class="border-gray-300 my-4">

                <!-- Tombol -->
                <a href="/" 
                   class="inline-block bg-[#1D4E89] text-white px-6 py-2 rounded-full font-semibold 
                          shadow hover:bg-[#163A63] transition">
                    Kembali
                </a>

            </div>

        </div>

    </div>

</div>

@endsection
