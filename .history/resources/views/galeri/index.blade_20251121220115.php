@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<!-- Background Gradient Section -->
<div 
    x-data="galeriCarousel({{ $galeri->toJson() }}, {{ $kategori->toJson() }})" 
    class="w-full px-4 sm:px-6 md:px-12 lg:px-20 py-12 sm:py-16 md:py-24 -mb-20 min-h-screen"
    style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="text-center mb-10">
            <div class="inline-block bg-white/20 backdrop-blur-sm px-6 py-2 rounded-full mb-3 border border-white/30">
                <h1 class="text-white text-sm font-bold tracking-wide">GALERI</h1>
            </div>
            <h2 class="text-white text-xl font-bold tracking-wide mb-2">SMP NEGERI 38 PALEMBANG</h2>
            <p class="text-white/80 text-sm max-w-xl mx-auto">
                Jelajahi koleksi momen terbaik kami dalam tampilan yang memukau
            </p>
        </div>

        <!-- FILTER KATEGORI -->
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <button 
                @click="selectedKategori = 'all'"
                :class="selectedKategori === 'all' 
                    ? 'bg-white text-[#4C8BBE]' 
                    : 'bg-white/20 text-white border border-white/30 hover:bg-white/30'"
                class="px-5 py-2.5 rounded-full text-sm font-bold transition-all shadow-md">
                <i class="fas fa-th-large mr-1"></i> Semua
            </button>

            <template x-for="kat in kategori" :key="kat.id">
                <button 
                    @click="selectedKategori = kat.nama"
                    :class="selectedKategori === kat.nama 
                        ? 'bg-white text-[#4C8BBE]' 
                        : 'bg-white/20 text-white border border-white/30 hover:bg-white/30'"
                    class="px-5 py-2.5 rounded-full text-sm font-bold transition-all shadow-md">
                    <i class="fas fa-folder mr-1"></i>
                    <span x-text="kat.nama"></span>
                </button>
            </template>
        </div>

        <!-- CARD GALERI -->
        <div class="bg-white rounded-3xl shadow-xl p-6">

            <!-- GRID -->
            <template x-if="filteredItems.length">
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">

                    <template x-for="(item, index) in filteredItems" :key="item.id">
                        <!-- Card wrapper: gunakan @click.outside untuk menutup overlay saat klik di luar -->
                        <div 
                            class="relative overflow-hidden rounded-2xl cursor-pointer shadow-md hover:shadow-xl transform hover:scale-[1.02] transition-all bg-gray-100"
                            x-data
                            @click.outside="showInfoIndex === index && (showInfoIndex = null)"
                        >

                            <!-- Image container: klik untuk toggle overlay -->
                            <div class="relative overflow-hidden aspect-[4/3]" @click="toggleInfo(index)">

                                <!-- Foto (fallback jika kosong) -->
                                <img 
                                    :src="item.foto ? `/storage/${item.foto}` : '/mnt/data/db0c06d5-baad-44bd-b578-5e6feebb2d4d.png'"
                                    :alt="item.judul"
                                    class="w-full h-full object-cover transition-transform duration-500"
                                    loading="lazy"
                                >

                                <!-- Category Badge -->
                                <div class="absolute top-2 right-2 z-10">
                                    <span class="text-white text-xs font-bold px-3 py-1 rounded-full shadow-md"
                                          style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);"
                                          x-text="item.kategori?.nama ?? 'Umum'"></span>
                                </div>

                                <!-- 🔵 OVERLAY BIRU HANYA SAAT DIKLIK -->
                                <div 
                                    x-show="showInfoIndex === index"
                                    x-cloak
                                    x-transition.duration.200ms
                                    class="absolute bottom-0 left-0 right-0 bg-[#4C8BBE]/88 text-white p-4 rounded-b-2xl shadow-lg z-20"
                                >
                                    <h3 class="font-bold text-sm" x-text="item.judul"></h3>
                                    <p class="text-white/90 text-xs mt-1" 
                                       x-text="'Angkatan ' + (item.angkatan ?? '2024/2025')"></p>

                                    <!-- Tombol buka modal foto (stop propagation supaya tidak toggle overlay lagi) -->
                                    <div class="mt-3 flex gap-3">
                                        <button
                                            @click.stop="openModal(index)"
                                            class="text-xs font-semibold underline text-white/95 hover:text-white"
                                        >
                                            Lihat Foto Versi Besar
                                        </button>

                                        <button
                                            @click.stop="showInfoIndex = null"
                                            class="text-xs font-medium text-white/80 hover:text-white/95"
                                        >
                                            Tutup
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Mobile Title -->
                            <div class="p-2 sm:hidden">
                                <h3 class="text-gray-800 font-semibold text-xs line-clamp-1" x-text="item.judul"></h3>
                            </div>
                        </div>
                    </template>

                </div>
            </template>

            <!-- Jika kosong -->
            <template x-if="!filteredItems.length">
                <div class="text-center py-16">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-images text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Belum Ada Galeri</h3>
                    <p class="text-sm text-gray-500">Tidak ada gambar dalam kategori yang dipilih.</p>
                </div>
            </template>

        </div>

        <!-- Tombol Kembali -->
        <div class="flex justify-center mt-8">
            <a href="/" 
               class="text-white px-8 py-2.5 rounded-full font-semibold shadow-md hover:shadow-lg transition-all text-sm"
               style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 50%, #1A4E8A 100%);">
                Kembali
            </a>
        </div>

    </div>

    <!-- MODAL LIGHTBOX (tetap ada) -->
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

        <!-- Header -->
        <div class="flex items-center justify-between px-4 py-3 bg-black/50">
            <div class="flex items-center gap-2">
                <span class="text-white text-xs font-bold px-3 py-1 rounded-full"
                      style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);"
                      x-text="filteredItems[currentIndex]?.kategori?.nama ?? 'Umum'"></span>
                <span class="text-white/70 text-xs" 
                      x-text="`${currentIndex + 1} / ${filteredItems.length}`"></span>
            </div>
            <button @click="closeModal()" class="text-white/70 hover:text-white p-2">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Gambar utama -->
        <div class="flex-1 flex items-center justify-center relative px-4">
            <button @click="prev()" x-show="filteredItems.length > 1"
                    class="absolute left-4 bg-white/10 hover:bg-white/20 text-white p-3 rounded-full">
                <i class="fas fa-chevron-left"></i>
            </button>

            <img :src="`/storage/${filteredItems[currentIndex]?.foto ?? ''}`"
                 :alt="filteredItems[currentIndex]?.judul ?? 'Foto'"
                 class="max-h-[70vh] max-w-full object-contain rounded-lg">

            <button @click="next()" x-show="filteredItems.length > 1"
                    class="absolute right-4 bg-white/10 hover:bg-white/20 text-white p-3 rounded-full">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <!-- Thumbnails -->
        <div class="bg-black/50 px-4 py-4">
            <div class="max-w-4xl mx-auto">
                <h3 class="text-white font-bold text-sm mb-1" x-text="filteredItems[currentIndex]?.judul"></h3>
                <p class="text-white/70 text-xs mb-3" x-text="filteredItems[currentIndex]?.deskripsi ?? 'Tidak ada deskripsi'"></p>

                <div class="flex gap-2 overflow-x-auto pb-2">
                    <template x-for="(it, idx) in filteredItems" :key="it.id">
                        <button @click="goTo(idx)"
                                :class="idx === currentIndex ? 'ring-2 ring-[#4C8BBE] opacity-100' : 'opacity-50 hover:opacity-80'"
                                class="w-14 h-14 rounded-lg overflow-hidden transition-all">
                            <img :src="it.foto ? `/storage/${it.foto}` : '/mnt/data/db0c06d5-baad-44bd-b578-5e6feebb2d4d.png'" class="w-full h-full object-cover">
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Alpine Script -->
<script>
function galeriCarousel(data, kategori) {
    return {
        items: data || [],
        kategori: kategori || [],
        selectedKategori: 'all',

        /* Tambahan untuk overlay klik */
        showInfoIndex: null,
        toggleInfo(index) {
            // toggle overlay untuk card tertentu
            this.showInfoIndex = this.showInfoIndex === index ? null : index;
        },

        /* Lightbox */
        modalOpen: false,
        currentIndex: 0,

        get filteredItems() {
            if (this.selectedKategori === 'all') return this.items;
            return this.items.filter(i => i.kategori?.nama === this.selectedKategori);
        },

        openModal(index) {
            // Jika filteredItems berbeda dari items, index di sini harus disesuaikan
            // Jika index berasal dari filteredItems loop, kita perlu set currentIndex jadi index
            this.currentIndex = index;
            this.modalOpen = true;
            document.body.style.overflow = 'hidden';
        },
        closeModal() {
            this.modalOpen = false;
            document.body.style.overflow = 'auto';
        },
        next() {
            if (!this.filteredItems.length) return;
            this.currentIndex = (this.currentIndex + 1) % this.filteredItems.length;
        },
        prev() {
            if (!this.filteredItems.length) return;
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
