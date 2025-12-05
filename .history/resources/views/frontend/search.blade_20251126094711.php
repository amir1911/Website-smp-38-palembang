@extends('layouts.app')

@section('content')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Section Hasil Pencarian -->
    <section class="min-h-screen py-8 -mb-20"
        style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">
        <div class="max-w-6xl mx-auto px-6">

            <!-- Judul -->
            <div class="text-center mb-12" data-aos="fade-down">
                <h1 class="text-3xl md:text-4xl font-extrabold text-[#FFFFFF] tracking-tight">
                    🔍 Hasil Pencarian
                </h1>
                <p class="text-gray-600 mt-2 text-base">
                    Menampilkan hasil untuk: <span class="font-semibold text-gray-900">"{{ $query }}"</span>
                </p>
            </div>

            <!-- Form Pencarian -->
            <form action="{{ route('search') }}" method="GET" class="flex justify-center mb-10" data-aos="fade-up">
                <input type="text" name="q" value="{{ $query }}"
                    placeholder="Cari kegiatan, guru, atau galeri..."
                    class="w-full md:w-2/3 px-5 py-3 border-2 border-[#49ADFF] rounded-l-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#49ADFF]">
                <button type="submit"
                    class="bg-[#49ADFF] text-white px-6 py-3 rounded-r-full font-semibold hover:bg-[#2F93E6] transition duration-300">
                    Cari
                </button>
            </form>

            <!-- Jika Tidak Ada Hasil -->
            @if ($results->isEmpty())
                <div class="text-center text-gray-500 text-lg" data-aos="fade-up">
                    Tidak ada hasil ditemukan untuk <strong>"{{ $query }}"</strong>.
                </div>
            @else
                <!-- Grid Hasil -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                    @foreach ($results as $item)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2 duration-500"
                            data-aos="zoom-in">
                            <div class="relative flex items-center justify-center bg-gray-50 h-56">
                                <img src="{{ asset('storage/' . ($item->foto ?? 'default/no-image.jpg')) }}"
                                    alt="{{ $item->judul }}"
                                    class="max-h-48 max-w-[90%] object-contain rounded-lg hover:scale-105 transition-transform duration-500">

                                <!-- Label tipe -->
                                <div
                                    class="absolute top-3 right-3 bg-[#4C8BBE] text-white text-xs px-3 py-1 rounded-full shadow-md">
                                    {{ $item->tipe }}
                                </div>
                            </div>
                            <div class="p-5 text-center">
                                <h3 class="text-lg font-semibold text-[#4C8BBE] mb-2">
                                    {{ $item->judul }}
                                </h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    {{ Str::limit($item->deskripsi ?? 'Tidak ada deskripsi.', 100) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            easing: 'ease-in-out'
        });
    </script>
@endsection
