@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-12">

    <!-- Header dengan Gradient - Responsive -->
    <div class="text-center mb-10 sm:mb-16 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-cyan-50 -skew-y-2 -z-10 rounded-2xl sm:rounded-3xl"></div>
        <div class="py-8 sm:py-12 px-4">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400 mb-3 sm:mb-4">
                Pengumuman
            </h1>
            <p class="text-gray-600 text-sm sm:text-base md:text-lg font-medium px-4">
                Informasi terbaru dari SMPN 38 Palembang
            </p>
            <div class="mt-4 sm:mt-6 w-24 sm:w-32 h-1 sm:h-1.5 bg-gradient-to-r from-blue-400 to-cyan-400 mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>

    <!-- Filter Kategori dengan Style Modern - Responsive -->
    <div class="flex flex-wrap justify-center gap-2 sm:gap-3 md:gap-4 mb-10 sm:mb-16 px-2">
        <a href="{{ route('pengumuman.index') }}"
           class="group px-4 sm:px-6 py-2 sm:py-3 rounded-full text-xs sm:text-sm font-bold 
           transition-all duration-300 border-2 transform hover:scale-105
           {{ !isset($kategori) 
               ? 'bg-gradient-to-r from-blue-400 to-cyan-400 text-white border-transparent shadow-lg' 
               : 'bg-white text-gray-700 border-gray-300 hover:border-blue-400 hover:text-blue-500 shadow-md hover:shadow-lg' }}">
           <span class="flex items-center gap-1 sm:gap-2">
               <i class="fas fa-th-large text-xs sm:text-sm"></i>
               <span class="hidden xs:inline">Semua</span>
               <span class="xs:hidden">All</span>
           </span>
        </a>

        @foreach ($kategoriList as $kat)
            <a href="{{ route('pengumuman.byKategori', $kat->id) }}"
               class="group px-4 sm:px-6 py-2 sm:py-3 rounded-full text-xs sm:text-sm font-bold 
               transition-all duration-300 border-2 transform hover:scale-105
               {{ isset($kategori) && $kategori->id == $kat->id 
                   ? 'bg-gradient-to-r from-blue-400 to-cyan-400 text-white border-transparent shadow-lg' 
                   : 'bg-white text-gray-700 border-gray-300 hover:border-blue-400 hover:text-blue-500 shadow-md hover:shadow-lg' }}">
                <span class="flex items-center gap-1 sm:gap-2">
                    <i class="fas fa-folder text-xs sm:text-sm"></i>
                    {{ $kat->nama_kategori }}
                </span>
            </a>
        @endforeach
    </div>

   <!-- Bagian PDF dengan Desain Card Modern - Responsive -->
@if ($pengumumanPdf->count() > 0)
    <div class="bg-gradient-to-br from-white to-blue-50 shadow-xl sm:shadow-2xl border border-blue-200 sm:border-2 rounded-xl sm:rounded-2xl p-4 sm:p-6 md:p-8 mb-10 sm:mb-16 transition-all duration-300">
        <div class="flex items-center gap-2 sm:gap-3 mb-4 sm:mb-6">
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-lg sm:rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
                <i class="fas fa-file-pdf text-white text-lg sm:text-xl"></i>
            </div>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-black text-gray-800">
                Dokumen Pengumuman
            </h2>
        </div>

        <!-- Mobile: Card View -->
        <div class="block lg:hidden space-y-4">
            @foreach ($pengumumanPdf as $index => $item)
            <div class="bg-white rounded-xl border-2 border-blue-200 shadow-md p-4 hover:shadow-lg transition-all duration-200">
                <div class="flex justify-between items-start mb-3">
                    <span class="bg-blue-400 text-white text-xs font-bold px-3 py-1 rounded-full">
                        #{{ $pengumumanPdf->firstItem() + $index }}
                    </span>
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-cyan-100 text-cyan-700">
                        {{ $item->kategori?->nama_kategori ?? '-' }}
                    </span>
                </div>
                
                <h3 class="font-bold text-gray-800 mb-2 text-sm sm:text-base">{{ $item->judul }}</h3>
                
                <div class="flex items-center gap-2 text-xs text-gray-600 mb-3">
                    <i class="fas fa-calendar-alt text-blue-400"></i>
                    <span>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
                </div>
                
                <div class="flex gap-2">
                    <a href="{{ route('pengumuman.show', $item->id) }}" 
                       class="flex-1 inline-flex items-center justify-center gap-1 px-3 py-2 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition-all duration-200 shadow-md text-xs font-bold">
                       <i class="fas fa-eye"></i>
                       <span>Detail</span>
                    </a>
                    <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                       target="_blank" 
                       class="flex-1 inline-flex items-center justify-center gap-1 px-3 py-2 bg-cyan-400 text-white rounded-lg hover:bg-cyan-500 transition-all duration-200 shadow-md text-xs font-bold">
                       <i class="fas fa-download"></i>
                       <span>Download</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Desktop: Table View -->
        <div class="hidden lg:block overflow-hidden rounded-xl border-2 border-blue-200 shadow-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gradient-to-r from-blue-400 to-cyan-400 text-white">
                        <tr>
                            <th class="px-4 py-3 text-center font-bold">No</th>
                            <th class="px-4 py-3 font-bold text-left">Judul</th>
                            <th class="px-4 py-3 font-bold text-left">Kategori</th>
                            <th class="px-4 py-3 font-bold text-left">Tanggal</th>
                            <th class="px-4 py-3 text-center font-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($pengumumanPdf as $index => $item)
                        <tr class="hover:bg-blue-50 transition-colors duration-200">
                            <td class="px-4 py-3 text-center font-bold text-gray-700">
                                {{ $pengumumanPdf->firstItem() + $index }}
                            </td>
                            <td class="px-4 py-3 font-bold text-gray-800">{{ $item->judul }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-cyan-100 text-cyan-700">
                                    {{ $item->kategori?->nama_kategori ?? '-' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-600">
                                <i class="fas fa-calendar-alt mr-2 text-blue-400"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('pengumuman.show', $item->id) }}" 
                                       class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-xs font-bold">
                                       <i class="fas fa-eye"></i>
                                       Detail
                                    </a>
                                    <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                                       target="_blank" 
                                       class="inline-flex items-center gap-1 px-3 py-1.5 bg-cyan-400 text-white rounded-lg hover:bg-cyan-500 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-xs font-bold">
                                       <i class="fas fa-download"></i>
                                       Download
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination PDF -->
        <div class="mt-4 sm:mt-6">
            {{ $pengumumanPdf->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>
@endif

    <!-- Bagian Pengumuman Biasa dengan Card Premium - Responsive -->
    @if ($pengumumanBiasa->count() > 0)
    <div class="flex items-center gap-2 sm:gap-3 mb-6 sm:mb-8">
        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-lg sm:rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
            <i class="fas fa-newspaper text-white text-lg sm:text-xl"></i>
        </div>
        <h2 class="text-xl sm:text-2xl md:text-3xl font-black text-gray-800">
            Pengumuman Umum
        </h2>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
        @foreach ($pengumumanBiasa as $item)
        <div class="group bg-white rounded-xl sm:rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-gray-100 hover:border-blue-300 flex flex-col transform hover:-translate-y-2">

            <!-- Foto dengan Overlay -->
            <div class="relative h-48 sm:h-56 overflow-hidden">
                <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                     alt="Foto Pengumuman"
                     class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-blue-400/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <!-- Konten -->
            <div class="p-4 sm:p-5 md:p-6 flex-1 flex flex-col">
                <h3 class="font-black text-base sm:text-lg md:text-xl text-gray-800 mb-2 sm:mb-3 leading-tight group-hover:text-blue-500 transition-colors duration-300">
                    {{ $item->judul }}
                </h3>

                <p class="text-gray-600 text-xs sm:text-sm mb-3 sm:mb-4 flex-1 leading-relaxed">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 110) }}
                </p>

                <a href="{{ route('pengumuman.show', $item->id) }}" 
                   class="inline-flex items-center gap-2 text-xs sm:text-sm font-bold text-blue-500 hover:text-blue-600 group/link">
                    Baca Selengkapnya 
                    <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform duration-300 text-xs"></i>
                </a>
            </div>

            <!-- Footer dengan Gradient -->
            <div class="px-4 sm:px-5 md:px-6 py-3 sm:py-4 bg-gradient-to-r from-blue-50 to-cyan-50 text-xs text-gray-600 flex flex-col xs:flex-row justify-between items-start xs:items-center gap-2 xs:gap-0 border-t-2 border-gray-100">
                <span class="flex items-center gap-1 sm:gap-2 font-semibold">
                    <i class="fas fa-calendar-alt text-blue-400 text-xs"></i>
                    <span class="text-xs">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
                </span>

                <span class="bg-gradient-to-r from-blue-400 to-cyan-400 text-white px-3 sm:px-4 py-1 sm:py-1.5 rounded-full font-bold text-xs shadow-md">
                    {{ $item->kategori?->nama_kategori ?? '-' }}
                </span>
            </div>

        </div>
        @endforeach
    </div>

    <!-- PAGINATION -->
    <div class="mt-8 sm:mt-12">
        {{ $pengumumanBiasa->appends(request()->query())->links('vendor.pagination.custom') }}
    </div>

    @endif

</section>

<!-- Custom CSS untuk animasi tambahan dan responsive -->
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .grid > div {
        animation: fadeInUp 0.6s ease-out backwards;
    }

    .grid > div:nth-child(1) { animation-delay: 0.1s; }
    .grid > div:nth-child(2) { animation-delay: 0.2s; }
    .grid > div:nth-child(3) { animation-delay: 0.3s; }
    .grid > div:nth-child(4) { animation-delay: 0.4s; }
    .grid > div:nth-child(5) { animation-delay: 0.5s; }
    .grid > div:nth-child(6) { animation-delay: 0.6s; }

    /* Custom breakpoint untuk extra small devices */
    @media (min-width: 475px) {
        .xs\:inline {
            display: inline;
        }
        .xs\:hidden {
            display: none;
        }
        .xs\:flex-row {
            flex-direction: row;
        }
        .xs\:items-center {
            align-items: center;
        }
        .xs\:gap-0 {
            gap: 0;
        }
    }

    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }

    /* Improve touch targets for mobile */
    @media (max-width: 640px) {
        a, button {
            min-height: 44px;
            min-width: 44px;
        }
    }
</style>
@endsection