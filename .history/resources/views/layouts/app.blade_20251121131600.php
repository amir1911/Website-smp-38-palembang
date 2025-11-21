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
            --primary: #2A5082;
            --primary-dark: #203B63;
        }

        body { font-family: 'Inter', sans-serif; }
        .bg-primary { background-color: var(--primary); }
        .bg-primary-dark { background-color: var(--primary-dark); }

        .navbar-scrolled {
            background-color: var(--primary-dark) !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .touch-ripple {
            position: fixed;
            width: 20px;
            height: 20px;
            pointer-events: none;
            border-radius: 9999px;
            background: rgba(41, 37, 204, 0.45);
            transform: translate(-50%, -50%) scale(0);
            animation: ripple-soft 0.6s ease-out forwards;
            z-index: 999999;
        }

        @keyframes ripple-soft {
            0% { opacity: 0.9; transform: scale(0.2); }
            100% { opacity: 0; transform: scale(10); }
        }
    </style>
</head>

<body class="text-gray-800 @yield('bodyClass')">
<div id="cursor-glow"></div>

<!-- ====================== NAVBAR ====================== -->
<header :class="scrolled ? 'navbar-scrolled' : 'bg-primary'" 
        class="shadow-md sticky top-0 z-50 transition-all duration-500">

    <div class="w-full px-4 md:px-8 py-5 flex justify-between items-center">

        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('storage/logo/logosmp.png') }}" 
                 class="h-12 w-12 object-contain rounded-full bg-white p-2 shadow-xl">
            <div>
                <h1 class="text-white text-xl font-bold">SMPN 38 Palembang</h1>
                <p class="text-white/90 text-xs">Sekolah Unggulan</p>
            </div>
        </div>

        <!-- Tombol Mobile -->
        <button @click="open = !open" class="md:hidden text-white">
            <i :class="open ? 'fa-solid fa-xmark text-3xl' : 'fa-solid fa-bars text-3xl'"></i>
        </button>

        <!-- MENU DESKTOP -->
        <nav class="hidden md:flex space-x-2 items-center font-semibold text-white">

            <a href="/" class="hover:bg-white/20 px-4 py-2 rounded-lg transition">
                <i class="fas fa-home mr-1"></i> BERANDA
            </a>

            <div class="relative group">
                <button class="hover:bg-white/20 px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-user-circle mr-1"></i> Profil
                    <i class="fas fa-chevron-down ml-2 text-sm"></i>
                </button>

                <div class="absolute left-0 mt-2 w-40 bg-white text-gray-800 rounded-lg shadow-lg
                            opacity-0 invisible group-hover:opacity-100 group-hover:visible transition">
                    <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">Profil Sekolah</a>
                    <a href="{{ route('visimisi') }}" class="block px-4 py-2 hover:bg-gray-100">Visi & Misi</a>
                    <a href="{{ route('struktur') }}" class="block px-4 py-2 hover:bg-gray-100">Struktur Organisasi</a>
                </div>
            </div>

            <a href="{{ route('pengumuman.index') }}" class="hover:bg-white/20 px-4 py-2 rounded-lg transition">
                <i class="fas fa-bullhorn mr-1"></i> PENGUMUMAN
            </a>

            <a href="/galeri" class="hover:bg-white/20 px-4 py-2 rounded-lg transition">
                <i class="fas fa-images mr-1"></i> GALERI
            </a>

            <a href="/guru" class="hover:bg-white/20 px-4 py-2 rounded-lg transition">
                <i class="fas fa-chalkboard-teacher mr-1"></i> Guru & Staff
            </a>

            <a href="/contact" class="hover:bg-white/20 px-4 py-2 rounded-lg transition">
                <i class="fas fa-envelope mr-1"></i> Kontak
            </a>
        </nav>
    </div>
</header>

<!-- ====================== MAIN CONTENT ====================== -->
<main class="@yield('mainBg') min-h-screen">
    @yield('content')
</main>

<!-- ====================== FOOTER ====================== -->
<footer class="bg-primary text-white pt-16 pb-8 mt-20">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-12">

        <div>
            <h2 class="text-xl font-bold mb-4">SMPN 38 Palembang</h2>
            <p class="text-white/90">Sekolah unggulan berbasis Kurikulum Merdeka.</p>
        </div>

        <div>
            <h3 class="font-bold mb-4">Tautan Cepat</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="/" class="hover:text-yellow-300">Beranda</a></li>
                <li><a href="/profile" class="hover:text-yellow-300">Profil</a></li>
                <li><a href="/pengumuman" class="hover:text-yellow-300">Pengumuman</a></li>
            </ul>
        </div>

        <div>
            <h3 class="font-bold mb-4">Kontak</h3>
            <p>Jl. Tanjung Sari No.1, Palembang</p>
            <p>Email: smpn_38plg@yahoo.co.id</p>
        </div>

    </div>

    <div class="border-t border-white/30 mt-8 pt-6 text-center text-sm">
        © 2025 SMPN 38 Palembang — Kelompok 3 RPL
    </div>
</footer>


<script>
document.addEventListener("pointerdown", function(e) {
    if (e.pointerType !== "touch") return;
    const ripple = document.createElement("div");
    ripple.classList.add("touch-ripple");
    ripple.style.left = e.clientX + "px";
    ripple.style.top = e.clientY + "px";
    document.body.appendChild(ripple);
    setTimeout(() => ripple.remove(), 600);
});
</script>

</body>
</html>
