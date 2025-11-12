<!DOCTYPE html>
<html lang="id" x-data="{ open: false }">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMPN 38 Palembang</title>

  <!-- TailwindCSS & AlpineJS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    :root {
      --primary: #49ADFF;
    }
    .bg-primary { background-color: var(--primary); }
    .bg-primary-dark { background-color: #2E90E5; }
    .text-primary { color: var(--primary); }
  </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

  <!-- ====================== NAVBAR ====================== -->
  <header class="bg-primary shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

      <!-- Logo -->
    <div class="flex items-center space-x-3">
    <div class=" rounded-none">
        <img src="{{ asset('storage/logo/logosmp.png') }}" 
             alt="Logo SMPN 38 Palembang" 
             class="h-10 w-10 object-contain">
    </div>
    <h1 class="text-white text-lg sm:text-xl font-semibold tracking-wide">
        SMPN 38 Palembang
    </h1>
</div>


      <!-- Tombol Hamburger (HP) -->
      <button @click="open = !open" class="md:hidden text-white focus:outline-none">
        <i :class="open ? 'fa-solid fa-xmark text-2xl' : 'fa-solid fa-bars text-2xl'"></i>
      </button>

      <!-- Menu Desktop -->
      <nav class="hidden md:flex space-x-6 items-center">
        <a href="/" class="text-white hover:text-yellow-300 font-medium">BERANDA</a>
        <a href="/profile" class="text-white hover:text-yellow-300 font-medium">PROFIL</a>

        <!-- Dropdown Pengumuman -->
        <div x-data="{ drop: false }" class="relative">
          <button @click="drop = !drop" class="text-white hover:text-yellow-300 font-medium flex items-center space-x-1">
            <span>PENGUMUMAN</span>
            <i class="fas fa-chevron-down text-xs mt-1"></i>
          </button>

          <div x-show="drop" @click.away="drop = false"
               class="absolute left-0 mt-2 w-52 bg-white shadow-lg rounded-lg overflow-hidden z-50">
            <a href="{{ route('pengumuman.index') }}" 
               class="block px-4 py-2 text-gray-700 hover:bg-blue-100">Semua Pengumuman</a>
            @foreach ($kategori_pengumuman as $kat)
              <a href="{{ route('pengumuman.byKategori', $kat->id) }}" 
                 class="block px-4 py-2 text-gray-700 hover:bg-blue-100">{{ $kat->nama_kategori }}</a>
            @endforeach
          </div>
        </div>

        <a href="/galeri" class="text-white hover:text-yellow-300 font-medium">GALERI</a>
        <a href="/guru" class="text-white hover:text-yellow-300 font-medium">GURU & STAFF</a>
        <a href="/contact" class="text-white hover:text-yellow-300 font-medium">KONTAK</a>
      </nav>

      <!-- Search Desktop -->
      <div class="hidden md:flex items-center space-x-2">
        <input type="text" placeholder="Cari..." class="px-3 py-1 rounded-lg text-sm focus:outline-none">
        <button class="bg-white text-primary px-3 py-1 rounded-lg font-semibold hover:bg-yellow-300 hover:text-indigo-900 transition">Cari</button>
      </div>
    </div>

    <!-- Menu Mobile -->
    <div x-show="open" x-transition class="md:hidden bg-primary-dark px-6 py-4 text-white space-y-3 text-center">
      <a href="/" class="block hover:text-yellow-300 font-medium">BERANDA</a>

      <!-- Dropdown Pengumuman (Mobile) -->
      <div x-data="{ drop: false }" class="space-y-1">
        <button @click="drop = !drop" class="w-full flex justify-center items-center font-medium hover:text-yellow-300">
          <span>PENGUMUMAN</span>
          <i class="fas fa-chevron-down text-xs ml-1"></i>
        </button>

        <div x-show="drop" x-transition class="bg-white text-gray-800 mt-2 rounded-lg shadow-lg overflow-hidden">
          <a href="{{ route('pengumuman.index') }}" 
             class="block px-4 py-2 hover:bg-blue-100">Semua Pengumuman</a>
          @foreach ($kategori_pengumuman as $kat)
            <a href="{{ route('pengumuman.byKategori', $kat->id) }}" 
               class="block px-4 py-2 hover:bg-blue-100">{{ $kat->nama_kategori }}</a>
          @endforeach
        </div>
      </div>

      <a href="/galeri" class="block hover:text-yellow-300 font-medium">GALERI</a>
      <a href="/guru" class="block hover:text-yellow-300 font-medium">GURU & STAFF</a>
      <a href="/contact" class="block hover:text-yellow-300 font-medium">KONTAK</a>

      <!-- Search Mobile -->
      <div class="pt-3 border-t border-blue-200">
        <input type="text" placeholder="Cari..." class="w-full px-3 py-2 rounded-lg text-gray-700 focus:outline-none">
        <button class="mt-2 w-full bg-white text-primary py-2 rounded-lg font-semibold hover:bg-yellow-300 hover:text-indigo-900 transition">Cari</button>
      </div>
    </div>
  </header>

  <!-- ====================== KONTEN ====================== -->
  <main>
    @yield('content')
  </main>

  <!-- ====================== FOOTER ====================== -->
  <footer class="bg-primary text-white pt-10 pb-6 mt-10">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">

      <!-- Logo -->
      <div>
        <h2 class="text-base font-bold tracking-wide">SMPN 38 PALEMBANG</h2>
        <p class="text-xs mt-2 text-gray-100">Sekolah unggulan berbasis Kurikulum Merdeka</p>
      </div>

      <!-- Tautan -->
      <div>
        <h3 class="text-lg font-bold mb-2 border-b-2 border-white inline-block pb-1">TAUTAN CEPAT</h3>
        <ul class="space-y-1 mt-1 text-sm">
          <li><a href="/" class="hover:underline">Beranda</a></li>
          <li><a href="/profile" class="hover:underline">Profil</a></li>
          <li><a href="/pengumuman" class="hover:underline">Pengumuman</a></li>
          <li><a href="/galeri" class="hover:underline">Galeri</a></li>
          <li><a href="/guru" class="hover:underline">Guru & Staff</a></li>
          <li><a href="/contact" class="hover:underline">Kontak</a></li>
        </ul>
      </div>

      <!-- Kontak -->
      <div>
        <h3 class="text-lg font-bold mb-2 border-b-2 border-white inline-block pb-1">HUBUNGI KAMI</h3>
        <ul class="space-y-2 text-sm">
          <li class="flex items-center gap-2"><i class="fas fa-phone-alt"></i> 0815-3282-8282</li>
          <li class="flex items-center gap-2"><i class="fas fa-envelope"></i> smpn_38plg@yahoo.co.id</li>
          <li class="flex items-center gap-2"><i class="fas fa-map-marker-alt"></i> Jl. Tanjung Sari No.1, Palembang</li>
        </ul>
      </div>
    </div>

    <!-- Garis Bawah -->
    <div class="border-t border-white/40 mt-8 pt-4"></div>

    <!-- Sosial Media -->
    <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between text-sm">
      <div class="flex space-x-4 mb-3 md:mb-0">
        <a href="#" class="hover:scale-110 transition-transform"><i class="fab fa-facebook-f text-lg"></i></a>
        <a href="#" class="hover:scale-110 transition-transform"><i class="fab fa-twitter text-lg"></i></a>
        <a href="#" class="hover:scale-110 transition-transform"><i class="fab fa-instagram text-lg"></i></a>
        <a href="#" class="hover:scale-110 transition-transform"><i class="fab fa-youtube text-lg"></i></a>
      </div>
      <p class="text-center text-xs md:text-sm">Dibuat oleh <b>Kelompok 3 RPL</b> | @2025</p>
    </div>
  </footer>

</body>
</html>
