@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<!-- Background Biru Gradient -->
<section class="bg-gradient-to-b from-[#5C8BC0] to-[#BFD6F0] py-16 px-4 sm:px-6 md:px-10">

    <div class="max-w-7xl mx-auto">

        <!-- Card Putih -->
        <div class="bg-white/90 backdrop-blur-md p-8 sm:p-10 md:p-12 rounded-3xl shadow-xl">

            <div class="flex flex-col md:flex-row items-center gap-10">

                <!-- GAMBAR -->
                <img 
                    src="{{ asset('storage/bangunansekolah.jpg') }}" 
                    alt="Bangunan Sekolah" 
                    class="w-full md:w-1/2 rounded-3xl shadow-lg object-cover"
                >

                <!-- TEKS -->
                <div class="flex-1 text-gray-700">

                    <!-- JUDUL -->
                    <h2 class="inline-block bg-[#1D4E89] text-white font-bold text-xl sm:text-2xl md:text-3xl 
                               px-6 py-3 rounded-full shadow-md mb-4">
                        SMP NEGERI 38 PALEMBANG
                    </h2>

                    <p class="leading-relaxed mb-3">
                        <strong>SMP Negeri 38 Palembang</strong> merupakan salah satu sekolah menengah pertama negeri 
                        yang berada di bawah naungan Dinas Pendidikan Kota Palembang. Sekolah ini berdiri sebagai 
                        wujud dari upaya pemerintah dalam memperluas akses pendidikan bagi masyarakat Palembang, 
                        khususnya di wilayah yang terus berkembang.
                    </p>

                    <p class="leading-relaxed mb-4">
                        Sejak berdiri, SMP Negeri 38 Palembang berkomitmen untuk menjadi lembaga pendidikan unggul 
                        dalam prestasi akademik maupun nonakademik, serta berperan aktif dalam membentuk generasi 
                        muda yang berkarakter, beriman, dan berwawasan luas.
                    </p>

                    <hr class="border-gray-300 my-4">

                    <a href="/" 
                       class="inline-block bg-[#1D4E89] text-white px-6 py-2 rounded-full font-semibold shadow hover:bg-[#163A63] transition">
                        Kembali
                    </a>

                </div>
            </div>
        </div>

    </div>

</section>

@endsection
