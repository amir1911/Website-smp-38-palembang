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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #1e40af;
            --primary-light: #60a5fa;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Animated Gradient Background */
        .animated-gradient {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 50%, #1e40af 100%);
            background-size: 200% 200%;
            animation: gradientShift 8s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Smooth Transitions */
        * {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Glassmorphism Effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Hover Effects */
        .hover-scale:hover {
            transform: scale(1.05);
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        /* Navbar Scrolled */
        .navbar-scrolled {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%) !important;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
        }
        
        /* Glowing Effect */
        .glow {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
        }
        
        .glow:hover {
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.8);
        }
        
        /* Dropdown Animation */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .dropdown-animate {
            animation: slideDown 0.3s ease-out;
        }
        
        /* Menu Item Shine Effect */
        .shine {
            position: relative;
            overflow: hidden;
        }
        
        .shine::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s;
        }
        
        .shine:hover::before {
            left: 100%;
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 12px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #3b82f6, #1e40af);
            border-radius: 6px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #2563eb, #1e3a8a);
        }
        
        /* Pulse Animation */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .animate-pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-slate-100">

<!-- ====================== NAVBAR ====================== -->
<header :class="scrolled ? 'navbar-scrolled' : ''" class="animated-gradient shadow-2xl sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 md:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
        
            <!-- Logo & School Name -->
            <div class="flex items-center space-x-3 cursor-pointer group">
                <div class="relative">
                    <img src="{{ asset('storage/logo/logosmp.png') }}" alt="Logo SMPN 38 Palembang" class="h-14 w-14 object-contain rounded-2xl bg-white p-2.5 shadow-2xl hover-scale glow">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-blue-600 rounded-2xl opacity-0 group-hover:opacity-30 blur transition-opacity"></div>
                </div>
                <div>
                    <h1 class="text-white text-xl md:text-2xl font-black tracking-tight">
                        SMPN 38 Palembang
                    </h1>
                    <p class="text-blue-100 text-xs font-semibold">✨ Sekolah Unggulan</p>
                </div>
            </div>
            
            <!-- Hamburger Button (Mobile) -->
            <button @click="open = !open" class="lg:hidden glass text-white p-3 rounded-xl hover-scale glow">
                <i :class="open ? 'fa-xmark' : 'fa-bars'" class="fas text-2xl"></i>
            </button>
            
            <!-- Desktop Menu -->
            <nav class="hidden lg:flex items-center space-x-2">
                <a href="/" class="shine glass text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-white/20 flex items-center gap-2">
                    <i class="fas fa-home"></i>
                    <span>BERANDA</span>
                </a>
                
                <!-- Dropdown Profil -->
                <div class="relative group">
                    <button class="shine glass text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-white/20 flex items-center gap-2">
                        <i class="fas fa-user-circle"></i>
                        <span>Profil</span>
                        <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </button>
                    <div class="dropdown-animate absolute left-0 mt-3 w-56 bg-white rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible overflow-hidden border-2 border-blue-100">
                        <a href="{{ route('profile') }}" class="flex items-center gap-3 px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 text-gray-800 font-semibold text-sm border-b border-gray-100">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-school text-blue-600"></i>
                            </div>
                            <span>Profil Sekolah</span>
                        </a>
                        <a href="{{ route('visimisi') }}" class="flex items-center gap-3 px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 text-gray-800 font-semibold text-sm border-b border-gray-100">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-bullseye text-blue-600"></i>
                            </div>
                            <span>Visi & Misi</span>
                        </a>
                        <a href="{{ route('struktur') }}" class="flex items-center gap-3 px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 text-gray-800 font-semibold text-sm">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-sitemap text-blue-600"></i>
                            </div>
                            <span>Struktur Organisasi</span>
                        </a>
                    </div>
                </div>
                
                <a href="{{ route('pengumuman.index') }}" class="shine glass text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-white/20 flex items-center gap-2">
                    <i class="fas fa-bullhorn"></i>
                    <span>PENGUMUMAN</span>
                </a>
                
                <a href="/galeri" class="shine glass text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-white/20 flex items-center gap-2">
                    <i class="fas fa-images"></i>
                    <span>GALERI</span>
                </a>
                
                <!-- Dropdown Tenaga Pendidik -->
                <div class="relative group">
                    <button class="shine glass text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-white/20 flex items-center gap-2">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Tenaga Pendidik</span>
                        <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </button>
                    <div class="dropdown-animate absolute left-0 mt-3 w-48 bg-white rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible overflow-hidden border-2 border-blue-100">
                        <a href="{{ route('guru.guru') }}" class="flex items-center gap-3 px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 text-gray-800 font-semibold text-sm border-b border-gray-100">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-user-tie text-blue-600"></i>
                            </div>
                            <span>Guru</span>
                        </a>
                        <a href="{{ route('guru.staff') }}" class="flex items-center gap-3 px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 text-gray-800 font-semibold text-sm">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-users text-blue-600"></i>
                            </div>
                            <span>Staff</span>
                        </a>
                    </div>
                </div>
                
                <!-- Dropdown Informasi & Kontak -->
                <div class="relative group">
                    <button class="shine glass text-white px-5 py-2.5 rounded-xl font-bold text-sm hover:bg-white/20 flex items-center gap-2">
                        <i class="fas fa-envelope"></i>
                        <span>Informasi & Kontak</span>
                        <i class="fas fa-chevron-down text-xs ml-1"></i>
                    </button>
                    <div class="dropdown-animate absolute left-0 mt-3 w-52 bg-white rounded-2xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible overflow-hidden border-2 border-blue-100">
                        <a href="/contact" class="flex items-center gap-3 px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 text-gray-800 font-semibold text-sm border-b border-gray-100">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-phone text-blue-600"></i>
                            </div>
                            <span>Contact</span>
                        </a>
                        <a href="/buku-tamu" class="flex items-center gap-3 px-5 py-3.5 hover:bg-gradient-to-r hover:from-blue-50 hover:to-blue-100 text-gray-800 font-semibold text-sm">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-book text-blue-600"></i>
                            </div>
                            <span>Buku Tamu</span>
                        </a>
                    </div>
                </div>
                
                <!-- Search Desktop -->
                <form action="{{ route('search') }}" method="GET" class="flex items-center gap-2 ml-2">
                    <div class="relative">
                        <input type="text" name="q" placeholder="Cari..." class="pl-11 pr-4 py-2.5 rounded-full text-sm focus:outline-none focus:ring-4 focus:ring-blue-300 bg-white w-48 focus:w-56 shadow-xl font-medium" required>
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <button type="submit" class="bg-white text-blue-600 px-5 py-2.5 rounded-full font-bold hover:bg-yellow-400 hover:text-blue-700 hover-scale shadow-xl glow">
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
         class="lg:hidden bg-gradient-to-b from-blue-800 to-blue-900 border-t border-white/20">
        <div class="px-4 py-5 space-y-2">
            
            <a href="/" class="glass flex items-center gap-3 text-white px-5 py-3.5 rounded-xl font-bold hover:bg-white/20 hover-lift">
                <i class="fas fa-home w-5"></i>
                <span>BERANDA</span>
            </a>
            
            <!-- Mobile Profil Dropdown -->
            <div x-data="{ dropProfil: false }">
                <button @click="dropProfil = !dropProfil" class="glass w-full flex justify-between items-center text-white px-5 py-3.5 rounded-xl font-bold hover:bg-white/20">
                    <span class="flex items-center gap-3">
                        <i class="fas fa-user-circle w-5"></i>
                        <span>PROFIL</span>
                    </span>
                    <i :class="dropProfil ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm"></i>
                </button>
                <div x-show="dropProfil" x-transition class="glass mt-2 ml-4 rounded-xl overflow-hidden">
                    <a href="/profile" class="flex items-center gap-3 px-5 py-3 text-white hover:bg-white/20 text-sm font-semibold border-b border-white/10">
                        <i class="fas fa-school"></i>
                        <span>Profil Sekolah</span>
                    </a>
                    <a href="/visi" class="flex items-center gap-3 px-5 py-3 text-white hover:bg-white/20 text-sm font-semibold border-b border-white/10">
                        <i class="fas fa-eye"></i>
                        <span>Visi</span>
                    </a>
                    <a href="/misi" class="flex items-center gap-3 px-5 py-3 text-white hover:bg-white/20 text-sm font-semibold">
                        <i class="fas fa-bullseye"></i>
                        <span>Misi</span>
                    </a>
                </div>
            </div>
            
            <a href="{{ route('pengumuman.index') }}" class="glass flex items-center gap-3 text-white px-5 py-3.5 rounded-xl font-bold hover:bg-white/20 hover-lift">
                <i class="fas fa-bullhorn w-5"></i>
                <span>PENGUMUMAN</span>
            </a>
            
            <a href="/galeri" class="glass flex items-center gap-3 text-white px-5 py-3.5 rounded-xl font-bold hover:bg-white/20 hover-lift">
                <i class="fas fa-images w-5"></i>
                <span>GALERI</span>
            </a>
            
            <a href="/guru" class="glass flex items-center gap-3 text-white px-5 py-3.5 rounded-xl font-bold hover:bg-white/20 hover-lift">
                <i class="fas fa-chalkboard-teacher w-5"></i>
                <span>GURU & STAFF</span>
            </a>
            
            <a href="/contact" class="glass flex items-center gap-3 text-white px-5 py-3.5 rounded-xl font-bold hover:bg-white/20 hover-lift">
                <i class="fas fa-envelope w-5"></i>
                <span>KONTAK</span>
            </a>
            
            <!-- Search Mobile -->
            <form action="{{ route('search') }}" method="GET" class="pt-4 border-t border-white/20">
                <div class="relative">
                    <input type="text" name="q" placeholder="Cari..." class="w-full pl-12 pr-4 py-4 rounded-full text-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300 shadow-xl font-medium" required>
                    <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <button type="submit" class="mt-3 w-full bg-white text-blue-600 py-4 rounded-full font-bold hover:bg-yellow-400 hover:text-blue-700 shadow-xl hover-lift hover-scale glow">
                    <i class="fas fa-search mr-2"></i>Cari Sekarang
                </button>
            </form>
        </div>
    </div>
</header>

<!-- ====================== KONTEN ====================== -->
<main>
    @yield('content')
</main>

<!-- ====================== FOOTER ====================== -->
<footer class="animated-gradient text-white pt-16 pb-8 mt-20 shadow-2xl">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
        
        <!-- Kolom 1: Info Sekolah -->
        <div>
            <div class="flex items-center space-x-3 mb-5">
                <div class="bg-white rounded-2xl p-3 shadow-2xl hover-scale glow">
                    <i class="fas fa-graduation-cap text-3xl text-blue-600"></i>
                </div>
                <div>
                    <h2 class="text-xl font-black tracking-tight">SMPN 38 PALEMBANG</h2>
                    <p class="text-xs text-blue-100 font-semibold">✨ Excellence in Education</p>
                </div>
            </div>
            <p class="text-sm text-blue-50 leading-relaxed mb-6 glass p-4 rounded-xl">
                Sekolah unggulan berbasis Kurikulum Merdeka yang menghasilkan generasi cerdas, berakhlak mulia, dan siap bersaing global.
            </p>
            
            <!-- Social Media -->
            <div class="flex space-x-3">
                <a href="#" target="_blank" rel="noopener" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-white hover:text-blue-600 hover-scale glow">
                    <i class="fab fa-facebook-f text-lg"></i>
                </a>
                <a href="https://www.instagram.com/smpn38_palembang?igsh=aXl3aGlseG9xdDI5" target="_blank" rel="noopener" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-white hover:text-blue-600 hover-scale glow">
                    <i class="fab fa-instagram text-lg"></i>
                </a>
                <a href="https://www.tiktok.com/@spentipanplg?is_from_webapp=1&sender_device=pc" target="_blank" rel="noopener" class="glass w-12 h-12 rounded-full flex items-center justify-center hover:bg-white hover:text-blue-600 hover-scale glow">
                    <i class="fab fa-tiktok text-lg"></i>
                </a>
            </div>
        </div>
        
        <!-- Kolom 2: Tautan Cepat -->
        <div>
            <h3 class="text-lg font-black mb-6 inline-flex items-center glass rounded-xl px-5 py-2.5 glow">
                <i class="fas fa-link mr-2"></i>TAUTAN CEPAT
            </h3>
            <ul class="space-y-3 text-sm">
                <li>
                    <a href="/" class="flex items-center hover:translate-x-2 hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Beranda
                    </a>
                </li>
                <li>
                    <a href="/profile" class="flex items-center hover:translate-x-2 hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Profil
                    </a>
                </li>
                <li>
                    <a href="/pengumuman" class="flex items-center hover:translate-x-2 hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Pengumuman
                    </a>
                </li>
                <li>
                    <a href="/galeri" class="flex items-center hover:translate-x-2 hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Galeri
                    </a>
                </li>
                <li>
                    <a href="/guru" class="flex items-center hover:translate-x-2 hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Guru & Staff
                    </a>
                </li>
                <li>
                    <a href="/contact" class="flex items-center hover:translate-x-2 hover:text-yellow-300 font-semibold group">
                        <i class="fas fa-chevron-right mr-3 text-xs group-hover:animate-pulse"></i>Kontak
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Kolom 3: Hubungi Kami -->
        <div>
            <h3 class="text-lg font-black mb-6 inline-flex items-center glass rounded-xl px-5 py-2.5 glow">
                <i class="fas fa-phone mr-2"></i>HUBUNGI KAMI
            </h3>
            <ul class="space-y-4 text-sm">
                <li class="glass rounded-2xl p-5 hover:bg-white/20 hover-lift">
                    <div class="flex items-start gap-4">
                        <div class="bg-white rounded-xl w-12 h-12 flex items-center justify-center flex-shrink-0 shadow-lg">
                            <i class="fas fa-phone-alt text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="font-bold mb-1">Telepon</p>
                            <p class="text-blue-100">0815-3282-8282</p>
                        </div>
                    </div>
                </li>
                <li class="glass rounded-2xl p-5 hover:bg-white/20 hover-lift">
                    <div class="flex items-start gap-4">
                        <div class="bg-white rounded-xl w-12 h-12 flex items-center justify-center flex-shrink-0 shadow-lg">
                            <i class="fas fa-envelope text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="font-bold mb-1">Email</p>
                            <p class="text-blue-100 break-all">smpn_38plg@yahoo.co.id</p>
                        </div>
                    </div>
                </li>
                <li class="glass rounded-2xl p-5 hover:bg-white/20 hover-lift">
                    <div class="flex items-start gap-4">
                        <div class="bg-white rounded-xl w-12 h-12 flex items-center justify-center flex-shrink-0 shadow-lg">
                            <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="font-bold mb-1">Alamat</p>
                            <p class="text-blue-100">Jl. Tanjung Sari No.1, Palembang</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <!-- Divider -->
    <div class="border-t border-white/30 pt-8">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between text-sm">
            <p class="mb-4 md:mb-0 font-bold text-blue-100">
                © 2025 SMPN 38 Palembang. All rights reserved.
            </p>
            <p class="text-center font-semibold text-blue-100">
                Dibuat <i class="fas fa-heart text-red-400 mx-1 animate-pulse-slow"></i> oleh <b class="text-white font-black">Kelompok 3 RPL</b> | @2025
            </p>
        </div>
    </div>
</footer>

</body>
</html>