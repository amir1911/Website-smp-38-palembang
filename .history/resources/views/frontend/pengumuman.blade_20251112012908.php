@extends('layouts.app')

@section('content')
<!-- Import Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">

<section class="py-20 bg-gray-50 font-[Poppins]">
    <div class="container mx-auto px-4 text-center">
        <!-- Judul -->
        <h2 class="text-4xl md:text-5xl font-extrabold mb-3">
            Pemberitahuan <span class="text-blue-500">SMP Negeri 38</span> Palembang
        </h2>
        <p class="text-gray-500 mb-14">
            Berita Terbaru Tentang SMP Negeri 38 Palembang
        </p>

        <!-- Grid Pengumuman -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($pengumuman as $item)
            <div class="bg-white shadow-lg rounded-2xl overflow-hidden transition transform hover:-translate-y-2 hover:shadow-xl">
                <!-- Gambar -->
                @if($item->foto)
                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">
                @else
                <img src="https://via.placeholder.com/400x250?text=No+Image" class="w-full h-48 object-cover" alt="No Image">
                @endif

                <!-- Konten -->
                <div class="p-5 text-left">
                    <p class="text-sm text-gray-400 mb-1">
                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                    </p>
                    <h3 class="font-semibold text-md mb-2 leading-tight">
                        {{ Str::limit($item->judul, 80) }}
                    </h3>
                    <p class="text-sm text-gray-500 mb-3">
                        By Admin SmkNs
                    </p>

                    <a href="{{ route('pengumuman.show', $item->id) }}" 
                       class="text-blue-600 font-semibold hover:underline text-sm">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Jika Tidak Ada Data -->
        @if($pengumuman->isEmpty())
            <p class="text-gray-500 mt-8">Belum ada pengumuman.</p>
        @endif
    </div>
</section>
@endsection
