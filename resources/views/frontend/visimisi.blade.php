@extends('layouts.app')

@section('title', 'Visi & Misi Sekolah')

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
    @keyframes fadeUp {
        from { opacity:0; transform:translateY(24px); }
        to   { opacity:1; transform:translateY(0); }
    }
    .fade-up { animation: fadeUp 0.7s ease forwards; }
    .fade-up-d1 { animation-delay: 0.1s; opacity:0; }
    .fade-up-d2 { animation-delay: 0.22s; opacity:0; }
    .fade-up-d3 { animation-delay: 0.34s; opacity:0; }
    .fade-up-d4 { animation-delay: 0.46s; opacity:0; }

    .card-hover {
        transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 48px rgba(2,62,138,0.13);
    }

    .misi-item {
        transition: background 0.25s ease, transform 0.25s ease;
    }
    .misi-item:hover {
        background: #EFF8FF;
        transform: translateX(4px);
    }

    /* Number circle gradient */
    .num-circle {
        background: linear-gradient(135deg, #0077B6, #023E8A);
    }
</style>

<!-- =============================================
     HERO BANNER
     ============================================= -->
<div class="relative overflow-hidden bg-[#023E8A] stripe-bg">
    <div class="absolute inset-0 dot-grid"></div>
    <div class="absolute -top-16 -right-16 w-72 h-72 bg-white/5 rounded-full"></div>
    <div class="absolute top-12 right-40 w-36 h-36 bg-white/5 rounded-full"></div>
    <div class="absolute -bottom-10 -left-10 w-52 h-52 bg-[#00B4D8]/10 rounded-full"></div>

    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-16 sm:py-20 relative z-10">
        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-[#90E0EF] text-xs font-semibold mb-6 fade-up fade-up-d1">
            <a href="/" class="hover:text-white transition">Beranda</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('profile') }}" class="hover:text-white transition">Profil</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white">Visi & Misi</span>
        </div>

        <span class="text-[#90E0EF] text-xs font-bold tracking-[4px] uppercase mb-3 block fade-up fade-up-d1">Identitas Sekolah</span>
        <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight fade-up fade-up-d2">
            Visi & <span class="text-[#00B4D8]">Misi</span>
        </h1>
        <div class="flex items-center gap-3 mt-4 fade-up fade-up-d3">
            <span class="w-14 h-1 bg-[#F4A261] rounded-full"></span>
            <span class="w-8 h-1 bg-[#00B4D8] rounded-full"></span>
            <span class="w-4 h-1 bg-white/30 rounded-full"></span>
        </div>
        <p class="text-[#CAF0F8] text-sm sm:text-base mt-4 max-w-lg leading-relaxed fade-up fade-up-d4">
            Arah dan tujuan SMA Negeri 1 Pesisir Tengah dalam membentuk generasi unggul dan berkarakter.
        </p>
    </div>

    <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" class="block -mb-1">
        <path fill="#f8fafc" d="M0,30 C480,60 960,0 1440,30 L1440,60 L0,60 Z"/>
    </svg>
</div>

<!-- =============================================
     MAIN CONTENT
     ============================================= -->
<div class="bg-slate-50 py-16 sm:py-20">
    <div class="max-w-4xl mx-auto px-6 sm:px-8 space-y-8">

        <!-- ===== VISI CARD ===== -->
        <div class="card-hover bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm fade-up fade-up-d2">

            <!-- Card header -->
            <div class="bg-gradient-to-r from-[#023E8A] to-[#0077B6] px-8 sm:px-10 py-5 flex items-center gap-4">
                <!-- Icon -->
                <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-[#CAF0F8] text-xs font-bold tracking-[3px] uppercase">SMA Negeri 1 Pesisir Tengah</p>
                    <h2 class="font-display text-white text-xl sm:text-2xl font-bold">Visi Sekolah</h2>
                </div>
            </div>

            <!-- Card body -->
            <div class="px-8 sm:px-10 py-8 sm:py-10 relative">
                <!-- Large quote decoration -->
                <div class="absolute top-4 right-6 font-display text-8xl text-[#CAF0F8] leading-none select-none pointer-events-none">"</div>

                <div class="flex gap-4 items-start relative z-10">
                    <div class="w-1 h-full min-h-[60px] bg-gradient-to-b from-[#00B4D8] to-[#0077B6] rounded-full flex-shrink-0"></div>
                    <p class="text-[#023E8A] text-base sm:text-lg md:text-xl font-semibold leading-relaxed italic">
                        "Menjadi sekolah unggul dalam prestasi, berkarakter, berwawasan
                        lingkungan, dan berlandaskan iman serta taqwa."
                    </p>
                </div>
            </div>
        </div>

        <!-- ===== MISI CARD ===== -->
        <div class="card-hover bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm fade-up fade-up-d3">

            <!-- Card header -->
            <div class="bg-gradient-to-r from-[#0077B6] to-[#00B4D8] px-8 sm:px-10 py-5 flex items-center gap-4">
                <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <div>
                    <p class="text-[#CAF0F8] text-xs font-bold tracking-[3px] uppercase">SMA Negeri 1 Pesisir Tengah</p>
                    <h2 class="font-display text-white text-xl sm:text-2xl font-bold">Misi Sekolah</h2>
                </div>
            </div>

            <!-- Misi list -->
            <div class="px-8 sm:px-10 py-8 sm:py-10">
                <div class="space-y-3">
                    @foreach([
                        'Meningkatkan mutu pembelajaran berbasis teknologi digital.',
                        'Menumbuhkan karakter disiplin, jujur, dan tanggung jawab.',
                        'Meningkatkan prestasi akademik dan non-akademik secara berkelanjutan.',
                        'Mewujudkan lingkungan sekolah yang hijau, sehat, dan ramah anak.',
                        'Membangun kolaborasi dengan masyarakat dan dunia pendidikan.',
                    ] as $i => $misi)
                    <div class="misi-item flex items-start gap-4 p-4 rounded-2xl">
                        <!-- Number -->
                        <div class="num-circle flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center shadow-md">
                            <span class="text-white text-xs font-bold">{{ $i + 1 }}</span>
                        </div>
                        <!-- Text -->
                        <p class="text-gray-600 text-sm sm:text-base leading-relaxed pt-0.5">
                            {{ $misi }}
                        </p>
                    </div>
                    @if(!$loop->last)
                    <div class="border-b border-[#CAF0F8] mx-4"></div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Back + nav buttons -->
        <div class="flex flex-wrap items-center justify-between gap-3 pt-2 fade-up fade-up-d4">
            <a href="/"
                class="inline-flex items-center gap-2 bg-[#023E8A] hover:bg-[#0077B6] text-white font-semibold px-6 py-3 rounded-full text-sm transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                </svg>
                Kembali
            </a>
            <div class="flex gap-3">
                <a href="{{ route('profile') }}"
                    class="inline-flex items-center gap-2 border border-[#0077B6] text-[#0077B6] hover:bg-[#0077B6] hover:text-white font-semibold px-5 py-3 rounded-full text-sm transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                    </svg>
                    Profil
                </a>
                <a href="{{ route('struktur') }}"
                    class="inline-flex items-center gap-2 bg-[#0077B6] hover:bg-[#023E8A] text-white font-semibold px-5 py-3 rounded-full text-sm transition-all duration-300 shadow-md">
                    Struktur Organisasi
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>
        </div>

    </div>
</div>

@endsection