@extends('layouts.app')

@section('title', 'Pengumuman')

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
    .fade-up    { animation: fadeUp 0.7s ease forwards; }
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
    .news-card:hover .news-img { transform: scale(1.08); }
    .news-img { transition: transform 0.5s ease; }
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
            <span class="text-white">Pengumuman</span>
        </div>

        <span class="text-[#90E0EF] text-xs font-bold tracking-[4px] uppercase mb-3 block fade-up fade-up-d1">
            Informasi Sekolah
        </span>
        <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight fade-up fade-up-d2">
            Pengumuman <span class="text-[#00B4D8]">Sekolah</span>
        </h1>
        <div class="flex items-center gap-3 mt-4 fade-up fade-up-d3">
            <span class="w-14 h-1 bg-[#F4A261] rounded-full"></span>
            <span class="w-8 h-1 bg-[#00B4D8] rounded-full"></span>
            <span class="w-4 h-1 bg-white/30 rounded-full"></span>
        </div>
        <p class="text-[#CAF0F8] text-sm sm:text-base mt-4 max-w-lg leading-relaxed fade-up fade-up-d4">
            Informasi dan pengumuman terbaru dari SMA Negeri 1 Pesisir Barat.
        </p>

        {{-- Filter Kategori --}}
        <div class="flex flex-wrap gap-2 sm:gap-3 mt-8 fade-up fade-up-d4">
            <a href="{{ route('pengumuman.index') }}"
                class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-bold transition-all duration-300
                {{ !isset($kategori) ? 'bg-white text-[#023E8A]' : 'bg-white/20 text-white border border-white/30 hover:bg-white/30' }}">
                <i class="fas fa-th-large text-xs"></i>
                Semua
            </a>
            @foreach ($kategoriList as $kat)
                <a href="{{ route('pengumuman.byKategori', $kat->id) }}"
                    class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-bold transition-all duration-300
                    {{ isset($kategori) && $kategori->id == $kat->id ? 'bg-white text-[#023E8A]' : 'bg-white/20 text-white border border-white/30 hover:bg-white/30' }}">
                    <i class="fas fa-folder text-xs"></i>
                    {{ $kat->nama_kategori }}
                </a>
            @endforeach
        </div>
    </div>

    <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" class="block -mb-1">
        <path fill="#f8fafc" d="M0,30 C480,60 960,0 1440,30 L1440,60 L0,60 Z"/>
    </svg>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="bg-slate-50 py-16 sm:py-20 font-body">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 space-y-10">

        {{-- ===== DOKUMEN PDF ===== --}}
        @if ($pengumumanPdf->count() > 0)
        <div class="card-hover bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm fade-up fade-up-d2">

            {{-- Card header --}}
            <div class="bg-gradient-to-r from-[#023E8A] to-[#0077B6] px-8 sm:px-10 py-5 flex items-center gap-4">
                <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-file-pdf text-white text-lg"></i>
                </div>
                <div>
                    <p class="text-[#CAF0F8] text-xs font-bold tracking-[3px] uppercase">SMA Negeri 1 Pesisir Barat</p>
                    <h2 class="font-display text-white text-xl sm:text-2xl font-bold">Dokumen Pengumuman</h2>
                </div>
            </div>

            <div class="px-8 sm:px-10 py-8 sm:py-10">

                {{-- Mobile: Card View --}}
                <div class="block lg:hidden space-y-4">
                    @foreach ($pengumumanPdf as $index => $item)
                    <div class="bg-slate-50 rounded-2xl border border-[#CAF0F8] p-4">
                        <div class="flex justify-between items-start mb-3">
                            <span class="bg-[#023E8A] text-white text-xs font-bold px-3 py-1 rounded-full">
                                #{{ $pengumumanPdf->firstItem() + $index }}
                            </span>
                            <span class="bg-blue-100 text-[#023E8A] text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $item->kategori?->nama_kategori ?? '-' }}
                            </span>
                        </div>
                        <h4 class="font-bold text-gray-800 mb-2 text-sm sm:text-base">{{ $item->judul }}</h4>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                            <i class="fas fa-calendar-alt text-[#0077B6]"></i>
                            <span>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('pengumuman.show', $item->id) }}"
                                class="flex-1 inline-flex items-center justify-center gap-1.5 bg-[#023E8A] hover:bg-[#0077B6] text-white text-xs font-bold px-3 py-2 rounded-full transition-all duration-300">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                            <a href="{{ asset('storage/' . $item->file_pdf) }}" target="_blank"
                                class="flex-1 inline-flex items-center justify-center gap-1.5 border-2 border-[#0077B6] text-[#0077B6] hover:bg-[#0077B6] hover:text-white text-xs font-bold px-3 py-2 rounded-full transition-all duration-300">
                                <i class="fas fa-download"></i> Download
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Desktop: Table View --}}
                <div class="hidden lg:block overflow-hidden rounded-2xl border border-[#CAF0F8]">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="bg-[#023E8A] text-white">
                                <th class="px-5 py-3.5 text-center font-bold w-14">No</th>
                                <th class="px-5 py-3.5 font-bold text-left">Judul</th>
                                <th class="px-5 py-3.5 font-bold text-left">Kategori</th>
                                <th class="px-5 py-3.5 font-bold text-left">Tanggal</th>
                                <th class="px-5 py-3.5 text-center font-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-[#CAF0F8]">
                            @foreach ($pengumumanPdf as $index => $item)
                            <tr class="hover:bg-[#f0f7ff] transition-colors duration-200">
                                <td class="px-5 py-3.5 text-center font-bold text-gray-600">
                                    {{ $pengumumanPdf->firstItem() + $index }}
                                </td>
                                <td class="px-5 py-3.5 font-semibold text-gray-800">{{ $item->judul }}</td>
                                <td class="px-5 py-3.5">
                                    <span class="bg-blue-100 text-[#023E8A] text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $item->kategori?->nama_kategori ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-5 py-3.5 text-gray-500 text-sm">
                                    <span class="flex items-center gap-2">
                                        <i class="fas fa-calendar-alt text-[#0077B6]"></i>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                    </span>
                                </td>
                                <td class="px-5 py-3.5">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('pengumuman.show', $item->id) }}"
                                            class="inline-flex items-center gap-1 bg-[#023E8A] hover:bg-[#0077B6] text-white text-xs font-bold px-4 py-1.5 rounded-full transition-all duration-300">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                        <a href="{{ asset('storage/' . $item->file_pdf) }}" target="_blank"
                                            class="inline-flex items-center gap-1 border-2 border-[#0077B6] text-[#0077B6] hover:bg-[#0077B6] hover:text-white text-xs font-bold px-4 py-1.5 rounded-full transition-all duration-300">
                                            <i class="fas fa-download"></i> Download
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $pengumumanPdf->appends(request()->query())->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
        @endif

        {{-- ===== PENGUMUMAN UMUM ===== --}}
        @if ($pengumumanBiasa->count() > 0)
        <div class="card-hover bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm fade-up fade-up-d3">

            {{-- Card header --}}
            <div class="bg-gradient-to-r from-[#0077B6] to-[#00B4D8] px-8 sm:px-10 py-5 flex items-center gap-4">
                <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-newspaper text-white text-lg"></i>
                </div>
                <div>
                    <p class="text-[#CAF0F8] text-xs font-bold tracking-[3px] uppercase">SMA Negeri 1 Pesisir Barat</p>
                    <h2 class="font-display text-white text-xl sm:text-2xl font-bold">Pengumuman Umum</h2>
                </div>
            </div>

            <div class="px-8 sm:px-10 py-8 sm:py-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                    @foreach ($pengumumanBiasa as $item)
                    <div class="news-card bg-slate-50 rounded-2xl border border-[#CAF0F8] overflow-hidden flex flex-col hover:border-[#0077B6] hover:shadow-lg transition-all duration-300">

                        {{-- Foto --}}
                        <div class="relative h-44 overflow-hidden">
                            <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                                alt="Foto Pengumuman"
                                class="news-img h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                            <span class="absolute top-3 right-3 bg-[#023E8A] text-white text-xs font-bold px-3 py-1 rounded-full">
                                {{ $item->kategori?->nama_kategori ?? '-' }}
                            </span>
                        </div>

                        {{-- Konten --}}
                        <div class="p-4 sm:p-5 flex-1 flex flex-col">
                            <h4 class="font-bold text-gray-800 text-sm sm:text-base mb-2 leading-snug">
                                {{ $item->judul }}
                            </h4>
                            <p class="text-gray-500 text-xs sm:text-sm mb-3 flex-1 leading-relaxed">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}
                            </p>
                            <div class="flex items-center justify-between pt-3 border-t border-[#CAF0F8]">
                                <span class="flex items-center gap-1.5 text-xs text-gray-400">
                                    <i class="fas fa-calendar-alt text-[#0077B6]"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                </span>
                                <a href="{{ route('pengumuman.show', $item->id) }}"
                                    class="inline-flex items-center gap-1 text-[#0077B6] hover:text-[#023E8A] text-xs font-bold transition-colors duration-200">
                                    Baca
                                    <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $pengumumanBiasa->appends(request()->query())->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
        @endif

        {{-- Tombol Kembali --}}
        <div class="flex justify-center pt-2 fade-up fade-up-d4">
            <a href="/"
                class="inline-flex items-center gap-2 bg-[#023E8A] hover:bg-[#0077B6] text-white font-semibold px-8 py-3 rounded-full text-sm transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>

    </div>
</div>

@endsection