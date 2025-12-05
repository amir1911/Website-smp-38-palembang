@extends('layouts.app')

@section('content')
    <section class="min-h-screen py-8 -mb-20"
        style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb -->
            <nav class="mb-6">
                <div
                    class="flex items-center gap-2 text-sm bg-white px-4 py-2 rounded-lg shadow-sm w-fit border border-blue-100">
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition">
                        <i class="fas fa-home text-blue-400"></i>
                        <span class="ml-2">Beranda</span>
                    </a>
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                    <a href="{{ route('pengumuman.index') }}" class="text-gray-600 hover:text-blue-600 transition">
                        Pengumuman
                    </a>
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                    <span class="text-blue-600 font-medium">Detail</span>
                </div>
            </nav>

            <!-- Alert Banner -->
            <div class="mb-6">
                <div class="rounded-xl p-5 shadow-lg" style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                    <div class="flex items-center justify-between gap-4 flex-wrap">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                <i class="fas fa-bullhorn text-blue-500 text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-white font-bold text-base">Pengumuman Penting</h2>
                                <p class="text-blue-100 text-sm">Harap dibaca dengan seksama</p>
                            </div>
                        </div>
                        {{-- <a href="{{ route('pengumuman.index') }}" 
                       class="bg-white text-blue-600 px-5 py-2 rounded-lg font-medium hover:bg-blue-50 transition">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a> --}}
                    </div>
                </div>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100">

                <!-- Header Section -->
                <div class="p-8" style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                    <div class="mb-3">
                        <span
                            class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-1 rounded-full text-white text-sm font-medium border border-white/30">
                            <i class="fas fa-tag"></i>
                            {{ $pengumuman->kategori?->nama_kategori ?? 'Umum' }}
                        </span>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        {{ $pengumuman->judul }}
                    </h1>

                    <div class="flex flex-wrap gap-4">
                        <div class="flex flex-wrap gap-4">
                            <!-- Badge Tanggal -->
                            <div
                                class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg text-white border border-white/30">
                                <i class="fas fa-calendar-alt"></i>
                                <span class="text-sm font-medium">
                                    {{ \Carbon\Carbon::parse($pengumuman->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                </span>
                            </div>

                            <!-- Badge Waktu Dibuat -->
                            <div
                                class="flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg text-white border border-white/30">
                                <i class="fas fa-clock"></i>
                                <span class="text-sm font-medium">
                                    {{ \Carbon\Carbon::parse($pengumuman->created_at)->locale('id')->diffForHumans() }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Image Section -->
                @if ($pengumuman->foto)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $pengumuman->foto) }}" alt="{{ $pengumuman->judul }}"
                            class="w-full h-[400px] object-cover">
                    </div>
                @endif

                <!-- Content Section -->
                <div class="p-8">
                    <div class="mb-6 pb-4 border-b-2 border-blue-100">
                        <h3 class="text-xl font-bold text-gray-800 mb-1">Isi Pengumuman</h3>
                        <p class="text-gray-500 text-sm">Informasi lengkap terkait pengumuman</p>
                    </div>

                    <div class="prose max-w-none">
                        <div
                            class="text-gray-700 leading-relaxed bg-gradient-to-br from-blue-50 to-sky-50 p-6 rounded-lg border-l-4 border-blue-400">
                            {!! nl2br(e($pengumuman->isi ?? 'Tidak ada isi pengumuman.')) !!}
                        </div>
                    </div>
@if ($pengumuman->instagram_link)
    <div class="mt-10 flex justify-center">
        <div class="border border-blue-200 bg-white rounded-xl shadow-sm p-4 w-full max-w-md">
            <h3 class="text-lg font-bold text-gray-800 mb-2 text-center">Postingan Instagram</h3>

            <blockquote 
                class="instagram-media" 
                data-instgrm-permalink="{{ $pengumuman->instagram_link }}" 
                data-instgrm-version="14"
                style="background:#FFF; border:0; margin:0 auto; padding:0; width:100%; max-width:320px;">
            </blockquote>

            <script async src="//www.instagram.com/embed.js"></script>
        </div>
    </div>
@endif

                    <!-- PDF Section -->
                    @if ($pengumuman->file_pdf)
                        <div class="mt-8">
                            <div class="rounded-lg p-5 mb-4"
                                style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                                <div class="flex items-center justify-between flex-wrap gap-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                                            <i class="fas fa-file-pdf text-blue-500 text-2xl"></i>
                                        </div>
                                        <div>
                                            <h4 class="text-white font-bold text-lg">Dokumen PDF Terlampir</h4>
                                            <p class="text-blue-100 text-sm">Lihat atau unduh dokumen lengkap</p>
                                        </div>
                                    </div>
                                    <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" download
                                        class="bg-white text-blue-600 px-6 py-2 rounded-lg font-medium hover:bg-blue-50 transition">
                                        <i class="fas fa-download mr-2"></i>Download PDF
                                    </a>
                                </div>
                            </div>

                            <div class="rounded-lg overflow-hidden border-2 border-blue-200 bg-gray-50">
                                <iframe src="{{ asset('storage/' . $pengumuman->file_pdf) }}"
                                    class="w-full h-[600px]"></iframe>
                            </div>

                            <div class="flex flex-wrap gap-3 mt-4">
                                <a href="{{ asset('storage/' . $pengumuman->file_pdf) }}" target="_blank"
                                    class="text-white px-6 py-2 rounded-lg font-medium transition"
                                    style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                                    <i class="fas fa-external-link-alt mr-2"></i>Buka di Tab Baru
                                </a>
                                <button onclick="printPDF()"
                                    class="bg-green-500 text-white px-6 py-2 rounded-lg font-medium hover:bg-green-600 transition">
                                    <i class="fas fa-print mr-2"></i>Cetak Dokumen
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Important Notice -->
                <div class="bg-gradient-to-r from-blue-50 to-sky-50 border-t-4 border-blue-400 p-5 mx-6 mb-6 rounded-lg">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center"
                            style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                            <i class="fas fa-info-circle text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-bold text-blue-900 mb-1">Catatan Penting</h5>
                            <p class="text-blue-800 text-sm">
                                Informasi dalam pengumuman ini bersifat resmi dan mengikat. Harap dipastikan untuk membaca
                                dengan teliti dan mengikuti instruksi yang tertera.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Cards -->
            <div class="mt-6 grid md:grid-cols-2 gap-4">

                <!-- Share Card -->
                <div class="bg-white rounded-lg shadow-lg p-6 border border-blue-100">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-share-nodes text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Bagikan</h4>
                            <p class="text-gray-500 text-xs">Sebarkan informasi ini</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <button onclick="shareToWhatsApp()"
                            class="bg-green-500 text-white px-4 py-3 rounded-lg font-medium hover:bg-green-600 transition text-sm">
                            <i class="fab fa-whatsapp mr-1"></i>WhatsApp
                        </button>
                        <button onclick="shareToFacebook()"
                            class="bg-blue-600 text-white px-4 py-3 rounded-lg font-medium hover:bg-blue-700 transition text-sm">
                            <i class="fab fa-facebook-f mr-1"></i>Facebook
                        </button>
                        <button onclick="copyLink()"
                            class="col-span-2 text-white px-4 py-3 rounded-lg font-medium transition"
                            style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                            <i class="fas fa-link mr-2"></i>Salin Link
                        </button>
                    </div>
                </div>

                <!-- Quick Actions Card -->
                <div class="bg-white rounded-lg shadow-lg p-6 border border-blue-100">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-bolt text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800">Aksi Cepat</h4>
                            <p class="text-gray-500 text-xs">Navigasi halaman</p>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                            class="w-full text-white px-4 py-3 rounded-lg font-medium transition"
                            style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                            <i class="fas fa-arrow-up mr-2"></i>Kembali ke Atas
                        </button>
                        <a href="{{ route('pengumuman.index') }}"
                            class="w-full block text-center bg-gray-200 text-gray-700 px-4 py-3 rounded-lg font-medium hover:bg-gray-300 transition">
                            <i class="fas fa-list mr-2"></i>Lihat Semua Pengumuman
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Toast Notification -->
    <div id="toast"
        class="fixed bottom-6 right-6 text-white px-6 py-4 rounded-lg shadow-xl transform translate-y-32 transition-transform duration-300 flex items-center gap-3 z-50 border border-white/30"
        style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
        <i class="fas fa-check-circle text-xl"></i>
        <div>
            <p class="font-bold text-sm">Berhasil!</p>
            <p id="toast-message" class="text-xs opacity-90">Link berhasil disalin!</p>
        </div>
    </div>

    <script>
        function printPDF() {
            window.open('{{ asset('storage/' . $pengumuman->file_pdf) }}', '_blank');
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
        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection
