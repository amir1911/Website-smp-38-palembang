@extends('layouts.app')

@section('content')
    <!-- Main Section -->
    <section class="min-h-screen py-8 -mb-20 bg-gradient-to-b from-[#4A7CB8] via-[#7BA6D4] to-[#D0E4F5]">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb Navigation -->
            <nav class="mb-6" aria-label="Breadcrumb">
                <div class="flex items-center gap-2 text-sm bg-white px-4 py-2 rounded-lg shadow-sm w-fit border border-blue-100">
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        <i class="fas fa-home text-blue-400"></i>
                        <span class="ml-2">Beranda</span>
                    </a>
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                    <a href="{{ route('pengumuman.index') }}" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        Pengumuman
                    </a>
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                    <span class="text-blue-600 font-medium">Detail</span>
                </div>
            </nav>

            <!-- Alert Banner -->
            <div class="mb-6">
                <div class="rounded-xl p-5 shadow-lg bg-gradient-to-r from-[#1A4E8A] to-[#2575B8]">
                    <div class="flex items-center justify-between gap-4 flex-wrap">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-bullhorn text-blue-500 text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-white font-bold text-base">Pengumuman Penting</h2>
                                <p class="text-blue-100 text-sm">Harap dibaca dengan seksama</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100">

                <!-- Header Section -->
                <div class="p-8 bg-gradient-to-r from-[#1A4E8A] to-[#2575B8]">
                    
                    <!-- Category Badge -->
                    <div class="mb-4">
                        <span class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-white text-sm font-medium border border-white/30">
                            <i class="fas fa-tag"></i>
                            {{ $pengumuman->kategori?->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-6 leading-tight">
                        {{ $pengumuman->judul }}
                    </h1>

                    <!-- Meta Information -->
                    <div class="flex flex-wrap gap-3">
                        <!-- Date Badge -->
                        <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg text-white border border-white/30">
                            <i class="fas fa-calendar-alt"></i>
                            <span class="text-sm font-medium">
                                {{ \Carbon\Carbon::parse($pengumuman->tanggal)->locale('id')->translatedFormat('d F Y') }}
                            </span>
                        </div>

                        <!-- Time Badge -->
                        <div class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg text-white border border-white/30">
                            <i class="fas fa-clock"></i>
                            <span class="text-sm font-medium">
                                {{ \Carbon\Carbon::parse($pengumuman->created_at)->locale('id')->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                @if ($pengumuman->foto)
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('storage/' . $pengumuman->foto) }}" 
                             alt="{{ $pengumuman->judul }}"
                             class="w-full h-[800px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                @endif

                <!-- Content Section -->
                <div class="p-8">
                    
                    <!-- Section Header -->
                    <div class="mb-6 pb-4 border-b-2 border-blue-100">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Isi Pengumuman</h3>
                        <p class="text-gray-500 text-sm">Informasi lengkap terkait pengumuman</p>
                    </div>

                    <!-- Main Content -->
                    <div class="prose max-w-none">
                        <div class="text-gray-700 leading-relaxed bg-gradient-to-br from-blue-50 to-sky-50 p-6 rounded-lg border-l-4 border-blue-400">
                            {!! nl2br(e($pengumuman->isi ?? 'Tidak ada isi pengumuman.')) !!}
                        </div>
                    </div>

                    <!-- Instagram Embed -->
                    @if ($pengumuman->instagram_link)
                        <div class="mt-10">
                            <div class="border border-blue-200 bg-white rounded-xl shadow-sm p-6">
                                <h3 class="text-lg font-bold text-gray-800 mb-4 text-center flex items-center justify-center gap-2">
                                    <i class="fab fa-instagram text-pink-500"></i>
                                    Postingan Instagram
                                </h3>

                                <div class="flex justify-center">
                                    <blockquote 
                                        class="instagram-media" 
                                        data-instgrm-permalink="{{ $pengumuman->instagram_link }}" 
                                        data-instgrm-version="14"
                                        style="background:#FFF; border:0; margin:0 auto; padding:0; width:100%; max-width:540px;">
                                    </blockquote>
                                </div>

                                <script async src="//www.instagram.com/embed.js"></script>
                            </div>
                        </div>
                    @endif

                    <!-- PDF Section -->
                    @if ($pengumuman->file_pdf)
                        <div class="mt-10">
                            
                            <!-- PDF Header -->
                            <div class="rounded-lg p-5 mb-4 bg-gradient-to-r from-[#1A4E8A] to-[#2575B8]">
                                <div class="flex items-center justify-between flex-wrap gap-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-bold text-lg">Dokumen PDF Terlampir</h4>
                                            <p class="text-blue-100 text-sm">Lihat atau unduh dokumen lengkap</p>
                                        </div>
                                    </div>
                                    <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                                       download
                                       class="bg-white text-blue-600 px-6 py-2.5 rounded-lg font-medium hover:bg-blue-50 transition-colors duration-200 flex items-center gap-2">
                                        <i class="fas fa-download"></i>
                                        Download PDF
                                    </a>
                                </div>
                            </div>

                            <!-- PDF Viewer -->
                            <div class="rounded-lg overflow-hidden border-2 border-blue-200 bg-gray-50 shadow-inner">
                                <iframe src="{{ asset('storage/' . $pengumuman->file_pdf) }}"
                                        class="w-full h-[600px]"
                                        title="PDF Viewer">
                                </iframe>
                            </div>

                            <!-- PDF Actions -->
                            <div class="flex flex-wrap gap-3 mt-4">
                                <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" 
                                   target="_blank"
                                   class="bg-gradient-to-r from-[#1A4E8A] to-[#2575B8] text-white px-6 py-2.5 rounded-lg font-medium hover:shadow-lg transition-all duration-200 flex items-center gap-2">
                                    <i class="fas fa-external-link-alt"></i>
                                    Buka di Tab Baru
                                </a>
                                <button onclick="printPDF()"
                                        class="bg-green-500 text-white px-6 py-2.5 rounded-lg font-medium hover:bg-green-600 transition-colors duration-200 flex items-center gap-2">
                                    <i class="fas fa-print"></i>
                                    Cetak Dokumen
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Important Notice -->
                <div class="bg-gradient-to-r from-blue-50 to-sky-50 border-t-4 border-blue-400 p-6 mx-6 mb-6 rounded-lg">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gradient-to-br from-[#1A4E8A] to-[#2575B8] flex items-center justify-center">
                            <i class="fas fa-info-circle text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-bold text-blue-900 mb-2">Catatan Penting</h5>
                            <p class="text-blue-800 text-sm leading-relaxed">
                                Informasi dalam pengumuman ini bersifat resmi dan mengikat. Harap dipastikan untuk membaca
                                dengan teliti dan mengikuti instruksi yang tertera.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Cards Grid -->
            <div class="mt-6 grid md:grid-cols-2 gap-4">

                <!-- Share Card -->
                <div class="bg-white rounded-lg shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-shadow duration-200">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-share-nodes text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Bagikan Pengumuman</h4>
                            <p class="text-gray-500 text-xs">Sebarkan informasi ini</p>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <button onclick="shareToWhatsApp()"
                                class="w-full bg-green-500 text-white px-4 py-3 rounded-lg font-medium hover:bg-green-600 transition-colors duration-200 flex items-center justify-center gap-2">
                            <i class="fab fa-whatsapp text-lg"></i>
                            Bagikan ke WhatsApp
                        </button>
                        <button onclick="shareToFacebook()"
                                class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg font-medium hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center gap-2">
                            <i class="fab fa-facebook-f text-lg"></i>
                            Bagikan ke Facebook
                        </button>
                        <button onclick="copyLink()"
                                class="w-full bg-gradient-to-r from-[#1A4E8A] to-[#2575B8] text-white px-4 py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                            <i class="fas fa-link"></i>
                            Salin Link
                        </button>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="bg-white rounded-lg shadow-lg p-6 border border-blue-100 hover:shadow-xl transition-shadow duration-200">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-bolt text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Aksi Cepat</h4>
                            <p class="text-gray-500 text-xs">Navigasi halaman</p>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                                class="w-full bg-gradient-to-r from-[#1A4E8A] to-[#2575B8] text-white px-4 py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-2">
                            <i class="fas fa-arrow-up"></i>
                            Kembali ke Atas
                        </button>
                        <a href="{{ route('pengumuman.index') }}"
                           class="w-full block text-center bg-gray-200 text-gray-700 px-4 py-3 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200 flex items-center justify-center gap-2">
                            <i class="fas fa-list"></i>
                            Lihat Semua Pengumuman
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Toast Notification -->
    <div id="toast"
         class="fixed bottom-6 right-6 bg-gradient-to-r from-[#1A4E8A] to-[#2575B8] text-white px-6 py-4 rounded-lg shadow-xl transform translate-y-32 transition-transform duration-300 flex items-center gap-3 z-50 border border-white/30">
        <i class="fas fa-check-circle text-xl"></i>
        <div>
            <p class="font-bold text-sm">Berhasil!</p>
            <p id="toast-message" class="text-xs opacity-90">Link berhasil disalin!</p>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Print PDF Function
        function printPDF() {
            window.open('{{ asset('storage/' . $pengumuman->file_pdf) }}', '_blank');
        }

        // Share to WhatsApp
        function shareToWhatsApp() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent('{{ $pengumuman->judul }}');
            window.open(`https://wa.me/?text=${text}%20${url}`, '_blank');
        }

        // Share to Facebook
        function shareToFacebook() {
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
        }

        // Copy Link to Clipboard
        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                showToast('Link berhasil disalin ke clipboard!');
            }).catch(err => {
                showToast('Gagal menyalin link!');
            });
        }

        // Show Toast Notification
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

    <!-- Custom Styles -->
    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Loading animation for iframe */
        iframe {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
@endsection