@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-blue-50 via-blue-100 to-cyan-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section dengan Animasi -->
        <div class="text-center mb-12 animate-fade-in">
            <div class="inline-block mb-4">
                <span class="bg-gradient-to-r from-blue-400 to-cyan-500 text-white px-6 py-2 rounded-full text-sm font-semibold shadow-lg">
                    SMPN 38 Palembang
                </span>
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold bg-gradient-to-r from-blue-400 to-cyan-500 bg-clip-text text-transparent mb-4">
                Pengumuman Sekolah
            </h1>
            <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                Informasi terbaru dan penting untuk siswa, orang tua, dan seluruh civitas akademika
            </p>
        </div>

        <!-- Filter Kategori dengan Design Modern -->
        <div class="mb-12">
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                <div class="flex items-center mb-4">
                    <i class="fas fa-filter text-blue-600 text-xl mr-3"></i>
                    <h3 class="text-lg font-semibold text-gray-800">Filter Kategori</h3>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('pengumuman.index') }}" 
                       class="group relative px-6 py-3 rounded-xl text-sm font-medium transition-all duration-300 transform hover:scale-105
                              {{ !isset($kategori) ? 'bg-gradient-to-r from-blue-400 to-cyan-500 text-white shadow-lg' : 'bg-blue-50 text-blue-700 hover:bg-blue-100' }}">
                        <i class="fas fa-th-large mr-2"></i>Semua
                    </a>

                    @foreach ($kategoriList as $kat)
                        <a href="{{ route('pengumuman.byKategori', $kat->id) }}" 
                           class="group relative px-6 py-3 rounded-xl text-sm font-medium transition-all duration-300 transform hover:scale-105
                                  {{ isset($kategori) && $kategori->id == $kat->id ? 'bg-gradient-to-r from-blue-400 to-cyan-500 text-white shadow-lg' : 'bg-blue-50 text-blue-700 hover:bg-blue-100' }}">
                            {{ $kat->nama_kategori }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Bagian 1: Pengumuman dengan File PDF -->
        @if ($pengumumanPdf->count() > 0)
        <div class="mb-12 animate-slide-up">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <!-- Header Card -->
                <div class="bg-gradient-to-r from-blue-400 to-cyan-500 px-6 py-4">
                    <div class="flex items-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-lg p-3 mr-4">
                            <i class="fas fa-file-pdf text-white text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-white">Dokumen & File Pengumuman</h2>
                            <p class="text-blue-100 text-sm">File PDF yang dapat diunduh</p>
                        </div>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider w-16">No</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($pengumumanPdf as $index => $item)
                            <tr class="hover:bg-blue-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 font-semibold text-sm">
                                        {{ $index + 1 }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-file-alt text-gray-400 mr-3"></i>
                                        <span class="font-semibold text-gray-800">{{ $item->judul }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-cyan-100 text-cyan-700">
                                        {{ $item->kategori?->nama_kategori ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600 text-sm">
                                    <i class="far fa-calendar-alt mr-2 text-gray-400"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('pengumuman.show', $item->id) }}" 
                                           class="inline-flex items-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg text-xs font-medium transition-colors duration-200">
                                            <i class="fas fa-eye mr-1"></i> Detail
                                        </a>
                                        <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                                           target="_blank" 
                                           class="inline-flex items-center px-3 py-2 bg-green-100 hover:bg-green-200 text-green-700 rounded-lg text-xs font-medium transition-colors duration-200">
                                            <i class="fas fa-download mr-1"></i> PDF
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

        <!-- Bagian 2: Pengumuman Biasa -->
        @if ($pengumumanBiasa->count() > 0)
        <div class="animate-slide-up">
            <!-- Header Section -->
            <div class="flex items-center mb-6">
                <div class="bg-gradient-to-r from-blue-400 to-cyan-500 rounded-lg p-3 mr-4">
                    <i class="fas fa-bullhorn text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Pengumuman Umum</h2>
                    <p class="text-gray-600 text-sm">Informasi penting untuk semua warga sekolah</p>
                </div>
            </div>

            <!-- Grid Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($pengumumanBiasa as $item)
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <!-- Image Section -->
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                             alt="Foto Pengumuman"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Category Badge on Image -->
                        <div class="absolute top-4 right-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/90 backdrop-blur-sm text-gray-800 shadow-lg">
                                {{ $item->kategori?->nama_kategori ?? '-' }}
                            </span>
                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="p-6">
                        <h3 class="font-bold text-lg text-gray-800 mb-3 line-clamp-2 group-hover:text-cyan-600 transition-colors duration-200">
                            {{ $item->judul }}
                        </h3>
                        <p class="text-sm text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 100) }}
                        </p>
                        
                        <!-- Date -->
                        <div class="flex items-center text-xs text-gray-500 mb-4">
                            <i class="far fa-calendar-alt mr-2 text-cyan-500"></i>
                            <span>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</span>
                        </div>

                        <!-- Read More Button -->
                        <a href="{{ route('pengumuman.show', $item->id) }}" 
                           class="inline-flex items-center text-sm font-semibold text-cyan-600 hover:text-cyan-700 group-hover:gap-2 transition-all duration-200">
                            Baca Selengkapnya 
                            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-200"></i>
                        </a>
                    </div>

                    <!-- Footer with Hover Effect -->
                    <div class="px-6 py-3 bg-gradient-to-r from-blue-50 to-cyan-50 border-t border-blue-200">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-600 flex items-center">
                                <i class="fas fa-eye mr-1 text-gray-400"></i>
                                Lihat Detail
                            </span>
                            <i class="fas fa-chevron-right text-gray-400 group-hover:text-cyan-600 transition-colors duration-200"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Empty State dengan Design Menarik -->
        @if ($pengumumanPdf->count() == 0 && $pengumumanBiasa->count() == 0)
        <div class="text-center py-16 animate-fade-in">
            <div class="inline-block mb-6">
                <div class="bg-gradient-to-br from-blue-100 to-cyan-100 rounded-full p-8">
                    <i class="fas fa-inbox text-6xl text-cyan-400"></i>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Pengumuman</h3>
            <p class="text-gray-600 max-w-md mx-auto">
                Saat ini belum ada pengumuman yang tersedia. Silakan cek kembali nanti untuk informasi terbaru.
            </p>
        </div>
        @endif

    </div>
</section>

<!-- Custom CSS untuk Animasi -->
<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fadeIn 0.6s ease-out;
}

.animate-slide-up {
    animation: slideUp 0.8s ease-out;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection