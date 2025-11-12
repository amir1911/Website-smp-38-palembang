@extends('layouts.app')

@section('title', 'Galeri Modern')

@section('content')
<div 
    x-data="galeriCarousel({{ $galeri->toJson() }})" 
    class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-cyan-50 py-20 px-4 relative overflow-hidden"
>

    {{-- Header with Glass Effect --}}
    <div class="relative max-w-7xl mx-auto text-center mb-20 space-y-6">
        <div class="inline-flex items-center gap-3 bg-blue-500/10 backdrop-blur-xl border border-blue-400/20 px-8 py-4 rounded-2xl shadow-2xl hover:shadow-blue-500/20 transition-all duration-300 group">
            <svg class="w-7 h-7 text-blue-400 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span class="text-sm font-bold text-blue-300 uppercase tracking-widest">Premium Gallery</span>
        </div>
        
        <h1 class="text-6xl md:text-7xl lg:text-8xl font-black">
            <span class="bg-gradient-to-r from-blue-400 via-cyan-300 to-blue-500 bg-clip-text text-transparent drop-shadow-2xl animate-gradient">
                Galeri Modern
            </span>
        </h1>
        
        <p class="text-blue-200/80 text-xl max-w-3xl mx-auto leading-relaxed">
            Jelajahi koleksi visual yang memukau dengan teknologi tampilan terkini
        </p>

        {{-- Stats Bar --}}
        <div class="flex justify-center gap-8 mt-8">
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-400" x-text="items.length"></div>
                <div class="text-sm text-blue-300/60">Total Foto</div>
            </div>
            <div class="w-px bg-blue-500/20"></div>
            <div class="text-center">
                <div class="text-3xl font-bold text-cyan-400">HD</div>
                <div class="text-sm text-blue-300/60">Quality</div>
            </div>
            <div class="w-px bg-blue-500/20"></div>
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-400">∞</div>
                <div class="text-sm text-blue-300/60">Memories</div>
            </div>
        </div>
    </div>

    @if ($galeri->count())
        {{-- Modern Grid Gallery --}}
        <div class="relative max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <template x-for="(item, index) in items" :key="item.id">
                    <div 
                        class="group relative overflow-hidden rounded-3xl cursor-pointer transform hover:scale-[1.02] transition-all duration-500"
                        @click="openModal(index)"
                        x-data="{ hover: false }"
                        @mouseenter="hover = true"
                        @mouseleave="hover = false"
                    >
                        {{-- Card Container with Glow Effect --}}
                        <div class="relative bg-gradient-to-br from-blue-900/40 to-slate-900/40 backdrop-blur-sm border border-blue-500/20 rounded-3xl overflow-hidden shadow-2xl group-hover:shadow-blue-500/30 transition-all duration-500">
                            
                            {{-- Image Container --}}
                            <div class="relative overflow-hidden h-80">
                                <img 
                                    :src="`/storage/${item.foto}`"
                                    :alt="item.judul"
                                    class="w-full h-full object-cover transform group-hover:scale-125 group-hover:rotate-3 transition-all duration-700 ease-out"
                                >
                                
                                {{-- Dynamic Gradient Overlay --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-blue-950 via-blue-900/50 to-transparent opacity-60 group-hover:opacity-90 transition-opacity duration-500"></div>
                                
                                {{-- Animated Border Glow --}}
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-r from-blue-500/0 via-cyan-400/20 to-blue-500/0 animate-shimmer"></div>
                                </div>

                                {{-- Floating Category Badge --}}
                                <div class="absolute top-4 right-4 transform translate-x-8 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500">
                                    <span class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white text-xs font-bold px-4 py-2 rounded-full shadow-lg backdrop-blur-sm border border-white/20">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                        </svg>
                                        <span x-text="item.kategori?.nama ?? 'Umum'"></span>
                                    </span>
                                </div>

                                {{-- Zoom Icon with Pulse --}}
                                <div class="absolute top-4 left-4 transform -translate-x-8 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-500">
                                    <div class="bg-white/90 backdrop-blur-md text-blue-600 p-3 rounded-2xl shadow-xl animate-pulse-slow">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                        </svg>
                                    </div>
                                </div>

                                {{-- Play Icon Overlay --}}
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-500">
                                    <div class="bg-blue-500/90 backdrop-blur-sm text-white p-6 rounded-full shadow-2xl transform scale-0 group-hover:scale-100 transition-transform duration-500 border-4 border-white/30">
                                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Info Panel with Slide Up Animation --}}
                            <div class="relative p-6 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-blue-950 to-transparent"></div>
                                <div class="relative">
                                    <h3 class="text-white font-bold text-xl mb-2 line-clamp-1 group-hover:text-blue-300 transition-colors" x-text="item.judul"></h3>
                                    <p class="text-blue-200/70 text-sm line-clamp-2 leading-relaxed" x-text="item.deskripsi ?? 'Klik untuk melihat detail lengkap'"></p>
                                    
                                    {{-- View More Indicator --}}
                                    <div class="flex items-center gap-2 mt-3 text-blue-400 text-sm font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <span>Lihat Detail</span>
                                        <svg class="w-4 h-4 animate-bounce-x" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        {{-- Ultra Modern Lightbox Modal --}}
        <div 
            x-show="modalOpen" 
            x-cloak 
            @click.self="closeModal"
            @keydown.escape.window="closeModal"
            @keydown.arrow-left.window="modalOpen && prev()"
            @keydown.arrow-right.window="modalOpen && next()"
            class="fixed inset-0 bg-black/97 backdrop-blur-2xl flex items-center justify-center z-50 p-4"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            {{-- Animated Background Glow --}}
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-96 bg-gradient-to-b from-blue-600/20 to-transparent blur-3xl"></div>
            </div>

            <div 
                class="relative max-w-7xl w-full z-10"
                x-transition:enter="transition ease-out duration-500 delay-100"
                x-transition:enter-start="opacity-0 scale-90 -translate-y-8"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            >
                {{-- Top Control Bar --}}
                <div class="absolute -top-20 left-0 right-0 flex justify-between items-start px-4">
                    <div class="bg-blue-950/80 backdrop-blur-xl border border-blue-500/20 rounded-2xl px-6 py-4 shadow-2xl">
                        <p class="text-blue-400 text-sm mb-1 font-medium">
                            <span x-text="currentIndex + 1"></span> / <span x-text="items.length"></span>
                        </p>
                        <h2 class="text-2xl font-bold text-white" x-text="items[currentIndex].judul"></h2>
                    </div>
                    
                    <button 
                        @click="closeModal"
                        class="bg-blue-950/80 backdrop-blur-xl border border-blue-500/20 hover:bg-red-500/20 hover:border-red-500/40 text-white rounded-2xl p-4 transition-all duration-300 hover:rotate-90 shadow-2xl group"
                        title="Tutup (ESC)"
                    >
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                {{-- Main Image Container --}}
                <div class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-blue-950/50 to-slate-950/50 backdrop-blur-sm border border-blue-500/20 shadow-2xl">
                    {{-- Image Display --}}
                    <div class="flex justify-center items-center min-h-[65vh] max-h-[78vh] bg-black/30 p-4">
                        <img 
                            :src="`/storage/${items[currentIndex].foto}`" 
                            :alt="items[currentIndex].judul"
                            class="max-h-full max-w-full object-contain select-none rounded-2xl shadow-2xl"
                            @click.stop
                        >
                    </div>

                    {{-- Navigation: Previous --}}
                    <button 
                        @click.stop="prev"
                        class="absolute left-6 top-1/2 -translate-y-1/2 bg-blue-600/90 hover:bg-blue-500 backdrop-blur-xl border-2 border-blue-400/30 text-white rounded-2xl p-5 transition-all duration-300 hover:scale-110 hover:-translate-x-2 shadow-2xl group"
                        title="Sebelumnya (←)"
                    >
                        <svg class="w-7 h-7 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>

                    {{-- Navigation: Next --}}
                    <button 
                        @click.stop="next"
                        class="absolute right-6 top-1/2 -translate-y-1/2 bg-blue-600/90 hover:bg-blue-500 backdrop-blur-xl border-2 border-blue-400/30 text-white rounded-2xl p-5 transition-all duration-300 hover:scale-110 hover:translate-x-2 shadow-2xl group"
                        title="Selanjutnya (→)"
                    >
                        <svg class="w-7 h-7 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    {{-- Bottom Info Panel --}}
                    <div class="bg-gradient-to-t from-blue-950 via-blue-950/95 to-transparent border-t border-blue-500/20 p-8">
                        <div class="max-w-5xl mx-auto space-y-6">
                            {{-- Category and Description --}}
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-cyan-600 text-white text-sm font-bold px-5 py-2.5 rounded-xl shadow-lg border border-blue-400/30">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                                        </svg>
                                        <span x-text="items[currentIndex].kategori?.nama ?? 'Tanpa Kategori'"></span>
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <p class="text-blue-100 text-base leading-relaxed" x-text="items[currentIndex].deskripsi ?? 'Tidak ada deskripsi tersedia.'"></p>
                                </div>
                            </div>

                            {{-- Thumbnail Carousel --}}
                            <div class="relative">
                                <div class="flex gap-3 overflow-x-auto pb-3 scrollbar-thin scrollbar-thumb-blue-600 scrollbar-track-blue-950/30 scroll-smooth">
                                    <template x-for="(item, i) in items" :key="i">
                                        <button
                                            @click.stop="goTo(i)" 
                                            class="flex-shrink-0 w-24 h-24 rounded-xl overflow-hidden transition-all duration-300 ring-4 hover:scale-105"
                                            :class="i === currentIndex ? 'ring-blue-500 scale-110 shadow-xl shadow-blue-500/50' : 'ring-blue-900/50 opacity-60 hover:opacity-100 hover:ring-blue-600/50'"
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
                </div>

                {{-- Progress Dots --}}
                <div class="absolute -bottom-16 left-0 right-0 flex justify-center gap-2">
                    <template x-for="(item, i) in items" :key="i">
                        <button 
                            @click.stop="goTo(i)" 
                            class="h-1.5 rounded-full transition-all duration-300 shadow-lg"
                            :class="i === currentIndex ? 'bg-gradient-to-r from-blue-500 to-cyan-500 w-12 shadow-blue-500/50' : 'bg-blue-800 w-8 hover:bg-blue-600 hover:w-10'"
                            :title="`${i + 1}. ${item.judul}`"
                        ></button>
                    </template>
                </div>
            </div>
        </div>
    @else
        {{-- Modern Empty State --}}
        <div class="relative max-w-lg mx-auto text-center py-20">
            <div class="bg-gradient-to-br from-blue-950/50 to-slate-950/50 backdrop-blur-xl border border-blue-500/20 rounded-3xl shadow-2xl p-16">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-600/20 to-cyan-600/20 rounded-3xl flex items-center justify-center mx-auto mb-8 animate-pulse-slow">
                    <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-white mb-3">Galeri Masih Kosong</h3>
                <p class="text-blue-300/70 leading-relaxed">Belum ada foto yang tersedia saat ini. Galeri akan muncul di sini setelah konten ditambahkan.</p>
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
    
    /* Custom Scrollbar - Blue Theme */
    .scrollbar-thin::-webkit-scrollbar {
        height: 8px;
    }
    
    .scrollbar-thumb-blue-600::-webkit-scrollbar-thumb {
        background: linear-gradient(to right, #2563eb, #06b6d4);
        border-radius: 4px;
    }
    
    .scrollbar-thumb-blue-600::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to right, #1d4ed8, #0891b2);
    }
    
    .scrollbar-track-blue-950\/30::-webkit-scrollbar-track {
        background: rgba(23, 37, 84, 0.3);
        border-radius: 4px;
    }

    /* Gradient Animation */
    @keyframes gradient {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 3s ease infinite;
    }

    /* Shimmer Effect */
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    .animate-shimmer {
        animation: shimmer 2s infinite;
    }

    /* Pulse Slow */
    @keyframes pulse-slow {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.05); }
    }
    
    .animate-pulse-slow {
        animation: pulse-slow 3s ease-in-out infinite;
    }

    /* Bounce X Animation */
    @keyframes bounce-x {
        0%, 100% { transform: translateX(0); }
        50% { transform: translateX(4px); }
    }
    
    .animate-bounce-x {
        animation: bounce-x 1s ease-in-out infinite;
    }

    /* Smooth Scroll */
    .scroll-smooth {
        scroll-behavior: smooth;
    }
</style>
@endsection