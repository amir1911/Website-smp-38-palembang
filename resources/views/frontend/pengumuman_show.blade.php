@extends('layouts.app')

@section('title', 'Detail Pengumuman')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">

<style>
    .font-display { font-family: 'Playfair Display', serif; }
    .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }
    .dot-grid {
        background-image: radial-gradient(circle, rgba(255,255,255,0.15) 1px, transparent 1px);
        background-size: 24px 24px;
    }
    .stripe-bg {
        background-image: repeating-linear-gradient(
            -45deg, transparent, transparent 10px,
            rgba(255,255,255,0.03) 10px, rgba(255,255,255,0.03) 20px
        );
    }
    @keyframes fadeUp {
        from { opacity:0; transform:translateY(24px); }
        to   { opacity:1; transform:translateY(0); }
    }
    .fade-up    { animation: fadeUp 0.7s ease forwards; }
    .fade-up-d1 { animation-delay: 0.1s;  opacity:0; }
    .fade-up-d2 { animation-delay: 0.22s; opacity:0; }
    .fade-up-d3 { animation-delay: 0.34s; opacity:0; }
    .fade-up-d4 { animation-delay: 0.46s; opacity:0; }
    .card-hover {
        transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 48px rgba(2,62,138,0.13);
    }
    html { scroll-behavior: smooth; }
</style>

{{-- ===== HERO BANNER ===== --}}
<div class="relative overflow-hidden bg-[#023E8A] stripe-bg font-body">
    <div class="absolute inset-0 dot-grid"></div>
    <div class="absolute -top-16 -right-16 w-72 h-72 bg-white/5 rounded-full"></div>
    <div class="absolute top-12 right-40 w-36 h-36 bg-white/5 rounded-full"></div>
    <div class="absolute -bottom-10 -left-10 w-52 h-52 bg-[#00B4D8]/10 rounded-full"></div>

    <div class="max-w-5xl mx-auto px-6 sm:px-10 lg:px-16 py-16 sm:py-20 relative z-10">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-[#90E0EF] text-xs font-semibold mb-6 fade-up fade-up-d1">
            <a href="/" class="hover:text-white transition">Beranda</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <a href="{{ route('pengumuman.index') }}" class="hover:text-white transition">Pengumuman</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white">Detail</span>
        </div>

        {{-- Badge kategori --}}
        <span class="inline-flex items-center gap-2 bg-white/15 border border-white/25 text-[#CAF0F8] text-xs font-bold px-4 py-1.5 rounded-full mb-4 fade-up fade-up-d1">
            <i class="fas fa-tag text-[10px]"></i>
            {{ $pengumuman->kategori?->nama_kategori ?? 'Umum' }}
        </span>

        <h1 class="font-display text-3xl sm:text-4xl lg:text-5xl font-bold text-white leading-tight fade-up fade-up-d2">
            {{ $pengumuman->judul }}
        </h1>

        <div class="flex items-center gap-3 mt-4 fade-up fade-up-d3">
            <span class="w-14 h-1 bg-[#F4A261] rounded-full"></span>
            <span class="w-8 h-1 bg-[#00B4D8] rounded-full"></span>
            <span class="w-4 h-1 bg-white/30 rounded-full"></span>
        </div>

        {{-- Meta --}}
        <div class="flex flex-wrap gap-3 mt-5 fade-up fade-up-d4">
            <div class="inline-flex items-center gap-2 bg-white/15 border border-white/25 text-white text-xs font-medium px-4 py-2 rounded-full">
                <i class="fas fa-calendar-alt text-[#00B4D8]"></i>
                {{ \Carbon\Carbon::parse($pengumuman->tanggal)->locale('id')->translatedFormat('d F Y') }}
            </div>
            <div class="inline-flex items-center gap-2 bg-white/15 border border-white/25 text-white text-xs font-medium px-4 py-2 rounded-full">
                <i class="fas fa-clock text-[#00B4D8]"></i>
                {{ \Carbon\Carbon::parse($pengumuman->created_at)->locale('id')->diffForHumans() }}
            </div>
        </div>
    </div>

    <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" class="block -mb-1">
        <path fill="#f8fafc" d="M0,30 C480,60 960,0 1440,30 L1440,60 L0,60 Z"/>
    </svg>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="bg-slate-50 py-16 sm:py-20 font-body">
    <div class="max-w-5xl mx-auto px-6 sm:px-8 space-y-8">

        {{-- ===== CARD UTAMA ===== --}}
        <div class="bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm fade-up fade-up-d2">

            {{-- Card header --}}
            <div class="bg-gradient-to-r from-[#023E8A] to-[#0077B6] px-8 sm:px-10 py-5 flex items-center gap-4">
                <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-bullhorn text-white"></i>
                </div>
                <div>
                    <p class="text-[#CAF0F8] text-xs font-bold tracking-[3px] uppercase">SMA Negeri 1 Pesisir Barat</p>
                    <h2 class="font-display text-white text-xl sm:text-2xl font-bold">Isi Pengumuman</h2>
                </div>
            </div>

            {{-- Foto --}}
            @if ($pengumuman->foto)
            <div class="border-b border-[#CAF0F8]">
                <img src="{{ asset('storage/' . $pengumuman->foto) }}"
                    alt="{{ $pengumuman->judul }}"
                    class="w-full h-auto object-scale-down">
            </div>
            @endif

            {{-- Konten --}}
            <div class="px-8 sm:px-10 py-8 sm:py-10">
                <div class="bg-[#f0f7ff] border-l-4 border-[#0077B6] rounded-2xl p-6">
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                        {!! nl2br(e($pengumuman->isi ?? 'Tidak ada isi pengumuman.')) !!}
                    </p>
                </div>

                {{-- Catatan penting --}}
                <div class="mt-6 bg-blue-50 border border-[#CAF0F8] rounded-2xl p-5 flex items-start gap-4">
                    <div class="w-9 h-9 rounded-full bg-[#023E8A] flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-info-circle text-white text-sm"></i>
                    </div>
                    <div>
                        <h5 class="font-bold text-[#023E8A] mb-1 text-sm">Catatan Penting</h5>
                        <p class="text-[#0077B6] text-xs sm:text-sm leading-relaxed">
                            Informasi dalam pengumuman ini bersifat resmi dan mengikat. Harap dipastikan untuk membaca
                            dengan teliti dan mengikuti instruksi yang tertera.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== INSTAGRAM EMBED ===== --}}
        @if ($pengumuman->instagram_link)
        <div class="bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm fade-up fade-up-d3">
            <div class="bg-gradient-to-r from-[#833ab4] to-[#fd1d1d] px-8 py-5 flex items-center gap-4">
                <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                    <i class="fab fa-instagram text-white text-lg"></i>
                </div>
                <div>
                    <p class="text-white/70 text-xs font-bold tracking-[3px] uppercase">Media Sosial</p>
                    <h2 class="font-display text-white text-xl font-bold">Postingan Instagram</h2>
                </div>
            </div>
            <div class="px-8 py-8 flex justify-center">
                <blockquote class="instagram-media"
                    data-instgrm-permalink="{{ $pengumuman->instagram_link }}"
                    data-instgrm-version="14"
                    style="background:#FFF; border:0; margin:0 auto; padding:0; width:100%; max-width:540px;">
                </blockquote>
                <script async src="//www.instagram.com/embed.js"></script>
            </div>
        </div>
        @endif

        {{-- ===== PDF SECTION ===== --}}
        @if ($pengumuman->file_pdf)
        <div class="bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm fade-up fade-up-d3">

            <div class="bg-gradient-to-r from-[#023E8A] to-[#0077B6] px-8 py-5 flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-4">
                    <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-pdf text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="text-[#CAF0F8] text-xs font-bold tracking-[3px] uppercase">Lampiran</p>
                        <h2 class="font-display text-white text-xl font-bold">Dokumen PDF</h2>
                    </div>
                </div>
                <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" download
                    class="inline-flex items-center gap-2 bg-white text-[#023E8A] font-bold text-sm px-5 py-2.5 rounded-full hover:bg-blue-50 transition-all duration-300">
                    <i class="fas fa-download"></i>
                    Download PDF
                </a>
            </div>

            <div class="p-6">
                <div class="rounded-2xl overflow-hidden border border-[#CAF0F8]">
                    <iframe src="{{ asset('storage/' . $pengumuman->file_pdf) }}"
                        class="w-full h-[600px]"
                        title="PDF Viewer">
                    </iframe>
                </div>

                <div class="flex flex-wrap gap-3 mt-4">
                    <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" target="_blank"
                        class="inline-flex items-center gap-2 bg-[#023E8A] hover:bg-[#0077B6] text-white font-semibold text-sm px-6 py-2.5 rounded-full transition-all duration-300 shadow-md">
                        <i class="fas fa-external-link-alt"></i>
                        Buka di Tab Baru
                    </a>
                    <button onclick="window.open('{{ asset('storage/' . $pengumuman->file_pdf) }}', '_blank')"
                        class="inline-flex items-center gap-2 border-2 border-[#0077B6] text-[#0077B6] hover:bg-[#0077B6] hover:text-white font-semibold text-sm px-6 py-2.5 rounded-full transition-all duration-300">
                        <i class="fas fa-print"></i>
                        Cetak Dokumen
                    </button>
                </div>
            </div>
        </div>
        @endif

        {{-- ===== ACTION CARDS ===== --}}
        <div class="grid md:grid-cols-2 gap-6 fade-up fade-up-d4">

            {{-- Share Card --}}
            <div class="card-hover bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm">
                <div class="bg-gradient-to-r from-[#0077B6] to-[#00B4D8] px-6 py-4 flex items-center gap-3">
                    <div class="bg-white/20 rounded-xl w-9 h-9 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-share-nodes text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-display text-white font-bold">Bagikan Pengumuman</h4>
                        <p class="text-[#CAF0F8] text-xs">Sebarkan informasi ini</p>
                    </div>
                </div>
                <div class="p-6 space-y-2">
                    <button onclick="shareToWhatsApp()"
                        class="w-full inline-flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white font-semibold text-sm px-4 py-3 rounded-full transition-all duration-300">
                        <i class="fab fa-whatsapp text-base"></i>
                        Bagikan ke WhatsApp
                    </button>
                    <button onclick="shareToFacebook()"
                        class="w-full inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-4 py-3 rounded-full transition-all duration-300">
                        <i class="fab fa-facebook-f text-base"></i>
                        Bagikan ke Facebook
                    </button>
                    <button onclick="copyLink()"
                        class="w-full inline-flex items-center justify-center gap-2 border-2 border-[#0077B6] text-[#0077B6] hover:bg-[#0077B6] hover:text-white font-semibold text-sm px-4 py-3 rounded-full transition-all duration-300">
                        <i class="fas fa-link"></i>
                        Salin Link
                    </button>
                </div>
            </div>

            {{-- Aksi Cepat --}}
            <div class="card-hover bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm">
                <div class="bg-gradient-to-r from-[#023E8A] to-[#0077B6] px-6 py-4 flex items-center gap-3">
                    <div class="bg-white/20 rounded-xl w-9 h-9 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-bolt text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-display text-white font-bold">Aksi Cepat</h4>
                        <p class="text-[#CAF0F8] text-xs">Navigasi halaman</p>
                    </div>
                </div>
                <div class="p-6 space-y-2">
                    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                        class="w-full inline-flex items-center justify-center gap-2 bg-[#023E8A] hover:bg-[#0077B6] text-white font-semibold text-sm px-4 py-3 rounded-full transition-all duration-300 shadow-md">
                        <i class="fas fa-arrow-up"></i>
                        Kembali ke Atas
                    </button>
                    <a href="{{ route('pengumuman.index') }}"
                        class="w-full inline-flex items-center justify-center gap-2 border-2 border-[#0077B6] text-[#0077B6] hover:bg-[#0077B6] hover:text-white font-semibold text-sm px-4 py-3 rounded-full transition-all duration-300">
                        <i class="fas fa-list"></i>
                        Lihat Semua Pengumuman
                    </a>
                    <a href="/"
                        class="w-full inline-flex items-center justify-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm px-4 py-3 rounded-full transition-all duration-300">
                        <i class="fas fa-home"></i>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>

{{-- Toast Notification --}}
<div id="toast"
    class="fixed bottom-6 right-6 bg-[#023E8A] text-white px-6 py-4 rounded-2xl shadow-xl transform translate-y-32 transition-transform duration-300 flex items-center gap-3 z-50 border border-white/20">
    <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center flex-shrink-0">
        <i class="fas fa-check text-sm"></i>
    </div>
    <div>
        <p class="font-bold text-sm">Berhasil!</p>
        <p id="toast-message" class="text-xs text-white/70">Link berhasil disalin!</p>
    </div>
</div>

<script>
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
        }).catch(() => {
            showToast('Gagal menyalin link!');
        });
    }
    function showToast(message) {
        const toast = document.getElementById('toast');
        document.getElementById('toast-message').textContent = message;
        toast.style.transform = 'translateY(0)';
        setTimeout(() => { toast.style.transform = 'translateY(8rem)'; }, 3000);
    }
</script>

@endsection