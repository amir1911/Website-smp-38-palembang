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
    
    <!-- Google Font (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #49ADFF;
            --primary-dark: #2E90E5;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.3px;
        }
        
        h1, h2, h3, h4 {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        a, button {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        
        .hover-glow:hover {
            box-shadow: 0 0 20px rgba(73, 173, 255, 0.4);
        }
        
        .navbar-scrolled {
            background-color: var(--primary-dark) !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
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
<header :class="scrolled ? 'navbar-scrolled' : 'bg-[#49ADFF]'" class="shadow-md sticky top-0 z-50 transition-all duration-500">
    <div class="w-full px-4 md:px-8 py-5 flex justify-between items-center">
        
        <!-- Logo -->
        <div class="flex items-center space-x-4 cursor-pointer">
            <img src="https://via.placeholder.com/50" alt="Logo SMPN 38 Palembang" class="h-12 w-12 object-contain rounded-full bg-white p-2 shadow-xl hover-lift">
            <div>
                <h1 class="text-white text-xl font-bold tracking-tight leading-tight">SMPN 38 Palembang</h1>
                <p class="text-white/90 text-xs font-medium">Sekolah Unggulan</p>
            </div>
        </div>
        
        <!-- Hamburger Menu (Mobile) -->
        <button @click="open = !open" class="md:hidden text-white focus:outline-none hover:scale-110 transition-transform">
            <i :class="open ? 'fa-solid fa-xmark text-3xl' : 'fa-solid fa-bars text-3xl'"></i>
        </button>
        
        <!-- Desktop Menu -->
        <nav class="hidden md:flex space-x-1 items-center text-sm font-semibold">
            <a href="/" class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow">
                <i class="fas fa-home mr-1.5"></i>BERANDA
            </a>
            
            <!-- Profil Dropdown -->
            <div class="relative group">
                <button class="flex items-center text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow">
                    <i class="fas fa-user-circle mr-1.5"></i>Profil
                    <i class="fas fa-chevron-down ml-2 text-sm"></i>
                </button>
                <div class="absolute left-0 mt-2 w-40 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Profil Sekolah</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">Struktur Organisasi</a>
                </div>
            </div>
            
            <!-- Pengumuman Dropdown -->
            <div x-data="{ drop: false }" class="relative">
                <button @click="drop = !drop" class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg flex items-center space-x-2 hover-glow">
                    <i class="fas fa-bullhorn"></i>
                    <span>PENGUMUMAN</span>
                    <i :class="drop ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-xs transition-transform"></i>
                </button>
                <div x-show="drop" @click.away="drop = false" x-transition class="absolute left-0 mt-3 w-64 bg-white rounded-2xl shadow-2xl overflow-hidden z-50">
                    <div class="bg-[#49ADFF] p-3.5">
                        <p class="text-white font-bold text-sm flex items-center">
                            <i class="fas fa-bullhorn mr-2"></i>Kategori Pengumuman
                        </p>
                    </div>
                    <a href="#" class="block px-5 py-3 text-gray-700 hover:bg-blue-50 font-medium transition-all border-b border-gray-100">
                        <i class="fas fa-list mr-2 text-[#49ADFF]"></i>Semua Pengumuman
                    </a>
                    <a href="#" class="block px-5 py-3 text-gray-700 hover:bg-blue-50 transition-all">
                        <i class="fas fa-chevron-right mr-2 text-[#49ADFF] text-xs"></i>Akademik
                    </a>
                    <a href="#" class="block px-5 py-3 text-gray-700 hover:bg-blue-50 transition-all">
                        <i class="fas fa-chevron-right mr-2 text-[#49ADFF] text-xs"></i>Ekstrakurikuler
                    </a>
                </div>
            </div>
            
            <a href="#" class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow">
                <i class="fas fa-images mr-1.5"></i>GALERI
            </a>
            
            <!-- Tenaga Pendidik Dropdown -->
            <div class="relative group">
                <button class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center">
                    <i class="fas fa-chalkboard-teacher mr-1.5"></i>Tenaga Pendidik
                    <i class="fas fa-chevron-down ml-2 text-sm"></i>
                </button>
                <div class="absolute left-0 mt-2 w-40 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Guru</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">Staff</a>
                </div>
            </div>
            
            <!-- Informasi & Kontak Dropdown -->
            <div class="relative group">
                <button class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center">
                    <i class="fas fa-envelope mr-1.5"></i>Informasi & Kontak
                    <i class="fas fa-chevron-down ml-2 text-sm"></i>
                </button>
                <div class="absolute left-0 mt-2 w-44 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">Contact</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">Buku Tamu</a>
                </div>
            </div>
            
            <!-- Search Desktop -->
            <form action="#" method="GET" class="hidden md:flex items-center space-x-2">
                <div class="relative">
                    <input type="text" name="q" placeholder="Cari..." class="pl-11 pr-4 py-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white/50 bg-white w-44 focus:w-60 transition-all shadow-lg" required>
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <button type="submit" class="bg-white text-[#49ADFF] px-5 py-2.5 rounded-full font-bold hover:bg-yellow-300 hover:text-[#2E90E5] transition hover-lift shadow-lg">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </nav>
    </div>
    
    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="md:hidden bg-[#2E90E5] px-6 py-6 text-white space-y-3">
        <a href="/" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift">
            <i class="fas fa-home mr-3 w-5"></i>BERANDA
        </a>
        
        <!-- Profil Dropdown Mobile -->
        <div x-data="{ dropProfil: false }" class="space-y-2">
            <button @click="dropProfil = !dropProfil" class="w-full flex justify-between items-center font-semibold hover:bg-white/20 px-4 py-3 rounded-xl transition">
                <span><i class="fas fa-user-circle mr-3 w-5"></i>PROFIL</span>
                <i :class="dropProfil ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm transition-transform"></i>
            </button>
            <div x-show="dropProfil" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4 shadow-inner">
                <a href="#" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10 transition">
                    <i class="fas fa-school mr-2"></i>Profil Sekolah
                </a>
                <a href="#" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10 transition">
                    <i class="fas fa-eye mr-2"></i>Visi & Misi
                </a>
                <a href="#" class="block px-5 py-3 hover:bg-white/20 text-sm transition">
                    <i class="fas fa-sitemap mr-2"></i>Struktur Organisasi
                </a>
            </div>
        </div>
        
        <!-- Pengumuman Dropdown Mobile -->
        <div x-data="{ drop: false }" class="space-y-2">
            <button @click="drop = !drop" class="w-full flex justify-between items-center font-semibold hover:bg-white/20 px-4 py-3 rounded-xl transition">
                <span><i class="fas fa-bullhorn mr-3 w-5"></i>PENGUMUMAN</span>
                <i :class="drop ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm transition-transform"></i>
            </button>
            <div x-show="drop" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4 shadow-inner">
                <a href="#" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10 transition">
                    <i class="fas fa-list mr-2"></i>Semua Pengumuman
                </a>
                <a href="#" class="block px-5 py-3 hover:bg-white/20 text-sm transition">
                    <i class="fas fa-chevron-right mr-2 text-xs"></i>Akademik
                </a>
            </div>
        </div>
        
        <a href="#" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift">
            <i class="fas fa-images mr-3 w-5"></i>GALERI
        </a>
        
        <a href="#" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift">
            <i class="fas fa-chalkboard-teacher mr-3 w-5"></i>GURU & STAFF
        </a>
        
        <a href="#" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift">
            <i class="fas fa-envelope mr-3 w-5"></i>KONTAK
        </a>
        
        <!-- Search Mobile -->
        <form action="#" method="GET" class="pt-4 border-t border-blue-200">
            <div class="relative">
                <input type="text" name="q" placeholder="Cari..." class="w-full pl-12 pr-4 py-3.5 rounded-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-white shadow-lg" required>
                <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg"></i>
            </div>
            <button type="submit" class="mt-3 w-full bg-white text-[#49ADFF] py-3.5 rounded-full font-bold hover:bg-yellow-300 hover:text-[#2E90E5] transition shadow-lg hover-lift">
                <i class="fas fa-search mr-2"></i>Cari Sekarang
            </button>
        </form>
    </div>
</header>

<!-- ====================== CONTENT ====================== -->
<main class="min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Selamat Datang di SMPN 38 Palembang</h2>
            <p class="text-gray-600 leading-relaxed">
                SMPN 38 Palembang adalah sekolah unggulan yang berkomitmen untuk memberikan pendidikan berkualitas tinggi dengan mengintegrasikan kurikulum merdeka, teknologi modern, dan pembentukan karakter siswa yang berakhlak mulia.
            </p>
        </div>
    </div>
</main>

<!-- ====================== FOOTER ====================== -->
<footer class="bg-[#49ADFF] text-white pt-16 pb-8 mt-20 shadow-2xl">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
        
        <!-- Info Sekolah -->
        <div>
            <div class="flex items-center space-x-3 mb-5">
                <div class="bg-white rounded-full p-3 shadow-xl hover-lift">
                    <i class="fas fa-graduation-cap text-2xl text-[#49ADFF]"></i>
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
                <a href="#" class="bg-white/20 hover:bg-white hover:text-[#49ADFF] w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
                    <i class="fab fa-facebook-f text-lg"></i>
                </a>
                <a href="#" class="bg-white/20 hover:bg-white hover:text-[#49ADFF] w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
                    <i class="fab fa-instagram text-lg"></i>
                </a>
                <a href="#" class="bg-white/20 hover:bg-white hover:text-[#49ADFF] w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
                    <i class="fab fa-youtube text-lg"></i>
                </a>
            </div>
        </div>
        
        <!-- Tautan Cepat -->
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
                    <a href="#" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
                        <i class="fas fa-chevron-right mr-3 text-xs"></i>Profil
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
                        <i class="fas fa-chevron-right mr-3 text-xs"></i>Pengumuman
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
                        <i class="fas fa-chevron-right mr-3 text-xs"></i>Galeri
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
                        <i class="fas fa-chevron-right mr-3 text-xs"></i>Guru & Staff
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center hover:translate-x-2 transition-transform hover:text-yellow-300">
                        <i class="fas fa-chevron-right mr-3 text-xs"></i>Kontak
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Hubungi Kami -->
        <div>
            <h3 class="text-lg font-bold mb-6 inline-flex items-center bg-white/20 rounded-lg px-4 py-2 shadow-lg">
                <i class="fas fa-phone mr-2"></i>HUBUNGI KAMI
            </h3>
            <ul class="space-y-4 text-sm">
                <li class="flex items-start gap-4 bg-white/10 rounded-xl p-4 hover:bg-white/20 transition-all hover-lift">
                    <div class="bg-white rounded-full w-11 h-11 flex items-center justify-center flex-shrink-0 shadow-lg">
                        <i class="fas fa-phone-alt text-[#49ADFF] text-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold mb-1 text-white">Telepon</p>
                        <p class="text-white/95">0815-3282-8282</p>
                    </div>
                </li>
                <li class="flex items-start gap-4 bg-white/10 rounded-xl p-4 hover:bg-white/20 transition-all hover-lift">
                    <div class="bg-white rounded-full w-11 h-11 flex items-center justify-center flex-shrink-0 shadow-lg">
                        <i class="fas fa-envelope text-[#49ADFF] text-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold mb-1 text-white">Email</p>
                        <p class="text-white/95 break-all">smpn_38plg@yahoo.co.id</p>
                    </div>
                </li>
                <li class="flex items-start gap-4 bg-white/10 rounded-xl p-4 hover:bg-white/20 transition-all hover-lift">
                    <div class="bg-white rounded-full w-11 h-11 flex items-center justify-center flex-shrink-0 shadow-lg">
                        <i class="fas fa-map-marker-alt text-[#49ADFF] text-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold mb-1 text-white">Alamat</p>
                        <p class="text-white/95">Jl. Tanjung Sari No.1, Palembang</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Copyright -->
    <div class="border-t border-white/30 pt-8">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between text-sm">
            <p class="mb-4 md:mb-0 text-white/95 font-medium">
                © 2025 SMPN 38 Palembang. All rights reserved.
            </p>
            <p class="text-center text-white/95">
                Dibuat <i class="fas fa-heart text-red-400 mx-1"></i> oleh <b class="text-white font-bold">Kelompok 3 RPL</b> | 2025
            </p>
        </div>
    </div>
</footer>

</body>
</html>