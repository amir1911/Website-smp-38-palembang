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
            background-color: var(--primary);
        }
        
        .bg-primary-dark {
            background-color: var(--primary-dark);
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
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Hover Effects */
        .hover-lift:hover {
            transform: translateY(-2px);
        }
        
        .hover-scale:hover {
            transform: scale(1.05);
        }
        
        /* Navbar Scrolled Effect */
        .navbar-scrolled {
            background-color: var(--primary-dark) !important;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
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
        
        /* Dropdown Animation */
        .dropdown-enter {
            animation: slideDown 0.2s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- ====================== NAVBAR ====================== -->
<header :class="scrolled ? 'navbar-scrolled' : 'bg-primary'" class="shadow-md sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
        
            <!-- Logo & School Name -->
            <div class="flex items-center space-x-3 cursor-pointer group">
                <div class="bg-white rounded-full p-2 shadow-lg hover-scale transition-transform">
                    <img src="{{ asset('storage/logo/logosmp.png') }}" alt="Logo SMPN 38" class="h-10 w-10 object-contain">
                </div>
                <div class="hidden sm:block">
                    <h1 class="text-white text-lg font-bold leading-tight">
                        SMPN 38 Palembang
                    </h1>
                    <p class="text-white/90 text-xs">Sekolah Unggulan</p>
                </div>
            </div>
            
            <!-- Desktop Menu -->
            <nav class="hidden lg:flex items-center space-x-2">
                <a href="/" class="text-white px-4 py-2 rounded-lg hover:bg-white/15 font-medium text-sm flex items-center gap-2 transition">
                    <i class="fas fa-home"></i>
                    <span>BERANDA</span>
                </a>
                
                <!-- Dropdown Profil -->
                <div class="relative group">
                    <button class="text-white px-4 py-2 rounded-lg hover:bg-white/15 font-medium text-sm flex items-center gap-2 transition">
                        <i class="fas fa-user-circle"></i>
                        <span>Profil</span>
                        <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </button>
                    <div class="dropdown-enter absolute left-0 mt-2 w-48 bg-white rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all overflow-hidden">
                        <a href="{{ route('profile') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 transition text-sm font-medium">
                            Profil Sekolah
                        </a>
                        <a href="{{ route('visimisi') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 transition text-sm font-medium border-t border-gray-100">
                            Visi & Misi
                        </a>
                        <a href="{{ route('struktur') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 transition text-sm font-medium border-t border-gray-100">
                            Struktur Organisasi
                        </a>
                    </div>
                </div>
                
                <a href="{{ route('pengumuman.index') }}" class="text-white px-4 py-2 rounded-lg hover:bg-white/15 font-medium text-sm flex items-center gap-2 transition">
                    <i class="fas fa-bullhorn"></i>
                    <span>PENGUMUMAN</span>
                </a>
                
                <a href="/galeri" class="text-white px-4 py-2 rounded-lg hover:bg-white/15 font-medium text-sm flex items-center gap-2 transition">
                    <i class="fas fa-images"></i>
                    <span>GALERI</span>
                </a>
                
                <!-- Dropdown Tenaga Pendidik -->
                <div class="relative group">
                    <button class="text-white px-4 py-2 rounded-lg hover:bg-white/15 font-medium text-sm flex items-center gap-2 transition">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Tenaga Pendidik</span>
                        <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </button>
                    <div class="dropdown-enter absolute left-0 mt-2 w-40 bg-white rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all overflow-hidden">
                        <a href="{{ route('guru.guru') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 transition text-sm font-medium">
                            Guru
                        </a>
                        <a href="{{ route('guru.staff') }}" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 transition text-sm font-medium border-t border-gray-100">
                            Staff
                        </a>
                    </div>
                </div>
                
                <!-- Dropdown Informasi & Kontak -->
                <div class="relative group">
                    <button class="text-white px-4 py-2 rounded-lg hover:bg-white/15 font-medium text-sm flex items-center gap-2 transition">
                        <i class="fas fa-envelope"></i>
                        <span>Informasi & Kontak</span>
                        <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </button>
                    <div class="dropdown-enter absolute left-0 mt-2 w-44 bg-white rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all overflow-hidden">
                        <a href="/contact" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 transition text-sm font-medium">
                            Contact
                        </a>
                        <a href="/buku-tamu" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 transition text-sm font-medium border-t border-gray-100">
                            Buku Tamu
                        </a>
                    </div>
                </div>
                
                <!-- Search Desktop -->
                <form action="{{ route('search') }}" method="GET" class="flex items-center ml-2">
                    <div class="relative">
                        <input type="text" name="q" placeholder="Cari..." 
                               class="pl-10 pr-4 py-2 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white/30 bg-white/95 w-48 transition-all shadow" required>
                        <i class="fas fa-search absolute left-3.5 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                    </div>
                    <button type="submit" class="bg-white text-primary px-4 py-2 rounded-full font-semibold hover:bg-yellow-300 hover:text-primary-dark transition ml-2 shadow">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </nav>
            
            <!-- Mobile Hamburger Button -->
            <button @click="open = !open" class="lg:hidden text-white focus:outline-none hover:bg-white/15 p-2 rounded-lg transition">
                <i :class="open ? 'fa-xmark' : 'fa-bars'" class="fas text-2xl"></i>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="lg:hidden bg-primary-dark border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 py-4 space-y-1">
            
            <a href="/" class="block text-white px-4 py-3 rounded-lg hover:bg-white/15 font-semibold transition">
                <i class="fas fa-home mr-3 w-5"></i>BERANDA
            </a>
            
            <!-- Mobile Profil Dropdown -->
            <div x-data="{ dropProfil: false }">
                <button @click="dropProfil = !dropProfil" 
                        class="w-full flex justify-between items-center text-white px-4 py-3 rounded-lg hover:bg-white/15 font-semibold transition">
                    <span><i class="fas fa-user-circle mr-3 w-5"></i>PROFIL</span>
                    <i :class="dropProfil ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm"></i>
                </button>
                <div x-show="dropProfil" x-transition class="bg-white/10 rounded-lg overflow-hidden mt-1 ml-4">
                    <a href="/profile" class="block px-4 py-2.5 text-white hover:bg-white/15 text-sm transition">
                        <i class="fas fa-school mr-2"></i>Profil Sekolah
                    </a>
                    <a href="/visi" class="block px-4 py-2.5 text-white hover:bg-white/15 text-sm border-t border-white/10 transition">
                        <i class="fas fa-eye mr-2"></i>Visi
                    </a>
                    <a href="/misi" class="block px-4 py-2.5 text-white hover:bg-white/15 text-sm border-t border-white/10 transition">
                        <i class="fas fa-bullseye mr-2"></i>Misi
                    </a>
                </div>
            </div>
            
            <a href="{{ route('pengumuman.index') }}" 
               class="block text-white px-4 py-3 rounded-lg hover:bg-white/15 font-semibold transition">
                <i class="fas fa-bullhorn mr-3 w-5"></i>PENGUMUMAN
            </a>
            
            <a href="/galeri" class="block text-white px-4 py-3 rounded-lg hover:bg-white/15 font-semibold transition">
                <i class="fas fa-images mr-3 w-5"></i>GALERI
            </a>
            
            <a href="/guru" class="block text-white px-4 py-3 rounded-lg hover:bg-white/15 font-semibold transition">
                <i class="fas fa-chalkboard-teacher mr-3 w-5"></i>GURU & STAFF
            </a>
            
            <a href="/contact" class="block text-white px-4 py-3 rounded-lg hover:bg-white/15 font-semibold transition">
                <i class="fas fa-envelope mr-3 w-5"></i>KONTAK
            </a>
            
            <!-- Search Mobile -->
            <form action="{{ route('search') }}" method="GET" class="pt-3 border-t border-white/10">
                <div class="relative">
                    <input type="text" name="q" placeholder="Cari..." 
                           class="w-full pl-11 pr-4 py-3 rounded-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-white/30 shadow" required>
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <button type="submit" class="mt-2 w-full bg-white text-primary py-3 rounded-full font-bold hover:bg-yellow-300 hover:text-primary-dark transition shadow">
                    <i class="fas fa-search mr-2"></i>Cari Sekarang
                </button>
            </form>
        </div>
    </div>
</header>

<!-- ====================== DEMO CONTENT ====================== -->
<main class="min-h-screen">
    <div class="container mx-auto px-4 py-20">
        <div class="text-center mb-16">
            <h2 class="text-5xl font-bold text-gray-800 mb-4 bg-gradient-to-r from-primary to-primary-dark bg-clip-text text-transparent">Selamat Datang</h2>
            <p class="text-gray-600 text-lg">Scroll untuk melihat efek navbar</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20">
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-t-4 border-primary">
                <div class="bg-gradient-to-br from-primary to-primary-dark w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <i class="fas fa-book text-3xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Kurikulum Merdeka</h3>
                <p class="text-gray-600 leading-relaxed">Menerapkan kurikulum terkini untuk pendidikan berkualitas tinggi</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-t-4 border-primary">
                <div class="bg-gradient-to-br from-primary to-primary-dark w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <i class="fas fa-trophy text-3xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Prestasi Gemilang</h3>
                <p class="text-gray-600 leading-relaxed">Berbagai prestasi akademik dan non-akademik yang membanggakan</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-t-4 border-primary">
                <div class="bg-gradient-to-br from-primary to-primary-dark w-16 h-16 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                    <i class="fas fa-users text-3xl text-white"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Tenaga Profesional</h3>
                <p class="text-gray-600 leading-relaxed">Guru dan staff yang berdedikasi tinggi untuk pendidikan terbaik</p>
            </div>
        </div>
        
        <div class="bg-gradient-to-r from-primary/10 via-primary/5 to-transparent p-12 rounded-3xl mb-12">
            <h3 class="text-3xl font-bold text-gray-800 mb-6">Fasilitas Lengkap</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-all">
                    <i class="fas fa-laptop text-4xl text-primary mb-3"></i>
                    <p class="font-semibold text-gray-700">Lab Komputer</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-all">
                    <i class="fas fa-flask text-4xl text-primary mb-3"></i>
                    <p class="font-semibold text-gray-700">Lab IPA</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-all">
                    <i class="fas fa-book-reader text-4xl text-primary mb-3"></i>
                    <p class="font-semibold text-gray-700">Perpustakaan</p>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-all">
                    <i class="fas fa-running text-4xl text-primary mb-3"></i>
                    <p class="font-semibold text-gray-700">Lapangan Olahraga</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white p-12 rounded-3xl shadow-xl">
            <h3 class="text-3xl font-bold text-gray-800 mb-6">Visi & Misi</h3>
            <div class="space-y-6">
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 p-3 rounded-lg flex-shrink-0">
                        <i class="fas fa-eye text-2xl text-primary"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-2 text-gray-800">Visi</h4>
                        <p class="text-gray-600 leading-relaxed">Menjadi sekolah unggulan yang menghasilkan generasi cerdas, berakhlak mulia, dan berdaya saing global</p>
                    </div>
                </div>
                <div class="flex items-start space-x-4">
                    <div class="bg-primary/10 p-3 rounded-lg flex-shrink-0">
                        <i class="fas fa-bullseye text-2xl text-primary"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-2 text-gray-800">Misi</h4>
                        <p class="text-gray-600 leading-relaxed">Menyelenggarakan pendidikan berkualitas dengan mengembangkan potensi siswa secara optimal melalui pembelajaran yang inovatif dan berkarakter</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <a href="#" 
                target="_blank" 
                rel="noopener" 
                class="bg-white/20 hover:bg-white hover:text-primary w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
                    <i class="fab fa-facebook-f text-lg"></i>
                </a>

                <a href="https://www.instagram.com/smpn38_palembang?igsh=aXl3aGlseG9xdDI5" 
                target="_blank" 
                rel="noopener" 
                class="bg-white/20 hover:bg-white hover:text-primary w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
                    <i class="fab fa-instagram text-lg"></i>
                </a>

                <a href="https://www.tiktok.com/@spentipanplg?is_from_webapp=1&sender_device=pc" 
                target="_blank" 
                rel="noopener" 
                class="bg-white/20 hover:bg-white hover:text-primary w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
                    <i class="fab fa-tiktok text-lg"></i>
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
                Dibuat <i class="fas fa-heart text-red-400 mx-1"></i> oleh <b class="text-white font-bold">Kelompok 3 RPL</b> | @2025
            </p>
        </div>
    </div>
</footer>

</body>
</html>