@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">

<style>
    .font-display { font-family: 'Playfair Display', serif; }
    body, .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }

    .dot-grid {
        background-image: radial-gradient(circle, rgba(255,255,255,0.15) 1px, transparent 1px);
        background-size: 24px 24px;
    }
    .stripe-bg {
        background-image: repeating-linear-gradient(
            -45deg, transparent, transparent 10px,
            rgba(255,255,255,0.03) 10px, rgba(255,255,255,0.03) 20px
        );
    }
    .card-hover {
        transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.35s ease;
    }
    .card-hover:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 48px rgba(2,62,138,0.14);
    }
    @keyframes floatY {
        0%,100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }
    .float-badge { animation: floatY 3.5s ease-in-out infinite; }
    @keyframes fadeUp {
        from { opacity:0; transform:translateY(24px); }
        to   { opacity:1; transform:translateY(0); }
    }
    .fade-up { animation: fadeUp 0.7s ease forwards; }
    .fade-up-d1 { animation-delay: 0.1s; opacity:0; }
    .fade-up-d2 { animation-delay: 0.2s; opacity:0; }
    .fade-up-d3 { animation-delay: 0.35s; opacity:0; }
    .fade-up-d4 { animation-delay: 0.5s; opacity:0; }
</style>

<!-- =============================================
     HERO BANNER
     ============================================= -->
<div class="relative overflow-hidden bg-[#023E8A] stripe-bg">
    <div class="absolute inset-0 dot-grid"></div>
    <!-- Decorative circles -->
    <div class="absolute -top-16 -right-16 w-64 h-64 bg-white/5 rounded-full"></div>
    <div class="absolute top-10 right-32 w-32 h-32 bg-white/5 rounded-full"></div>
    <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-[#00B4D8]/10 rounded-full"></div>

    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-16 sm:py-20 relative z-10">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-[#90E0EF] text-xs font-semibold mb-6 fade-up fade-up-d1">
            <a href="/" class="hover:text-white transition">Beranda</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white">Profil Sekolah</span>
        </div>

        <div class="flex flex-col sm:flex-row sm:items-end gap-4 sm:gap-8">
            <div class="flex-1">
                <span class="text-[#90E0EF] text-xs font-bold tracking-[4px] uppercase mb-3 block fade-up fade-up-d1">Tentang Kami</span>
                <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight fade-up fade-up-d2">
                    Profil <span class="text-[#00B4D8]">Sekolah</span>
                </h1>
                <div class="flex items-center gap-3 mt-4 fade-up fade-up-d3">
                    <span class="w-14 h-1 bg-[#F4A261] rounded-full"></span>
                    <span class="w-8 h-1 bg-[#00B4D8] rounded-full"></span>
                    <span class="w-4 h-1 bg-white/30 rounded-full"></span>
                </div>
            </div>
            <p class="text-[#CAF0F8] text-sm sm:text-base max-w-sm leading-relaxed fade-up fade-up-d4">
                Mengenal lebih dekat SMA Negeri 1 Pesisir Tengah — sekolah unggulan di Pesisir Barat, Lampung.
            </p>
        </div>
    </div>

    <!-- Wave bottom -->
    <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" class="block -mb-1">
        <path fill="#f8fafc" d="M0,30 C480,60 960,0 1440,30 L1440,60 L0,60 Z"/>
    </svg>
</div>

<!-- =============================================
     MAIN CONTENT
     ============================================= -->
<div class="bg-slate-50 py-16 sm:py-20">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-10">

        <!-- Main card -->
        <div class="bg-white rounded-3xl shadow-sm border border-[#CAF0F8] overflow-hidden fade-up fade-up-d2">
            <div class="grid grid-cols-1 lg:grid-cols-5">

                <!-- Left: Photo panel -->
                <div class="lg:col-span-2 relative bg-gradient-to-b from-[#CAF0F8] to-[#90E0EF] p-6 sm:p-8 flex flex-col items-center justify-center min-h-[300px]">

                    <!-- Photo -->
                    <div class="relative w-full max-w-[360px]">
                        <div class="absolute -inset-3 bg-[#0077B6]/20 rounded-2xl rotate-2"></div>
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
                            <img src="{{ asset('storage/sekolah/gedung sekolah.jpg') }}"
                                 alt="Gedung SMA Negeri 1 Pesisir Tengah"
                                 class="w-full h-[240px] sm:h-[280px] object-cover object-center">
                        </div>
                    </div>

                    <!-- Floating badge -->
                    <div class="float-badge mt-6 bg-[#023E8A] text-white px-6 py-3 rounded-2xl shadow-xl text-center">
                        <p class="font-bold text-sm">SMA NEGERI 1</p>
                        <p class="text-[#90E0EF] text-xs">Pesisir Tengah, Lampung</p>
                    </div>

                    <!-- Quick info pills -->
                    <div class="flex flex-wrap justify-center gap-2 mt-5">
                        <span class="bg-white/80 text-[#023E8A] text-xs font-semibold px-3 py-1.5 rounded-full shadow-sm">
                            Akreditasi A
                        </span>
                        <span class="bg-[#F4A261] text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-sm">
                            Kurikulum Merdeka
                        </span>
                        <span class="bg-white/80 text-[#023E8A] text-xs font-semibold px-3 py-1.5 rounded-full shadow-sm">
                            Pesisir Barat
                        </span>
                    </div>
                </div>

                <!-- Right: Text content -->
                <div class="lg:col-span-3 p-8 sm:p-10 lg:p-12 flex flex-col justify-between">

                    <!-- Badge title -->
                    <div>
                        <div class="inline-flex items-center gap-2 bg-[#CAF0F8] text-[#023E8A] text-xs font-bold px-4 py-2 rounded-full mb-6">
                            <span class="w-2 h-2 bg-[#0077B6] rounded-full"></span>
                            PROFIL SEKOLAH
                        </div>

                        <h2 class="font-display text-2xl sm:text-3xl font-bold text-[#023E8A] mb-6 leading-snug">
                            SMA Negeri 1 Pesisir Tengah
                        </h2>

                        <!-- Accent divider -->
                        <div class="flex items-center gap-2 mb-6">
                            <div class="w-1 h-12 bg-gradient-to-b from-[#00B4D8] to-[#0077B6] rounded-full"></div>
                            <p class="text-gray-600 text-sm sm:text-base leading-relaxed text-justify">
                                <span class="font-semibold text-[#023E8A]">SMA Negeri 1 Pesisir Tengah</span> merupakan
                                salah satu sekolah menengah atas negeri yang berada di bawah naungan Dinas Pendidikan
                                Kabupaten Pesisir Barat, Provinsi Lampung. Sekolah ini berdiri sebagai wujud nyata dari
                                komitmen pemerintah dalam meningkatkan akses dan mutu pendidikan bagi masyarakat di
                                wilayah Pesisir Barat yang terus berkembang.
                            </p>
                        </div>

                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed text-justify mb-8">
                            Sejak berdiri, SMA Negeri 1 Pesisir Tengah berkomitmen untuk menjadi lembaga pendidikan
                            yang unggul dalam prestasi akademik maupun nonakademik, serta berperan aktif dalam
                            membentuk generasi muda Pesisir Barat yang berkarakter, beriman, dan berwawasan luas
                            guna menghadapi tantangan di era global.
                        </p>
                    </div>

                    <!-- Bottom actions -->
                    <div class="flex flex-wrap items-center gap-3 pt-6 border-t border-[#CAF0F8]">
                        <a href="/"
                            class="inline-flex items-center gap-2 bg-[#023E8A] hover:bg-[#0077B6] text-white font-semibold px-6 py-3 rounded-full text-sm transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                            </svg>
                            Kembali
                        </a>
                        <a href="{{ route('visimisi') }}"
                            class="inline-flex items-center gap-2 border border-[#0077B6] text-[#0077B6] hover:bg-[#0077B6] hover:text-white font-semibold px-6 py-3 rounded-full text-sm transition-all duration-300">
                            Visi & Misi
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Info cards row -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mt-8">
            @foreach([
                ['icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'label' => 'Naungan', 'value' => 'Dinas Pendidikan', 'sub' => 'Kab. Pesisir Barat', 'color' => '#0077B6'],
                ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z', 'label' => 'Lokasi', 'value' => 'Pesisir Tengah', 'sub' => 'Pesisir Barat, Lampung', 'color' => '#023E8A'],
                ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'label' => 'Status', 'value' => 'Negeri', 'sub' => 'Akreditasi A', 'color' => '#00B4D8'],
            ] as $info)
            <div class="card-hover bg-white rounded-2xl p-6 border border-[#CAF0F8] shadow-sm flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl flex items-center justify-center" style="background: {{ $info['color'] }}18;">
                    <svg class="w-6 h-6" style="color: {{ $info['color'] }};" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $info['icon'] }}"/>
                    </svg>
                </div>
                <div>
                    <p class="text-gray-400 text-xs font-medium mb-0.5">{{ $info['label'] }}</p>
                    <p class="font-bold text-[#023E8A] text-sm">{{ $info['value'] }}</p>
                    <p class="text-gray-400 text-xs">{{ $info['sub'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

@endsection