@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 py-12">
    <div class="max-w-5xl mx-auto px-6">
        <!-- Header Card dengan Gradient -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-2xl overflow-hidden mb-8 transform hover:scale-[1.02] transition-all duration-300">
            <div class="p-8 md:p-12">
                <!-- Breadcrumb -->
                <div class="flex items-center text-white/80 text-sm mb-4 gap-2">
                    <i class="fas fa-home"></i>
                    <span>/</span>
                    <span>Pengumuman</span>
                    <span>/</span>
                    <span class="text-white font-medium">Detail</span>
                </div>

                <!-- Judul -->
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-6 leading-tight">
                    {{ $pengumuman->judul }}
                </h1>

                <!-- Meta Info -->
                <div class="flex flex-wrap items-center gap-4 text-white/90">
                    <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                        <i class="fas fa-folder-open"></i>
                        <span class="font-medium">{{ $pengumuman->kategori?->nama_kategori ?? 'Tanpa Kategori' }}</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="font-medium">{{ \Carbon\Carbon::parse($pengumuman->tanggal)->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                        <i class="fas fa-clock"></i>
                        <span class="font-medium">{{ \Carbon\Carbon::parse($pengumuman->created_at)->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <!-- Gambar dengan Overlay -->
            @if ($pengumuman->foto)
            <div class="relative group overflow-hidden">
                <img 
                    src="{{ asset('storage/' . $pengumuman->foto) }}" 
                    alt="Foto Pengumuman" 
                    class="w-full h-[500px] object-cover transform group-hover:scale-105 transition-transform duration-700"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
            @endif

            <!-- Isi Pengumuman -->
            <div class="p-8 md:p-12">
                <div class="prose prose-lg max-w-none">
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        {!! nl2br(e($pengumuman->isi ?? 'Tidak ada isi pengumuman.')) !!}
                    </div>
                </div>

                <!-- File PDF Section -->
                @if ($pengumuman->file_pdf)
                <div class="mt-12 pt-8 border-t-2 border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                            <div class="bg-red-100 p-3 rounded-lg">
                                <i class="fas fa-file-pdf text-red-600 text-xl"></i>
                            </div>
                            Dokumen Lampiran
                        </h3>
                        <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                           target="_blank" 
                           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-pink-500 text-white px-6 py-3 rounded-xl font-semibold hover:from-red-600 hover:to-pink-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                           <i class="fas fa-download"></i>
                           Download PDF
                        </a>
                    </div>

                    <!-- PDF Viewer dengan Border Modern -->
                    <div class="relative rounded-xl overflow-hidden shadow-2xl border-4 border-gray-100">
                        <iframe 
                            src="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                            class="w-full h-[700px]"
                        ></iframe>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 mt-6">
                        <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                           target="_blank" 
                           class="flex items-center gap-2 bg-blue-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-600 transform hover:scale-105 transition-all duration-300 shadow-md">
                           <i class="fas fa-external-link-alt"></i>
                           Buka di Tab Baru
                        </a>
                        <button onclick="printPDF()" 
                                class="flex items-center gap-2 bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-700 transform hover:scale-105 transition-all duration-300 shadow-md">
                           <i class="fas fa-print"></i>
                           Cetak PDF
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Share Section -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mt-8">
            <h4 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                <i class="fas fa-share-alt text-blue-600"></i>
                Bagikan Pengumuman
            </h4>
            <div class="flex flex-wrap gap-4">
                <button onclick="shareToWhatsApp()" class="flex items-center gap-2 bg-green-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-600 transform hover:scale-105 transition-all duration-300 shadow-md">
                    <i class="fab fa-whatsapp text-xl"></i>
                    WhatsApp
                </button>
                <button onclick="shareToFacebook()" class="flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transform hover:scale-105 transition-all duration-300 shadow-md">
                    <i class="fab fa-facebook-f text-xl"></i>
                    Facebook
                </button>
                <button onclick="shareToTwitter()" class="flex items-center gap-2 bg-sky-500 text-white px-6 py-3 rounded-xl font-semibold hover:bg-sky-600 transform hover:scale-105 transition-all duration-300 shadow-md">
                    <i class="fab fa-twitter text-xl"></i>
                    Twitter
                </button>
                <button onclick="copyLink()" class="flex items-center gap-2 bg-gray-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-gray-700 transform hover:scale-105 transition-all duration-300 shadow-md">
                    <i class="fas fa-link text-xl"></i>
                    Salin Link
                </button>
            </div>
        </div>

        <!-- Navigation -->
        <div class="mt-8 flex justify-between items-center">
            <a href="{{ route('pengumuman.index') }}" 
               class="inline-flex items-center gap-3 bg-white text-gray-700 px-8 py-4 rounded-xl font-semibold hover:bg-gray-50 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl border-2 border-gray-200">
               <i class="fas fa-arrow-left text-blue-600"></i>
               Kembali ke Daftar
            </a>
            
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                    class="inline-flex items-center gap-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
               <i class="fas fa-arrow-up"></i>
               Ke Atas
            </button>
        </div>
    </div>
</section>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-8 right-8 bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl transform translate-y-32 transition-transform duration-300 flex items-center gap-3">
    <i class="fas fa-check-circle text-xl"></i>
    <span id="toast-message">Link berhasil disalin!</span>
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

function shareToTwitter() {
    const url = encodeURIComponent(window.location.href);
    const text = encodeURIComponent('{{ $pengumuman->judul }}');
    window.open(`https://twitter.com/intent/tweet?text=${text}&url=${url}`, '_blank');
}

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        showToast('Link berhasil disalin!');
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

// Smooth scroll animation
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });

    document.querySelectorAll('.bg-white').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.6s ease-out';
        observer.observe(el);
    });
});
</script>

<style>
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.prose {
    animation: fadeIn 0.8s ease-out;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
    border-radius: 5px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #2563eb, #7c3aed);
}
</style>
@endsection