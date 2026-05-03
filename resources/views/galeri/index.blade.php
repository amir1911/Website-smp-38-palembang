@extends('layouts.app')

@section('title', 'Galeri')

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
    [x-cloak] { display: none !important; }
</style>

{{-- ===== HERO BANNER ===== --}}
<div x-data="galeriCarousel({{ $galeri->toJson() }}, {{ $kategori->toJson() }})"
    class="font-body">

    <div class="relative overflow-hidden bg-[#023E8A] stripe-bg">
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
                <span class="text-white">Galeri</span>
            </div>

            <span class="text-[#90E0EF] text-xs font-bold tracking-[4px] uppercase mb-3 block fade-up fade-up-d1">
                Dokumentasi Sekolah
            </span>
            <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight fade-up fade-up-d2">
                Galeri <span class="text-[#00B4D8]">Foto</span>
            </h1>
            <div class="flex items-center gap-3 mt-4 fade-up fade-up-d3">
                <span class="w-14 h-1 bg-[#F4A261] rounded-full"></span>
                <span class="w-8 h-1 bg-[#00B4D8] rounded-full"></span>
                <span class="w-4 h-1 bg-white/30 rounded-full"></span>
            </div>
            <p class="text-[#CAF0F8] text-sm sm:text-base mt-4 max-w-lg leading-relaxed fade-up fade-up-d4">
                Jelajahi koleksi momen terbaik SMP Negeri 38 Palembang.
            </p>

            {{-- Filter Kategori --}}
            <div class="flex flex-wrap gap-2 sm:gap-3 mt-8 fade-up fade-up-d4">
                <button @click="selectedKategori = 'all'"
                    :class="selectedKategori === 'all' ? 'bg-white text-[#023E8A]' : 'bg-white/20 text-white border border-white/30 hover:bg-white/30'"
                    class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-bold transition-all duration-300">
                    <i class="fas fa-th-large text-xs"></i>
                    Semua
                </button>
                <template x-for="kat in kategori" :key="kat.id">
                    <button @click="selectedKategori = kat.nama"
                        :class="selectedKategori === kat.nama ? 'bg-white text-[#023E8A]' : 'bg-white/20 text-white border border-white/30 hover:bg-white/30'"
                        class="inline-flex items-center gap-2 px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-bold transition-all duration-300">
                        <i class="fas fa-folder text-xs"></i>
                        <span x-text="kat.nama"></span>
                    </button>
                </template>
            </div>
        </div>

        <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" class="block -mb-1">
            <path fill="#f8fafc" d="M0,30 C480,60 960,0 1440,30 L1440,60 L0,60 Z"/>
        </svg>
    </div>

    {{-- ===== MAIN CONTENT ===== --}}
    <div class="bg-slate-50 py-16 sm:py-20">
        <div class="max-w-6xl mx-auto px-6 sm:px-8 space-y-8">

            {{-- Card Galeri --}}
            <div class="card-hover bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm fade-up fade-up-d2">

                {{-- Card header --}}
                <div class="bg-gradient-to-r from-[#023E8A] to-[#0077B6] px-8 sm:px-10 py-5 flex items-center gap-4">
                    <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-images text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="text-[#CAF0F8] text-xs font-bold tracking-[3px] uppercase">SMP Negeri 38 Palembang</p>
                        <h2 class="font-display text-white text-xl sm:text-2xl font-bold">Koleksi Foto</h2>
                    </div>
                </div>

                <div class="px-6 sm:px-8 md:px-10 py-8 sm:py-10">

                    {{-- Grid Galeri --}}
                    <template x-if="filteredItems.length">
                        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4 md:gap-5">
                            <template x-for="(item, index) in filteredItems" :key="item.id">
                                <div class="group relative overflow-hidden rounded-2xl cursor-pointer bg-gray-100 border border-[#CAF0F8] hover:border-[#0077B6] hover:shadow-lg transition-all duration-300"
                                    @click="openModal(index)">
                                    <div class="relative overflow-hidden aspect-[4/3]">
                                        <img :src="`/storage/${item.foto}`" :alt="item.judul"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                            loading="lazy">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                        {{-- Badge kategori --}}
                                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3">
                                            <span class="bg-[#023E8A] text-white text-[10px] sm:text-xs font-bold px-2 sm:px-3 py-1 rounded-full"
                                                x-text="item.kategori?.nama ?? 'Umum'"></span>
                                        </div>

                                        {{-- Overlay info --}}
                                        <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                            <h3 class="text-white font-bold text-xs sm:text-sm line-clamp-1" x-text="item.judul"></h3>
                                            <p class="text-white/70 text-[10px] sm:text-xs line-clamp-2 hidden sm:block mt-0.5"
                                                x-text="item.deskripsi ?? 'Lihat detail'"></p>
                                        </div>
                                    </div>

                                    {{-- Mobile label --}}
                                    <div class="p-2 sm:hidden">
                                        <h3 class="text-gray-700 font-semibold text-xs line-clamp-1" x-text="item.judul"></h3>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    {{-- Kosong --}}
                    <template x-if="!filteredItems.length">
                        <div class="text-center py-16">
                            <div class="w-16 h-16 bg-blue-50 border border-[#CAF0F8] rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-images text-2xl text-[#0077B6]"></i>
                            </div>
                            <h3 class="text-base font-semibold text-gray-700 mb-1">Belum Ada Galeri</h3>
                            <p class="text-sm text-gray-400">Tidak ada gambar dalam kategori yang dipilih.</p>
                        </div>
                    </template>

                </div>
            </div>

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

    {{-- ===== MODAL LIGHTBOX ===== --}}
    <div x-show="modalOpen" x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @keydown.escape.window="closeModal()"
        @keydown.arrow-left.window="prev()"
        @keydown.arrow-right.window="next()"
        class="fixed inset-0 z-[9999] bg-black/95 flex flex-col">

        {{-- Header Modal --}}
        <div class="flex items-center justify-between px-5 py-3 bg-black/60 border-b border-white/10">
            <div class="flex items-center gap-3">
                <span class="bg-[#023E8A] text-white text-xs font-bold px-3 py-1 rounded-full"
                    x-text="filteredItems[currentIndex]?.kategori?.nama ?? 'Umum'"></span>
                <span class="text-white/50 text-xs"
                    x-text="`${currentIndex + 1} / ${filteredItems.length}`"></span>
            </div>
            <button @click="closeModal()"
                class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-all">
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        {{-- Gambar + Navigasi --}}
        <div class="flex-1 flex items-center justify-center relative px-4">
            <button @click="prev()" x-show="filteredItems.length > 1"
                class="absolute left-2 sm:left-6 bg-white/10 hover:bg-white/25 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all">
                <i class="fas fa-chevron-left text-sm"></i>
            </button>

            <img :src="`/storage/${filteredItems[currentIndex]?.foto}`"
                :alt="filteredItems[currentIndex]?.judul"
                class="max-h-[70vh] max-w-full object-contain rounded-xl"
                :key="currentIndex">

            <button @click="next()" x-show="filteredItems.length > 1"
                class="absolute right-2 sm:right-6 bg-white/10 hover:bg-white/25 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all">
                <i class="fas fa-chevron-right text-sm"></i>
            </button>
        </div>

        {{-- Info & Thumbnails --}}
        <div class="bg-black/60 border-t border-white/10 px-5 py-4">
            <div class="max-w-4xl mx-auto">
                <h3 class="text-white font-bold text-sm sm:text-base mb-0.5"
                    x-text="filteredItems[currentIndex]?.judul"></h3>
                <p class="text-white/50 text-xs sm:text-sm mb-3"
                    x-text="filteredItems[currentIndex]?.deskripsi ?? 'Tidak ada deskripsi'"></p>

                <div class="flex gap-2 overflow-x-auto pb-1" x-show="filteredItems.length > 1">
                    <template x-for="(item, idx) in filteredItems" :key="item.id">
                        <button @click="goTo(idx)"
                            :class="idx === currentIndex ? 'ring-2 ring-[#00B4D8] opacity-100' : 'opacity-40 hover:opacity-70'"
                            class="flex-shrink-0 w-12 h-12 sm:w-14 sm:h-14 rounded-xl overflow-hidden transition-all">
                            <img :src="`/storage/${item.foto}`" class="w-full h-full object-cover">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function galeriCarousel(data, kategori) {
        return {
            items: data,
            kategori: kategori,
            selectedKategori: 'all',
            modalOpen: false,
            currentIndex: 0,
            get filteredItems() {
                if (this.selectedKategori === 'all') return this.items;
                return this.items.filter(i => i.kategori?.nama === this.selectedKategori);
            },
            openModal(index) {
                this.currentIndex = index;
                this.modalOpen = true;
                document.body.style.overflow = 'hidden';
            },
            closeModal() {
                this.modalOpen = false;
                document.body.style.overflow = 'auto';
            },
            next() {
                this.currentIndex = (this.currentIndex + 1) % this.filteredItems.length;
            },
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.filteredItems.length) % this.filteredItems.length;
            },
            goTo(index) {
                this.currentIndex = index;
            }
        }
    }
</script>

@endsection