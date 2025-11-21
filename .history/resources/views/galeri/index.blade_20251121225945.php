@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<!-- Background Gradient Section -->
<div 
    x-data="galeriCarousel({{ $galeri->toJson() }}, {{ $kategori->toJson() }})" 
    class="w-full px-4 sm:px-6 md:px-12 lg:px-20 py-12 sm:py-16 md:py-24 -mb-20 min-h-screen"
    style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">

    <div class="max-w-6xl mx-auto">

        <!-- ========== HEADER SECTION ========== -->
       <div class="text-center mb-8 sm:mb-10 md:mb-12">

    <!-- Badge GALERI -->
    <div class="inline-block bg-white/20 backdrop-blur-sm px-7 sm:px-8 md:px-10 py-2 sm:py-2.5 rounded-full mb-3 border border-white/30 shadow-md">
        <h1 class="text-white text-base sm:text-lg md:text-xl lg:text-2xl font-bold tracking-wide">
            GALERI
        </h1>
    </div>

    <!-- Judul Utama -->
    <h2 class="text-white font-extrabold tracking-wide mb-2
               text-xl sm:text-2xl md:text-3xl lg:text-4xl">
        SMP NEGERI 38 PALEMBANG
    </h2>

    <!-- Subjudul -->
    <p class="text-white/80 text-sm sm:text-base md:text-lg max-w-xl mx-auto">
        Jelajahi koleksi momen terbaik kami dalam tampilan yang memukau
    </p>

</div>


        <!-- ========== FILTER KATEGORI ========== -->
        <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-8 sm:mb-10 md:mb-12">
            <button 
                @click="selectedKategori = 'all'"
                :class="selectedKategori === 'all' 
                    ? 'bg-white text-blue-600' 
                    : 'bg-white/20 text-white border border-white/30 hover:bg-white/30'"
                class="px-4 sm:px-5 md:px-6 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-bold transition-all duration-300 shadow-md hover:shadow-lg">
                <span class="flex items-center gap-1.5 sm:gap-2">
                    <i class="fas fa-th-large text-xs"></i>
                    Semua
                </span>
            </button>

            <template x-for="kat in kategori" :key="kat.id">
                <button 
                    @click="selectedKategori = kat.nama"
                    :class="selectedKategori === kat.nama 
                        ? 'bg-white text-blue-600' 
                        : 'bg-white/20 text-white border border-white/30 hover:bg-white/30'"
                    class="px-4 sm:px-5 md:px-6 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-bold transition-all duration-300 shadow-md hover:shadow-lg">
                    <span class="flex items-center gap-1.5 sm:gap-2">
                        <i class="fas fa-folder text-xs"></i>
                        <span x-text="kat.nama"></span>
                    </span>
                </button>
            </template>
        </div>

        <!-- ========== CARD GALERI ========== -->
        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-4 sm:p-6 md:p-8 mx-2 sm:mx-0">

            <!-- GRID GALERI -->
            <template x-if="filteredItems.length">
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 sm:gap-4 md:gap-6">
                    <template x-for="(item, index) in filteredItems" :key="item.id">
                        <div 
                            class="group relative overflow-hidden rounded-xl sm:rounded-2xl cursor-pointer transform hover:scale-[1.02] transition-all duration-500 bg-gray-100 shadow-md hover:shadow-xl"
                            @click="openModal(index)"
                        >
                            <!-- Image Container -->
                            <div class="relative overflow-hidden aspect-[4/3]">
                                <img 
                                    :src="`/storage/${item.foto}`"
                                    :alt="item.judul"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-700"
                                    loading="lazy"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>

                                <!-- Category Badge -->
                                <div class="absolute top-2 right-2 sm:top-3 sm:right-3">
                                    <span class="text-white text-[10px] sm:text-xs font-bold px-2 sm:px-3 py-1 rounded-full shadow-md"
                                          style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);"
                                          x-text="item.kategori?.nama ?? 'Umum'"></span>
                                </div>

                                <!-- Info Overlay -->
                                <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                    <h3 class="text-white font-bold text-xs sm:text-sm md:text-base mb-1 line-clamp-1" x-text="item.judul"></h3>
                                    <p class="text-gray-200 text-[10px] sm:text-xs line-clamp-2 hidden sm:block" x-text="item.deskripsi ?? 'Lihat detail'"></p>
                                </div>
                            </div>

                            <!-- Mobile Info (Always Visible) -->
                            <div class="p-2 sm:p-3 sm:hidden">
                                <h3 class="text-gray-800 font-semibold text-xs line-clamp-1" x-text="item.judul"></h3>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            <!-- Jika Kosong -->
            <template x-if="!filteredItems.length">
                <div class="text-center py-12 sm:py-16">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-images text-2xl sm:text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-2">Belum Ada Galeri</h3>
                    <p class="text-xs sm:text-sm text-gray-500">Tidak ada gambar dalam kategori yang dipilih.</p>
                </div>
            </template>

        </div>

        <!-- ========== TOMBOL KEMBALI ========== -->
        <div class="flex justify-center mt-6 sm:mt-8 md:mt-10">
            <a href="/" 
               class="inline-block text-white px-6 sm:px-7 md:px-8 py-2 sm:py-2.5 rounded-full font-semibold 
                      shadow-md hover:shadow-lg transition-all duration-300 text-sm sm:text-base"
               style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 50%, #1A4E8A 100%);">
                Kembali
            </a>
        </div>

    </div>

    <!-- ========== MODAL LIGHTBOX ========== -->
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
        class="fixed inset-0 z-[9999] bg-black/95 flex flex-col"
    >

        <!-- Header Modal -->
        <div class="flex items-center justify-between px-4 py-3 bg-black/50">
            <div class="flex items-center gap-2">
                <span class="text-white text-xs font-bold px-3 py-1 rounded-full"
                      style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);"
                      x-text="filteredItems[currentIndex]?.kategori?.nama ?? 'Umum'"></span>
                <span class="text-white/70 text-xs sm:text-sm" x-text="`${currentIndex + 1} / ${filteredItems.length}`"></span>
            </div>
            <button @click="closeModal()" class="text-white/70 hover:text-white p-2 transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Navigation & Image -->
        <div class="flex-1 flex items-center justify-center relative px-4">
            <!-- Prev Button -->
            <button @click="prev()" 
                    x-show="filteredItems.length > 1"
                    class="absolute left-2 sm:left-4 bg-white/10 hover:bg-white/20 text-white p-3 rounded-full transition-all">
                <i class="fas fa-chevron-left"></i>
            </button>

            <!-- Image -->
            <img :src="`/storage/${filteredItems[currentIndex]?.foto}`"
                 :alt="filteredItems[currentIndex]?.judul"
                 class="max-h-[70vh] max-w-full object-contain rounded-lg"
                 :key="currentIndex">

            <!-- Next Button -->
            <button @click="next()" 
                    x-show="filteredItems.length > 1"
                    class="absolute right-2 sm:right-4 bg-white/10 hover:bg-white/20 text-white p-3 rounded-full transition-all">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <!-- Info & Thumbnails -->
        <div class="bg-black/50 px-4 py-4">
            <div class="max-w-4xl mx-auto">
                <h3 class="text-white font-bold text-sm sm:text-base mb-1" x-text="filteredItems[currentIndex]?.judul"></h3>
                <p class="text-white/70 text-xs sm:text-sm mb-3" x-text="filteredItems[currentIndex]?.deskripsi ?? 'Tidak ada deskripsi'"></p>
                
                <!-- Thumbnails -->
                <div class="flex gap-2 overflow-x-auto pb-2" x-show="filteredItems.length > 1">
                    <template x-for="(item, idx) in filteredItems" :key="item.id">
                        <button @click="goTo(idx)"
                                :class="idx === currentIndex ? 'ring-2 ring-blue-500 opacity-100' : 'opacity-50 hover:opacity-80'"
                                class="flex-shrink-0 w-12 h-12 sm:w-16 sm:h-16 rounded-lg overflow-hidden transition-all">
                            <img :src="`/storage/${item.foto}`" class="w-full h-full object-cover">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Script Alpine.js -->
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
</style>

@endsection