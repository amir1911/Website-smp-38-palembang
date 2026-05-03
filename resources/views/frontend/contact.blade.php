@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer"/>

<style>
    .font-display { font-family: 'Playfair Display', serif; }
    .font-body    { font-family: 'Plus Jakarta Sans', sans-serif; }
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
    .fade-up-d1 { animation-delay: 0.10s; opacity:0; }
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
</style>

{{-- ===== HERO BANNER ===== --}}
<div class="relative overflow-hidden bg-[#023E8A] stripe-bg font-body">
    <div class="absolute inset-0 dot-grid pointer-events-none"></div>
    <div class="absolute -top-16 -right-16 w-72 h-72 bg-white/5 rounded-full pointer-events-none"></div>
    <div class="absolute top-12 right-40 w-36 h-36 bg-white/5 rounded-full pointer-events-none"></div>
    <div class="absolute -bottom-10 -left-10 w-52 h-52 bg-[#00B4D8]/10 rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-16 sm:py-20 relative z-10">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-[#90E0EF] text-xs font-semibold mb-6 fade-up fade-up-d1">
            <a href="/" class="hover:text-white transition">Beranda</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white">Kontak</span>
        </div>

        <span class="text-[#90E0EF] text-xs font-bold tracking-[4px] uppercase mb-3 block fade-up fade-up-d1">
            Hubungi Kami
        </span>
        <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight fade-up fade-up-d2">
            Kontak & <span class="text-[#00B4D8]">Lokasi</span>
        </h1>
        <div class="flex items-center gap-3 mt-4 fade-up fade-up-d3">
            <span class="w-14 h-1 bg-[#F4A261] rounded-full"></span>
            <span class="w-8 h-1 bg-[#00B4D8] rounded-full"></span>
            <span class="w-4 h-1 bg-white/30 rounded-full"></span>
        </div>
        <p class="text-[#CAF0F8] text-sm sm:text-base mt-4 max-w-lg leading-relaxed fade-up fade-up-d4">
            Sampaikan pertanyaan atau saran Anda kepada kami. Kami siap membantu.
        </p>
    </div>

    <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" class="block -mb-1">
        <path fill="#f8fafc" d="M0,30 C480,60 960,0 1440,30 L1440,60 L0,60 Z"/>
    </svg>
</div>

{{-- ===== MAIN CONTENT ===== --}}
<div class="bg-slate-50 py-16 sm:py-20 font-body">
    <div class="max-w-6xl mx-auto px-6 sm:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 items-start">

            {{-- ===== KIRI: Alamat + Peta ===== --}}
            <div class="lg:col-span-3 space-y-6 fade-up fade-up-d2">

                <div class="card-hover bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm">

                    {{-- Card header --}}
                    <div class="bg-gradient-to-r from-[#023E8A] to-[#0077B6] px-8 py-5 flex items-center gap-4">
                        <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="text-[#CAF0F8] text-xs font-bold tracking-[3px] uppercase">SMAN 1 Pesisir Tengah</p>
                            <h2 class="font-display text-white text-xl sm:text-2xl font-bold">Alamat Sekolah</h2>
                        </div>
                    </div>

                    <div class="px-8 py-6">
                        <p class="text-gray-500 text-sm sm:text-base leading-relaxed mb-6">
                            SMA Negeri 1 Pesisir Tengah adalah sekolah menengah atas negeri di Kabupaten Pesisir Barat,
                            Lampung yang berkomitmen mencetak generasi unggul, berakhlak mulia, dan berprestasi dalam
                            bidang akademik maupun non-akademik. Sekolah kami menerapkan Kurikulum Merdeka dan
                            telah terakreditasi A.
                        </p>

                        {{-- Info kontak --}}
                        <div class="space-y-3 mb-6">
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <div class="w-8 h-8 rounded-full bg-[#CAF0F8] flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-[#0077B6] text-xs"></i>
                                </div>
                                <span>Jl. Raya Krui, Pesisir Tengah, Pesisir Barat, Lampung</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <div class="w-8 h-8 rounded-full bg-[#CAF0F8] flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-[#0077B6] text-xs"></i>
                                </div>
                                <span>sman1pesisiртengah@gmail.com</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <div class="w-8 h-8 rounded-full bg-[#CAF0F8] flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone text-[#0077B6] text-xs"></i>
                                </div>
                                <span>(0728) XXXXXX</span>
                            </div>
                        </div>

                        {{-- Google Map --}}
                        <div class="rounded-2xl overflow-hidden border border-[#CAF0F8]">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.385759369534!2d103.94089237222441!3d-5.201910394775691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e4795754f063f2b%3A0xf199917e2787eadb!2sSMA%20Negeri%201%20Pesisir%20Tengah!5e0!3m2!1sid!2sid!4v1777538772386!5m2!1sid!2sid"
                                width="100%" height="320" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== KANAN: Form Kontak ===== --}}
            <div class="lg:col-span-2 fade-up fade-up-d3">
                <div class="card-hover bg-white rounded-3xl overflow-hidden border border-[#CAF0F8] shadow-sm">

                    {{-- Card header --}}
                    <div class="bg-gradient-to-r from-[#0077B6] to-[#00B4D8] px-8 py-5 flex items-center gap-4">
                        <div class="bg-white/20 rounded-xl w-10 h-10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-paper-plane text-white text-lg"></i>
                        </div>
                        <div>
                            <p class="text-[#CAF0F8] text-xs font-bold tracking-[3px] uppercase">SMAN 1 Pesisir Tengah</p>
                            <h2 class="font-display text-white text-xl sm:text-2xl font-bold">Kirim Pesan</h2>
                        </div>
                    </div>

                    <div class="px-8 py-8">
                        <p class="text-gray-400 text-sm mb-6">
                            Kirimkan pertanyaan atau saran Anda melalui form di bawah ini.
                        </p>

                        {{-- Alert sukses --}}
                        @if (session('success'))
                        <div class="bg-green-50 text-green-700 border border-green-200 px-4 py-3 rounded-2xl mb-5 text-sm flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-3">
                            @csrf
                            <input name="name" type="text" placeholder="Nama Lengkap*" required
                                class="w-full border border-gray-200 bg-slate-50 px-4 py-2.5 rounded-full text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0077B6] focus:border-transparent transition placeholder-gray-400">
                            <input name="email" type="email" placeholder="E-mail*" required
                                class="w-full border border-gray-200 bg-slate-50 px-4 py-2.5 rounded-full text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0077B6] focus:border-transparent transition placeholder-gray-400">
                            <input name="phone" type="text" placeholder="No. HP*" required
                                class="w-full border border-gray-200 bg-slate-50 px-4 py-2.5 rounded-full text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0077B6] focus:border-transparent transition placeholder-gray-400">
                            <input name="subject" type="text" placeholder="Subjek"
                                class="w-full border border-gray-200 bg-slate-50 px-4 py-2.5 rounded-full text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0077B6] focus:border-transparent transition placeholder-gray-400">
                            <textarea name="message" placeholder="Tulis pesan Anda..." required
                                class="w-full border border-gray-200 bg-slate-50 px-4 py-3 rounded-2xl h-28 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#0077B6] focus:border-transparent transition placeholder-gray-400 resize-none"></textarea>

                            <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-2 bg-[#023E8A] hover:bg-[#0077B6] text-white font-semibold py-3 rounded-full text-sm transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                                <i class="fas fa-paper-plane text-xs"></i>
                                Kirim Pesan
                            </button>
                        </form>

                        {{-- Sosial Media --}}
                        <div class="flex justify-center gap-4 mt-6 pt-6 border-t border-[#CAF0F8]">
                            <a href="#" target="_blank"
                                class="w-10 h-10 rounded-full bg-[#CAF0F8] border border-[#90E0EF] flex items-center justify-center text-[#0077B6] hover:bg-[#0077B6] hover:text-white transition-all duration-300">
                                <i class="fab fa-facebook-f text-sm"></i>
                            </a>
                            <a href="#" target="_blank"
                                class="w-10 h-10 rounded-full bg-[#CAF0F8] border border-[#90E0EF] flex items-center justify-center text-[#0077B6] hover:bg-[#0077B6] hover:text-white transition-all duration-300">
                                <i class="fab fa-instagram text-sm"></i>
                            </a>
                            <a href="#" target="_blank"
                                class="w-10 h-10 rounded-full bg-[#CAF0F8] border border-[#90E0EF] flex items-center justify-center text-[#0077B6] hover:bg-[#0077B6] hover:text-white transition-all duration-300">
                                <i class="fab fa-tiktok text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Tombol Kembali --}}
        <div class="flex justify-center mt-10 fade-up fade-up-d4">
            <a href="/"
                class="inline-flex items-center gap-2 bg-[#023E8A] hover:bg-[#0077B6] text-white font-semibold px-8 py-3 rounded-full text-sm transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                </svg>
                Kembali ke Beranda
            </a>
        </div>

    </div>
</div>

@endsection