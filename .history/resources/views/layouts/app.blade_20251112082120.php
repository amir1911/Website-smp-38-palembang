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
 <header :class="scrolled ? 'navbar-scrolled' : 'bg-primary'" class="shadow-md sticky top-0 z-50 transition-all duration-500"> <div class="w-full px-4 md:px-8 py-5 flex justify-between items-center"> <!-- Logo --> <div class="flex items-center space-x-4 group cursor-pointer"> <img src="{{ asset('storage/logo/logosmp.png') }}" alt="Logo SMPN 38 Palembang" class="h-12 w-12 object-contain rounded-full bg-white p-2 shadow-xl hover-lift"> <div> <h1 class="text-white text-xl font-bold tracking-tight leading-tight"> SMPN 38 Palembang </h1> <p class="text-white/90 text-xs font-medium">Sekolah Unggulan</p> </div> </div> <!-- Tombol Hamburger (HP) --> <button @click="open = !open" class="md:hidden text-white focus:outline-none hover:scale-110 transition-transform"> <i :class="open ? 'fa-solid fa-xmark text-3xl' : 'fa-solid fa-bars text-3xl'"></i> </button> <!-- Menu Desktop --> <nav class="hidden md:flex space-x-1 items-center text-sm font-semibold"> <a href="/" class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow"> <i class="fas fa-home mr-1.5"></i>BERANDA </a> <div class="relative group"> <!-- Tombol utama --> <button class="flex items-center text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow"> <i class="fas fa-user-circle mr-1.5"></i> Profil <i class="fas fa-chevron-down ml-2 text-sm"></i> </button> <!-- Dropdown --> <div class="absolute left-0 mt-2 w-40 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200" > <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg"> Profil Sekolah </a> <a href="{{ route('visimisi') }}" class="block px-4 py-2 hover:bg-gray-100"> Visi & Misi </a> <a href="{{ route('struktur') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg"> Struktur Organisasi </a> </div> </div> <!-- Dropdown Pengumuman --> <div x-data="{ drop: false }" class="relative"> <button @click="drop = !drop" class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg flex items-center space-x-2 hover-glow"> <i class="fas fa-bullhorn"></i> <span>PENGUMUMAN</span> <i :class="drop ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs transition-transform"></i> </button> <div x-show="drop" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" @click.away="drop = false" class="absolute left-0 mt-3 w-64 bg-white rounded-2xl shadow-2xl overflow-hidden z-50"> <div class="bg-primary p-3.5"> <p class="text-white font-bold text-sm flex items-center"> <i class="fas fa-bullhorn mr-2"></i>Kategori Pengumuman </p> </div> <a href="{{ route('pengumuman.index') }}" class="block px-5 py-3 text-gray-700 hover:bg-blue-50 font-medium transition-all border-b border-gray-100"> <i class="fas fa-list mr-2 text-primary"></i>Semua Pengumuman </a> @foreach ($kategori_pengumuman as $kat) <a href="{{ route('pengumuman.byKategori', $kat->id) }}" class="block px-5 py-3 text-gray-700 hover:bg-blue-50 transition-all"> <i class="fas fa-chevron-right mr-2 text-primary text-xs"></i>{{ $kat->nama_kategori }} </a> @endforeach </div> </div> <a href="/galeri" class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow"> <i class="fas fa-images mr-1.5"></i>GALERI </a> <div class="relative group"> <button class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center"> <i class="fas fa-chalkboard-teacher mr-1.5"></i> Tenaga Pendidik <i class="fas fa-chevron-down ml-2 text-sm"></i> </button> <div class="absolute left-0 mt-2 w-40 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200" > <a href="{{ route('guru.guru') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg"> Guru </a> <a href="{{ route('guru.staff') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg"> Staff </a> </div> </div> <div class="relative group"> <button class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center"> <i class="fas fa-envelope mr-1.5"></i> Informasi & Kontak <i class="fas fa-chevron-down ml-2 text-sm"></i> </button> <!-- Dropdown menu --> <div class="absolute left-0 mt-2 w-44 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200" > <a href="/contact" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg"> Contact </a> <a href="/buku-tamu" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg"> Buku Tamu </a> </div> </div> <!-- Search Desktop --> <form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center space-x-2"> <div class="relative"> <input type="text" name="q" placeholder="Cari..." class="pl-11 pr-4 py-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white/50 bg-white w-44 focus:w-60 transition-all shadow-lg" required> <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i> </div> <button type="submit" class="bg-white text-primary px-5 py-2.5 rounded-full font-bold hover:bg-yellow-300 hover:text-primary-dark transition hover-lift shadow-lg"> <i class="fas fa-search"></i> </button> </form> </div> <!-- Menu Mobile --> <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4" class="md:hidden bg-primary-dark px-6 py-6 text-white space-y-3"> <a href="/" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift"> <i class="fas fa-home mr-3 w-5"></i>BERANDA </a> <!-- PROFIL (Dropdown sama di desktop & mobile) --> <!-- PROFIL (Dropdown seragam desktop & mobile) --> <div x-data="{ dropProfil: false }" class="space-y-2"> <button @click="dropProfil = !dropProfil" class="w-full flex justify-between items-center font-semibold hover:bg-white/20 px-4 py-3 rounded-xl transition"> <span><i class="fas fa-user-circle mr-3 w-5"></i>PROFIL</span> <i :class="dropProfil ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm transition-transform"></i> </button> <!-- Dropdown isi --> <div x-show="dropProfil" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4 shadow-inner"> <a href="/profile" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10 transition"> <i class="fas fa-school mr-2"></i>Profil Sekolah </a> <a href="/visi" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10 transition"> <i class="fas fa-eye mr-2"></i>Visi </a> <a href="/misi" class="block px-5 py-3 hover:bg-white/20 text-sm transition"> <i class="fas fa-bullseye mr-2"></i>Misi </a> </div> </div> <!-- Dropdown Pengumuman (Mobile) --> <div x-data="{ drop: false }" class="space-y-2"> <button @click="drop = !drop" class="w-full flex justify-between items-center font-semibold hover:bg-white/20 px-4 py-3 rounded-xl transition"> <span><i class="fas fa-bullhorn mr-3 w-5"></i>PENGUMUMAN</span> <i :class="drop ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm transition-transform"></i> </button> <div x-show="drop" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4 shadow-inner"> <a href="{{ route('pengumuman.index') }}" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10 transition"> <i class="fas fa-list mr-2"></i>Semua Pengumuman </a> @foreach ($kategori_pengumuman as $kat) <a href="{{ route('pengumuman.byKategori', $kat->id) }}" class="block px-5 py-3 hover:bg-white/20 text-sm transition"> <i class="fas fa-chevron-right mr-2 text-xs"></i>{{ $kat->nama_kategori }} </a> @endforeach </div> </div> <a href="/galeri" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift"> <i class="fas fa-images mr-3 w-5"></i>GALERI </a> <a href="/guru" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift"> <i class="fas fa-chalkboard-teacher mr-3 w-5"></i>GURU & STAFF </a> <a href="/contact" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift"> <i class="fas fa-envelope mr-3 w-5"></i>KONTAK </a> <!-- Search Mobile --> <form action="{{ route('search') }}" method="GET" class="pt-4 border-t border-blue-200"> <div class="relative"> <input type="text" name="q" placeholder="Cari..." class="w-full pl-12 pr-4 py-3.5 rounded-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-white shadow-lg" required> <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg"></i> </div> <button type="submit" class="mt-3 w-full bg-white text-primary py-3.5 rounded-full font-bold hover:bg-yellow-300 hover:text-primary-dark transition shadow-lg hover-lift"> <i class="fas fa-search mr-2"></i>Cari Sekarang </button> </form> </div> </header>

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
