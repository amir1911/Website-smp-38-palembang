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
        
        .bg-primary {
            background: linear-gradient(135deg, #49ADFF 0%, #3B9DE8 100%);
        }
        
        .bg-primary-dark {
            background: linear-gradient(135deg, #2E90E5 0%, #1E75D1 100%);
        }
        
        .text-primary {
            color: var(--primary);
        }
        
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
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Hover Effects */
        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
        
        .hover-glow:hover {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 25px rgba(73, 173, 255, 0.5);
        }
        
        /* Navbar Scrolled Effect */
        .navbar-scrolled {
            background: linear-gradient(135deg, #2E90E5 0%, #1E75D1 100%) !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(10px);
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }
        
        ::-webkit-scrollbar-track {
            background: linear-gradient(to bottom, #f1f1f1, #e1e1e1);
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, var(--primary), var(--primary-dark));
            border-radius: 6px;
            border: 2px solid #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, var(--primary-dark), #1E75D1);
        }

        /* Dropdown Animation */
        .dropdown-menu {
            backdrop-filter: blur(10px);
            animation: slideDownFade 0.3s ease-out;
        }

        @keyframes slideDownFade {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Menu Item Hover */
        nav a, nav button {
            position: relative;
            overflow: hidden;
        }

        nav a::before, nav button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }

        nav a:hover::before, nav button:hover::before {
            left: 100%;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 text-gray-800">

<!-- ====================== NAVBAR ====================== -->
<header :class="scrolled ? 'navbar-scrolled' : 'bg-primary'" class="shadow-2xl sticky top-0 z-50 transition-all duration-500 border-b border-white/20">
    <div class="w-full px-4 md:px-8 py-5 flex justify-between items-center">
        
        <!-- Logo -->
        <div class="flex items-center space-x-4 group cursor-pointer">
            <div class="relative">
                <img src="{{ asset('storage/logo/logosmp.png') }}" alt="Logo SMPN 38 Palembang" class="h-14 w-14 object-contain rounded-full bg-white p-2.5 shadow-2xl hover-lift ring-4 ring-white/30 group-hover:ring-white/50 transition-all duration-300">
                <div class="absolute inset-0 rounded-full bg-gradient-to-br from-blue-400/20 to-transparent group-hover:from-blue-400/40 transition-all duration-300"></div>
            </div>
            <div>
                <h1 class="text-white text-xl font-extrabold tracking-tight leading-tight drop-shadow-lg">
                    SMPN 38 Palembang
                </h1>
                <p class="text-white/95 text-xs font-semibold bg-white/20 px-2 py-0.5 rounded-full inline-block backdrop-blur-sm">Sekolah Unggulan</p>
            </div>
        </div>
        
        <!-- Tombol Hamburger (HP) -->
        <button @click="open = !open" class="md:hidden text-white focus:outline-none hover:scale-110 transition-transform bg-white/20 p-3 rounded-xl backdrop-blur-sm hover:bg-white/30">
            <i :class="open ? 'fa-solid fa-xmark text-3xl' : 'fa-solid fa-bars text-3xl'"></i>
        </button>
        
        <!-- Menu Desktop -->
        <nav class="hidden md:flex space-x-1.5 items-center text-sm font-bold">
            <a href="/" class="text-white hover:bg-white/25 px-5 py-3 rounded-xl hover-glow backdrop-blur-sm shadow-lg">
                <i class="fas fa-home mr-2"></i>BERANDA
            </a>
            
            <div class="relative group">
                <!-- Tombol utama -->
                <button class="flex items-center text-white hover:bg-white/25 px-5 py-3 rounded-xl hover-glow backdrop-blur-sm shadow-lg">
                    <i class="fas fa-user-circle mr-2"></i> Profil
                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                </button>
                <!-- Dropdown -->
                <div class="dropdown-menu absolute left-0 mt-3 w-52 bg-white/95 text-gray-800 rounded-2xl shadow-2xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 overflow-hidden border border-gray-200">
                    <a href="{{ route('profile') }}" class="block px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 rounded-t-2xl font-semibold text-sm transition-all border-b border-gray-100">
                        <i class="fas fa-school mr-2 text-primary"></i>Profil Sekolah
                    </a>
                    <a href="{{ route('visimisi') }}" class="block px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 font-semibold text-sm transition-all border-b border-gray-100">
                        <i class="fas fa-bullseye mr-2 text-primary"></i>Visi & Misi
                    </a>
                    <a href="{{ route('struktur') }}" class="block px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 rounded-b-2xl font-semibold text-sm transition-all">
                        <i class="fas fa-sitemap mr-2 text-primary"></i>Struktur Organisasi
                    </a>
                </div>
            </div>
            
           <a href="{{ route('pengumuman.index') }}" 
            class="text-white hover:bg-white/25 px-5 py-3 rounded-xl flex items-center space-x-2 hover-glow backdrop-blur-sm shadow-lg">
                <i class="fas fa-bullhorn"></i>
                <span>PENGUMUMAN</span>
            </a>

            
            <a href="/galeri" class="text-white hover:bg-white/25 px-5 py-3 rounded-xl hover-glow backdrop-blur-sm shadow-lg">
                <i class="fas fa-images mr-2"></i>GALERI
            </a>
            
            <div class="relative group">
                <button class="text-white hover:bg-white/25 px-5 py-3 rounded-xl hover-glow flex items-center backdrop-blur-sm shadow-lg">
                    <i class="fas fa-chalkboard-teacher mr-2"></i> Tenaga Pendidik
                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                </button>
                <div class="dropdown-menu absolute left-0 mt-3 w-44 bg-white/95 text-gray-800 rounded-2xl shadow-2xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 overflow-hidden border border-gray-200">
                    <a href="{{ route('guru.guru') }}" class="block px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 rounded-t-2xl font-semibold text-sm transition-all border-b border-gray-100">
                        <i class="fas fa-user-tie mr-2 text-primary"></i>Guru
                    </a>
                    <a href="{{ route('guru.staff') }}" class="block px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 rounded-b-2xl font-semibold text-sm transition-all">
                        <i class="fas fa-users mr-2 text-primary"></i>Staff
                    </a>
                </div>
            </div>
            
            <div class="relative group">
                <button class="text-white hover:bg-white/25 px-5 py-3 rounded-xl hover-glow flex items-center backdrop-blur-sm shadow-lg">
                    <i class="fas fa-envelope mr-2"></i> Informasi & Kontak
                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                </button>
                <!-- Dropdown menu -->
                <div class="dropdown-menu absolute left-0 mt-3 w-48 bg-white/95 text-gray-800 rounded-2xl shadow-2xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 overflow-hidden border border-gray-200">
                    <a href="/contact" class="block px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 rounded-t-2xl font-semibold text-sm transition-all border-b border-gray-100">
                        <i class="fas fa-phone mr-2 text-primary"></i>Contact
                    </a>
                    <a href="/buku-tamu" class="block px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 rounded-b-2xl font-semibold text-sm transition-all">
                        <i class="fas fa-book mr-2 text-primary"></i>Buku Tamu
                    </a>
                </div>
            </div>
            
            <!-- Search Desktop -->
            <form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center space-x-2">
                <div class="relative">
                    <input type="text" name="q" placeholder="Cari..." class="pl-12 pr-5 py-3 rounded-full text-sm focus:outline-none focus:ring-4 focus:ring-white/40 bg-white/95 backdrop-blur-sm w-48 focus:w-64 transition-all shadow-xl font-medium" required>
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 text-base"></i>
                </div>
                <button type="submit" class="bg-white text-primary px-6 py-3 rounded-full font-bold hover:bg-yellow-300 hover:text-primary-dark hover:scale-105 transition-all hover-lift shadow-xl">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </nav>
    </div>
    
    <!-- Menu Mobile -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="md:hidden bg-gradient-to-b from-primary-dark to-primary px-6 py-6 text-white space-y-3 border-t border-white/20 backdrop-blur-lg">
        
        <a href="/" class="block hover:bg-white/25 px-5 py-3.5 rounded-2xl font-bold hover-lift shadow-lg backdrop-blur-sm">
            <i class="fas fa-home mr-3 w-6"></i>BERANDA
        </a>
        
        <!-- PROFIL (Dropdown seragam desktop & mobile) -->
        <div x-data="{ dropProfil: false }" class="space-y-2">
            <button @click="dropProfil = !dropProfil" class="w-full flex justify-between items-center font-bold hover:bg-white/25 px-5 py-3.5 rounded-2xl transition backdrop-blur-sm shadow-lg">
                <span><i class="fas fa-user-circle mr-3 w-6"></i>PROFIL</span>
                <i :class="dropProfil ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm transition-transform duration-300"></i>
            </button>
            <!-- Dropdown isi -->
            <div x-show="dropProfil" x-transition class="bg-white/15 rounded-2xl overflow-hidden ml-4 shadow-inner backdrop-blur-sm">
                <a href="/profile" class="block px-6 py-3.5 hover:bg-white/25 text-sm border-b border-white/20 transition font-semibold">
                    <i class="fas fa-school mr-3"></i>Profil Sekolah
                </a>
                <a href="/visi" class="block px-6 py-3.5 hover:bg-white/25 text-sm border-b border-white/20 transition font-semibold">
                    <i class="fas fa-eye mr-3"></i>Visi
                </a>
                <a href="/misi" class="block px-6 py-3.5 hover:bg-white/25 text-sm transition font-semibold">
                    <i class="fas fa-bullseye mr-3"></i>Misi
                </a>
            </div>
        </div>
        
        <!-- Dropdown Pengumuman (Mobile) -->
        <a href="{{ route('pengumuman.index') }}" 
        class="block hover:bg-white/25 px-5 py-3.5 rounded-2xl font-bold hover-lift shadow-lg backdrop-blur-sm">
            <i class="fas fa-bullhorn mr-3 w-6"></i>PENGUMUMAN
        </a>

        
        <a href="/galeri" class="block hover:bg-white/25 px-5 py-3.5 rounded-2xl font-bold hover-lift shadow-lg backdrop-blur-sm">
            <i class="fas fa-images mr-3 w-6"></i>GALERI
        </a>
        
        <a href="/guru" class="block hover:bg-white/25 px-5 py-3.5 rounded-2xl font-bold hover-lift shadow-lg backdrop-blur-sm">
            <i class="fas fa-chalkboard-teacher mr-3 w-6"></i>GURU & STAFF
        </a>
        
        <a href="/contact" class="block hover:bg-white/25 px-5 py-3.5 rounded-2xl font-bold hover-lift shadow-lg backdrop-blur-sm">
            <i class="fas fa-envelope mr-3 w-6"></i>KONTAK
        </a>
        
        <!-- Search Mobile -->
        <form action="{{ route('search') }}" method="GET" class="pt-4 border-t border-white/30">
            <div class="relative">
                <input type="text" name="q" placeholder="Cari..." class="w-full pl-13 pr-5 py-4 rounded-full text-gray-700 focus:outline-none focus:ring-4 focus:ring-white/40 shadow-2xl font-medium backdrop-blur-sm" required>
                <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg"></i>
            </div>
            <button type="submit" class="mt-3 w-full bg-white text-primary py-4 rounded-full font-bold hover:bg-yellow-300 hover:text-primary-dark transition shadow-2xl hover-lift hover:scale-105">
                <i class="fas fa-search mr-2"></i>Cari Sekarang
            </button>
        </form>
    </div>
</header>

<!-- ====================== KONTEN ====================== -->
<main>
    @yield('content')
</main>

<!-- ====================== FOOTER ====================== -->
<footer class="bg-gradient-to-br from-primary via-primary to-primary-dark text-white pt-16 pb-8 mt-20 shadow-2xl border-t-4 border-white/20">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
        
        <!-- Kolom 1: Info Sekolah -->
        <div>
            <div class="flex items-center space-x-3 mb-5">
                <div class="bg-white rounded-full p-3 shadow-2xl hover-lift ring-4 ring-white/30">
                    <i class="fas fa-graduation-cap text-3xl text-primary"></i>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold tracking-tight drop-shadow-lg">SMPN 38 PALEMBANG</h2>
                    <p class="text-xs text-white/90 font-semibold bg-white/20 px-2 py-0.5 rounded-full inline-block backdrop-blur-sm">Excellence in Education</p>
                </div>
            </div>
            <p class="text-sm text-white/95 leading-relaxed mb-6 backdrop-blur-sm bg-white/5 p-4 rounded-xl">
                Sekolah unggulan berbasis Kurikulum Merdeka yang menghasilkan generasi cerdas, berakhlak mulia, dan siap bersaing global.
            </p>
            
            <!-- Social Media -->
            <div class="flex space-x-3">
                <a href="#" 
                target="_blank" 
                rel="noopener" 
                class="bg-white/20 hover:bg-white hover:text-primary w-12 h-12 rounded-full flex items-center justify-center hover-lift transition-all shadow-xl backdrop-blur-sm hover:scale-110">
                    <i class="fab fa-facebook-f text-lg"></i>
                </a>

                <a href="https://www.instagram.com/smpn38_palembang?igsh=aXl3aGlseG9xdDI5" 
                target="_blank" 
                rel="noopener" 
                class="bg-white/20 hover:bg-white hover:text-primary w-12 h-12 rounded-full flex items-center justify-center hover-lift transition-all shadow-xl backdrop-blur-sm hover:scale-110">
                    <i class="fab fa-instagram text-lg"></i>
                </a>

                <a href="https://www.tiktok.com/@spentipanplg?is_from_webapp=1&sender_device=pc" 
                target="_blank" 
                rel="noopener" 
                class="bg-white/20 hover:bg-white hover:text-primary w-12 h-12 rounded-full flex items-center justify-center hover-lift transition-all shadow-xl backdrop-blur-sm hover:scale-110">
                    <i class="fab fa-tiktok text-lg"></i>
                </a>
            </div>
        </div>
        
        <!-- Kolom 2: Tautan Cepat -->
        <div>
            <h3 class="text-lg font-extrabold mb-6 inline-flex items-center bg-white/25 rounded-xl px-5 py-2.5 shadow-xl backdrop-blur-sm">
                <i class="fas fa-link mr-2"></i>TAUTAN CEPAT
            </h3>
            <ul class="space-y-3 text-sm">
                <li>
                    <a href="/" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Beranda
                    </a>
                </li>
                <li>
                    <a href="/profile" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Profil
                    </a>
                </li>
                <li>
                    <a href="/pengumuman" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Pengumuman
                    </a>
                </li>
                <li>
                    <a href="/galeri" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Galeri
                    </a>
                </li>
                <li>
                    <a href="/guru" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Guru & Staff
                    </a>
                </li>
                <li>
                    <a href="/contact" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Kontak
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Kolom 3: Hubungi Kami -->
        <div>
            <h3 class="text-lg font-extrabold mb-6 inline-flex items-center bg-white/25 rounded-xl px-5 py-2.5 shadow-xl backdrop-blur-sm">
                <i class="fas fa-phone mr-2"></i>HUBUNGI KAMI
            </h3>
            <ul class="space-y-4 text-sm">
                <li class="flex items-start gap-4 bg-white/15 rounded-2xl p-5 hover:bg-white/25 transition-all hover-lift shadow-xl backdrop-blur-sm">
                    <div class="bg-white rounded-full w-12 h-12 flex items-center justify-center flex-shrink-0 shadow-lg">
                        <i class="fas fa-phone-alt text-primary text-xl"></i>
                    </div>
                    <div>
                        <p class="font-bold mb-1 text-white">Telepon</p>
                        <p class="text-white/95 font-semibold">0815-3282-8282</p>
                    </div>
                </li>
                <li class="flex items-start gap-4 bg-white/15 rounded-2xl p-5 hover:bg-white/25 transition-all hover-lift shadow-xl backdrop-blur-sm">
                    <div class="bg-white rounded-full w-12 h-12 flex items-center justify-center flex-shrink-0 shadow-lg">
                        <i class="fas fa-envelope text-primary text-xl"></i>
                    </div>
                    <div>
                        <p class="font-bold mb-1 text-white">Email</p>
                        <p class="text-white/95 break-all font-semibold">smpn_38plg@yahoo.co.id</p>
                    </div>
                </li>
                <li class="flex items-start gap-4 bg-white/15 rounded-2xl p-5 hover:bg-white/25 transition-all hover-lift shadow-xl backdrop-blur-sm">
                    <div class="bg-white rounded-full w-12 h-12 flex items-center justify-center flex-shrink-0 shadow-lg">
                        <i class="fas fa-map-marker-alt text-primary text-xl"></i>
                    </div>
                    <div>
                        <p class="font-bold mb-1 text-white">Alamat</p>
                        <p class="text-white/95 font-semibold">Jl. Tanjung Sari No.1, Palembang</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Divider -->
    <div class="border-t border-white/30 pt-8 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between text-sm">
            <p class="mb-4 md:mb-0 text-white/95 font-bold">
                © 2025 SMPN 38 Palembang. All rights reserved.
            </p>
            <p class="text-center text-white/95 font-semibold">
                Dibuat <i class="fas fa-heart text-red-400 mx-1 animate-pulse"></i> oleh <b class="text-white font-extrabold">Kelompok 3 RPL</b> | @2025
            </p>
        </div>
    </div>
</footer>

</body>
</html>