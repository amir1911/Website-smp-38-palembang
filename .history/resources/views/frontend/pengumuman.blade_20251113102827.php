@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-6 py-12">

    <!-- Header -->
    <div class="text-center mb-14">
        <h1 class="text-4xl font-extrabold text-primary tracking-wide">
            Pengumuman
        </h1>
        <p class="text-gray-500 mt-3 text-base">
            Informasi terbaru dari SMPN 38 Palembang
        </p>
        <div class="mt-4 w-24 h-1 bg-primary mx-auto rounded-full"></div>
    </div>

    <!-- Filter Kategori -->
    <div class="flex flex-wrap justify-center gap-3 mb-12">
        <a href="{{ route('pengumuman.index') }}"
           class="px-5 py-2.5 rounded-full shadow-sm text-sm font-medium 
           transition-all border
           {{ !isset($kategori) 
               ? 'bg-primary text-white border-primary' 
               : 'bg-white text-gray-600 border-gray-300 hover:bg-primary hover:text-white' }}">
           Semua
        </a>

        @foreach ($kategoriList as $kat)
            <a href="{{ route('pengumuman.byKategori', $kat->id) }}"
               class="px-5 py-2.5 rounded-full shadow-sm text-sm font-medium 
               transition-all border
               {{ isset($kategori) && $kategori->id == $kat->id 
                   ? 'bg-primary text-white border-primary' 
                   : 'bg-white text-gray-600 border-gray-300 hover:bg-primary hover:text-white' }}">
                {{ $kat->nama_kategori }}
            </a>
        @endforeach
    </div>

   <!-- Bagian PDF -->
@if ($pengumumanPdf->count() > 0)
    <div class="bg-white shadow-xl border border-gray-100 rounded-xl p-8 mb-14">
        <h2 class="text-2xl font-bold text-gray-800 mb-5 flex items-center gap-2">
            📄 Dokumen / File Pengumuman
        </h2>

        <div class="overflow-x-auto rounded-lg border">
            <table class="min-w-full text-sm border-collapse">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 border text-center">No</th>
                        <th class="px-4 py-3 border">Judul</th>
                        <th class="px-4 py-3 border">Kategori</th>
                        <th class="px-4 py-3 border">Tanggal</th>
                        <th class="px-4 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($pengumumanPdf as $index => $item)
                    <tr class="odd:bg-gray-50 hover:bg-gray-100 transition">
                        <td class="px-4 py-3 border text-center">
                            {{ $pengumumanPdf->firstItem() + $index }}
                        </td>
                        <td class="px-4 py-3 border font-semibold">{{ $item->judul }}</td>
                        <td class="px-4 py-3 border">{{ $item->kategori?->nama_kategori ?? '-' }}</td>
                        <td class="px-4 py-3 border">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                        <td class="px-4 py-3 border text-center">
                            <a href="{{ route('pengumuman.show', $item->id) }}" 
                               class="text-blue-600 hover:underline">
                               Detail
                            </a>
                            <span class="mx-1 text-gray-400">|</span>
                            <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                               target="_blank" 
                               class="text-green-600 hover:underline">
                               Download PDF
                            </a>
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



    <!-- Bagian Pengumuman Biasa -->
    @if ($pengumumanBiasa->count() > 0)
    <h2 class="text-2xl font-bold text-gray-800 mb-5">📰 Pengumuman Umum</h2>

    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8">
        @foreach ($pengumumanBiasa as $item)
        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden border border-gray-100 flex flex-col">

            <!-- Foto -->
            <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default.jpg') }}"
                 alt="Foto Pengumuman"
                 class="h-48 w-full object-cover">

            <!-- Konten -->
            <div class="p-5 flex-1 flex flex-col">
                <h3 class="font-bold text-xl text-primary mb-2 leading-tight">
                    {{ $item->judul }}
                </h3>

                <p class="text-gray-600 text-sm mb-4 flex-1">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 110) }}
                </p>

                <a href="{{ route('pengumuman.show', $item->id) }}" 
                   class="text-sm font-semibold text-blue-600 hover:underline">
                    Baca Selengkapnya →
                </a>
            </div>

            <!-- Footer -->
            <div class="px-5 py-3 bg-gray-50 text-xs text-gray-500 flex justify-between items-center border-t">
                <span class="flex items-center gap-1">
                    <i class="fas fa-calendar-alt"></i>
                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}
                </span>

                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-medium text-xs">
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
@endsection
