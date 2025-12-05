@extends('layouts.app')

@section('content')

    <!-- Background Gradient Section -->
    <div class="w-full px-4 sm:px-6 md:px-12 lg:px-20 py-12 sm:py-16 md:py-24 -mb-20"
        style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">

        <div class="max-w-6xl mx-auto">

            <!-- ========== HEADER SECTION ========== -->
            <div class="text-center mb-8 sm:mb-10 md:mb-12">

                <!-- Badge kecil atas -->
                <div
                    class="inline-block bg-white/20 backdrop-blur-sm px-6 sm:px-8 md:px-10 py-1.5 sm:py-2 rounded-full mb-3 border border-white/30 shadow-lg">
                    <h1 class="text-white text-sm sm:text-base md:text-lg lg:text-xl font-bold tracking-wide drop-shadow-md">
                        PENGUMUMAN SEKOLAH
                    </h1>
                </div>

                <!-- Judul Utama -->
                <h2
                    class="text-white font-extrabold tracking-wide drop-shadow-lg
               text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-5xl leading-tight">
                    SMP NEGERI 38 PALEMBANG
                </h2>

            </div>

            <!-- ========== FILTER KATEGORI ========== -->
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-8 sm:mb-10 md:mb-12">
                <a href="{{ route('pengumuman.index') }}"
                    class="px-4 sm:px-5 md:px-6 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-bold 
               transition-all duration-300 shadow-md hover:shadow-lg
               {{ !isset($kategori)
                   ? 'bg-white text-blue-600'
                   : 'bg-white/20 text-white border border-white/30 hover:bg-white/30' }}">
                    <span class="flex items-center gap-1.5 sm:gap-2">
                        <i class="fas fa-th-large text-xs"></i>
                        Semua
                    </span>
                </a>

                @foreach ($kategoriList as $kat)
                    <a href="{{ route('pengumuman.byKategori', $kat->id) }}"
                        class="px-4 sm:px-5 md:px-6 py-2 sm:py-2.5 rounded-full text-xs sm:text-sm font-bold 
                   transition-all duration-300 shadow-md hover:shadow-lg
                   {{ isset($kategori) && $kategori->id == $kat->id
                       ? 'bg-white text-blue-600'
                       : 'bg-white/20 text-white border border-white/30 hover:bg-white/30' }}">
                        <span class="flex items-center gap-1.5 sm:gap-2">
                            <i class="fas fa-folder text-xs"></i>
                            {{ $kat->nama_kategori }}
                        </span>
                    </a>
                @endforeach
            </div>

            <!-- ========== DOKUMEN PDF SECTION ========== -->
            @if ($pengumumanPdf->count() > 0)
                <div
                    class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-4 sm:p-6 md:p-8 mb-8 sm:mb-10 md:mb-12 mx-2 sm:mx-0">

                    <!-- Header Dokumen -->
                    <div class="flex items-center gap-3 mb-4 sm:mb-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center shadow-md flex-shrink-0"
                            style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                            <i class="fas fa-file-pdf text-white text-lg sm:text-xl"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">
                            Dokumen Pengumuman
                        </h3>
                    </div>

                    <!-- Mobile: Card View -->
                    <div class="block lg:hidden space-y-4">
                        @foreach ($pengumumanPdf as $index => $item)
                            <div class="bg-gray-50 rounded-xl border border-gray-200 shadow-sm p-4">
                                <div class="flex justify-between items-start mb-3">
                                    <span class="text-white text-xs font-bold px-3 py-1 rounded-full"
                                        style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                                        #{{ $pengumumanPdf->firstItem() + $index }}
                                    </span>
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                        {{ $item->kategori?->nama_kategori ?? '-' }}
                                    </span>
                                </div>

                                <h4 class="font-bold text-gray-800 mb-2 text-sm sm:text-base">{{ $item->judul }}</h4>

                                <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                                    <i class="fas fa-calendar-alt text-blue-500"></i>
                                    <span>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
                                </div>

                                <div class="flex gap-2">
                                    <a href="{{ route('pengumuman.show', $item->id) }}"
                                        class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 text-white rounded-lg transition-all duration-200 shadow-md text-xs font-bold"
                                        style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                                        <i class="fas fa-eye"></i>
                                        <span>Detail</span>
                                    </a>
                                    <a href="{{ asset('storage/' . $item->file_pdf) }}" target="_blank"
                                        class="flex-1 inline-flex items-center justify-center gap-1.5 px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all duration-200 shadow-md text-xs font-bold">
                                        <i class="fas fa-download"></i>
                                        <span>Download</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Desktop: Table View -->
                    <div class="hidden lg:block overflow-hidden rounded-xl border border-gray-200 shadow-md">
                        <table class="min-w-full text-sm">
                            <thead class="text-white"
                                style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 50%, #1A4E8A 100%);">
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
                                        <td class="px-4 py-3 font-semibold text-gray-800">{{ $item->judul }}</td>
                                        <td class="px-4 py-3">
                                            <span
                                                class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                                {{ $item->kategori?->nama_kategori ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-gray-600">
                                            <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="flex items-center justify-center gap-2">
                                                <a href="{{ route('pengumuman.show', $item->id) }}"
                                                    class="inline-flex items-center gap-1 px-3 py-1.5 text-white rounded-lg transition-all duration-200 shadow-md text-xs font-bold"
                                                    style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                                                    <i class="fas fa-eye"></i>
                                                    Detail
                                                </a>
                                                <a href="{{ asset('storage/' . $item->file_pdf) }}" target="_blank"
                                                    class="inline-flex items-center gap-1 px-3 py-1.5 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-all duration-200 shadow-md text-xs font-bold">
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
                    <div class="mt-4 sm:mt-6">
                        {{ $pengumumanPdf->appends(request()->query())->links('vendor.pagination.custom') }}
                    </div>
                </div>
            @endif

            <!-- ========== PENGUMUMAN UMUM SECTION ========== -->
            @if ($pengumumanBiasa->count() > 0)
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-4 sm:p-6 md:p-8 mx-2 sm:mx-0">

                    <!-- Header Pengumuman Umum -->
                    <div class="flex items-center gap-3 mb-4 sm:mb-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center shadow-md flex-shrink-0"
                            style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                            <i class="fas fa-newspaper text-white text-lg sm:text-xl"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">
                            Pengumuman Umum
                        </h3>
                    </div>

                    <!-- Grid Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                        @foreach ($pengumumanBiasa as $item)
                            <div
                                class="group bg-gray-50 rounded-xl sm:rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-blue-300 flex flex-col">

                                <!-- Foto -->
                                <div class="relative h-40 sm:h-48 overflow-hidden">
                                    <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                                        alt="Foto Pengumuman"
                                        class="w-72 h-auto object-cover group-hover:scale-110 transition-transform duration-500"

                                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                                    <span
                                        class="absolute top-3 right-3 px-3 py-1 rounded-full text-xs font-bold text-white shadow-md"
                                        style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                                        {{ $item->kategori?->nama_kategori ?? '-' }}
                                    </span>
                                </div>

                                <!-- Konten -->
                                <div class="p-4 sm:p-5 flex-1 flex flex-col">
                                    <h4
                                        class="font-bold text-base sm:text-lg text-gray-800 mb-2 leading-tight group-hover:text-blue-600 transition-colors duration-300">
                                        {{ $item->judul }}
                                    </h4>

                                    <p class="text-gray-600 text-xs sm:text-sm mb-3 flex-1 leading-relaxed">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}
                                    </p>

                                    <div class="flex items-center justify-between mt-auto pt-3 border-t border-gray-200">
                                        <span class="flex items-center gap-1.5 text-xs text-gray-500">
                                            <i class="fas fa-calendar-alt text-blue-500"></i>
                                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}
                                        </span>

                                        <a href="{{ route('pengumuman.show', $item->id) }}"
                                            class="inline-flex items-center gap-1 text-xs sm:text-sm font-bold text-blue-600 hover:text-blue-700">
                                            Baca
                                            <i class="fas fa-arrow-right text-xs"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6 sm:mt-8">
                        {{ $pengumumanBiasa->appends(request()->query())->links('vendor.pagination.custom') }}
                    </div>
                </div>
            @endif

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

    </div>

@endsection
