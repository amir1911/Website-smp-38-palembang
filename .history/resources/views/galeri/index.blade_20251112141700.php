@extends('layouts.app')

@section('title', 'Galeri Modern')

@section('content')
<div 
    x-data="galeriCarousel({{ $galeri->toJson() }}, {{ $kategori->toJson() }})" 
    class="min-h-screen py-12 md:py-20 px-4 sm:px-6 lg:px-8 relative overflow-hidden"
>

    {{-- Modern Header --}}
    <div class="relative max-w-7xl mx-auto text-center mb-12 md:mb-16 space-y-4 md:space-y-6">
        <div class="inline-flex items-center gap-2 md:gap-3 bg-white/90 backdrop-blur-sm px-4 md:px-6 py-2 md:py-3 rounded-full shadow-lg border border-blue-100 hover:shadow-xl transition-all duration-300">
            <svg class="w-5 h-5 md:w-6 md:h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="text-xs md:text-sm font-semibold text-gray-600 uppercase tracking-wider">Gallery Collection</span>
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-blue-600 leading-tight px-4">
            Galeri Modern
        </h1>
        <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto px-4">
            Jelajahi koleksi momen terbaik kami dalam tampilan yang memukau
        </p>

        {{-- === FILTER KATEGORI === --}}
        <div class="flex flex-wrap justify-center gap-3 md:gap-4 mt-8">
            <button 
                @click="selectedKategori = 'all'"
                :class="selectedKategori === 'all' 
                    ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/30' 
                    : 'bg-white/90 backdrop-blur-sm text-blue-600 border border-blue-300 hover:bg-blue-50'"
                class="px-4 md:px-6 py-2 md:py-2.5 rounded-full text-sm md:text-base font-semibold transition-all duration-300"
            >
                Semua
            </button>

            <template x-for="kat in kategori" :key="kat.id">
                <button 
                    @click="selectedKategori = kat.nama"
                    :class="selectedKategori === kat.nama 
                        ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/30' 
                        : 'bg-white/90 backdrop-blur-sm text-blue-600 border border-blue-300 hover:bg-blue-50'"
                    class="px-4 md:px-6 py-2 md:py-2.5 rounded-full text-sm md:text-base font-semibold transition-all duration-300"
                    x-text="kat.nama"
                ></button>
            </template>
        </div>
    </div>

    {{-- GRID GALERI --}}
    <template x-if="filteredItems.length">
        <div class="relative max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
                <template x-for="(item, index) in filteredItems" :key="item.id">
                    <div 
                        class="group relative overflow-hidden rounded-2xl md:rounded-3xl cursor-pointer transform hover:scale-[1.02] transition-all duration-500 bg-white shadow-md hover:shadow-2xl"
                        @click="openModal(index)"
                    >
                        {{-- Image Container --}}
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img 
                                :src="`/storage/${item.foto}`"
                                :alt="item.judul"
                                class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-700"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>

                            {{-- Category Badge --}}
                            <div class="absolute top-3 right-3 opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-all duration-300 transform md:translate-x-4 md:group-hover:translate-x-0">
                                <span class="bg-blue-500 backdrop-blur-sm text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg" 
                                      x-text="item.kategori?.nama ?? 'Umum'"></span>
                            </div>

                            {{-- Info --}}
                            <div class="absolute bottom-0 left-0 right-0 p-4 md:p-5 transform translate-y-0 md:translate-y-6 md:group-hover:translate-y-0 transition-transform duration-300 bg-gradient-to-t from-black/80 to-transparent md:bg-transparent">
                                <h3 class="text-white font-bold text-base md:text-lg mb-1 line-clamp-1" x-text="item.judul"></h3>
                                <p class="text-gray-200 md:text-gray-300 text-sm line-clamp-2" x-text="item.deskripsi ?? 'Lihat detail lengkap'"></p>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </template>

    {{-- Jika Kosong --}}
    <template x-if="!filteredItems.length">
        <div class="relative max-w-md mx-auto text-center py-12 sm:py-16">
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-xl p-8 sm:p-12">
                <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                    <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">Belum Ada Galeri</h3>
                <p class="text-sm sm:text-base text-gray-500">Tidak ada gambar dalam kategori yang dipilih.</p>
            </div>
        </div>
    </template>

    {{-- ========== MODAL LIGHTBOX ========== --}}
  {{-- ========== MODAL LIGHTBOX RESPONSIF ========== --}}
<div 
    x-show="modalOpen" 
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @keydown.escape.window="closeModal()"
    @keydown.arrow-left.window="prev()"
    @keydown.arrow-right.window="next()"
    class="fixed inset-0 z-[9999] bg-black flex flex-col justify-between"
>

    {{-- Header --}}
    <div class="absolute top-0 left-0 right-0 bg-gradient-to-b from-black/80 to-transparent z-50">
        <div class="flex items-center justify-between px-3 sm:px-4 py-3">
            <div class="flex items-center gap-2">
                <span 
                    class="bg-blue-500 text-white text-xs font-semibold px-2.5 py-1 rounded-full"
                    x-text="filteredItems[currentIndex]?.kategori?.nama ?? 'Umum'"
                ></span>
                <span class="text-white text-xs sm:text-sm" x-text="`${currentIndex + 1} / ${filteredItems.length}`"></span>
            </div>
            <button 
                @click="closeModal()"
                class="bg-white/10 hover:bg-white/20 text-white p-2 rounded-full transition-all active:scale-90"
            >
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Tombol Navigasi Floating --}}
    <div class="absolute inset-y-0 left-0 right-0 flex justify-between items-center px-2 sm:px-4 pointer-events-none">
        <button 
            @click="prev()" 
            class="pointer-events-auto bg-white/10 hover:bg-white/20 text-white p-3 sm:p-4 rounded-full transition-all active:scale-95 md:left-4"
            x-show="filteredItems.length > 1"
        >
            <svg class="w-5 h-5 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        <button 
            @click="next()" 
            class="pointer-events-auto bg-white/10 hover:bg-white/20 text-white p-3 sm:p-4 rounded-full transition-all active:scale-95 md:right-4"
            x-show="filteredItems.length > 1"
        >
            <svg class="w-5 h-5 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
            </svg>
        </button>
    </div>

    {{-- Konten Gambar --}}
    <div class="flex-1 flex items-center justify-center pt-16 sm:pt-20 px-2 sm:px-4 md:px-8 overflow-hidden">
        <img 
            :src="`/storage/${filteredItems[currentIndex]?.foto}`"
            :alt="filteredItems[currentIndex]?.judul"
            class="max-h-[80vh] w-auto h-auto object-contain rounded-lg shadow-lg"
            :key="currentIndex"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
        >
    </div>

    {{-- Info & Thumbnail --}}
    <div class="bg-gradient-to-t from-black/90 to-transparent backdrop-blur-md">
        <div class="px-3 sm:px-4 md:px-6 pb-4 sm:pb-6">
            {{-- Info --}}
            <div class="bg-white/5 backdrop-blur-md rounded-xl p-3 sm:p-4 mb-3">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                    <div class="min-w-0 flex-1">
                        <h3 class="text-white text-sm sm:text-base md:text-lg font-bold mb-1 line-clamp-2" 
                            x-text="filteredItems[currentIndex]?.judul"></h3>
                        <p class="text-gray-300 text-xs sm:text-sm line-clamp-3" 
                            x-text="filteredItems[currentIndex]?.deskripsi ?? 'Tidak ada deskripsi'"></p>
                    </div>
                </div>
            </div>

            {{-- Thumbnail --}}
            <div 
                class="flex gap-2 overflow-x-auto scrollbar-hide pb-1 sm:pb-2"
                x-show="filteredItems.length > 1"
                style="-webkit-overflow-scrolling: touch;"
            >
                <template x-for="(item, idx) in filteredItems" :key="item.id">
                    <button
                        @click="goTo(idx)"
                        :class="idx === currentIndex ? 'ring-2 ring-blue-500 opacity-100 scale-105' : 'opacity-70 hover:opacity-100'"
                        class="flex-shrink-0 w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-lg overflow-hidden transition-all duration-300"
                    >
                        <img 
                            :src="`/storage/${item.foto}`"
                            :alt="item.judul"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                    </button>
                </template>
            </div>
        </div>
    </div>
</div>

{{-- Script Alpine.js --}}
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

<style>
    [x-cloak] { display: none !important; }
    
    /* Custom Scrollbar */
    .scrollbar-thin::-webkit-scrollbar {
        height: 6px;
    }
    .scrollbar-thin::-webkit-scrollbar-track {
        background: transparent;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 3px;
    }
    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.3);
    }
</style>
@endsection