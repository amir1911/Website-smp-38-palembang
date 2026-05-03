@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">

<style>
    .font-display { font-family: 'Playfair Display', serif; }
    .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }

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
    .fade-up   { animation: fadeUp 0.7s ease forwards; }
    .fade-up-d1 { animation-delay: 0.1s;  opacity:0; }
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
</style>

{{-- ===== HERO BANNER ===== --}}
<div class="relative overflow-hidden bg-[#023E8A] stripe-bg font-body">
    <div class="absolute inset-0 dot-grid"></div>
    <div class="absolute -top-16 -right-16 w-72 h-72 bg-white/5 rounded-full"></div>
    <div class="absolute top-12 right-40 w-36 h-36 bg-white/5 rounded-full"></div>
    <div class="absolute -bottom-10 -left-10 w-52 h-52 bg-[#00B4D8]/10 rounded-full"></div>

    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-16 sm:py-20 relative z-10">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-[#90E0EF] text-xs font-semibold mb-6 fade-up fade-up-d1">
            <a href="/" class="hover:text-white transition">Beranda</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('profile') }}" class="hover:text-white transition">Profil</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white">Struktur Organisasi</span>
        </div>

        <span class="text-[#90E0EF] text-xs font-bold tracking-[4px] uppercase mb-3 block fade-up fade-up-d1">
            Profil Sekolah
        </span>
        <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight fade-up fade-up-d2">
            Struktur <span class="text-[#00B4D8]">Organisasi</span>
        </h1>
        <div class="flex items-center gap-3 mt-4 fade-up fade-up-d3">
            <span class="w-14 h-1 bg-[#F4A261] rounded-full"></span>
            <span class="w-8 h-1 bg-[#00B4D8] rounded-full"></span>
            <span class="w-4 h-1 bg-white/30 rounded-full"></span>
        </div>
        <p class="text-[#CAF0F8] text-sm sm:text-base mt-4 max-w-lg leading-relaxed fade-up fade-up-d4">
            Susunan organisasi SMP Negeri 38 Palembang dalam mengelola penyelenggaraan pendidikan.
        </p>
    </div>

    <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" class="block -mb-1">
        <path fill="#f8fafc" d="M0,30 C480,60 960,0 1440,30 L1440,60 L0,60 Z"/>
    </svg>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="bg-slate-50 py-16 sm:py-20 font-body">
    <div class="max-w-4xl mx-auto px-6 sm:px-8 space-y-8">

        {{-- Card Bagan --}}
        <div class="card-hover bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm fade-up fade-up-d2">

            {{-- Card header --}}
            <div class="bg-gradient-to-r from-[#023E8A] to-[#0077B6] px-8 sm:px-10 py-5 flex items-center gap-4">
                <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                    </svg>
                </div>
                <div>
                    <p class="text-[#CAF0F8] text-xs font-bold tracking-[3px] uppercase">SMP Negeri 38 Palembang</p>
                    <h2 class="font-display text-white text-xl sm:text-2xl font-bold">Bagan Struktur Organisasi</h2>
                </div>
            </div>

            {{-- Card body --}}
            <div class="px-8 sm:px-10 py-8 sm:py-10">

                {{-- Gambar --}}
                <div class="bg-[#f0f7ff] border border-[#CAF0F8] rounded-2xl p-1.5 mb-4">
                    <img src="{{ asset('storage/struktursmp38.png') }}"
                        alt="Bagan Struktur Organisasi SMP Negeri 38 Palembang"
                        class="w-full h-auto rounded-xl hover:shadow-lg transition-shadow duration-300">
                </div>

                {{-- Caption --}}
                <p class="text-slate-400 text-xs sm:text-sm text-center mb-6">
                    Bagan Struktur Organisasi SMP Negeri 38 Palembang
                </p>

                {{-- Tombol aksi --}}
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <a href="/"
                        class="inline-flex items-center gap-2 bg-[#023E8A] hover:bg-[#0077B6] text-white font-semibold px-6 py-2.5 rounded-full text-sm transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                        </svg>
                        Kembali
                    </a>
                    <div class="flex gap-2">
                        <a href="{{ asset('storage/struktursmp38.png') }}" download
                            class="inline-flex items-center gap-1.5 border-2 border-[#0077B6] text-[#0077B6] hover:bg-[#0077B6] hover:text-white font-semibold px-5 py-2 rounded-full text-xs transition-all duration-300">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/>
                                <polyline points="7 10 12 15 17 10"/>
                                <line x1="12" y1="15" x2="12" y2="3"/>
                            </svg>
                            Unduh
                        </a>
                        <a href="{{ asset('storage/struktursmp38.png') }}" target="_blank"
                            class="inline-flex items-center gap-1.5 bg-[#0077B6] hover:bg-[#023E8A] text-white font-semibold px-5 py-2 rounded-full text-xs transition-all duration-300 shadow-md">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/>
                            </svg>
                            Perbesar
                        </a>
                    </div>
                </div>

            </div>
        </div>

        {{-- Navigasi antar halaman --}}
        {{-- Navigasi antar halaman --}}
<div class="flex flex-wrap items-center justify-between gap-3 pt-2 fade-up fade-up-d4">
    <a href="{{ route('profile') }}"
        class="inline-flex items-center gap-2 border-2 border-[#0077B6] text-[#0077B6] hover:bg-[#0077B6] hover:text-white font-semibold px-5 py-3 rounded-full text-sm transition-all duration-300">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
        </svg>
        Profil
    </a>
    <a href="{{ route('visimisi') }}"
        class="inline-flex items-center gap-2 bg-[#0077B6] hover:bg-[#023E8A] text-white font-semibold px-5 py-3 rounded-full text-sm transition-all duration-300 shadow-md">
        Visi &amp; Misi
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
        </svg>
    </a>
</div>

    </div>
</div>

@endsection