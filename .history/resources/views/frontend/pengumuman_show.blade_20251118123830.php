@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-cyan-50 py-12 relative overflow-hidden">
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 2px 2px, #0ea5e9 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    
    <!-- Decorative Elements -->
    <div class="absolute top-20 right-20 w-72 h-72 bg-sky-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-20 left-20 w-72 h-72 bg-cyan-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse" style="animation-delay: 1s;"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb Navigation -->
        <nav class="mb-8" data-aos="fade-down">
            <div class="flex items-center gap-3 text-sm">
                <a href="{{ route('pengumuman.index') }}" 
                   class="flex items-center gap-2 text-gray-600 hover:text-sky-600 transition-colors font-medium">
                    <i class="fas fa-home text-sky-500"></i>
                    <span>Beranda</span>
                </a>
                <i class="fas fa-angle-right text-gray-400"></i>
                <a href="{{ route('pengumuman.index') }}" 
                   class="text-gray-600 hover:text-sky-600 transition-colors font-medium">
                    Pengumuman
                </a>
                <i class="fas fa-angle-right text-gray-400"></i>
                <span class="text-sky-600 font-bold">Detail</span>
            </div>
        </nav>

        <!-- Alert Banner -->
        <div class="mb-8" data-aos="fade-up">
            <div class="bg-gradient-to-r from-sky-500 to-cyan-500 rounded-2xl p-6 shadow-xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-white opacity-10 rounded-full -mr-20 -mt-20"></div>
                <div class="absolute bottom-0 left-0 w-32 h-32 bg-white opacity-10 rounded-full -ml-16 -mb-16"></div>
                <div class="relative flex items-center gap-4">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg animate-bounce">
                        <i class="fas fa-bullhorn text-sky-500 text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h2 class="text-white font-bold text-lg mb-1">Pengumuman Penting</h2>
                        <p class="text-sky-100 text-sm">Harap dibaca dengan seksama dan disebarkan kepada yang bersangkutan</p>
                    </div>
                    <a href="{{ route('pengumuman.index') }}" 
                       class="hidden md:flex items-center gap-2 bg-white text-sky-600 px-6 py-3 rounded-xl font-bold hover:shadow-xl transform hover:scale-105 transition-all">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-sky-200" data-aos="fade-up" data-aos-delay="100">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-sky-500 via-blue-500 to-cyan-500 p-8 md:p-12 relative overflow-hidden">
                <!-- Decorative Waves -->
                <div class="absolute bottom-0 left-0 right-0">
                    <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-16">
                        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="white"></path>
                        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="white"></path>
                        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="white"></path>
                    </svg>
                </div>

                <div class="relative z-10">
                    <!-- Category Badge -->
                    <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full mb-4 border border-white/30">
                        <i class="fas fa-tag text-white"></i>
                        <span class="text-white font-bold text-sm">{{ $pengumuman->kategori?->nama_kategori ?? 'Umum' }}</span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl md:text-5xl font-black text-white mb-6 leading-tight drop-shadow-2xl">
                        {{ $pengumuman->judul }}
                    </h1>

                    <!-- Meta Information -->
                    <div class="flex flex-wrap gap-4">
                        <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-sm px-5 py-3 rounded-xl border border-white/30">
                            <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-white text-lg"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-white/80 text-xs font-medium">Tanggal</p>
                                <p class="text-white font-bold text-sm">{{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                        <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-sm px-5 py-3 rounded-xl border border-white/30">
                            <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center">
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

            <!-- Image Section -->
            @if ($pengumuman->foto)
            <div class="relative group">
                <img 
                    src="{{ asset('storage/' . $pengumuman->foto) }}" 
                    alt="{{ $pengumuman->judul }}" 
                    class="w-full h-[500px] object-cover"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <!-- Image Label -->
                <div class="absolute top-6 left-6 bg-sky-500 text-white px-4 py-2 rounded-lg font-bold shadow-xl flex items-center gap-2">
                    <i class="fas fa-image"></i>
                    <span>Gambar Lampiran</span>
                </div>
            </div>
            @endif

            <!-- Content Section -->
            <div class="p-8 md:p-12">
                <!-- Content Header -->
                <div class="flex items-start gap-4 mb-8 pb-6 border-b-2 border-sky-100">
                    <div class="flex-shrink-0 w-14 h-14 rounded-xl bg-gradient-to-br from-sky-500 to-cyan-500 flex items-center justify-center shadow-lg">
                        <i class="fas fa-align-left text-white text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-1">Isi Pengumuman</h3>
                        <p class="text-gray-500 text-sm">Informasi lengkap terkait pengumuman</p>
                    </div>
                </div>

                <!-- Content Body with Enhanced Typography -->
                <div class="prose prose-lg max-w-none">
                    <div class="text-gray-700 leading-relaxed space-y-5 bg-gradient-to-br from-sky-50 to-cyan-50 p-8 rounded-2xl border-l-4 border-sky-500 shadow-inner">
                        {!! nl2br(e($pengumuman->isi ?? 'Tidak ada isi pengumuman.')) !!}
                    </div>
                </div>

                <!-- PDF Document Section -->
                @if ($pengumuman->file_pdf)
                <div class="mt-12">
                    <!-- PDF Header -->
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl p-6 mb-6 shadow-xl">
                        <div class="flex items-center justify-between flex-wrap gap-4">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-white rounded-xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-file-pdf text-blue-600 text-3xl"></i>
                                </div>
                                <div>
                                    <h4 class="text-white font-bold text-xl mb-1">Dokumen PDF Terlampir</h4>
                                    <p class="text-blue-100 text-sm">Lihat atau unduh dokumen lengkap di bawah ini</p>
                                </div>
                            </div>
                            <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                               download
                               class="inline-flex items-center gap-3 bg-white text-blue-600 px-8 py-4 rounded-xl font-bold hover:shadow-2xl transform hover:scale-105 transition-all group">
                                <i class="fas fa-download text-xl group-hover:animate-bounce"></i>
                                <span>Download PDF</span>
                            </a>
                        </div>
                    </div>

                    <!-- PDF Viewer with Border -->
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-sky-300 bg-gray-50 p-3">
                        <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-sky-500 via-blue-500 to-cyan-500"></div>
                        <iframe 
                            src="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                            class="w-full h-[700px] rounded-xl bg-white"
                        ></iframe>
                    </div>

                    <!-- PDF Actions -->
                    <div class="flex flex-wrap gap-4 mt-6">
                        <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                           target="_blank" 
                           class="flex items-center gap-3 bg-gradient-to-r from-sky-500 to-cyan-500 text-white px-7 py-4 rounded-xl font-bold hover:from-sky-600 hover:to-cyan-600 transform hover:scale-105 transition-all shadow-lg group">
                            <i class="fas fa-external-link-alt group-hover:rotate-12 transition-transform"></i>
                            <span>Buka di Tab Baru</span>
                        </a>
                        <button onclick="printPDF()" 
                                class="flex items-center gap-3 bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-7 py-4 rounded-xl font-bold hover:from-blue-600 hover:to-indigo-600 transform hover:scale-105 transition-all shadow-lg group">
                            <i class="fas fa-print group-hover:scale-110 transition-transform"></i>
                            <span>Cetak Dokumen</span>
                        </button>
                    </div>
                </div>
                @endif
            </div>

            <!-- Important Notice -->
            <div class="bg-gradient-to-r from-blue-100 via-sky-100 to-cyan-100 border-t-4 border-sky-400 p-6 mx-8 mb-8 rounded-xl">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-sky-500 flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                    </div>
                    <div>
                        <h5 class="font-bold text-sky-900 mb-2 text-lg">Catatan Penting</h5>
                        <p class="text-sky-800 text-sm leading-relaxed">
                            Informasi dalam pengumuman ini bersifat resmi dan mengikat. Harap dipastikan untuk membaca dengan teliti dan mengikuti instruksi yang tertera. Jika ada pertanyaan, silakan hubungi pihak terkait.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Share & Action Section -->
        <div class="mt-10 grid md:grid-cols-2 gap-6" data-aos="fade-up" data-aos-delay="200">
            <!-- Share Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border-2 border-sky-200">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sky-500 to-cyan-500 flex items-center justify-center">
                        <i class="fas fa-share-nodes text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg">Bagikan</h4>
                        <p class="text-gray-500 text-sm">Sebarkan informasi ini</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <button onclick="shareToWhatsApp()" 
                            class="flex items-center justify-center gap-2 bg-green-500 text-white px-5 py-4 rounded-xl font-bold hover:bg-green-600 transform hover:scale-105 transition-all shadow-md">
                        <i class="fab fa-whatsapp text-xl"></i>
                        <span class="text-sm">WhatsApp</span>
                    </button>
                    <button onclick="shareToFacebook()" 
                            class="flex items-center justify-center gap-2 bg-blue-500 text-white px-5 py-4 rounded-xl font-bold hover:bg-blue-600 transform hover:scale-105 transition-all shadow-md">
                        <i class="fab fa-facebook-f text-xl"></i>
                        <span class="text-sm">Facebook</span>
                    </button>
                    <button onclick="copyLink()" 
                            class="col-span-2 flex items-center justify-center gap-2 bg-gray-700 text-white px-5 py-4 rounded-xl font-bold hover:bg-gray-800 transform hover:scale-105 transition-all shadow-md">
                        <i class="fas fa-link text-xl"></i>
                        <span>Salin Link</span>
                    </button>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="bg-white rounded-2xl shadow-xl p-8 border-2 border-sky-200">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sky-500 to-cyan-500 flex items-center justify-center">
                        <i class="fas fa-bolt text-white text-xl"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 text-lg">Aksi Cepat</h4>
                        <p class="text-gray-500 text-sm">Navigasi halaman</p>
                    </div>
                </div>
                <div class="space-y-3">
                    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                            class="w-full flex items-center justify-center gap-3 bg-gradient-to-r from-sky-500 to-cyan-500 text-white px-6 py-4 rounded-xl font-bold hover:from-sky-600 hover:to-cyan-600 transform hover:scale-105 transition-all shadow-lg">
                        <i class="fas fa-arrow-up"></i>
                        <span>Kembali ke Atas</span>
                    </button>
                    <a href="{{ route('pengumuman.index') }}" 
                       class="w-full flex items-center justify-center gap-3 bg-gray-200 text-gray-700 px-6 py-4 rounded-xl font-bold hover:bg-gray-300 transform hover:scale-105 transition-all shadow-md">
                        <i class="fas fa-list"></i>
                        <span>Lihat Semua Pengumuman</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-8 right-8 bg-gradient-to-r from-sky-500 to-cyan-500 text-white px-8 py-5 rounded-2xl shadow-2xl transform translate-y-32 transition-all duration-500 flex items-center gap-4 z-50 border-2 border-white/30">
    <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center">
        <i class="fas fa-check-circle text-2xl"></i>
    </div>
    <div>
        <p class="font-bold">Berhasil!</p>
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
</script>

<style>
/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom Scrollbar Blue Theme */
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

/* Prose Enhancement */
.prose {
    font-size: 1.125rem;
    line-height: 1.875;
}

.prose p {
    margin-bottom: 1.25rem;
}

/* Image Fade In */
img {
    opacity: 0;
    animation: fadeIn 0.8s ease-in forwards;
}

@keyframes fadeIn {
    to {
        opacity: 1;
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