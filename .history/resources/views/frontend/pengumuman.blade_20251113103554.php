@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-12">

    <!-- Header dengan Gradient -->
    <div class="text-center mb-16 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-cyan-50 -skew-y-2 -z-10 rounded-3xl"></div>
        <div class="py-12">
            <h1 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400 mb-4">
                Pengumuman
            </h1>
            <p class="text-gray-600 text-lg font-medium">
                Informasi terbaru dari SMPN 38 Palembang
            </p>
            <div class="mt-6 w-32 h-1.5 bg-gradient-to-r from-blue-400 to-cyan-400 mx-auto rounded-full shadow-lg"></div>
        </div>
    </div>

    <!-- Filter Kategori dengan Style Modern -->
    <div class="flex flex-wrap justify-center gap-4 mb-16">
        <a href="{{ route('pengumuman.index') }}"
           class="group px-6 py-3 rounded-full text-sm font-bold 
           transition-all duration-300 border-2 transform hover:scale-105
           {{ !isset($kategori) 
               ? 'bg-gradient-to-r from-blue-400 to-cyan-400 text-white border-transparent shadow-lg' 
               : 'bg-white text-gray-700 border-gray-300 hover:border-blue-400 hover:text-blue-500 shadow-md hover:shadow-lg' }}">
           <span class="flex items-center gap-2">
               <i class="fas fa-th-large"></i>
               Semua
           </span>
        </a>

        @foreach ($kategoriList as $kat)
            <a href="{{ route('pengumuman.byKategori', $kat->id) }}"
               class="group px-6 py-3 rounded-full text-sm font-bold 
               transition-all duration-300 border-2 transform hover:scale-105
               {{ isset($kategori) && $kategori->id == $kat->id 
                   ? 'bg-gradient-to-r from-blue-400 to-cyan-400 text-white border-transparent shadow-lg' 
                   : 'bg-white text-gray-700 border-gray-300 hover:border-blue-400 hover:text-blue-500 shadow-md hover:shadow-lg' }}">
                <span class="flex items-center gap-2">
                    <i class="fas fa-folder"></i>
                    {{ $kat->nama_kategori }}
                </span>
            </a>
        @endforeach
    </div>

   <!-- Bagian PDF dengan Desain Card Modern -->
@if ($pengumumanPdf->count() > 0)
    <div class="bg-gradient-to-br from-white to-blue-50 shadow-2xl border-2 border-blue-200 rounded-2xl p-8 mb-16 transform hover:scale-[1.01] transition-all duration-300">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-file-pdf text-white text-xl"></i>
            </div>
            <h2 class="text-3xl font-black text-gray-800">
                Dokumen Pengumuman
            </h2>
        </div>

        <div class="overflow-hidden rounded-xl border-2 border-blue-200 shadow-lg">
            <table class="min-w-full text-sm">
                <thead class="bg-gradient-to-r from-blue-400 to-cyan-400 text-white">
                    <tr>
                        <th class="px-6 py-4 text-center font-bold">No</th>
                        <th class="px-6 py-4 font-bold text-left">Judul</th>
                        <th class="px-6 py-4 font-bold text-left">Kategori</th>
                        <th class="px-6 py-4 font-bold text-left">Tanggal</th>
                        <th class="px-6 py-4 text-center font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($pengumumanPdf as $index => $item)
                    <tr class="hover:bg-blue-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-center font-bold text-gray-700">
                            {{ $pengumumanPdf->firstItem() + $index }}
                        </td>
                        <td class="px-6 py-4 font-bold text-gray-800">{{ $item->judul }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-cyan-100 text-cyan-700">
                                {{ $item->kategori?->nama_kategori ?? '-' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-gray-600">
                            <i class="fas fa-calendar-alt mr-2 text-blue-400"></i>
                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('pengumuman.show', $item->id) }}" 
                                   class="inline-flex items-center gap-1 px-4 py-2 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-xs font-bold">
                                   <i class="fas fa-eye"></i>
                                   Detail
                                </a>
                                <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center gap-1 px-4 py-2 bg-cyan-400 text-white rounded-lg hover:bg-cyan-500 transition-all duration-200 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 text-xs font-bold">
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

        <!-- Pagination PDF -->
        <div class="mt-6">
            {{ $pengumumanPdf->appends(request()->query())->links('vendor.pagination.custom') }}
        </div>
    </div>
@endif

    <!-- Bagian Pengumuman Biasa dengan Card Premium -->
    @if ($pengumumanBiasa->count() > 0)
    <div class="flex items-center gap-3 mb-8">
        <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-cyan-400 rounded-xl flex items-center justify-center shadow-lg">
            <i class="fas fa-newspaper text-white text-xl"></i>
        </div>
        <h2 class="text-3xl font-black text-gray-800">
            Pengumuman Umum
        </h2>
    </div>

    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8">
        @foreach ($pengumumanBiasa as $item)
        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border-2 border-gray-100 hover:border-blue-300 flex flex-col transform hover:-translate-y-2">

            <!-- Foto dengan Overlay -->
            <div class="relative h-56 overflow-hidden">
                <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                     alt="Foto Pengumuman"
                     class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-blue-400/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            <!-- Konten -->
            <div class="p-6 flex-1 flex flex-col">
                <h3 class="font-black text-xl text-gray-800 mb-3 leading-tight group-hover:text-blue-500 transition-colors duration-300">
                    {{ $item->judul }}
                </h3>

                <p class="text-gray-600 text-sm mb-4 flex-1 leading-relaxed">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 110) }}
                </p>

                <a href="{{ route('pengumuman.show', $item->id) }}" 
                   class="inline-flex items-center gap-2 text-sm font-bold text-blue-500 hover:text-blue-600 group/link">
                    Baca Selengkapnya 
                    <i class="fas fa-arrow-right transform group-hover/link:translate-x-1 transition-transform duration-300"></i>
                </a>
            </div>

            <!-- Footer dengan Gradient -->
            <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-cyan-50 text-xs text-gray-600 flex justify-between items-center border-t-2 border-gray-100">
                <span class="flex items-center gap-2 font-semibold">
                    <i class="fas fa-calendar-alt text-blue-400"></i>
                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                </span>

                <span class="bg-gradient-to-r from-blue-400 to-cyan-400 text-white px-4 py-1.5 rounded-full font-bold text-xs shadow-md">
                    {{ $item->kategori?->nama_kategori ?? '-' }}
                </span>
            </div>

        </div>
        @endforeach
    </div>

    <!-- PAGINATION -->
    <div class="mt-12">
        {{ $pengumumanBiasa->appends(request()->query())->links('vendor.pagination.custom') }}
    </div>

    @endif

</section>

<!-- Custom CSS untuk animasi tambahan -->
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
</style>
@endsection