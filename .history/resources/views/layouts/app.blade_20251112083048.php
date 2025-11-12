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
 <!-- ====================== NAVBAR ====================== -->
<header 
  :class="scrolled ? 'navbar-scrolled' : 'bg-primary'" 
  class="shadow-md sticky top-0 z-50 transition-all duration-500"
  x-data="{ open: false }"
>
  <div class="w-full px-4 md:px-8 py-4 flex justify-between items-center">
    
    <!-- Logo -->
    <div class="flex items-center space-x-4 cursor-pointer">
      <img src="{{ asset('storage/logo/logosmp.png') }}" 
           alt="Logo SMPN 38 Palembang" 
           class="h-12 w-12 object-contain rounded-full bg-white p-2 shadow-xl hover:scale-105 transition">
      <div>
        <h1 class="text-white text-lg md:text-xl font-bold tracking-tight">SMPN 38 Palembang</h1>
        <p class="text-white/90 text-xs font-medium">Sekolah Unggulan</p>
      </div>
    </div>

    <!-- Tombol Hamburger (Mobile) -->
    <button @click="open = !open" class="md:hidden text-white focus:outline-none hover:scale-110 transition-transform">
      <i :class="open ? 'fa-solid fa-xmark text-2xl' : 'fa-solid fa-bars text-2xl'"></i>
    </button>

    <!-- Menu Utama (Sama untuk Desktop dan Mobile) -->
    <nav :class="open ? 'max-h-screen opacity-100' : 'max-h-0 opacity-0 md:opacity-100 md:max-h-full'" 
         class="w-full md:w-auto overflow-hidden transition-all duration-500 md:flex md:items-center md:space-x-1 text-sm font-semibold bg-primary md:bg-transparent rounded-xl md:rounded-none mt-4 md:mt-0">

      <!-- Gunakan grid saat mobile -->
      <ul class="flex flex-col md:flex-row md:items-center text-white space-y-2 md:space-y-0 md:space-x-1 px-4 md:px-0">

        <!-- Beranda -->
        <li>
          <a href="/" class="block hover:bg-white/20 px-4 py-2.5 rounded-lg hover:scale-[1.02] transition-all">
            <i class="fas fa-home mr-1.5"></i> Beranda
          </a>
        </li>

        <!-- Profil Dropdown -->
        <li class="relative group">
          <button class="flex items-center w-full md:w-auto justify-between md:justify-start hover:bg-white/20 px-4 py-2.5 rounded-lg">
            <span><i class="fas fa-user-circle mr-1.5"></i>Profil</span>
            <i class="fas fa-chevron-down ml-2 text-sm"></i>
          </button>
          <div class="md:absolute md:left-0 md:mt-2 md:w-48 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 md:z-50">
            <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Profil Sekolah</a>
            <a href="{{ route('visimisi') }}" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
            <a href="{{ route('struktur') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">Struktur Organisasi</a>
          </div>
        </li>

        <!-- Pengumuman -->
        <li class="relative group">
          <button class="flex items-center justify-between w-full md:w-auto hover:bg-white/20 px-4 py-2.5 rounded-lg">
            <span><i class="fas fa-bullhorn mr-1.5"></i>Pengumuman</span>
            <i class="fas fa-chevron-down ml-2 text-sm"></i>
          </button>
          <div class="md:absolute md:left-0 md:mt-2 md:w-64 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 md:z-50">
            <a href="{{ route('pengumuman.index') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Semua Pengumuman</a>
            @foreach ($kategori_pengumuman as $kat)
              <a href="{{ route('pengumuman.byKategori', $kat->id) }}" class="block px-4 py-2 hover:bg-gray-100">
                {{ $kat->nama_kategori }}
              </a>
            @endforeach
          </div>
        </li>

        <!-- Galeri -->
        <li>
          <a href="/galeri" class="block hover:bg-white/20 px-4 py-2.5 rounded-lg">
            <i class="fas fa-images mr-1.5"></i> Galeri
          </a>
        </li>

        <!-- Guru & Staff -->
        <li class="relative group">
          <button class="flex items-center justify-between w-full md:w-auto hover:bg-white/20 px-4 py-2.5 rounded-lg">
            <span><i class="fas fa-chalkboard-teacher mr-1.5"></i>Tenaga Pendidik</span>
            <i class="fas fa-chevron-down ml-2 text-sm"></i>
          </button>
          <div class="md:absolute md:left-0 md:mt-2 md:w-44 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
            {{-- <a href="{{ route('guru.guru') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Guru</a> --}}
            <a href="{{ route('guru.staff') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">Staff</a>
          </div>
        </li>

        <!-- Kontak -->
        <li>
          <a href="/contact" class="block hover:bg-white/20 px-4 py-2.5 rounded-lg">
            <i class="fas fa-envelope mr-1.5"></i> Kontak
          </a>
        </li>

      </ul>
    </nav>
  </div>
</header>


  <!-- ====================== KONTEN ====================== -->
  <main>
    @yield('content')
  </main>

  <!-- ====================== FOOTER ====================== -->
  <footer class="bg-primary text-white pt-16 pb-8 mt-20 shadow-2xl">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
      
      <!-- Kolom 1: Info Sekolah -->
      <div>
        <div class="flex items-center space-x-3 mb-5">
          <div class="bg-white rounded-full p-3 shadow-xl hover-lift">
            <i class="fas fa-graduation-cap text-2xl text-primary"></i>
          </div>
          <div>
            <h2 class="text-xl font-bold tracking-tight">SMPN 38 PALEMBANG</h2>
            <p class="text-xs text-white/80 font-medium">Excellence in Education</p>
          </div>
        </div>
        <p class="text-sm text-white/95 leading-relaxed mb-6">
          Sekolah unggulan berbasis Kurikulum Merdeka yang menghasilkan generasi cerdas, berakhlak mulia, dan siap bersaing global.
        </p>
        
        <!-- Social Media -->
        <div class="flex space-x-3">
          <a href="#" class="bg-white/20 hover:bg-white hover:text-primary w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
            <i class="fab fa-facebook-f text-lg"></i>
          </a>
          {{-- <a href="#" class="bg-white/20 hover:bg-white hover:text-primary w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
            <i class="fab fa-twitter text-lg"></i>
          </a> --}}
          <a href="#" class="bg-white/20 hover:bg-white hover:text-primary w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
            <i class="fab fa-instagram text-lg"></i>
          </a>
          <a href="#" class="bg-white/20 hover:bg-white hover:text-primary w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
            <i class="fab fa-youtube text-lg"></i>
          </a>
        </div>
      </div>

      <!-- Kolom 2: Tautan Cepat -->
      <div>
        <h3 class="text-lg font-bold mb-6 inline-flex items-center bg-white/20 rounded-lg px-4 py-2 shadow-lg">
          <i class="fas fa-link mr-2"></i>TAUTAN CEPAT
        </h3>
        <ul class="space-y-3 text-sm">
          <li>
            <a href="/" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
              <i class="fas fa-chevron-right mr-3 text-xs"></i>Beranda
            </a>
          </li>
          <li>
            <a href="/profile" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
              <i class="fas fa-chevron-right mr-3 text-xs"></i>Profil
            </a>
          </li>
          <li>
            <a href="/pengumuman" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
              <i class="fas fa-chevron-right mr-3 text-xs"></i>Pengumuman
            </a>
          </li>
          <li>
            <a href="/galeri" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
              <i class="fas fa-chevron-right mr-3 text-xs"></i>Galeri
            </a>
          </li>
          <li>
            <a href="/guru" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
              <i class="fas fa-chevron-right mr-3 text-xs"></i>Guru & Staff
            </a>
          </li>
          <li>
            <a href="/contact" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
              <i class="fas fa-chevron-right mr-3 text-xs"></i>Kontak
            </a>
          </li>
        </ul>
      </div>

      <!-- Kolom 3: Hubungi Kami -->
      <div>
        <h3 class="text-lg font-bold mb-6 inline-flex items-center bg-white/20 rounded-lg px-4 py-2 shadow-lg">
          <i class="fas fa-phone mr-2"></i>HUBUNGI KAMI
        </h3>
        <ul class="space-y-4 text-sm">
          <li class="flex items-start gap-4 bg-white/10 rounded-xl p-4 hover:bg-white/20 transition-all hover-lift">
            <div class="bg-white rounded-full w-11 h-11 flex items-center justify-center flex-shrink-0 shadow-lg">
              <i class="fas fa-phone-alt text-primary text-lg"></i>
            </div>
            <div>
              <p class="font-semibold mb-1 text-white">Telepon</p>
              <p class="text-white/95">0815-3282-8282</p>
            </div>
          </li>
          <li class="flex items-start gap-4 bg-white/10 rounded-xl p-4 hover:bg-white/20 transition-all hover-lift">
            <div class="bg-white rounded-full w-11 h-11 flex items-center justify-center flex-shrink-0 shadow-lg">
              <i class="fas fa-envelope text-primary text-lg"></i>
            </div>
            <div>
              <p class="font-semibold mb-1 text-white">Email</p>
              <p class="text-white/95 break-all">smpn_38plg@yahoo.co.id</p>
            </div>
          </li>
          <li class="flex items-start gap-4 bg-white/10 rounded-xl p-4 hover:bg-white/20 transition-all hover-lift">
            <div class="bg-white rounded-full w-11 h-11 flex items-center justify-center flex-shrink-0 shadow-lg">
              <i class="fas fa-map-marker-alt text-primary text-lg"></i>
            </div>
            <div>
              <p class="font-semibold mb-1 text-white">Alamat</p>
              <p class="text-white/95">Jl. Tanjung Sari No.1, Palembang</p>
            </div>
          </li>
        </ul>
      </div>
    </div>

    <!-- Divider -->
    <div class="border-t border-white/30 pt-8">
      <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between text-sm">
        <p class="mb-4 md:mb-0 text-white/95 font-medium">
          © 2025 SMPN 38 Palembang. All rights reserved.
        </p>
        <p class="text-center text-white/95">
          Dibuat  <i class="fas fa-heart text-red-400 mx-1"></i> oleh <b class="text-white font-bold">Kelompok 3 RPL</b> | @2025
        </p>
      </div>
    </div>
  </footer>

</body>
</html>