@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')
<section class="bg-white py-12 md:py-16 px-6 md:px-10">
    <div class="max-w-5xl mx-auto text-center md:text-left space-y-6">

        <div class="flex flex-col md:flex-row items-center gap-8">
            <img 
                src="{{ asset('storage/bangunan.jpg') }}" 
                alt="Bangunan Sekolah" 
                class="w-full md:w-1/2 rounded-3xl shadow-lg object-cover hover:scale-[1.02] transition-transform duration-500"
            >

            <div class="flex-1 space-y-3">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-700 leading-snug">
                    SMP Negeri 38 Palembang
                </h2>

                <p class="text-gray-700 text-base md:text-lg leading-relaxed">
                    <strong>SMP Negeri 38 Palembang</strong> merupakan sekolah menengah pertama negeri unggulan di Kota Palembang, berdiri sejak tahun 1985. 
                    Sekolah ini berkomitmen mencetak generasi muda yang berkarakter, berprestasi, dan berwawasan lingkungan.
                </p>

                <p class="text-gray-700 text-base md:text-lg leading-relaxed">
                    Dengan tenaga pendidik profesional, fasilitas digital modern, serta lingkungan belajar yang nyaman, 
                    sekolah ini terus berinovasi dalam pendidikan berbasis teknologi dan karakter.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
