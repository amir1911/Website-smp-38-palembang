@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-purple-50 via-pink-50 to-blue-50 py-12 relative overflow-hidden">
    <!-- Animated Floating Shapes -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-20 h-20 bg-purple-300 rounded-full opacity-30 animate-float"></div>
        <div class="absolute top-40 right-20 w-16 h-16 bg-pink-300 rounded-full opacity-30 animate-float-delay-1"></div>
        <div class="absolute bottom-40 left-1/4 w-24 h-24 bg-blue-300 rounded-full opacity-30 animate-float-delay-2"></div>
        <div class="absolute bottom-20 right-1/3 w-20 h-20 bg-indigo-300 rounded-full opacity-30 animate-float-delay-3"></div>
        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-cyan-300 rounded-full opacity-20 animate-pulse-slow"></div>
    </div>

    <!-- Animated Gradient Background -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000"></div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Animated Breadcrumb -->
        <nav class="mb-8 animate-slide-down">
            <div class="flex items-center gap-3 text-sm bg-white/80 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg w-fit">
                <a href="{{ route('pengumuman.index') }}" 
                   class="flex items-center gap-2 text-gray-600 hover:text-purple-600 transition-all duration-300 transform hover:scale-110">
                    <i class="fas fa-home text-purple-500 animate-bounce-slow"></i>
                    <span class="font-medium">Beranda</span>
                </a>
                <i class="fas fa-chevron-right text-gray-400 animate-pulse"></i>
                <a href="{{ route('pengumuman.index') }}" 
                   class="text-gray-600 hover:text-purple-600 transition-all duration-300 font-medium transform hover:scale-110">
                    Pengumuman
                </a>
                <i class="fas fa-chevron-right text-gray-400 animate-pulse"></i>
                <span class="text-purple-600 font-bold">Detail</span>
            </div>
        </nav>

        <!-- Animated Alert Banner -->
        <div class="mb-8 animate-slide-up">
            <div class="relative bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 rounded-3xl p-6 shadow-2xl overflow-hidden group">
                <!-- Animated Background Shine -->
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white to-transparent opacity-20 -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-in-out"></div>
                
                <!-- Animated Particles -->
                <div class="absolute top-0 left-0 w-full h-full">
                    <div class="absolute w-2 h-2 bg-white rounded-full opacity-60 animate-particle-1"></div>
                    <div class="absolute w-2 h-2 bg-white rounded-full opacity-60 animate-particle-2"></div>
                    <div class="absolute w-2 h-2 bg-white rounded-full opacity-60 animate-particle-3"></div>
                </div>

                <div class="relative flex items-center gap-4">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-xl animate-bounce-rotate">
                        <i class="fas fa-bullhorn text-purple-600 text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-white font-bold text-lg mb-1 animate-fade-in">Pengumuman Penting</h2>
                        <p class="text-white/90 text-sm animate-fade-in-delay">Harap dibaca dengan seksama dan disebarkan kepada yang bersangkutan</p>
                    </div>
                    <a href="{{ route('pengumuman.index') }}" 
                       class="hidden md:flex items-center gap-2 bg-white text-purple-600 px-6 py-3 rounded-xl font-bold hover:shadow-2xl transform hover:scale-110 transition-all duration-300 animate-pulse-slow">
                        <i class="fas fa-arrow-left animate-slide-left"></i>
                        <span>Kembali</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Animated Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-purple-200 animate-scale-in">
            <!-- Animated Header Section -->
            <div class="relative bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 p-8 md:p-12 overflow-hidden group">
                <!-- Animated Wave Background -->
                <div class="absolute inset-0 opacity-30">
                    <svg class="absolute bottom-0 left-0 w-full animate-wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="white" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                    </svg>
                </div>

                <!-- Animated Sparkles -->
                <div class="absolute top-10 right-10 text-white animate-sparkle">
                    <i class="fas fa-star text-2xl"></i>
                </div>
                <div class="absolute top-20 right-32 text-white animate-sparkle-delay-1">
                    <i class="fas fa-star text-xl"></i>
                </div>
                <div class="absolute top-32 right-20 text-white animate-sparkle-delay-2">
                    <i class="fas fa-star text-lg"></i>
                </div>

                <div class="relative z-10">
                    <!-- Animated Category Badge -->
                    <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-5 py-2 rounded-full mb-4 border-2 border-white/40 animate-fade-in-up">
                        <i class="fas fa-tag text-white animate-spin-slow"></i>
                        <span class="text-white font-bold text-sm">{{ $pengumuman->kategori?->nama_kategori ?? 'Umum' }}</span>
                    </div>

                    <!-- Animated Title -->
                    <h1 class="text-3xl md:text-5xl font-black text-white mb-6 leading-tight drop-shadow-2xl animate-fade-in-up-delay">
                        {{ $pengumuman->judul }}
                    </h1>

                    <!-- Animated Meta Information -->
                    <div class="flex flex-wrap gap-4">
                        <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-sm px-5 py-3 rounded-xl border-2 border-white/40 transform hover:scale-110 transition-all duration-300 animate-fade-in-right">
                            <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center animate-pulse">
                                <i class="fas fa-calendar-alt text-white text-lg"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-white/80 text-xs font-medium">Tanggal</p>
                                <p class="text-white font-bold text-sm">{{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                        <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-sm px-5 py-3 rounded-xl border-2 border-white/40 transform hover:scale-110 transition-all duration-300 animate-fade-in-right-delay">
                            <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center animate-pulse">
                                <i class="fas fa-clock text-white text-lg"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-white/80 text-xs font-medium">Diposting</p>
                                <p class="text-white font-bold text-sm">{{ \Carbon\Carbon::parse($pengumuman->created_at)->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Animated Image Section -->
            @if ($pengumuman->foto)
            <div class="relative group overflow-hidden animate-fade-in">
                <img 
                    src="{{ asset('storage/' . $pengumuman->foto) }}" 
                    alt="{{ $pengumuman->judul }}" 
                    class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-700"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Animated Image Label -->
                <div class="absolute top-6 left-6 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl font-bold shadow-2xl flex items-center gap-2 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500">
                    <i class="fas fa-image animate-bounce"></i>
                    <span>Gambar Lampiran</span>
                </div>

                <!-- Animated Corner Decoration -->
                <div class="absolute bottom-6 right-6 text-white opacity-0 group-hover:opacity-100 transition-all duration-500 animate-rotate">
                    <i class="fas fa-expand text-3xl"></i>
                </div>
            </div>
            @endif

            <!-- Animated Content Section -->
            <div class="p-8 md:p-12">
                <!-- Animated Content Header -->
                <div class="flex items-start gap-4 mb-8 pb-6 border-b-2 border-purple-100 animate-fade-in-up">
                    <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center shadow-lg animate-bounce-slow">
                        <i class="fas fa-align-left text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">Isi Pengumuman</h3>
                        <p class="text-gray-500 text-sm">Informasi lengkap terkait pengumuman</p>
                    </div>
                </div>

                <!-- Animated Content Body -->
                <div class="prose prose-lg max-w-none animate-fade-in">
                    <div class="text-gray-700 leading-relaxed space-y-5 bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl border-l-4 border-purple-600 shadow-inner hover:shadow-xl transition-shadow duration-300">
                        {!! nl2br(e($pengumuman->isi ?? 'Tidak ada isi pengumuman.')) !!}
                    </div>
                </div>

                <!-- Animated PDF Section -->
                @if ($pengumuman->file_pdf)
                <div class="mt-12 animate-fade-in-up">
                    <!-- Animated PDF Header -->
                    <div class="relative bg-gradient-to-r from-red-600 to-pink-600 rounded-2xl p-6 mb-6 shadow-xl overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white to-transparent opacity-20 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                        
                        <div class="relative flex items-center justify-between flex-wrap gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-white rounded-xl flex items-center justify-center shadow-lg animate-bounce-rotate">
                                    <i class="fas fa-file-pdf text-red-600 text-3xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-bold text-xl mb-1">Dokumen PDF Terlampir</h4>
                                    <p class="text-red-100 text-sm">Lihat atau unduh dokumen lengkap di bawah ini</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                               download
                               class="inline-flex items-center gap-3 bg-white text-red-600 px-8 py-4 rounded-xl font-bold hover:shadow-2xl transform hover:scale-110 transition-all duration-300 group">
                                <i class="fas fa-download text-xl group-hover:animate-bounce"></i>
                                <span>Download PDF</span>
                            </a>
                        </div>
                    </div>

                    <!-- Animated PDF Viewer -->
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-purple-300 bg-gray-50 p-3 animate-scale-in">
                        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 animate-gradient"></div>
                        <iframe 
                            src="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                            class="w-full h-[700px] rounded-xl bg-white"
                        ></iframe>
                    </div>

                    <!-- Animated PDF Actions -->
                    <div class="flex flex-wrap gap-4 mt-6">
                        <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                           target="_blank" 
                           class="flex items-center gap-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-7 py-4 rounded-xl font-bold hover:from-purple-700 hover:to-pink-700 transform hover:scale-110 hover:rotate-1 transition-all duration-300 shadow-lg animate-slide-in-left">
                            <i class="fas fa-external-link-alt"></i>
                            <span>Buka di Tab Baru</span>
                        </a>
                        <button onclick="printPDF()" 
                                class="flex items-center gap-3 bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-7 py-4 rounded-xl font-bold hover:from-blue-700 hover:to-cyan-700 transform hover:scale-110 hover:-rotate-1 transition-all duration-300 shadow-lg animate-slide-in-right">
                            <i class="fas fa-print"></i>
                            <span>Cetak Dokumen</span>
                        </button>
                    </div>
                </div>
                @endif
            </div>

            <!-- Animated Important Notice -->
            <div class="bg-gradient-to-r from-yellow-100 via-orange-100 to-red-100 border-t-4 border-orange-500 p-6 mx-8 mb-8 rounded-xl animate-fade-in-up transform hover:scale-105 transition-all duration-300">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-orange-500 flex items-center justify-center animate-pulse">
                        <i class="fas fa-exclamation-triangle text-white text-xl animate-bounce-slow"></i>
                    </div>
                    <div>
                        <h5 class="font-bold text-orange-900 mb-2 text-lg">Catatan Penting</h5>
                        <p class="text-orange-800 text-sm leading-relaxed">
                            Informasi dalam pengumuman ini bersifat resmi dan mengikat. Harap dipastikan untuk membaca dengan teliti dan mengikuti instruksi yang tertera. Jika ada pertanyaan, silakan hubungi pihak terkait.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Animated Share & Action Section -->
        <div class="mt-10 grid md:grid-cols-2 gap-6">
            <!-- Animated Share Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border-2 border-purple-200 animate-slide-in-left transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center animate-spin-slow">
                        <i class="fas fa-share-nodes text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg">Bagikan</h4>
                        <p class="text-gray-500 text-sm">Sebarkan informasi ini</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <button onclick="shareToWhatsApp()" 
                            class="flex items-center justify-center gap-2 bg-green-500 text-white px-5 py-4 rounded-xl font-bold hover:bg-green-600 transform hover:scale-110 hover:rotate-3 transition-all duration-300 shadow-md animate-fade-in">
                        <i class="fab fa-whatsapp text-xl animate-bounce-slow"></i>
                        <span class="text-sm">WhatsApp</span>
                    </button>
                    <button onclick="shareToFacebook()" 
                            class="flex items-center justify-center gap-2 bg-blue-500 text-white px-5 py-4 rounded-xl font-bold hover:bg-blue-600 transform hover:scale-110 hover:-rotate-3 transition-all duration-300 shadow-md animate-fade-in-delay">
                        <i class="fab fa-facebook-f text-xl animate-bounce-slow"></i>
                        <span class="text-sm">Facebook</span>
                    </button>
                    <button onclick="copyLink()" 
                            class="col-span-2 flex items-center justify-center gap-2 bg-gray-700 text-white px-5 py-4 rounded-xl font-bold hover:bg-gray-800 transform hover:scale-110 transition-all duration-300 shadow-md animate-fade-in-delay-2">
                        <i class="fas fa-link text-xl animate-pulse"></i>
                        <span>Salin Link</span>
                    </button>
                </div>
            </div>

            <!-- Animated Quick Actions Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border-2 border-purple-200 animate-slide-in-right transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-600 to-pink-600 flex items-center justify-center animate-pulse">
                        <i class="fas fa-bolt text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg">Aksi Cepat</h4>
                        <p class="text-gray-500 text-sm">Navigasi halaman</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                            class="w-full flex items-center justify-center gap-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-4 rounded-xl font-bold hover:from-purple-700 hover:to-pink-700 transform hover:scale-110 transition-all duration-300 shadow-lg">
                        <i class="fas fa-rocket animate-bounce"></i>
                        <span>Kembali ke Atas</span>
                    </button>
                    <a href="{{ route('pengumuman.index') }}" 
                       class="w-full flex items-center justify-center gap-3 bg-gray-200 text-gray-700 px-6 py-4 rounded-xl font-bold hover:bg-gray-300 transform hover:scale-110 transition-all duration-300 shadow-md">
                        <i class="fas fa-list animate-pulse"></i>
                        <span>Lihat Semua Pengumuman</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Animated Toast Notification -->
<div id="toast" class="fixed bottom-8 right-8 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-8 py-5 rounded-2xl shadow-2xl transform translate-y-32 transition-all duration-500 flex items-center gap-4 z-50 border-2 border-white/30">
    <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center animate-spin-slow">
        <i class="fas fa-check-circle text-2xl"></i>
    </div>
    <div>
        <p class="font-bold animate-bounce-slow">Berhasil!</p>
        <p id="toast-message" class="text-sm opacity-90">Link berhasil disalin!</p>
    </div>
</div>

<script>
function printPDF() {
    window.open('{{ asset("storage/" . $pengumuman->file_pdf) }}', '_blank');
}

function shareToWhatsApp() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent('{{ $pengumuman->judul }}');
    window.open(`https://wa.me/?text=${text}%20${url}`, '_blank');
}

function shareToFacebook() {
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
}

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        showToast('Link berhasil disalin ke clipboard!');
    });
}

function showToast(message) {
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toast-message');
    toastMessage.textContent = message;
    toast.style.transform = 'translateY(0)';
    
    setTimeout(() => {
        toast.style.transform = 'translateY(8rem)';
    }, 3000);
}

// Parallax effect on scroll
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const parallaxElements = document.querySelectorAll('.animate-float, .animate-float-delay-1, .animate-float-delay-2, .animate-float-delay-3');
    parallaxElements.forEach((el, index) => {
        const speed = 0.5 + (index * 0.1);
        el.style.transform = `translateY(${scrolled * speed}px)`;
    });
});
</script>

<style>
/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* ===== FLOATING ANIMATIONS ===== */
@keyframes float {
    0%, 100% { transform: translateY(0px) translateX(0px); }
    25% { transform: translateY(-20px) translateX(10px); }
    50% { transform: translateY(-40px) translateX(-10px); }
    75% { transform: translateY(-20px) translateX(10px); }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-float-delay-1 {
    animation: float 6s ease-in-out infinite;
    animation-delay: 1s;
}

.animate-float-delay-2 {
    animation: float 6s ease-in-out infinite;
    animation-delay: 2s;
}

.animate-float-delay-3 {
    animation: float 6s ease-in-out infinite;
    animation-delay: 3s;
}

/* ===== BLOB ANIMATION ===== */
@keyframes blob {
    0%, 100% { transform: translate(0, 0) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
}

.animate-blob {
    animation: blob 7s infinite;
}

.animation-delay-2000 {
    animation-delay: 2s;
}

.animation-delay-4000 {
    animation-delay: 4s;
}

/* ===== SLIDE ANIMATIONS ===== */
@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideLeft {
    0%, 100% { transform: translateX(0); }
    50% { transform: translateX(-5px); }
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-slide-down {
    animation: slideDown 0.8s ease-out;
}

.animate-slide-up {
    animation: slideUp 0.8s ease-out;
}

.animate-slide-left {
    animation: slideLeft 1s ease-in-out infinite;
}

.animate-slide-in-left {
    animation: slideInLeft 0.8s ease-out;
}

.animate-slide-in-right {
    animation: slideInRight 0.8s ease-out;
}

/* ===== FADE ANIMATIONS ===== */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.animate-fade-in {
    animation: fadeIn 1s ease-out;
}

.animate-fade-in-delay {
    animation: fadeIn 1s ease-out 0.2s backwards;
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out;
}

.animate-fade-in-up-delay {
    animation: fadeInUp 0.8s ease-out 0.2s backwards;
}

.animate-fade-in-right {
    animation: fadeInRight 0.8s ease-out;
}

.animate-fade-in-right-delay {
    animation: fadeInRight 0.8s ease-out 0.2s backwards;
}

.animate-fade-in-delay-2 {
    animation: fadeIn 1s ease-out 0.4s backwards;
}

/* ===== SCALE ANIMATION ===== */
@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);