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

       #intro-logo {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 999999;
    animation: hide 2.8s ease forwards 1;
}

#intro-logo img {
    width: 180px;
    animation: spin3D 2.3s ease forwards;
}

@keyframes spin3D {
    0% { transform: rotateY(0deg) scale(0.2); opacity: 0; }
    40% { transform: rotateY(180deg) scale(1); opacity: 1; }
    70% { transform: rotateY(360deg) scale(1.1); }
    100% { transform: rotateY(360deg) scale(0.2); opacity: 0; }
}

@keyframes hide {
    0% { opacity: 1; }
    75% { opacity: 1; }
    100% { opacity: 0; display: none; }
}


/* === DESKTOP: Trail Glow Soft Blue === */
.trail-soft-blue {
    position: fixed;
    width: 9px;
    height: 9px;
    pointer-events: none;
    border-radius: 9999px;

    background: radial-gradient(circle, #93c5fd, #60a5fa, #3b82f6);
    box-shadow: 
        0 0 10px #93c5fd,
        0 0 18px #60a5fa,
        0 0 30px #3b82f6;

    transform: translate(-50%, -50%);
    opacity: 0.9;
    z-index: 99999;

    animation: soft-blue-fade 0.7s ease-out forwards;
}

@keyframes soft-blue-fade {
    0% { opacity: 0.9; transform: scale(1); filter: blur(0px); }
    100% { opacity: 0; transform: scale(0.25); filter: blur(6px); }
}

/* === MOBILE: Touch Ripple Soft Blue === */
.touch-ripple {
    position: fixed;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    pointer-events: none;

    background: rgba(96, 165, 250, 0.5); /* biru lembut */
    transform: translate(-50%, -50%) scale(0);

    animation: ripple-soft 0.6s ease-out forwards;
    z-index: 99999;
}

@keyframes ripple-soft {
    0% { opacity: 0.8; transform: scale(0.1); }
    100% { opacity: 0; transform: scale(12); }
}





    </style>
</head>
<div id="ripple"></div>


<body class="bg-gray-50 text-gray-800">
<!-- INTRO LOGO -->
<div id="intro-logo" style="display:none;">
    <img src="/storage/logo/logosmp.png" alt="Logo" />
</div>

<!-- ====================== NAVBAR ====================== -->
<header :class="scrolled ? 'navbar-scrolled' : 'bg-primary'" class="shadow-md sticky top-0 z-50 transition-all duration-500">
    <div class="w-full px-4 md:px-8 py-5 flex justify-between items-center">
        
        <!-- Logo -->
        <div class="flex items-center space-x-4 group cursor-pointer">
            <img src="{{ asset('storage/logo/logosmp.png') }}" alt="Logo SMPN 38 Palembang" class="h-12 w-12 object-contain rounded-full bg-white p-2 shadow-xl hover-lift">
            <div>
                <h1 class="text-white text-xl font-bold tracking-tight leading-tight">
                    SMPN 38 Palembang
                </h1>
                <p class="text-white/90 text-xs font-medium">Sekolah Unggulan</p>
            </div>
        </div>
        
        <!-- Tombol Hamburger (HP) -->
        <button @click="open = !open" class="md:hidden text-white focus:outline-none hover:scale-110 transition-transform">
            <i :class="open ? 'fa-solid fa-xmark text-3xl' : 'fa-solid fa-bars text-3xl'"></i>
        </button>
        
        <!-- Menu Desktop -->
        <nav class="hidden md:flex space-x-1 items-center text-sm font-semibold">
           <a href="/" class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center">
                <i class="fas fa-home mr-1.5"></i>
                <span>BERANDA</span>
            </a>

            
            <div class="relative group">
                <!-- Tombol utama -->
                <button class="flex items-center text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow">
                    <i class="fas fa-user-circle mr-1.5"></i> Profil
                    <i class="fas fa-chevron-down ml-2 text-sm"></i>
                </button>
                <!-- Dropdown -->
                <div class="absolute left-0 mt-2 w-40 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
                    <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">
                        Profil Sekolah
                    </a>
                    <a href="{{ route('visimisi') }}" class="block px-4 py-2 hover:bg-gray-100">
                        Visi & Misi
                    </a>
                    <a href="{{ route('struktur') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">
                        Struktur Organisasi
                    </a>
                </div>
            </div>
            
           <a href="{{ route('pengumuman.index') }}" 
            class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg flex items-center space-x-2 hover-glow">
                <i class="fas fa-bullhorn"></i>
                <span>PENGUMUMAN</span>
            </a>

            
            <a href="/galeri" 
                class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center">
                    <i class="fas fa-images mr-1.5"></i>
                    <span>GALERI</span>
            </a>

            
            <div class="relative group">
            <button class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center">
                <i class="fas fa-chalkboard-teacher mr-1.5"></i>
                <span>Tenaga Pendidik</span>
                <i class="fas fa-chevron-down ml-2 text-sm"></i>
            </button>

            <div class="absolute left-0 mt-2 w-40 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
                <a href="{{ route('guru.guru') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">
                    Guru
                </a>
                <a href="{{ route('guru.staff') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">
                    Staff
                </a>
            </div>
        </div>

            
            <div class="relative group">
                <button class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center">
                    <i class="fas fa-envelope mr-1.5"></i> Informasi & Kontak
                    <i class="fas fa-chevron-down ml-2 text-sm"></i>
                </button>
                <!-- Dropdown menu -->
                <div class="absolute left-0 mt-2 w-44 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
                    <a href="/contact" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">
                        Contact
                    </a>
                    <a href="/buku-tamu" class="block px-4 py-2 hover:bg-gray-100 rounded-b-lg">
                        Buku Tamu
                    </a>
                </div>
            </div>
            
            <!-- Search Desktop -->
            <form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center space-x-2">
                <div class="relative">
                    <input type="text" name="q" placeholder="Cari..." class="pl-11 pr-4 py-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white/50 bg-white w-44 focus:w-60 transition-all shadow-lg" required>
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <button type="submit" class="bg-white text-primary px-5 py-2.5 rounded-full font-bold hover:bg-yellow-300 hover:text-primary-dark transition hover-lift shadow-lg">
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
         class="md:hidden bg-primary-dark px-6 py-6 text-white space-y-3">
        
        <a href="/" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift">
            <i class="fas fa-home mr-3 w-5"></i>BERANDA
        </a>
        
        <!-- PROFIL (Dropdown seragam desktop & mobile) -->
        <div x-data="{ dropProfil: false }" class="space-y-2">
            <button @click="dropProfil = !dropProfil" class="w-full flex justify-between items-center font-semibold hover:bg-white/20 px-4 py-3 rounded-xl transition">
                <span><i class="fas fa-user-circle mr-3 w-5"></i>PROFIL</span>
                <i :class="dropProfil ? 'fa-chevron-up' : 'fa-chevron-down'" class="fas text-sm transition-transform"></i>
            </button>
            <!-- Dropdown isi -->
            <div x-show="dropProfil" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4 shadow-inner">
                <a href="/profile" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10 transition">
                    <i class="fas fa-school mr-2"></i>Profil Sekolah
                </a>
                <a href="/visi" class="block px-5 py-3 hover:bg-white/20 text-sm border-b border-white/10 transition">
                    <i class="fas fa-eye mr-2"></i>Visi
                </a>
                <a href="/misi" class="block px-5 py-3 hover:bg-white/20 text-sm transition">
                    <i class="fas fa-bullseye mr-2"></i>Misi
                </a>
            </div>
        </div>
        
        <!-- Dropdown Pengumuman (Mobile) -->
        <a href="{{ route('pengumuman.index') }}" 
        class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift">
            <i class="fas fa-bullhorn mr-3 w-5"></i>PENGUMUMAN
        </a>

        
        <a href="/galeri" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift">
            <i class="fas fa-images mr-3 w-5"></i>GALERI
        </a>
        
        <a href="/guru" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift">
            <i class="fas fa-chalkboard-teacher mr-3 w-5"></i>GURU & STAFF
        </a>
        
        <a href="/contact" class="block hover:bg-white/20 px-4 py-3 rounded-xl font-semibold hover-lift">
            <i class="fas fa-envelope mr-3 w-5"></i>KONTAK
        </a>
        
        <!-- Search Mobile -->
        <form action="{{ route('search') }}" method="GET" class="pt-4 border-t border-blue-200">
            <div class="relative">
                <input type="text" name="q" placeholder="Cari..." class="w-full pl-12 pr-4 py-3.5 rounded-full text-gray-700 focus:outline-none focus:ring-2 focus:ring-white shadow-lg" required>
                <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg"></i>
            </div>
            <button type="submit" class="mt-3 w-full bg-white text-primary py-3.5 rounded-full font-bold hover:bg-yellow-300 hover:text-primary-dark transition shadow-lg hover-lift">
                <i class="fas fa-search mr-2"></i>Cari Sekarang
            </button>
        </form>
    </div>
</header>


  {{-- <!-- INTRO LOGO -->
    <div id="intro-logo" style="display:none;">
        <img src="/storage/logo/logosmp.png" alt="Logo" />
    </div> --}}
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


<script>

/* ========== DESKTOP CURSOR TRAIL ========== */
if (window.innerWidth > 768) {
    document.addEventListener("mousemove", function (e) {
        const dot = document.createElement("div");
        dot.classList.add("trail-soft-blue");

        dot.style.left = e.clientX + "px";
        dot.style.top = e.clientY + "px";

        document.body.appendChild(dot);

        setTimeout(() => {
            dot.remove();
        }, 700);
    });
}

/* ========== MOBILE TOUCH RIPPLE ========== */
if (window.innerWidth <= 768) {
    document.addEventListener("touchstart", function (e) {
        const t = e.touches[0];

        const ripple = document.createElement("div");
        ripple.classList.add("touch-ripple");

        ripple.style.left = t.clientX + "px";
        ripple.style.top = t.clientY + "px";

        document.body.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 700);
    });
}

</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    if (!localStorage.getItem("introShown")) {

        // Tampilkan intro
        document.getElementById("intro-logo").style.display = "flex";

        // Simpan status agar tidak tampil lagi
        setTimeout(() => {
            localStorage.setItem("introShown", "true");
        }, 2800);
    }

});
</script>
</body>



</html>