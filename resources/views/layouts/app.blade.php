<!DOCTYPE html>
<html lang="id" x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 20">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAN 1 Pesisir Tengah</title>

    <!-- TailwindCSS & AlpineJS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Google Font Modern (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <style>
        /*
        ================================================
        PALET WARNA BIRU LANGIT
        ================================================
        #0077B6  → Biru Langit   (primary)
        #023E8A  → Biru Tua      (primary-dark)
        #00B4D8  → Biru Cyan     (primary-light)
        #CAF0F8  → Biru Pucat    (primary-subtle)
        #F4A261  → Oranye Aksen  (accent)
        #FFF3E8  → Krem Aksen    (accent-light)
        ================================================
        */

        :root {
            --primary:        #0077B6;  /* Biru Langit */
            --primary-dark:   #023E8A;  /* Biru Tua    */
            --primary-light:  #00B4D8;  /* Biru Cyan   */
            --primary-subtle: #CAF0F8;  /* Biru Pucat  */
            --accent:         #F4A261;  /* Oranye      */
            --accent-light:   #FFF3E8;  /* Krem        */
        }

        .bg-primary      { background-color: var(--primary); }
        .bg-primary-dark { background-color: var(--primary-dark); }
        .text-primary    { color: var(--primary); }

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
            box-shadow: 0 0 20px rgba(0, 119, 182, 0.4);
        }

        /* Navbar Scrolled Effect */
        .navbar-scrolled {
            background-color: var(--primary-dark) !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track  { background: var(--primary-subtle); }
        ::-webkit-scrollbar-thumb  { background: var(--primary); border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--primary-dark); }

        /* Touch Ripple */
        .touch-ripple {
            position: fixed;
            width: 20px;
            height: 20px;
            pointer-events: none;
            border-radius: 9999px;
            background: rgba(0, 119, 182, 0.4);
            transform: translate(-50%, -50%) scale(0);
            animation: ripple-soft 0.6s ease-out forwards;
            z-index: 999999;
        }

        @keyframes ripple-soft {
            0%   { opacity: 0.9; transform: scale(0.2); }
            100% { opacity: 0;   transform: scale(10); }
        }

        /* Animations */
        @keyframes wave {
            0%, 100% { transform: rotate(0deg); }
            25%       { transform: rotate(5deg); }
            75%       { transform: rotate(-5deg); }
        }

        @keyframes slideUp {
            0%   { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0);    opacity: 1; }
        }

        .animate-wave     { animation: wave 3s ease-in-out infinite; }
        .animate-slide-up { animation: slideUp 0.6s ease-out; }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-20px); }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(0, 119, 182, 0.3); }
            50%       { box-shadow: 0 0 40px rgba(0, 119, 182, 0.6); }
        }

        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50%       { background-position: 100% 50%; }
        }

        .animate-float      { animation: float 4s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 3s ease-in-out infinite; }

        .gradient-animated {
            background-size: 200% 200%;
            animation: gradient-shift 5s ease infinite;
        }

        /* Biru Cyan → Biru Langit → Biru Tua gradient text */
        .text-gradient {
            background: linear-gradient(135deg, #00B4D8 0%, #0077B6 50%, #023E8A 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        @keyframes float-sm {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-10px); }
        }

        .animate-float-sm { animation: float-sm 3s ease-in-out infinite; }

        :root {
            --blue-dark:  #023E8A;
            --blue-main:  #0077B6;
            --blue-light: #00B4D8;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">
    <div id="cursor-glow"></div>

  {{-- ===== SPLASH SCREEN PREMIUM ===== --}}
<div id="splash-screen" class="fixed inset-0 z-[99999] flex flex-col items-center justify-center overflow-hidden bg-[#0a0f1c] transition-opacity duration-700">
    
    {{-- Decorative Background Elements --}}
    <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] rounded-full bg-[#0077B6]/20 blur-[120px] animate-pulse-slow pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[600px] h-[600px] rounded-full bg-[#00B4D8]/20 blur-[150px] animate-pulse-slow delay-700 pointer-events-none"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjEiIGZpbGw9InJnYmEoMjU1LCAyNTUsIDI1NSwgMC4wNCkiLz48L3N2Zz4=')] opacity-50 pointer-events-none"></div>

    {{-- Main Content Container --}}
    <div class="relative z-10 flex flex-col items-center">
        {{-- Logo Container with Rings --}}
        <div class="relative flex items-center justify-center mb-8">
            {{-- Animated Rings --}}
            <div class="absolute w-32 h-32 border border-[#00B4D8]/30 rounded-full animate-[spin_4s_linear_infinite]"></div>
            <div class="absolute w-40 h-40 border border-dashed border-[#0077B6]/30 rounded-full animate-[spin_7s_linear_infinite_reverse]"></div>
            
            {{-- Logo Core --}}
            <div class="relative w-24 h-24 bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 shadow-[0_0_30px_rgba(0,180,216,0.2)] flex items-center justify-center overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
                <img src="{{ asset('storage/logo/logo sma.png') }}" alt="Logo SMAN 1 Pesisir Tengah" class="w-16 h-16 object-contain drop-shadow-2xl animate-[scaleUp_1s_ease-out_forwards]">
            </div>
        </div>

        {{-- Typography --}}
        <div class="text-center overflow-hidden">
            <h1 class="text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-white via-[#00B4D8] to-white tracking-wider mb-2 animate-[slideUp_0.8s_ease-out_0.2s_both]" style="font-family: 'Playfair Display', serif;">
                SMAN 1 Pesisir Tengah
            </h1>
            <p class="text-blue-200/60 text-xs md:text-sm tracking-[0.3em] font-light uppercase animate-[slideUp_0.8s_ease-out_0.4s_both]">
                Membangun Generasi Unggul
            </p>
        </div>

        {{-- Progress Indicator --}}
        <div class="mt-12 flex flex-col items-center animate-[fadeIn_1s_ease-out_0.8s_both]">
            <div class="w-56 h-[2px] bg-white/10 rounded-full overflow-hidden relative">
                <div id="splash-progress" class="absolute top-0 left-0 h-full w-0 bg-gradient-to-r from-[#00B4D8] to-[#023E8A] shadow-[0_0_10px_#00B4D8]"></div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span id="splash-percentage" class="text-[#00B4D8] text-[10px] md:text-xs font-mono font-medium tracking-widest">0%</span>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes pulse-slow {
    0%, 100% { opacity: 0.5; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.05); }
}
.animate-pulse-slow {
    animation: pulse-slow 6s ease-in-out infinite;
}
.delay-700 {
    animation-delay: 0.7s;
}
@keyframes scaleUp {
    from { opacity: 0; transform: scale(0.5); }
    to { opacity: 1; transform: scale(1); }
}
@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const splash = document.getElementById('splash-screen');
    const progressBar = document.getElementById('splash-progress');
    const percentageText = document.getElementById('splash-percentage');

    // Cek apakah splash screen sudah ditampilkan di sesi ini
    if (!sessionStorage.getItem('splashShown')) {
        sessionStorage.setItem('splashShown', 'true');
        document.body.style.overflow = 'hidden';

        let progress = 0;
        
        // Fungsi easing untuk animasi loading yang lebih natural (cepat di awal, melambat di akhir)
        const easeOutQuad = t => t * (2 - t);
        let startTime = null;
        const duration = 2000; // Durasi splash screen (2 detik)

        const updateProgress = (timestamp) => {
            if (!startTime) startTime = timestamp;
            const runtime = timestamp - startTime;
            let relativeProgress = runtime / duration;
            
            if (relativeProgress < 1) {
                progress = Math.min(easeOutQuad(relativeProgress) * 100, 100);
                progressBar.style.width = progress + '%';
                percentageText.innerText = Math.round(progress) + '%';
                requestAnimationFrame(updateProgress);
            } else {
                progressBar.style.width = '100%';
                percentageText.innerText = '100%';
                
                // Selesaikan animasi dan hilangkan splash screen perlahan
                setTimeout(() => {
                    splash.style.opacity = '0';
                    setTimeout(() => {
                        splash.style.display = 'none';
                        document.body.style.overflow = 'auto'; // Kembalikan scroll
                    }, 700); // Tunggu sampai transisi opacity selesai
                }, 400); // Jeda sedikit di angka 100%
            }
        };

        requestAnimationFrame(updateProgress);
    } else {
        // Jika sudah pernah muncul, sembunyikan langsung
        splash.style.display = 'none';
    }
});
</script>

    <!-- ====================== NAVBAR ====================== -->
    <header :class="scrolled ? 'navbar-scrolled' : 'bg-primary'"
        class="shadow-md sticky top-0 z-50 transition-all duration-500">
        <div class="w-full px-4 md:px-8 py-5 flex justify-between items-center">

            <!-- Logo -->
            <div class="flex items-center space-x-4 group cursor-pointer">
                <img src="{{ asset('storage/logo/logo sma.png') }}" alt="Logo SMAN 1 Pesisir Tengah"
                    class="h-12 w-12 object-contain rounded-full bg-white p-2 shadow-xl hover-lift">
                <div>
                    <h1 class="text-white text-xl font-bold tracking-tight leading-tight">
                        SMAN 1 Pesisir Tengah
                    </h1>
                    <p class="text-white/90 text-xs font-medium">Pesisir Barat, Lampung</p>
                </div>
            </div>

            <!-- Tombol Hamburger (HP) -->
            <button @click="open = !open"
                class="md:hidden text-white focus:outline-none hover:scale-110 transition-transform">
                <i :class="open ? 'fa-solid fa-xmark text-3xl' : 'fa-solid fa-bars text-3xl'"></i>
            </button>

            <!-- Menu Desktop -->
            <nav class="hidden md:flex space-x-1 items-center text-sm font-semibold">
                <a href="/"
                    class="text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow flex items-center">
                    <i class="fas fa-home mr-1.5"></i>
                    <span>BERANDA</span>
                </a>

                <div class="relative group">
                    <button class="flex items-center text-white hover:bg-white/20 px-4 py-2.5 rounded-lg hover-glow">
                        <i class="fas fa-user-circle mr-1.5"></i> Profil
                        <i class="fas fa-chevron-down ml-2 text-sm"></i>
                    </button>
                    <div
                        class="absolute left-0 mt-2 w-40 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">
                            Deskripsi Sekolah
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
                    <div
                        class="absolute left-0 mt-2 w-40 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
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
                    <div
                        class="absolute left-0 mt-2 w-44 bg-white text-gray-800 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200">
                        <a href="/contact" class="block px-4 py-2 hover:bg-gray-100 rounded-t-lg">
                            Contact
                        </a>
                    </div>
                </div>

                <!-- Search Desktop -->
                <form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center space-x-2">
                    <div class="relative">
                        <input type="text" name="q" placeholder="Cari..."
                            class="pl-11 pr-4 py-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white/50 bg-white w-44 focus:w-60 transition-all shadow-lg"
                            required>
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <button type="submit"
                        class="bg-white text-primary px-5 py-2.5 rounded-full font-bold hover:bg-[#CAF0F8] hover:text-[#023E8A] transition hover-lift shadow-lg">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </nav>
        </div>

        <!-- Menu Mobile -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            class="md:hidden bg-[#023E8A] px-6 py-6 text-white space-y-3">

            <a href="/" class="block px-4 py-3 rounded-xl font-semibold hover:bg-white/20 hover-lift">
                <i class="fas fa-home mr-3 w-5"></i> BERANDA
            </a>

            <div x-data="{ dropProfil: false }" class="space-y-2">
                <button @click="dropProfil = !dropProfil"
                    class="w-full flex justify-between items-center px-4 py-3 rounded-xl font-semibold hover:bg-white/20 transition">
                    <span><i class="fas fa-user-circle mr-3 w-5"></i> PROFIL</span>
                    <i :class="dropProfil ? 'fa-chevron-up' : 'fa-chevron-down'"
                        class="fas text-sm transition-transform"></i>
                </button>
                <div x-show="dropProfil" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4 shadow-inner">
                    <a href="/profile" class="block px-5 py-3 text-sm hover:bg-white/20 border-b border-white/10">
                        Deskripsi Sekolah
                    </a>
                    <a href="/visimisi" class="block px-5 py-3 text-sm hover:bg-white/20 border-b border-white/10">
                        Visi & Misi
                    </a>
                    <a href="/struktur" class="block px-5 py-3 text-sm hover:bg-white/20">
                        Struktur Organisasi
                    </a>
                </div>
            </div>

            <a href="{{ route('pengumuman.index') }}"
                class="block px-4 py-3 rounded-xl font-semibold hover:bg-white/20 hover-lift">
                <i class="fas fa-bullhorn mr-3 w-5"></i> PENGUMUMAN
            </a>

            <a href="/galeri" class="block px-4 py-3 rounded-xl font-semibold hover:bg-white/20 hover-lift">
                <i class="fas fa-images mr-3 w-5"></i> GALERI
            </a>

            <div x-data="{ guruOpen: false }" class="space-y-2">
                <button @click="guruOpen = !guruOpen"
                    class="w-full flex justify-between items-center px-4 py-3 rounded-xl font-semibold hover:bg-white/20 transition">
                    <span><i class="fas fa-chalkboard-teacher mr-3 w-5"></i> Tenaga Pendidik</span>
                    <i :class="guruOpen ? 'fa-chevron-up' : 'fa-chevron-down'"
                        class="fas text-sm transition-transform"></i>
                </button>
                <div x-show="guruOpen" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4 shadow-inner">
                    <a href="{{ route('guru.guru') }}"
                        class="block px-5 py-3 text-sm hover:bg-white/20 border-b border-white/10">
                        Guru
                    </a>
                    <a href="{{ route('guru.staff') }}" class="block px-5 py-3 text-sm hover:bg-white/20">
                        Staff
                    </a>
                </div>
            </div>

            <div x-data="{ infoOpen: false }" class="space-y-2">
                <button @click="infoOpen = !infoOpen"
                    class="w-full flex justify-between items-center px-4 py-3 rounded-xl font-semibold hover:bg-white/20 transition">
                    <span><i class="fas fa-envelope mr-2"></i> Informasi & Kontak</span>
                    <i :class="infoOpen ? 'fa-chevron-up' : 'fa-chevron-down'"
                        class="fas text-sm transition-transform"></i>
                </button>
                <div x-show="infoOpen" x-transition class="bg-white/10 rounded-xl overflow-hidden ml-4 shadow-inner">
                    <a href="/contact" class="block px-5 py-3 text-sm hover:bg-white/20 border-b border-white/10">
                        Contact
                    </a>
                </div>
            </div>

            <!-- SEARCH Mobile -->
            <form action="{{ route('search') }}" method="GET" class="pt-4 border-t border-white/20">
                <div class="relative">
                    <input type="text" name="q" required
                        class="w-full pl-12 pr-4 py-3.5 rounded-full text-gray-700 shadow-lg
                          focus:outline-none focus:ring-2 focus:ring-white"
                        placeholder="Cari...">
                    <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></i>
                </div>
                <button type="submit"
                    class="mt-3 w-full bg-white text-primary py-3.5 rounded-full font-bold shadow-lg hover:bg-[#CAF0F8] hover:text-[#023E8A] transition hover-lift">
                    <i class="fas fa-search mr-2"></i> Cari Sekarang
                </button>
            </form>

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
                        <h2 class="text-xl font-bold tracking-tight">SMAN 1 PESISIR TENGAH</h2>
                        <p class="text-xs text-white/80 font-medium">Excellence in Education</p>
                    </div>
                </div>
                <p class="text-sm text-white/95 leading-relaxed mb-6">
                    Sekolah unggulan di Pesisir Barat, Lampung yang menghasilkan generasi cerdas,
                    berakhlak mulia, dan siap bersaing di era global.
                </p>

                <!-- Social Media -->
                <div class="flex space-x-3">
                    <a href="#" target="_blank" rel="noopener"
                        class="bg-white/20 hover:bg-white hover:text-primary w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a href="#" target="_blank" rel="noopener"
                        class="bg-white/20 hover:bg-white hover:text-primary w-11 h-11 rounded-full flex items-center justify-center hover-lift transition-all">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="#" target="_blank" rel="noopener"
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
                        <a href="/"
                            class="flex items-center hover:translate-x-2 transition-transform hover:text-[#CAF0F8]">
                            <i class="fas fa-chevron-right mr-3 text-xs"></i>Beranda
                        </a>
                    </li>
                    <li>
                        <a href="/profile"
                            class="flex items-center hover:translate-x-2 transition-transform hover:text-[#CAF0F8]">
                            <i class="fas fa-chevron-right mr-3 text-xs"></i>Profil
                        </a>
                    </li>
                    <li>
                        <a href="/pengumuman"
                            class="flex items-center hover:translate-x-2 transition-transform hover:text-[#CAF0F8]">
                            <i class="fas fa-chevron-right mr-3 text-xs"></i>Pengumuman
                        </a>
                    </li>
                    <li>
                        <a href="/galeri"
                            class="flex items-center hover:translate-x-2 transition-transform hover:text-[#CAF0F8]">
                            <i class="fas fa-chevron-right mr-3 text-xs"></i>Galeri
                        </a>
                    </li>
                    <li>
                        <a href="/guru"
                            class="flex items-center hover:translate-x-2 transition-transform hover:text-[#CAF0F8]">
                            <i class="fas fa-chevron-right mr-3 text-xs"></i>Guru & Staff
                        </a>
                    </li>
                    <li>
                        <a href="/contact"
                            class="flex items-center hover:translate-x-2 transition-transform hover:text-[#CAF0F8]">
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
                            <p class="text-white/95">-</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4 bg-white/10 rounded-xl p-4 hover:bg-white/20 transition-all hover-lift">
                        <div class="bg-white rounded-full w-11 h-11 flex items-center justify-center flex-shrink-0 shadow-lg">
                            <i class="fas fa-envelope text-primary text-lg"></i>
                        </div>
                        <div>
                            <p class="font-semibold mb-1 text-white">Email</p>
                            <p class="text-white/95 break-all">sman1pesisirtengah@gmail.com</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-4 bg-white/10 rounded-xl p-4 hover:bg-white/20 transition-all hover-lift">
                        <div class="bg-white rounded-full w-11 h-11 flex items-center justify-center flex-shrink-0 shadow-lg">
                            <i class="fas fa-map-marker-alt text-primary text-lg"></i>
                        </div>
                        <div>
                            <p class="font-semibold mb-1 text-white">Alamat</p>
                            <p class="text-white/95">Kec. Pesisir Tengah, Kab. Pesisir Barat, Lampung</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t border-white/30 pt-8">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between text-sm">
                <p class="mb-4 md:mb-0 text-white/95 font-medium">
                    © 2025 SMAN 1 Pesisir Tengah. All rights reserved.
                </p>
                <p class="text-center text-white/95">
                    Dibuat <i class="fas fa-heart text-red-400 mx-1"></i> dengan penuh semangat untuk
                    <b class="text-white font-bold">Pesisir Barat, Lampung</b>
                </p>
            </div>
        </div>
    </footer>

</body>

<script>
    document.addEventListener("pointerdown", function(e) {
        if (e.pointerType !== "touch") return;

        const ripple = document.createElement("div");
        ripple.classList.add("touch-ripple");

        ripple.style.left = e.clientX + "px";
        ripple.style.top = e.clientY + "px";

        document.body.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
</script>

</html>