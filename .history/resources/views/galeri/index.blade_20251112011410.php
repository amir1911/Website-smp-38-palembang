@extends('layouts.app')

@section('title', 'Galeri Modern')

@section('content')
<div 
    x-data="galeriCarousel({{ $galeri->toJson() }})" 
    class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-16 px-4"
>
    {{-- Header dengan animasi --}}
    <div class="max-w-7xl mx-auto text-center mb-16 space-y-4">
        <div class="inline-flex items-center gap-3 bg-white/80 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg border border-blue-100">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="text-sm font-semibold text-gray-600 uppercase tracking-wider">Gallery Collection</span>
        </div>
        <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 bg-clip-text text-transparent">
            Galeri Modern
        </h1>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">
            Jelajahi koleksi momen terbaik kami dalam tampilan yang memukau
        </p>
    </div>

    @if ($galeri->count())
        {{-- Grid Galeri dengan efek hover advanced --}}
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <template x-for="(item, index) in items" :key="item.id">
                    <div 
                        class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 cursor-pointer bg-white"
                        @click="openModal(index)"
                        x-data="{ hover: false }"
                        @mouseenter="hover = true"
                        @mouseleave="hover = false"
                    >
                        {{-- Gambar dengan overlay gradient --}}
                        <div class="relative overflow-hidden h-72">
                            <img 
                                :src="`/storage/${item.foto}`"
                                :alt="item.judul"
                                class="w-full h-full object-cover transform group-hover:scale-110 group-hover:rotate-2 transition-all duration-700"
                            >
                            {{-- Gradient overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            {{-- Badge kategori --}}
                            <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-x-4 group-hover:translate-x-0">
                                <span class="bg-blue-600/90 backdrop-blur-sm text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg" x-text="item.kategori?.nama ?? 'Umum'"></span>
                            </div>

                            {{-- Icon zoom --}}
                            <div class="absolute top-3 left-3 opacity-0 group-hover:opacity-100 transition-all duration-300 transform -translate-x-4 group-hover:translate-x-0">
                                <div class="bg-white/90 backdrop-blur-sm text-gray-800 p-2 rounded-full shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Info card --}}
                        <div class="absolute bottom-0 left-0 right-0 p-5 transform translate-y-6 group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="text-white font-bold text-lg mb-1 line-clamp-1" x-text="item.judul"></h3>
                            <p class="text-gray-300 text-sm line-clamp-2" x-text="item.deskripsi ?? 'Lihat detail lengkap'"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- Modal Lightbox Ultra Modern --}}
        <div 
            x-show="modalOpen" 
            x-cloak 
            @click.self="closeModal"
            @keydown.escape.window="closeModal"
            @keydown.arrow-left.window="modalOpen && prev()"
            @keydown.arrow-right.window="modalOpen && next()"
            class="fixed inset-0 bg-black/95 backdrop-blur-md flex items-center justify-center z-50 p-4"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div 
                class="relative max-w-7xl w-full"
                x-transition:enter="transition ease-out duration-300 delay-100"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
            >
                {{-- Header modal --}}
                <div class="absolute -top-16 left-0 right-0 flex justify-between items-center px-4 z-10">
                    <div class="text-white">
                        <p class="text-sm text-gray-400 mb-1">Foto <span x-text="currentIndex + 1"></span> dari <span x-text="items.length"></span></p>
                        <h2 class="text-2xl font-bold" x-text="items[currentIndex].judul"></h2>
                    </div>
                    <button 
                        @click="closeModal"
                        class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white rounded-full p-3 transition-all duration-300 hover:rotate-90 group"
                        title="Tutup (ESC)"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                {{-- Container gambar --}}
                <div class="relative rounded-2xl overflow-hidden bg-gradient-to-br from-gray-900 to-black shadow-2xl">
                    {{-- Gambar utama --}}
                    <div class="flex justify-center items-center min-h-[60vh] max-h-[75vh] bg-black/50">
                        <img 
                            :src="`/storage/${items[currentIndex].foto}`" 
                            :alt="items[currentIndex].judul"
                            class="max-h-full max-w-full object-contain select-none"
                            @click.stop
                        >
                    </div>

                    {{-- Tombol navigasi Previous --}}
                    <button 
                        @click.stop="prev"
                        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 backdrop-blur-md text-white rounded-full p-4 transition-all duration-300 hover:scale-110 group"
                        title="Sebelumnya (←)"
                    >
                        <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>

                    {{-- Tombol navigasi Next --}}
                    <button 
                        @click.stop="next"
                        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white/20 backdrop-blur-md text-white rounded-full p-4 transition-all duration-300 hover:scale-110 group"
                        title="Selanjutnya (→)"
                    >
                        <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    {{-- Info panel --}}
                    <div class="bg-gradient-to-t from-black via-black/95 to-transparent p-6">
                        <div class="max-w-4xl mx-auto">
                            <div class="flex items-start justify-between gap-4 mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <span class="inline-flex items-center bg-blue-600/20 border border-blue-500/30 text-blue-400 text-xs font-semibold px-3 py-1 rounded-full">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                            </svg>
                                            <span x-text="items[currentIndex].kategori?.nama ?? 'Tanpa Kategori'"></span>
                                        </span>
                                    </div>
                                    <p class="text-gray-300 text-sm leading-relaxed" x-text="items[currentIndex].deskripsi ?? 'Tidak ada deskripsi tersedia.'"></p>
                                </div>
                            </div>

                            {{-- Thumbnail navigator --}}
                            <div class="flex gap-2 overflow-x-auto pb-2 scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-transparent">
                                <template x-for="(item, i) in items" :key="i">
                                    <button
                                        @click.stop="goTo(i)" 
                                        class="flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden transition-all duration-300 ring-2"
                                        :class="i === currentIndex ? 'ring-blue-500 scale-110' : 'ring-transparent opacity-50 hover:opacity-100 hover:ring-white/30'"
                                    >
                                        <img 
                                            :src="`/storage/${item.foto}`" 
                                            :alt="item.judul"
                                            class="w-full h-full object-cover"
                                        >
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Progress indicator --}}
                <div class="absolute -bottom-12 left-0 right-0 flex justify-center gap-2">
                    <template x-for="(item, i) in items" :key="i">
                        <button 
                            @click.stop="goTo(i)" 
                            class="h-1 rounded-full transition-all duration-300"
                            :class="i === currentIndex ? 'bg-blue-500 w-8' : 'bg-gray-600 w-6 hover:bg-gray-400'"
                            :title="`${i + 1}. ${item.judul}`"
                        ></button>
                    </template>
                </div>
            </div>
        </div>
    @else
        {{-- Empty state --}}
        <div class="max-w-md mx-auto text-center py-16">
            <div class="bg-white rounded-2xl shadow-xl p-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Galeri</h3>
                <p class="text-gray-500">Galeri foto akan muncul di sini ketika sudah ditambahkan.</p>
            </div>
        </div>
    @endif
</div>

{{-- Alpine.js Carousel Script --}}
<script>
    function galeriCarousel(data) {
        return {
            items: data,
            modalOpen: false,
            currentIndex: 0,
            
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
                this.currentIndex = (this.currentIndex + 1) % this.items.length;
            },
            
            prev() {
                this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
            },
            
            goTo(index) {
                this.currentIndex = index;
            }
        }
    }
</script>

<style>
    [x-cloak] { display: none !important; }
    
    /* Custom scrollbar */
    .scrollbar-thin::-webkit-scrollbar {
        height: 6px;
    }
    
    .scrollbar-thumb-gray-600::-webkit-scrollbar-thumb {
        background-color: rgba(75, 85, 99, 0.5);
        border-radius: 3px;
    }
    
    .scrollbar-thumb-gray-600::-webkit-scrollbar-thumb:hover {
        background-color: rgba(75, 85, 99, 0.8);
    }
    
    .scrollbar-track-transparent::-webkit-scrollbar-track {
        background: transparent;
    }
</style>
@endsection