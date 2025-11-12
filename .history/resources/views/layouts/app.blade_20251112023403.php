<!DOCTYPE html>
<html lang="id" x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 20">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMPN 38 Palembang</title>

  <!-- TailwindCSS & AlpineJS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Google Font Modern (Inter) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #49ADFF;
      --primary-dark: #2E90E5;
    }
    .bg-primary { background-color: var(--primary); }
    .bg-primary-dark { background-color: var(--primary-dark); }
    .text-primary { color: var(--primary); }

    body {
      font-family: 'Inter', sans-serif;
      letter-spacing: 0.3px;
    }

    h1, h2, h3, h4 {
      font-weight: 700;
      letter-spacing: 0.5px;
    }

    /* Smooth Transitions */
    a, button {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Hover Effects */
    .hover-lift:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .hover-glow:hover {
      box-shadow: 0 0 20px rgba(73, 173, 255, 0.4);
    }

    /* Navbar Scrolled Effect */
    .navbar-scrolled {
      background-color: var(--primary-dark) !important;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 10px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    ::-webkit-scrollbar-thumb {
      background: var(--primary);
      border-radius: 5px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: var(--primary-dark);
    }
  </style>
</head>

<body class="bg-gray-50 text-gray-800">

  <!-- ====================== NAVBAR ====================== -->
 <header 
  x-data="{ open: false, scrolled: false }"
  @scroll.window="scrolled = window.scrollY > 20"
  :class="scrolled ? 'navbar-scrolled' : 'bg-primary'"
  class="shadow-md sticky top-0 z-50 transition-all duration-500"
>
  <div class="w-full px-4 md:px-8 py-5 flex justify-between items-center">

    <!-- Logo -->
    <div class="flex items-center space-x-4 group cursor-pointer">
      <img src="{{ asset('storage/logo/logosmp.png') }}" alt="Logo SMPN 38 Palembang" 
           class="h-12 w-12 object-contain rounded-full bg-white p-2 shadow-xl hover-lift">
      <div>
        <h1 class="text-white text-xl font-bold tracking-tight leading-tight">
          SMPN 38 Palembang
        </h1>
        <p class="text-white/90 text-xs font-medium">Sekolah Unggulan</p>
      </div>
    </div>

    <!-- Tombol Hamburger (Mobile) -->
    <button @click="open = !open" 
            class="md:hidden text-white focus:outline-none hover:scale-110 transition-transform">
      <i :class="open ? 'fa-solid fa-xmark text-3xl' : 'fa-solid fa-bars text-3xl'"></i>
    </button>

    <!-- MENU DESKTOP -->
    <nav class="hidden md:flex space-x-1 items-center text-sm font-semibold">
      <!-- Beranda -->
      <a href="/" class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow">
        <i class="fas fa-home mr-1.5"></i>BERANDA
      </a>

      <!-- Profil -->
      <div class="relative group">
        <button class="flex items-center text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow">
          <i class="fas fa-user-circle mr-1.5"></i>
          Profil
          <i class="fas fa-chevron-down ml-2 text-sm"></i>
        </button>

        <div class="absolute left-0 mt-2 w-44 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 
                    group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
          <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Profil Sekolah</a>
          <a href="{{ route('visimisi') }}" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
          <a href="{{ route('struktur') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">Struktur Organisasi</a>
        </div>
      </div>

      <!-- Pengumuman -->
      <div x-data="{ drop: false }" class="relative">
        <button @click="drop = !drop" 
                class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg flex items-center space-x-2 hover-glow">
          <i class="fas fa-bullhorn"></i>
          <span>PENGUMUMAN</span>
          <i :class="drop ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs transition-transform"></i>
        </button>

        <div x-show="drop" 
             x-transition
             @click.away="drop = false"
             class="absolute left-0 mt-3 w-64 bg-white rounded-2xl shadow-2xl overflow-hidden z-50">
          <div class="bg-primary p-3.5">
            <p class="text-white font-bold text-sm flex items-center">
              <i class="fas fa-bullhorn mr-2"></i>Kategori Pengumuman
            </p>
          </div>
          <a href="{{ route('pengumuman.index') }}" 
             class="block px-5 py-3 text-gray-700 hover:bg-blue-50 font-medium border-b border-gray-100">
            <i class="fas fa-list mr-2 text-primary"></i>Semua Pengumuman
          </a>
          @foreach ($kategori_pengumuman as $kat)
          <a href="{{ route('pengumuman.byKategori', $kat->id) }}" 
             class="block px-5 py-3 text-gray-700 hover:bg-blue-50 transition-all">
            <i class="fas fa-chevron-right mr-2 text-primary text-xs"></i>{{ $kat->nama_kategori }}
          </a>
          @endforeach
        </div>
      </div>

      <!-- Galeri -->
      <a href="/galeri" class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow">
        <i class="fas fa-images mr-1.5"></i>GALERI
      </a>

      <!-- Tenaga Pendidik -->
      <div class="relative group">
        <button class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center">
          <i class="fas fa-chalkboard-teacher mr-1.5"></i>
          Tenaga Pendidik
          <i class="fas fa-chevron-down ml-2 text-sm"></i>
        </button>
        <div class="absolute left-0 mt-2 w-40 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 
                    group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
          <a href="{{ route('guru.guru') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Guru</a>
          <a href="{{ route('guru.staff') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">Staff</a>
        </div>
      </div>

      <!-- Informasi & Kontak -->
      <div class="relative group">
        <button class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center">
          <i class="fas fa-envelope mr-1.5"></i>
          Informasi & Kontak
          <i class="fas fa-chevron-down ml-2 text-sm"></i>
        </button>
        <div class="absolute left-0 mt-2 w-44 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 
                    group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
          <a href="/contact" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Contact</a>
          <a href="/buku-tamu" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">Buku Tamu</a>
        </div>
      </div>

      <!-- Search Desktop -->
      <form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center space-x-2">
        <div class="relative">
          <input type="text" name="q" placeholder="Cari..." 
                 class="pl-11 pr-4 py-2.5 rounded-full text-sm focus:outline-none focus:ring-2 
                        focus:ring-white/50 bg-white w-44 focus:w-60 transition-all shadow-lg" required>
          <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
        <button type="submit" 
                class="bg-white text-primary px-5 py-2.5 rounded-full font-bold hover:bg-yellow-300 
                       hover:text-primary-dark transition hover-lift shadow-lg">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </nav>

    <!-- MENU MOBILE -->
    <div x-show="open" 
         x-transition
         class="md:hidden bg-primary-dark px-6 py-6 text-white space-y-3 absolute top-full left-0 w-full shadow-lg">

      <!-- Menyalin struktur menu desktop -->
      <a href="/" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold">
        <i class="fas fa-home mr-3"></i>BERANDA
      </a>

      <!-- Profil -->
      <div x-data="{ openProfil: false }">
        <button @click="openProfil = !openProfil" class="w-full flex justify-between items-center hover:bg-white/20 px-4 py-3 rounded-xl font-semibold">
          <span><i class="fas fa-user-circle mr-3"></i>PROFIL</span>
          <i :class="openProfil ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm"></i>
        </button>
        <div x-show="openProfil" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4">
          <a href="{{ route('profile') }}" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10">
            Profil Sekolah
          </a>
          <a href="{{ route('visimisi') }}" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10">
            Visi & Misi
          </a>
          <a href="{{ route('struktur') }}" class="block px-5 py-3 hover:bg-white/20 text-sm">
            Struktur Organisasi
          </a>
        </div>
      </div>

      <!-- Pengumuman -->
      <div x-data="{ openPengumuman: false }">
        <button @click="openPengumuman = !openPengumuman" class="w-full flex justify-between items-center hover:bg-white/20 px-4 py-3 rounded-xl font-semibold">
          <span><i class="fas fa-bullhorn mr-3"></i>PENGUMUMAN</span>
          <i :class="openPengumuman ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm"></i>
        </button>
        <div x-show="openPengumuman" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4">
          <a href="{{ route('pengumuman.index') }}" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10">
            Semua Pengumuman
          </a>
          @foreach ($kategori_pengumuman as $kat)
          <a href="{{ route('pengumuman.byKategori', $kat->id) }}" class="block px-5 py-3 hover:bg-white/20 text-sm">
            {{ $kat->nama_kategori }}
          </a>
          @endforeach
        </div>
      </div>

      <!-- Galeri -->
      <a href="/galeri" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold">
        <i class="fas fa-images mr-3"></i>GALERI
      </a>

      <!-- Tenaga Pendidik -->
      <div x-data="{ openGuru: false }">
        <button @click="openGuru = !openGuru" class="w-full flex justify-between items-center hover:bg-white/20 px-4 py-3 rounded-xl font-semibold">
          <span><i class="fas fa-chalkboard-teacher mr-3"></i>TENAGA PENDIDIK</span>
          <i :class="openGuru ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm"></i>
        </button>
        <div x-show="openGuru" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4">
          <a href="{{ route('guru.guru') }}" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10">Guru</a>
          <a href="{{ route('guru.staff') }}" class="block px-5 py-3 hover:bg-white/20 text-sm">Staff</a>
        </div>
      </div>

   