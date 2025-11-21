@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
<style></style>
<!-- Background Gradient Section - min-height untuk mengisi sampai footer -->
<div class="w-full px-6 md:px-12 lg:px-20 pt-16 md:pt-24 pb-32 md:pb-40"
     style="background: linear-gradient(180deg, #4A7CB8 0%, #6B9AD0 30%, #9CC1E6 60%, #BFD9F3 100%); min-height: calc(100vh - 200px);">

    <!-- Card Putih -->
    <div class="max-w-6xl mx-auto bg-white rounded-[30px] shadow-xl p-8 md:p-12">

        <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start">

            <!-- Gambar sekolah -->
            <div class="w-full md:w-[42%] flex-shrink-0">
                <div class="rounded-[16px] overflow-hidden shadow-md">
                    <img 
                        src="{{ asset('storage/bangunansekolah.jpg') }}" 
                        alt="Gedung SMP Negeri 38 Palembang"
                        class="w-full h-auto object-cover"
                    >
                </div>
            </div>

            <!-- Konten teks -->
            <div class="flex-1 flex flex-col">

                <!-- Title badge -->
                <div class="mb-5">
                    <span class="inline-block text-white text-base md:text-lg lg:text-xl font-bold 
                                px-6 md:px-8 py-2.5 md:py-3 rounded-full shadow-md"
                          style="background: linear-gradient(90deg, #1E5799 0%, #2B7BC4 50%, #1E5799 100%);">
                        SMP NEGERI 38 PALEMBANG
                    </span>
                </div>

                <!-- Paragraf pertama -->
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-4 text-justify">
                    <span class="font-semibold text-gray-700">SMP Negeri 38 Palembang</span> merupakan salah satu sekolah 
                    menengah pertama negeri yang berada di bawah naungan Dinas Pendidikan Kota Palembang.
                    Sekolah ini berdiri sebagai wujud dari upaya pemerintah dalam memperluas akses
                    pendidikan bagi masyarakat Palembang, khususnya di wilayah yang terus berkembang.
                </p>

                <!-- Paragraf kedua -->
                <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-6 text-justify">
                    Sejak berdiri, SMP Negeri 38 Palembang berkomitmen untuk menjadi lembaga pendidikan
                    yang unggul dalam prestasi akademik maupun nonakademik, serta berperan aktif
                    dalam membentuk generasi muda yang berkarakter, beriman, dan berwawasan luas.
                </p>

                <!-- Tombol Kembali -->
                <div>
                    <a href="/" 
                       class="inline-block text-white px-7 py-2.5 rounded-full font-semibold 
                              shadow-md hover:shadow-lg transition-all duration-300 text-sm"
                       style="background: linear-gradient(90deg, #1E5799 0%, #2B7BC4 50%, #1E5799 100%);">
                        Kembali
                    </a>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('styles')
<style>
    /* Pastikan tidak ada margin/padding tambahan */
    main, .content-wrapper {
        margin: 0 !important;
        padding: 0 !important;
    }
    
    /* Hilangkan gap antara content dan footer */
    footer {
        margin-top: 0 !important;
    }
</style>
@endpush