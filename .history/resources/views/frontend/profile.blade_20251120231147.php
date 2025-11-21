@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<!-- Background Gradasi -->
<section class="py-12 md:py-16 px-6 md:px-10 bg-gradient-to-b from-[#5B8CC4] to-[#B7D4F5]">

    <div class="max-w-6xl mx-auto">

        <!-- CARD -->
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-xl p-6 md:p-10 border border-white/40">

            <div class="flex flex-col md:flex-row items-center gap-8">

                <!-- FOTO -->
                <div class="w-full md:w-1/2">
                    <img 
                        src="{{ asset('storage/bangunansekolah.jpg') }}" 
                        alt="Bangunan Sekolah" 
                        class="w-full rounded-2xl shadow-lg object-cover"
                    >
                </div>

                <!-- TEKS -->
                <div class="flex-1">

                    <!-- Judul dalam Bubble -->
                    <h2 class="inline-block bg-[#1D4E89] text-white px-6 py-3 rounded-xl text-xl sm:text-2xl md:text-3xl font-extrabold shadow-md mb-4">
                        SMP NEGERI 38 PALEMBANG
                    </h2>

                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mt-4">
                        <strong>SMP Negeri 38 Palembang</strong> merupakan salah satu sekolah menengah 
                        pertama negeri yang berada di bawah naungan Dinas Pendidikan Kota Palembang. 
                        Sekolah ini berdiri sebagai wujud dari upaya pemerintah dalam memperluas akses pendidikan bagi masyarakat Palembang.
                    </p>

                    <p class="text-gray-700 text-base md:text-lg leading-relaxed mt-3">
                        Sejak berdiri, SMP Negeri 38 Palembang berkomitmen untuk menjadi lembaga pendidikan 
                        yang unggul dalam prestasi akademik maupun nonakademik, serta berperan aktif dalam 
                        membentuk generasi muda yang berkarakter, beriman, dan berwawasan luas.
                    </p>

                    <!-- Garis -->
                    <div class="w-full h-[1px] bg-gray-300 my-6"></div>

                    <!-- Tombol -->
                    <a href="/"
                       class="px-6 py-2 bg-[#1D4E89] text-white rounded-full shadow hover:bg-[#163A63] transition font-semibold">
                        Kembali
                    </a>

                </div>
            </div>

        </div>

    </div>

</section>

@endsection
