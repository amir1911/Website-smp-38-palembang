@extends('layouts.app')

@section('title', 'Guru & Staff SMP Negeri 38 Palembang')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guru & Staff SMP Negeri 38 Palembang</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome (ikon media sosial) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <!-- AOS (Animate On Scroll) -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

  <style>
    body { font-family: 'Poppins', sans-serif; }

    /* Warna utama */
    :root {
      --biru-utama: #49ADFF;
    }

    /* Efek hover glowing pada ikon media sosial */
    .social-icon:hover {
      text-shadow: 0 0 15px rgba(73, 173, 255, 0.8);
      transform: scale(1.2);
    }
    .social-icon.instagram:hover {
      text-shadow: 0 0 15px rgba(236, 72, 153, 0.7);
    }

    /* Animasi halus pada kartu */
    .card {
      transition: all 0.4s ease;
    }
    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    /* Warna teks */
    .text-title { color: #1f2937; }
    .text-subtitle { color: #374151; }

    /* Warna gradasi biru */
    .bg-biru-gradient {
      background: linear-gradient(135deg, #49ADFF, #80C9FF);
    }

    /* Biru lembut di latar belakang */
    body {
      background: linear-gradient(to bottom right, #E8F5FF, #ffffff);
    }
  </style>
</head>

<body>

  <!-- Header -->
  <header class="text-center py-12">
    <h1 class="text-5xl font-extrabold text-gray-800 drop-shadow-md">
      Guru & Staf <span style="color:#49ADFF;">SMP Negeri 38</span> Palembang
    </h1>
    <p class="text-gray-600 mt-3 text-lg max-w-2xl mx-auto">
      Temui tenaga pendidik dan staf terbaik kami yang berperan penting dalam membentuk masa depan siswa.
    </p>
  </header>

  <!-- Daftar Guru -->
  <section class="container mx-auto px-6 pb-20 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
    @forelse ($gurus as $guru)
      <div data-aos="fade-up" data-aos-duration="900" data-aos-delay="{{ $loop->index * 100 }}"
           class="card relative bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl">

        <!-- Latar atas -->
        <div class="h-36 bg-biru-gradient"></div>

        <!-- Foto Guru -->
        <div class="absolute top-14 left-1/2 transform -translate-x-1/2">
          @if ($guru->foto)
            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                 class="w-44 h-44 rounded-full border-4 border-white object-cover shadow-xl transition-transform duration-500">
          @else
            <img src="https://via.placeholder.com/200" alt="Foto Guru"
                 class="w-44 h-44 rounded-full border-4 border-white object-cover shadow-xl transition-transform duration-500">
          @endif
        </div>

        <!-- Info Guru -->
        <div class="pt-36 pb-10 px-6 text-center">
          <!-- Nama -->
          <h3 class="text-2xl font-bold text-title capitalize">{{ $guru->nama }}</h3>

          <!-- Jabatan -->
          <p class="text-subtitle text-sm mt-1 font-medium uppercase tracking-wide">
            {{ $guru->jabatan ?? '-' }}
          </p>

          <!-- Mata Pelajaran -->
          @if ($guru->mata_pelajaran)
            <p class="mt-3 text-sm font-semibold" style="color:#49ADFF;">
              Mengajar: {{ $guru->mata_pelajaran }}
            </p>
          @endif

          <!-- Lokasi -->
          <div class="mt-4 flex justify-center items-center gap-2 text-gray-600 text-sm">
            <i class="fas fa-map-marker-alt" style="color:#49ADFF;"></i>
            <span>Palembang</span>
          </div>

          <!-- Media Sosial -->
          <div class="mt-6 flex justify-center gap-8 text-center">
            @if ($guru->facebook)
              <a href="{{ $guru->facebook }}" target="_blank"
                 class="flex flex-col items-center text-gray-400 hover:text-[var(--biru-utama)] transition social-icon"
                 title="Kunjungi Facebook {{ $guru->nama }}">
                <i class="fab fa-facebook text-4xl"></i>
                <span class="text-xs mt-1 text-gray-600 font-semibold">Facebook</span>
              </a>
            @endif

            @if ($guru->instagram)
              <a href="{{ $guru->instagram }}" target="_blank"
                 class="flex flex-col items-center text-gray-400 hover:text-pink-500 transition social-icon instagram"
                 title="Kunjungi Instagram {{ $guru->nama }}">
                <i class="fab fa-instagram text-4xl"></i>
                <span class="text-xs mt-1 text-gray-600 font-semibold">Instagram</span>
              </a>
            @endif
          </div>
        </div>
      </div>
    @empty
      <p class="col-span-full text-center text-gray-500 text-lg">Belum ada data guru yang tersedia.</p>
    @endforelse
  </section>

  <!-- Footer -->
  <footer class="text-center text-gray-500 py-10 text-sm border-t border-gray-200">
    &copy; 2025 SMP Negeri 38 Palembang. Semua hak dilindungi.
  </footer>

  <script>
    AOS.init({ once: true });
  </script>

</body>
</html>
@endsection
