<!DOCTYPE html>
<html lang="id" x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 20">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPN 38 Palembang</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --primary-light: #3b82f6;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .navbar-scrolled {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #2563eb 100%) !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: white;
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 70%;
        }
        
        .dropdown-menu {
            transform: translateY(-10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .group:hover .dropdown-menu {
            transform: translateY(0);
        }
        
        .logo-glow:hover {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.6);
        }
        
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50">

<!-- NAVBAR -->
<header :class="scrolled ? 'navbar-scrolled' : ''" 
        class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-600 shadow-lg sticky top-0 z-50 transition-all duration-500">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex justify-between items-center py-4">
            
            <!-- Logo & School Name -->
            <div class="flex items-center space-x-3 cursor-pointer group">
                <div class="bg-white rounded-full p-2.5 shadow-xl logo-glow transition-all duration-300">
                    <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                </div>
                <div>
                    <h1 class="text-white text-xl font-bold tracking-tight leading-tight">
                        SMPN 38 Palembang
                    </h1>
                    <p class="text-blue-100 text-xs font-medium">Sekolah Unggulan</p>
                </div>
            </div>
            
            <!-- Hamburger Button (Mobile) -->
            <button @click="open = !open" 
                    class="md:hidden text-white focus:outline-none p-2 rounded-lg hover:bg-white/20 transition-all">
                <i :class="open ? 'fa-xmark' : 'fa-bars'" class="fas text-3xl"></i>
            </button>
            
            <!-- Desktop Menu -->
            <nav class="hidden md:flex items-center space-x-1">
                <a href="/" class="nav-link text-white px-4 py-2.5 rounded-lg hover:bg-white/20 font-semibold text-sm">
                    <i class="fas fa-home mr-2"></i>BERANDA
                </a>
                
                <!-- Dropdown Profil -->
                <div class="relative group">
                    <button class="nav-link text-white px-4 py-2.5 rounded-lg hover:bg-white/20 font-semibold text-sm flex items-center">
                        <i class="fas fa-user-circle mr-2"></i>Profil
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div class="dropdown-menu absolute left-0 mt-2 w-52 bg-white rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible overflow-hidden">
                        <a href="/profile" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all font-medium text-sm border-b border-gray-100">
                            <i class="fas fa-school mr-2 text-blue-600"></i>Profil Sekolah
                        </a>
                        <a href="/visimisi" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all font-medium text-sm border-b border-gray-100">
                            <i class="fas fa-bullseye mr-2 text-blue-600"></i>Visi & Misi
                        </a>
                        <a href="/struktur" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all font-medium text-sm">
                            <i class="fas fa-sitemap mr-2 text-blue-600"></i>Struktur Organisasi
                        </a>
                    </div>
                </div>
                
                <a href="/pengumuman" class="nav-link text-white px-4 py-2.5 rounded-lg hover:bg-white/20 font-semibold text-sm">
                    <i class="fas fa-bullhorn mr-2"></i>PENGUMUMAN
                </a>
                
                <a href="/galeri" class="nav-link text-white px-4 py-2.5 rounded-lg hover:bg-white/20 font-semibold text-sm">
                    <i class="fas fa-images mr-2"></i>GALERI
                </a>
                
                <!-- Dropdown Tenaga Pendidik -->
                <div class="relative group">
                    <button class="nav-link text-white px-4 py-2.5 rounded-lg hover:bg-white/20 font-semibold text-sm flex items-center">
                        <i class="fas fa-chalkboard-teacher mr-2"></i>Tenaga Pendidik
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div class="dropdown-menu absolute left-0 mt-2 w-44 bg-white rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible overflow-hidden">
                        <a href="/guru" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all font-medium text-sm border-b border-gray-100">
                            <i class="fas fa-user-tie mr-2 text-blue-600"></i>Guru
                        </a>
                        <a href="/staff" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all font-medium text-sm">
                            <i class="fas fa-users mr-2 text-blue-600"></i>Staff
                        </a>
                    </div>
                </div>
                
                <!-- Dropdown Informasi & Kontak -->
                <div class="relative group">
                    <button class="nav-link text-white px-4 py-2.5 rounded-lg hover:bg-white/20 font-semibold text-sm flex items-center">
                        <i class="fas fa-envelope mr-2"></i>Informasi & Kontak
                        <i class="fas fa-chevron-down ml-2 text-xs"></i>
                    </button>
                    <div class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible overflow-hidden">
                        <a href="/contact" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all font-medium text-sm border-b border-gray-100">
                            <i class="fas fa-phone mr-2 text-blue-600"></i>Contact
                        </a>
                        <a href="/buku-tamu" class="block px-4 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-all font-medium text-sm">
                            <i class="fas fa-book mr-2 text-blue-600"></i>Buku Tamu
                        </a>
                    </div>
                </div>
                
                <!-- Search Desktop -->
                <form action="/search" method="GET" class="flex items-center ml-2">
                    <div class="relative">
                        <input type="text" 
                               name="q" 
                               placeholder="Cari..." 
                               class="search-input pl-10 pr-4 py-2.5 rounded-full text-sm focus:outline-none bg-white/95 w-40 focus:w-56 transition-all duration-300 shadow-md" 
                               required>
                        <i class="fas fa-search absolute left-3.5 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <button type="submit" 
                            class="bg-white text-blue-600 px-5 py-2.5 rounded-full font-bold hover:bg-blue-50 transition-all ml-2 shadow-md">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </nav>
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
         class="md:hidden bg-blue-800 border-t border-blue-700">
        <div class="px-4 py-5 space-y-2">
            
            <a href="/" class="block text-white px-4 py-3 rounded-xl hover:bg-white/20 font-semibold transition-all">
                <i class="fas fa-home mr-3 w-5"></i>BERANDA
            </a>
            
            <!-- Mobile Profil Dropdown -->
            <div x-data="{ dropProfil: false }">
                <button @click="dropProfil = !dropProfil" 
                        class="w-full flex justify-between items-center text-white px-4 py-3 rounded-xl hover:bg-white/20 font-semibold transition-all">
                    <span><i class="fas fa-user-circle mr-3 w-5"></i>PROFIL</span>
                    <i :class="dropProfil ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm transition-transform"></i>
                </button>
                <div x-show="dropProfil" 
                     x-transition
                     class="bg-white/10 rounded-xl overflow-hidden mt-2 ml-4">
                    <a href="/profile" class="block px-5 py-3 text-white hover:bg-white/20 text-sm border-b border-white/10 transition-all">
                        <i class="fas fa-school mr-2"></i>Profil Sekolah
                    </a>
                    <a href="/visimisi" class="block px-5 py-3 text-white hover:bg-white/20 text-sm border-b border-white/10 transition-all">
                        <i class="fas fa-bullseye mr-2"></i>Visi & Misi
                    </a>
                    <a href="/struktur" class="block px-5 py-3 text-white hover:bg-white/20 text-sm transition-all">
                        <i class="fas fa-sitemap mr-2"></i>Struktur Organisasi
                    </a>
                </div>
            </div>
            
            <a href="/pengumuman" class="block text-white px-4 py-3 rounded-xl hover:bg-white/20 font-semibold transition-all">
                <i class="fas fa-bullhorn mr-3 w-5"></i>PENGUMUMAN
            </a>
            
            <a href="/galeri" class="block text-white px-4 py-3 rounded-xl hover:bg-white/20 font-semibold transition-all">
                <i class="fas fa-images mr-3 w-5"></i>GALERI
            </a>
            
            <!-- Mobile Tenaga Pendidik Dropdown -->
            <div x-data="{ dropGuru: false }">
                <button @click="dropGuru = !dropGuru" 
                        class="w-full flex justify-between items-center text-white px-4 py-3 rounded-xl hover:bg-white/20 font-semibold transition-all">
                    <span><i class="fas fa-chalkboard-teacher mr-3 w-5"></i>TENAGA PENDIDIK</span>
                    <i :class="dropGuru ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm transition-transform"></i>
                </button>
                <div x-show="dropGuru" 
                     x-transition
                     class="bg-white/10 rounded-xl overflow-hidden mt-2 ml-4">
                    <a href="/guru" class="block px-5 py-3 text-white hover:bg-white/20 text-sm border-b border-white/10 transition-all">
                        <i class="fas fa-user-tie mr-2"></i>Guru
                    </a>
                    <a href="/staff" class="block px-5 py-3 text-white hover:bg-white/20 text-sm transition-all">
                        <i class="fas fa-users mr-2"></i>Staff
                    </a>
                </div>
            </div>
            
            <!-- Mobile Informasi & Kontak Dropdown -->
            <div x-data="{ dropKontak: false }">
                <button @click="dropKontak = !dropKontak" 
                        class="w-full flex justify-between items-center text-white px-4 py-3 rounded-xl hover:bg-white/20 font-semibold transition-all">
                    <span><i class="fas fa-envelope mr-3 w-5"></i>INFORMASI & KONTAK</span>
                    <i :class="dropKontak ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm transition-transform"></i>
                </button>
                <div x-show="dropKontak" 
                     x-transition
                     class="bg-white/10 rounded-xl overflow-hidden mt-2 ml-4">
                    <a href="/contact" class="block px-5 py-3 text-white hover:bg-white/20 text-sm border-b border-white/10 transition-all">
                        <i class="fas fa-phone mr-2"></i>Contact
                    </a>
                    <a href="/buku-tamu" class="block px-5 py-3 text-white hover:bg-white/20 text-sm transition-all">
                        <i class="fas fa-book mr-2"></i>Buku Tamu
                    </a>
                </div>
            </div>
            
            <!-- Search Mobile -->
            <form action="/search" method="GET" class="pt-4 border-t border-blue-700">
                <div class="relative">
                    <input type="text" 
                           name="q" 
                           placeholder="Cari..." 
                           class="w-full pl-12 pr-4 py-3.5 rounded-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-300 shadow-lg" 
                           required>
                    <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg"></i>
                </div>
                <button type="submit" 
                        class="mt-3 w-full bg-white text-blue-700 py-3.5 rounded-full font-bold hover:bg-blue-50 transition-all shadow-lg">
                    <i class="fas fa-search mr-2"></i>Cari Sekarang
                </button>
            </form>
        </div>
    </div>
</header>

<!-- Demo Content -->
<div class="container mx-auto px-4 py-20">
    <div class="text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang di SMPN 38 Palembang</h2>
        <p class="text-gray-600 text-lg">Scroll untuk melihat efek navbar yang berubah</p>
    </div>
    
    <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-xl shadow-lg">
            <i class="fas fa-book text-5xl text-blue-600 mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Kurikulum Merdeka</h3>
            <p class="text-gray-600">Menerapkan kurikulum terkini untuk pendidikan berkualitas</p>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-lg">
            <i class="fas fa-trophy text-5xl text-blue-600 mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Prestasi Gemilang</h3>
            <p class="text-gray-600">Berbagai prestasi akademik dan non-akademik</p>
        </div>
        <div class="bg-white p-8 rounded-xl shadow-lg">
            <i class="fas fa-users text-5xl text-blue-600 mb-4"></i>
            <h3 class="text-xl font-bold mb-2">Tenaga Pendidik Profesional</h3>
            <p class="text-gray-600">Guru dan staff yang berdedikasi tinggi</p>
        </div>
    </div>
    
    <!-- Extra content for scrolling -->
    <div class="mt-20 space-y-8">
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-8 rounded-xl">
            <h3 class="text-2xl font-bold text-blue-800 mb-4">Fasilitas Lengkap</h3>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="bg-gradient-to-r from-blue-100 to-blue-50 p-8 rounded-xl">
            <h3 class="text-2xl font-bold text-blue-800 mb-4">Lingkungan Belajar Kondusif</h3>
            <p class="text-gray-700">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>
</div>

</body>
</html