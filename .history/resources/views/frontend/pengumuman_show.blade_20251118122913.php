@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-br from-sky-50 via-blue-50 to-cyan-50 py-20 relative">

    <!-- Decorative Background Elements -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-sky-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-cyan-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-0 left-1/2 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Back Button -->
        <div class="mb-8" data-aos="fade-down">
            <a href="{{ route('pengumuman.index') }}" 
               class="inline-flex items-center gap-3 bg-white/90 backdrop-blur-sm text-gray-700 px-6 py-3.5 rounded-2xl font-semibold hover:bg-white hover:shadow-xl transform hover:-translate-x-2 transition-all duration-300 shadow-lg border border-gray-100 group">
               <div class="w-8 h-8 rounded-full bg-gradient-to-br from-sky-400 to-cyan-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                   <i class="fas fa-arrow-left text-white text-sm"></i>
               </div>
               <span class="font-bold">Kembali ke Beranda</span>
            </a>
        </div>

        <!-- Header Card -->
        <div class="bg-gradient-to-br from-sky-400 via-blue-500 to-cyan-500 rounded-3xl shadow-2xl overflow-hidden mb-10 transform hover:scale-[1.01] transition-all duration-500" data-aos="fade-up">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative p-8 md:p-12">
                <!-- Decorative Pattern -->
                <div class="absolute top-0 right-0 w-64 h-64 opacity-10">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#FFFFFF" d="M45.3,-59.6C57.5,-50.9,65.5,-36.4,69.8,-21.2C74.1,-6,74.7,9.9,69.2,23.8C63.7,37.7,52.1,49.6,38.4,57.4C24.7,65.2,9,68.9,-6.8,68.3C-22.6,67.7,-38.5,62.8,-50.7,53.4C-62.9,44,-71.4,30.1,-74.3,15C-77.2,-0.1,-74.5,-16.4,-67.3,-30.4C-60.1,-44.4,-48.4,-56.1,-35.1,-64.4C-21.8,-72.7,-6.8,-77.6,7.5,-77.1C21.8,-76.6,33.1,-68.3,45.3,-59.6Z" transform="translate(100 100)" />
                    </svg>
                </div>

                <!-- Breadcrumb -->
                <div class="flex items-center text-white/90 text-sm mb-6 gap-2 font-medium" data-aos="fade-right" data-aos-delay="100">
                    <i class="fas fa-home"></i>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span>Pengumuman</span>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <span class="text-white font-bold">Detail</span>
                </div>

                <!-- Title -->
                <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-8 leading-tight drop-shadow-2xl" data-aos="fade-up" data-aos-delay="200">
                    {{ $pengumuman->judul }}
                </h1>

                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-4 text-white" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center gap-3 bg-white/20 backdrop-blur-md px-5 py-3 rounded-2xl shadow-lg hover:bg-white/30 transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-folder-open text-lg"></i>
                        </div>
                        <span class="font-semibold">{{ $pengumuman->kategori?->nama_kategori ?? 'Umum' }}</span>
                    </div>
                    <div class="flex items-center gap-3 bg-white/20 backdrop-blur-md px-5 py-3 rounded-2xl shadow-lg hover:bg-white/30 transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-calendar-check text-lg"></i>
                        </div>
                        <span class="font-semibold">{{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="flex items-center gap-3 bg-white/20 backdrop-blur-md px-5 py-3 rounded-2xl shadow-lg hover:bg-white/30 transition-all group">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                            <i class="fas fa-clock text-lg"></i>
                        </div>
                        <span class="font-semibold">{{ \Carbon\Carbon::parse($pengumuman->created_at)->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl overflow-hidden border border-gray-100" data-aos="fade-up" data-aos-delay="100">
            <!-- Image Section -->
            @if ($pengumuman->foto)
            <div class="relative group overflow-hidden">
                <img 
                    src="{{ asset('storage/' . $pengumuman->foto) }}" 
                    alt="{{ $pengumuman->judul }}" 
                    class="w-full h-[500px] object-cover transform group-hover:scale-110 transition-transform duration-700"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Image Overlay Info -->
                <div class="absolute bottom-6 left-6 right-6 text-white transform translate-y-8 group-hover:translate-y-0 transition-transform duration-500 opacity-0 group-hover:opacity-100">
                    <div class="flex items-center gap-3 bg-white/20 backdrop-blur-md px-5 py-3 rounded-2xl w-fit">
                        <i class="fas fa-image text-lg"></i>
                        <span class="font-semibold">Gambar Pengumuman</span>
                    </div>
                </div>
            </div>
            @endif

            <!-- Content Section -->
            <div class="p-8 md:p-12">
                <!-- Content Header -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sky-400 to-cyan-500 flex items-center justify-center shadow-lg">
                        <i class="fas fa-file-alt text-white text-xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Isi Pengumuman</h2>
                </div>

                <!-- Content Body -->
                <div class="prose prose-lg max-w-none">
                    <div class="text-gray-700 leading-relaxed space-y-5 text-justify">
                        {!! nl2br(e($pengumuman->isi ?? 'Tidak ada isi pengumuman.')) !!}
                    </div>
                </div>

                <!-- PDF Section -->
                @if ($pengumuman->file_pdf)
                <div class="mt-12 pt-10 border-t-2 border-gradient-to-r from-sky-200 via-blue-200 to-cyan-200" data-aos="fade-up">
                    <!-- PDF Header -->
                    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-red-500 to-pink-600 flex items-center justify-center shadow-lg">
                                <i class="fas fa-file-pdf text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-800">Dokumen Lampiran</h3>
                                <p class="text-gray-500 text-sm">File PDF tersedia untuk diunduh</p>
                            </div>
                        </div>
                        <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                           download
                           class="inline-flex items-center gap-3 bg-gradient-to-br from-sky-500 to-cyan-500 text-white px-8 py-4 rounded-2xl font-bold hover:from-sky-600 hover:to-cyan-600 transform hover:scale-105 hover:shadow-2xl transition-all duration-300 shadow-xl group">
                           <i class="fas fa-download text-xl group-hover:animate-bounce"></i>
                           <span>Download PDF</span>
                        </a>
                    </div>

                    <!-- PDF Viewer -->
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-gradient-to-br from-sky-200 via-blue-200 to-cyan-200 bg-gradient-to-br from-sky-50 to-blue-50 p-2">
                        <iframe 
                            src="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                            class="w-full h-[700px] rounded-xl"
                        ></iframe>
                    </div>

                    <!-- PDF Actions -->
                    <div class="flex flex-wrap gap-4 mt-6">
                        <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                           target="_blank" 
                           class="flex items-center gap-3 bg-gradient-to-r from-sky-500 to-blue-500 text-white px-6 py-3.5 rounded-xl font-semibold hover:from-sky-600 hover:to-blue-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl group">
                           <i class="fas fa-external-link-alt group-hover:rotate-12 transition-transform"></i>
                           <span>Buka di Tab Baru</span>
                        </a>
                        <button onclick="printPDF()" 
                                class="flex items-center gap-3 bg-gradient-to-r from-cyan-500 to-teal-500 text-white px-6 py-3.5 rounded-xl font-semibold hover:from-cyan-600 hover:to-teal-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl group">
                           <i class="fas fa-print group-hover:scale-110 transition-transform"></i>
                           <span>Cetak Dokumen</span>
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Share Section -->
        <div class="bg-white/95 backdrop-blur-sm rounded-3xl shadow-2xl p-8 md:p-10 mt-10 border border-gray-100" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-sky-500 to-cyan-600 flex items-center justify-center shadow-lg">
                    <i class="fas fa-share-nodes text-white text-2xl"></i>
                </div>
                <div>
                    <h4 class="text-2xl font-bold text-gray-800">Bagikan Pengumuman</h4>
                    <p class="text-gray-500 text-sm">Sebarkan informasi ini ke media sosial</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-4">
                <button onclick="shareToWhatsApp()" 
                        class="flex items-center gap-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-8 py-4 rounded-2xl font-bold hover:from-green-600 hover:to-emerald-700 transform hover:scale-105 hover:shadow-xl transition-all duration-300 shadow-lg group">
                    <i class="fab fa-whatsapp text-2xl group-hover:rotate-12 transition-transform"></i>
                    <span>WhatsApp</span>
                </button>
                <button onclick="shareToFacebook()" 
                        class="flex items-center gap-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-4 rounded-2xl font-bold hover:from-blue-600 hover:to-blue-700 transform hover:scale-105 hover:shadow-xl transition-all duration-300 shadow-lg group">
                    <i class="fab fa-facebook-f text-2xl group-hover:scale-110 transition-transform"></i>
                    <span>Facebook</span>
                </button>
                <button onclick="copyLink()" 
                        class="flex items-center gap-3 bg-gradient-to-r from-cyan-500 to-teal-500 text-white px-8 py-4 rounded-2xl font-bold hover:from-cyan-600 hover:to-teal-600 transform hover:scale-105 hover:shadow-xl transition-all duration-300 shadow-lg group">
                    <i class="fas fa-link text-2xl group-hover:rotate-45 transition-transform"></i>
                    <span>Salin Link</span>
                </button>
            </div>
        </div>

        <!-- Back to Top Button -->
        <div class="mt-10 text-center" data-aos="fade-up" data-aos-delay="300">
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                    class="inline-flex items-center gap-3 bg-gradient-to-br from-sky-500 to-cyan-500 text-white px-10 py-5 rounded-2xl font-bold hover:from-sky-600 hover:to-cyan-600 transform hover:scale-105 hover:shadow-2xl transition-all duration-300 shadow-xl group">
               <i class="fas fa-rocket text-xl group-hover:-translate-y-2 transition-transform"></i>
               <span>Kembali ke Atas</span>
            </button>
        </div>
    </div>
</section>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-8 right-8 bg-gradient-to-r from-sky-500 to-cyan-500 text-white px-8 py-5 rounded-2xl shadow-2xl transform translate-y-32 transition-all duration-500 flex items-center gap-4 z-50 border-2 border-white/20">
    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
        <i class="fas fa-check-circle text-2xl"></i>
    </div>
    <div>
        <p class="font-bold text-sm">Berhasil!</p>
        <p id="toast-message" class="text-sm opacity-90">Link berhasil disalin!</p>
    </div>
</div>

<!-- AOS Animation -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
// Initialize AOS
AOS.init({
    duration: 800,
    easing: 'ease-out-cubic',
    once: true,
    offset: 100
});

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

// Parallax Effect
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const parallax = document.querySelector('.bg-gradient-to-br');
    if (parallax) {
        parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});
</script>

<style>
/* Custom Animations */
@keyframes blob {
    0%, 100% {
        transform: translate(0, 0) scale(1);
    }
    33% {
        transform: translate(30px, -50px) scale(1.1);
    }
    66% {
        transform: translate(-20px, 20px) scale(0.9);
    }
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

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 12px;
}

::-webkit-scrollbar-track {
    background: linear-gradient(180deg, #F0F9FF 0%, #E0F2FE 100%);
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, #0EA5E9 0%, #06B6D4 100%);
    border-radius: 6px;
    border: 2px solid #F0F9FF;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(180deg, #0284C7 0%, #0891B2 100%);
}

/* Gradient Border Effect */
.border-gradient-to-br {
    border-image: linear-gradient(to bottom right, #7DD3FC, #67E8F9, #5EEAD4) 1;
}

/* Hover Glow Effect */
.hover\:shadow-2xl:hover {
    box-shadow: 0 25px 50px -12px rgba(14, 165, 233, 0.25);
}

/* Text Gradient */
.text-gradient {
    background: linear-gradient(135deg, #0EA5E9 0%, #06B6D4 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Loading Animation for Images */
img {
    opacity: 0;
    animation: fadeIn 0.8s ease-in forwards;
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

/* Prose Improvements */
.prose {
    font-size: 1.125rem;
    line-height: 1.875;
}

.prose p {
    margin-bottom: 1.5rem;
}

/* Backdrop Blur Support */
@supports (backdrop-filter: blur(10px)) {
    .backdrop-blur-sm {
        backdrop-filter: blur(10px);
    }
    .backdrop-blur-md {
        backdrop-filter: blur(12px);
    }
}

/* Print Styles */
@media print {
    .no-print {
        display: none !important;
    }
}
</style>
@endsection