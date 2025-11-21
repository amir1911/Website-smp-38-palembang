@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<!-- WRAPPER DENGAN GRADIENT - Full Width -->
<div class="min-h-screen w-full pt-24 pb-0 px-0"
     style="background: linear-gradient(180deg, #5A8AC7 0%, #7BA3D4 30%, #A8C8E8 60%, #C9DDF2 100%);">

    <!-- Card utama - Full Width dengan rounded top only -->
    <div class="w-full bg-white rounded-t-[50px] shadow-2xl px-8 md:px-16 lg:px-24 py-12 mt-8">

        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col md:flex-row gap-8 items-start">

                <!-- Gambar sekolah -->
                <div class="w-full md:w-[45%] flex-shrink-0">
                    <div class="rounded-[20px] overflow-hidden shadow-lg border-4 border-gray-100">
                        <img 
                            src="{{ asset('storage/bangunansekolah.jpg') }}" 
                            alt="Gedung SMP Negeri 38 Palembang"
                            class="w-full h-auto object-cover"
                        >
                    </div>
                </div>

                <!-- Konten teks -->
                <div class="flex-1 flex flex-col">

                    <!-- Title badge dengan gradient -->
                    <div class="mb-6">
                        <span class="inline-block text-white text-lg md:text-xl font-bold 
                                    px-8 py-3 rounded-full shadow-lg"
                              style="background: linear-gradient(135deg, #1E5799 0%, #2989D8 50%, #1E5799 100%);">
                            SMP NEGERI 38 PALEMBANG
                        </span>
                    </div>

                    <!-- Paragraf pertama -->
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-4 text-justify">
                        <span class="font-semibold">SMP Negeri 38 Palembang</span> merupakan salah satu sekolah 
                        menengah pertama negeri yang berada di bawah naungan Dinas Pendidikan Kota Palembang.
                        Sekolah ini berdiri sebagai wujud dari upaya pemerintah dalam memperluas akses
                        pendidikan bagi masyarakat Palembang, khususnya di wilayah yang terus berkembang.
                    </p>

                    <!-- Paragraf kedua -->
                    <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-8 text-justify">
                        Sejak berdiri, SMP Negeri 38 Palembang berkomitmen untuk menjadi lembaga pendidikan
                        yang unggul dalam prestasi akademik maupun nonakademik, serta berperan aktif
                        dalam membentuk generasi muda yang berkarakter, beriman, dan berwawasan luas.
                    </p>

                    <!-- Tombol Kembali -->
                    <div class="mt-auto">
                        <a href="/" 
                           class="inline-block text-white px-8 py-2.5 rounded-full font-semibold 
                                  shadow-md hover:shadow-lg transition-all duration-300 text-sm"
                           style="background: linear-gradient(135deg, #1E5799 0%, #2989D8 50%, #1E5799 100%);">
                            Kembali
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>

@endsection