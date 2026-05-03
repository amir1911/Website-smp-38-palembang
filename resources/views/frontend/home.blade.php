@extends('layouts.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /*
        ================================================
        PALET WARNA BIRU LANGIT — KONSISTEN DI SELURUH HALAMAN
        ------------------------------------------------
        #0077B6  → Biru Langit   (primary)
        #023E8A  → Biru Tua      (primary-dark)
        #00B4D8  → Biru Cyan     (primary-light)
        #90E0EF  → Biru Muda     (accent-mid)
        #CAF0F8  → Biru Pucat    (primary-subtle)
        #F4A261  → Oranye        (accent warm)
        #FFF3E8  → Krem Muda     (accent-light)
        ================================================
        */
        :root {
            --p:     #0077B6;
            --pd:    #023E8A;
            --pl:    #00B4D8;
            --ps:    #CAF0F8;
            --pm:    #90E0EF;
            --acc:   #F4A261;
            --acc-l: #FFF3E8;
        }

        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-display { font-family: 'Playfair Display', serif; }

        /* Diagonal stripes texture */
        .stripe-bg {
            background-image: repeating-linear-gradient(
                -45deg,
                transparent, transparent 10px,
                rgba(255,255,255,0.03) 10px,
                rgba(255,255,255,0.03) 20px
            );
        }

        /* Dot grid pattern */
        .dot-grid {
            background-image: radial-gradient(circle, rgba(255,255,255,0.15) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Wave divider */
        .wave-divider svg { display: block; }

        /* Scrollbar hide */
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

        /* Glow button */
        .glow-btn {
            box-shadow: 0 0 0 0 rgba(0, 180, 216, 0.4);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .glow-btn:hover {
            box-shadow: 0 0 24px 4px rgba(0, 180, 216, 0.35);
            transform: translateY(-2px);
        }

        /* Card hover */
        .card-hover {
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.35s ease;
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 48px rgba(2, 62, 138, 0.18);
        }

        /* Stat card ring */
        .stat-ring {
            border: 4px solid rgba(255,255,255,0.2);
            box-shadow: inset 0 0 24px rgba(0,0,0,0.12), 0 8px 32px rgba(2,62,138,0.3);
        }

        /* Float badge animation */
        @keyframes floatY {
            0%, 100% { transform: translateY(0px); }
            50%       { transform: translateY(-8px); }
        }
        .float-badge { animation: floatY 3.5s ease-in-out infinite; }

        /* Logo float */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-12px); }
        }
        .animate-float { animation: float 3s ease-in-out infinite; }

        /* FAQ answer transition */
        [x-cloak] { display: none !important; }

        * { transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); }
    </style>

    <!-- =============================================
         HERO / CAROUSEL
         ============================================= -->
   <section class="relative w-full overflow-hidden"
    x-data="{
        current: 1,
        total: {{ count($carousels) }},
        autoplay: true,
        progress: 0
    }"
    x-init="
        setInterval(() => {
            if (autoplay) { current = current === total ? 1 : current + 1; progress = 0; }
        }, 6000);
        setInterval(() => {
            if (autoplay) { progress = progress >= 100 ? 0 : progress + 1.667; }
        }, 100);
    "
    @mouseenter="autoplay = false"
    @mouseleave="autoplay = true">

    {{-- Slides --}}
    <div class="relative w-full h-[480px] sm:h-[540px] md:h-[620px] lg:h-[700px] xl:h-[740px] overflow-hidden">
        <template x-for="(item, index) in {{ $carousels->toJson() }}" :key="index">
            <div x-show="current === index + 1"
                class="absolute inset-0 w-full h-full"
                x-transition:enter="transition-all duration-700 ease-out"
                x-transition:enter-start="opacity-0 scale-105"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition-all duration-500 ease-in"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95">

                {{-- Background image --}}
                <img :src="'/storage/' + item.gambar" :alt="item.judul"
                    class="w-full h-full object-cover">

                {{-- Overlay gradients --}}
                <div class="absolute inset-0 bg-gradient-to-r from-[#023E8A]/95 via-[#023E8A]/65 to-[#023E8A]/10"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-[#023E8A]/80 via-transparent to-transparent"></div>
                <div class="absolute inset-0 dot-grid opacity-20"></div>

                {{-- Decorative side accent --}}
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-gradient-to-b from-[#00B4D8]/0 via-[#00B4D8]/60 to-[#00B4D8]/0"></div>

                {{-- Content --}}
                <div class="absolute inset-0 flex items-center">
                    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 w-full">
                        <div class="max-w-2xl">

                            {{-- Tag badge --}}
                            <div x-show="current === index + 1"
                                x-transition:enter="transition-all duration-500 delay-100"
                                x-transition:enter-start="opacity-0 -translate-y-3"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="inline-flex items-center gap-2 bg-[#00B4D8]/20 border border-[#00B4D8]/40 text-[#CAF0F8] text-xs sm:text-sm font-semibold px-4 py-2 rounded-full mb-4 backdrop-blur-sm">
                                <span class="w-2 h-2 bg-[#F4A261] rounded-full animate-pulse"></span>
                                <span x-text="item.tag ?? 'SMAN 1 PESISIR TENGAH'"></span>
                            </div>

                            {{-- Title --}}
                            <div x-show="current === index + 1"
                                x-transition:enter="transition-all duration-600 delay-200"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0">
                                <h1 class="font-display text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-4"
                                    x-text="item.judul"></h1>
                            </div>

                            {{-- Meta info row --}}
                            <div x-show="current === index + 1"
                                x-transition:enter="transition-all duration-600 delay-300"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="flex flex-wrap items-center gap-4 mb-4">

                                {{-- Tanggal --}}
                                <template x-if="item.tanggal">
                                    <div class="flex items-center gap-1.5 text-[#CAF0F8]/70 text-xs sm:text-sm">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span x-text="item.tanggal"></span>
                                    </div>
                                </template>

                                {{-- Kategori --}}
                                <template x-if="item.kategori">
                                    <div class="flex items-center gap-1.5 text-[#CAF0F8]/70 text-xs sm:text-sm">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a2 2 0 012-2z"/>
                                        </svg>
                                        <span x-text="item.kategori"></span>
                                    </div>
                                </template>
                            </div>

                            {{-- Description --}}
                            <div x-show="current === index + 1"
                                x-transition:enter="transition-all duration-600 delay-[350ms]"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0">
                                <p class="text-[#CAF0F8] text-sm sm:text-base md:text-lg leading-relaxed mb-7 max-w-xl"
                                    x-text="item.deskripsi"></p>
                            </div>

                            {{-- CTA Buttons --}}
                            <div x-show="current === index + 1"
                                x-transition:enter="transition-all duration-600 delay-[420ms]"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="flex flex-wrap gap-3">
                                <a href="/profile"
                                    class="glow-btn inline-flex items-center gap-2 bg-[#0077B6] hover:bg-[#00B4D8] text-white font-semibold px-6 py-3 rounded-full text-sm transition-all duration-200 hover:shadow-lg hover:shadow-[#0077B6]/30 hover:-translate-y-0.5">
                                    Tentang Sekolah
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </a>
                                <a href="{{ route('pengumuman.index') }}"
                                    class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white border border-white/30 font-semibold px-6 py-3 rounded-full text-sm backdrop-blur-sm transition-all duration-200 hover:-translate-y-0.5">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                    </svg>
                                    Pengumuman
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    {{-- Prev / Next Buttons --}}
    <button @click="current = current === 1 ? total : current - 1; progress = 0;"
        class="absolute left-4 sm:left-6 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-[#0077B6] text-white border border-white/25 rounded-full p-3 backdrop-blur-sm hover:scale-110 hover:border-[#0077B6] transition-all duration-200 z-10 group">
        <svg class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>
    <button @click="current = current === total ? 1 : current + 1; progress = 0;"
        class="absolute right-4 sm:right-6 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-[#0077B6] text-white border border-white/25 rounded-full p-3 backdrop-blur-sm hover:scale-110 hover:border-[#0077B6] transition-all duration-200 z-10 group">
        <svg class="w-5 h-5 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    {{-- Bottom Bar --}}
    <div class="absolute bottom-0 left-0 right-0 bg-[#023E8A]/85 backdrop-blur-md border-t border-white/10">

        {{-- Thumbnail strip --}}
        {{-- <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 pt-3 pb-1 hidden sm:flex gap-2">
            <template x-for="(item, index) in {{ $carousels->toJson() }}" :key="'thumb-' + index">
                <button @click="current = index + 1; progress = 0;"
                    class="relative flex-1 h-14 rounded-lg overflow-hidden border-2 transition-all duration-300"
                    :class="current === index + 1
                        ? 'border-[#00B4D8] opacity-100'
                        : 'border-transparent opacity-50 hover:opacity-75'">
                    <img :src="'/storage/' + item.gambar" :alt="item.judul"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-[#023E8A]/40"></div>
                    <div class="absolute inset-0 flex items-end justify-center pb-1 px-1">
                        <span class="text-white text-[10px] font-semibold truncate leading-tight"
                            x-text="item.judul"></span>
                    </div>
                    {{-- Active indicator line --}}
                    {{-- <div x-show="current === index + 1"
                        class="absolute top-0 left-0 right-0 h-0.5 bg-[#00B4D8]"></div>
                </button>
            </template>
        </div> --}} --}}

        {{-- Dots + counter --}}
        <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-3 flex items-center justify-between gap-4">

            {{-- Animated dots --}}
            <div class="flex items-center gap-2">
                <template x-for="i in total" :key="'dot-' + i">
                    <button @click="current = i; progress = 0;"
                        class="relative overflow-hidden rounded-full transition-all duration-300 cursor-pointer"
                        :class="current === i
                            ? 'w-12 h-2.5 bg-[#90E0EF]'
                            : 'w-2.5 h-2.5 bg-white/30 hover:bg-white/60'">
                        <div x-show="current === i"
                            class="absolute inset-y-0 left-0 bg-[#F4A261] rounded-full transition-all"
                            :style="`width: ${progress}%`"></div>
                    </button>
                </template>
            </div>

            {{-- Counter + pause --}}
            <div class="flex items-center gap-4">
                <span class="text-white/75 text-sm font-semibold tabular-nums tracking-wide">
                    <span x-text="String(current).padStart(2,'0')"></span>
                    <span class="text-[#90E0EF] mx-1">/</span>
                    <span x-text="String(total).padStart(2,'0')"></span>
                </span>

                {{-- Pause / Play --}}
                <button @click="autoplay = !autoplay; progress = 0;"
                    class="w-8 h-8 flex items-center justify-center rounded-full border border-white/20 text-white/60 hover:text-white hover:border-white/50 transition-all duration-200">
                    <svg x-show="autoplay" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
                    </svg>
                    <svg x-show="!autoplay" class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

    <!-- =============================================
         QUICK STATS BAR
         ============================================= -->
    <section class="bg-[#0077B6] py-5 stripe-bg">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-3 divide-x divide-white/20">

            <div class="flex items-center justify-center gap-3 px-4">
                <div class="bg-white/15 rounded-xl p-2">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div>
                    <p class="text-white/70 text-xs">Akreditasi</p>
                    <p class="text-white font-bold text-sm">A</p>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3 px-4">
                <div class="bg-white/15 rounded-xl p-2">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div>
                    <p class="text-white/70 text-xs">Kurikulum</p>
                    <p class="text-white font-bold text-sm">Merdeka</p>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3 px-4">
                <div class="bg-white/15 rounded-xl p-2">
                    <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-white/70 text-xs">Lokasi</p>
                    <p class="text-white font-bold text-sm">Pesisir Barat</p>
                </div>
            </div>

        </div>
    </section>

    <!-- =============================================
         SAMBUTAN KEPALA SEKOLAH
         ============================================= -->
    <section class="py-20 sm:py-24 relative overflow-hidden bg-white">

        <!-- Dekorasi background -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#CAF0F8] rounded-full opacity-40 -translate-y-1/2 translate-x-1/3 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-[#CAF0F8] rounded-full opacity-30 translate-y-1/2 -translate-x-1/3 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 sm:px-8 relative z-10">

            <!-- Section label -->
            <div class="flex flex-col items-center mb-14" data-aos="fade-up">
                <span class="text-[#0077B6] text-xs font-bold tracking-[4px] uppercase mb-3">Sambutan</span>
                <h2 class="font-display text-4xl sm:text-5xl font-bold text-[#023E8A] text-center">Kepala Sekolah</h2>
                <div class="flex items-center gap-2 mt-4">
                    <span class="w-8 h-0.5 bg-[#00B4D8] rounded-full"></span>
                    <span class="w-3 h-3 bg-[#F4A261] rounded-full"></span>
                    <span class="w-8 h-0.5 bg-[#00B4D8] rounded-full"></span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 lg:gap-14 items-center">

                <!-- Foto -->
                <div class="lg:col-span-2 flex justify-center" data-aos="fade-right" data-aos-delay="100">
                    <div class="relative">

                        <!-- Floating badge -->
                        <div class="float-badge absolute -top-5 -right-5 bg-[#F4A261] text-white text-xs font-bold px-4 py-2 rounded-2xl shadow-lg z-20">
                            Kepala Sekolah
                        </div>

                        <!-- Blue frame -->
                        <div class="absolute -inset-3 bg-gradient-to-br from-[#0077B6] to-[#023E8A] rounded-3xl opacity-20 rotate-3"></div>

                        <!-- Foto -->
                        <div class="relative bg-gradient-to-b from-[#CAF0F8] to-[#90E0EF] p-3 rounded-3xl shadow-2xl">
                            <img src="{{ asset('storage/guru/kepala sekolah.png') }}"
                                alt="Kepala Sekolah"
                                class="rounded-2xl w-[260px] sm:w-[300px] md:w-[320px] h-[360px] sm:h-[400px] md:h-[440px] object-cover">
                        </div>

                        <!-- Name bar -->
                        <div class="absolute -bottom-5 left-1/2 -translate-x-1/2 bg-[#023E8A] text-white text-center px-8 py-3 rounded-2xl shadow-xl z-20 whitespace-nowrap">
                            <p class="font-bold text-sm">Kepala SMAN 1 Pesisir Tengah</p>
                        </div>
                    </div>
                </div>

                <!-- Teks sambutan -->
                <div class="lg:col-span-3" data-aos="fade-left" data-aos-delay="200">

                    <!-- Tanda kutip dekoratif -->
                    <div class="text-[#CAF0F8] font-display text-8xl leading-none mb-4 select-none">"</div>

                    <div class="space-y-5 text-gray-600 text-sm sm:text-base leading-relaxed">
                        <p class="italic text-[#0077B6] font-semibold text-lg">
                            Assalamu'alaikum warahmatullahi wabarakatuh.
                        </p>
                        <p class="text-justify">
                            Selamat datang di website resmi <span class="font-semibold text-[#023E8A]">SMA Negeri 1 Pesisir Tengah</span>.
                            Website ini kami hadirkan sebagai sarana informasi dan komunikasi bagi siswa, orang tua,
                            serta seluruh masyarakat Pesisir Barat yang ingin mengenal lebih dekat sekolah kami.
                        </p>
                        <p class="text-justify">
                            Sebagai lembaga pendidikan di Kabupaten Pesisir Barat, Lampung, kami berkomitmen untuk
                            menciptakan lingkungan belajar yang nyaman, berkarakter, dan berprestasi. Melalui kerja sama
                            yang erat antara guru, orang tua, dan peserta didik, kami terus berupaya mengembangkan
                            potensi siswa agar siap menghadapi tantangan masa depan.
                        </p>
                        <p class="text-justify">
                            Semoga website ini dapat memberikan manfaat dan menjadi jembatan transparansi serta
                            pelayanan yang lebih baik bagi seluruh warga sekolah dan masyarakat Pesisir Barat.
                        </p>
                    </div>

                    <div class="mt-8 pt-6 border-t border-[#CAF0F8]">
                        <p class="text-[#0077B6] italic font-medium mb-5">
                            Wassalamu'alaikum warahmatullahi wabarakatuh.
                        </p>
                        <div class="flex items-center gap-4">
                            <div class="w-1 h-14 bg-gradient-to-b from-[#00B4D8] to-[#0077B6] rounded-full"></div>
                            <div>
                                <p class="font-bold text-lg text-[#023E8A]">Kepala Sekolah</p>
                                <p class="text-sm text-gray-500">SMA Negeri 1 Pesisir Tengah</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Wave divider -->
    <div class="wave-divider -mb-1 bg-white">
        <svg viewBox="0 0 1440 80" xmlns="http://www.w3.org/2000/svg">
            <path fill="#023E8A" d="M0,40 C240,80 480,0 720,40 C960,80 1200,0 1440,40 L1440,80 L0,80 Z"/>
        </svg>
    </div>

    <!-- =============================================
         PROFIL SEKOLAH
         ============================================= -->
    <section class="bg-[#023E8A] py-20 sm:py-24 relative overflow-hidden stripe-bg">

        <!-- Dekorasi lingkaran -->
        <div class="absolute top-10 right-10 w-64 h-64 border border-white/10 rounded-full pointer-events-none"></div>
        <div class="absolute top-20 right-20 w-40 h-40 border border-white/10 rounded-full pointer-events-none"></div>
        <div class="absolute bottom-10 left-10 w-48 h-48 border border-white/10 rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 sm:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center relative z-10">

            <!-- Teks -->
            <div data-aos="fade-right">
                <span class="text-[#90E0EF] text-xs font-bold tracking-[4px] uppercase mb-4 block">Tentang Kami</span>

                <h2 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                    SMA Negeri 1<br>
                    <span class="text-[#00B4D8]">Pesisir Tengah</span>
                </h2>

                <div class="flex items-center gap-3 mb-6">
                    <span class="w-14 h-1 bg-[#F4A261] rounded-full"></span>
                    <span class="w-8 h-1 bg-[#00B4D8] rounded-full"></span>
                    <span class="w-4 h-1 bg-white/40 rounded-full"></span>
                </div>

                <p class="text-[#CAF0F8] text-base sm:text-lg leading-relaxed mb-8 max-w-lg">
                    Sekolah menengah atas negeri di Pesisir Barat, Lampung yang berkomitmen mencetak
                    generasi unggul, berakhlak mulia, dan berprestasi dalam akademik maupun non-akademik.
                </p>

                <!-- Feature list -->
                <div class="space-y-3 mb-10">
                    @foreach(['Lingkungan belajar yang kondusif dan asri', 'Tenaga pendidik profesional dan berpengalaman', 'Program ekstrakurikuler yang beragam'] as $f)
                        <div class="flex items-center gap-3">
                            <div class="w-6 h-6 bg-[#00B4D8] rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3 h-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span class="text-[#CAF0F8] text-sm">{{ $f }}</span>
                        </div>
                    @endforeach
                </div>

                <a href="/profile"
                    class="glow-btn inline-flex items-center gap-2 bg-[#F4A261] hover:bg-[#e8924f] text-white font-bold px-8 py-4 rounded-full text-sm">
                    Lihat Profil Lengkap
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            <!-- Logo / Visual -->
            <div data-aos="fade-left" data-aos-delay="150" class="flex justify-center lg:justify-end">
                <div class="relative">

                    <!-- Card utama -->
                    <div class="w-[320px] h-[320px] sm:w-[380px] sm:h-[380px]
                                bg-white/10 backdrop-blur-xl border border-white/20
                                rounded-[2rem] flex items-center justify-center
                                shadow-[0_20px_60px_rgba(0,0,0,0.4)]">
                        <!-- Glow -->
                        <div class="absolute inset-0 bg-[#00B4D8]/20 blur-3xl rounded-[2rem] pointer-events-none"></div>
                        <!-- Logo -->
                        <img src="{{ asset('storage/logo/logo sma.png') }}"
                            alt="Logo SMAN 1 Pesisir Tengah"
                            class="relative w-[70%] h-[70%] object-contain drop-shadow-2xl animate-float">
                    </div>

                    <!-- Badge kanan atas -->
                    <div class="float-badge absolute -top-6 -right-6 bg-[#F4A261] rounded-2xl px-5 py-4 shadow-2xl">
                        <p class="text-white font-bold text-sm">Kurikulum</p>
                        <p class="text-white/80 text-xs">Merdeka</p>
                    </div>

                    <!-- Badge kiri bawah -->
                    <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl px-6 py-4 shadow-2xl">
                        <p class="text-[#023E8A] font-bold text-3xl text-center">A</p>
                        <p class="text-gray-500 text-xs">Akreditasi</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Wave divider -->
    <div class="wave-divider -mt-1 bg-[#023E8A]">
        <svg viewBox="0 0 1440 80" xmlns="http://www.w3.org/2000/svg">
            <path fill="#f8fafc" d="M0,40 C360,80 720,0 1080,40 C1260,60 1380,20 1440,40 L1440,80 L0,80 Z"/>
        </svg>
    </div>

    <!-- =============================================
         EKSTRAKURIKULER
         ============================================= -->
    <section class="py-20 sm:py-24 bg-slate-50 relative overflow-hidden"
        x-data="{
            scrollLeft() { $refs.carousel.scrollBy({ left: -340, behavior: 'smooth' }) },
            scrollRight() { $refs.carousel.scrollBy({ left: 340, behavior: 'smooth' }) }
        }">

        <!-- Subtle dot background -->
        <div class="absolute inset-0 opacity-5 pointer-events-none"
            style="background-image: radial-gradient(circle, #0077B6 1px, transparent 1px); background-size: 30px 30px;"></div>

        <div class="max-w-7xl mx-auto px-6 sm:px-8 relative z-10">

            <!-- Header -->
            <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between mb-10 gap-4" data-aos="fade-up">
                <div>
                    <span class="text-[#0077B6] text-xs font-bold tracking-[4px] uppercase mb-2 block">Kegiatan</span>
                    <h2 class="font-display text-4xl sm:text-5xl font-bold text-[#023E8A]">Ekstrakurikuler</h2>
                </div>
                <div class="flex gap-2">
                    <button @click="scrollLeft"
                        class="bg-white hover:bg-[#0077B6] text-[#0077B6] hover:text-white border border-[#0077B6] rounded-full p-3 transition shadow-md">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button @click="scrollRight"
                        class="bg-[#0077B6] hover:bg-[#023E8A] text-white rounded-full p-3 transition shadow-md">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Cards carousel -->
        <div x-ref="carousel"
            class="flex gap-6 overflow-x-auto scrollbar-hide snap-x snap-mandatory scroll-smooth pb-4 px-6 sm:px-[calc((100vw-1220px)/2+24px)] cursor-grab active:cursor-grabbing">

            @foreach ($ekstrakurikulers as $index => $item)
                <div class="card-hover flex-shrink-0 w-72 sm:w-80 bg-white rounded-3xl overflow-hidden shadow-md snap-center"
                    data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">

                    <!-- Gambar -->
                    <div class="relative h-52 bg-[#CAF0F8] overflow-hidden">
                        <img src="{{ asset('storage/' . $item->foto) }}"
                            alt="{{ $item->nama_kegiatan }}"
                            class="w-full h-full object-contain p-4 hover:scale-105 transition duration-500">
                        <!-- Nomor badge -->
                        <div class="absolute top-3 left-3 bg-[#023E8A] text-white text-xs font-bold w-7 h-7 rounded-full flex items-center justify-center">
                            {{ $index + 1 }}
                        </div>
                    </div>

                    <!-- Konten -->
                    <div class="p-6">
                        <h3 class="font-bold text-[#023E8A] text-lg capitalize mb-2">{{ $item->nama_kegiatan }}</h3>
                        <div class="w-10 h-1 bg-[#00B4D8] rounded-full mb-3"></div>

                        <div x-data="{ open: false }">
                            <p class="text-gray-500 text-sm leading-relaxed" :class="open ? '' : 'line-clamp-3'">
                                {{ $item->deskripsi }}
                            </p>
                            <button @click="open = !open"
                                class="mt-3 text-[#0077B6] font-semibold text-xs hover:text-[#023E8A] flex items-center gap-1 transition">
                                <span x-text="open ? 'Tutup' : 'Selengkapnya'"></span>
                                <svg class="w-3 h-3 transition-transform" :class="open ? 'rotate-180' : ''"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- =============================================
         KEUNGGULAN SEKOLAH
         ============================================= -->
    <section class="py-20 sm:py-24 bg-white relative overflow-hidden">

        <div class="max-w-7xl mx-auto px-6 sm:px-8 relative z-10">

            <!-- Header -->
            <div class="text-center mb-14" data-aos="fade-up">
                <span class="text-[#0077B6] text-xs font-bold tracking-[4px] uppercase mb-3 block">Mengapa Kami</span>
                <h2 class="font-display text-4xl sm:text-5xl font-bold text-[#023E8A]">Keunggulan Sekolah</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                @foreach ([
                    ['icon' => 'sekolah.png',           'judul' => 'Lingkungan Kondusif', 'deskripsi' => 'Lingkungan belajar yang nyaman, asri, dan kondusif untuk mendukung semangat belajar siswa.', 'color' => '#0077B6'],
                    ['icon' => 'Terakreditasi A.png',   'judul' => 'Akreditasi Terbaik',  'deskripsi' => 'Telah mendapatkan akreditasi yang menunjukkan kualitas pembelajaran dan pengelolaan sekolah yang sangat baik.', 'color' => '#023E8A'],
                    ['icon' => 'kurikulum merdeka.png', 'judul' => 'Kurikulum Merdeka',   'deskripsi' => 'Menerapkan Kurikulum Merdeka yang menekankan kebebasan belajar dan penguatan karakter siswa.', 'color' => '#00B4D8'],
                ] as $index => $card)
                    <div class="card-hover group bg-white rounded-3xl p-8 border border-[#CAF0F8] shadow-sm"
                        data-aos="fade-up" data-aos-delay="{{ $index * 120 }}">

                        <!-- Icon circle -->
                        <div class="w-16 h-16 rounded-2xl mb-6 flex items-center justify-center"
                            style="background-color: {{ $card['color'] }}20;">
                            <img src="{{ asset('storage/sekolah/' . $card['icon']) }}"
                                alt="{{ $card['judul'] }}"
                                class="w-9 h-9 object-contain">
                        </div>

                        <h3 class="font-bold text-[#023E8A] text-xl mb-3">{{ $card['judul'] }}</h3>
                        <div class="w-8 h-1 rounded-full mb-4" style="background-color: {{ $card['color'] }};"></div>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $card['deskripsi'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- =============================================
         STATISTIK SEKOLAH
         ============================================= -->
    <section id="statistik-section" class="py-20 sm:py-24 relative overflow-hidden"
        style="background: linear-gradient(135deg, #023E8A 0%, #0077B6 50%, #00B4D8 100%);">

        <div class="absolute inset-0 dot-grid opacity-20 pointer-events-none"></div>
        <div class="absolute -top-20 -left-20 w-80 h-80 bg-white/5 rounded-full pointer-events-none"></div>
        <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-white/5 rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 sm:px-8 relative z-10">

            <!-- Header -->
            <div class="text-center mb-14" data-aos="fade-up">
                <span class="text-[#CAF0F8] text-xs font-bold tracking-[4px] uppercase mb-3 block">Data Sekolah</span>
                <h2 class="font-display text-4xl sm:text-5xl font-bold text-white">Statistik Sekolah</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 sm:gap-10">

                <!-- Guru -->
                <div class="stat-ring bg-white/10 backdrop-blur-md rounded-3xl p-8 text-center card-hover"
                    data-aos="zoom-in" data-aos-delay="100">
                    <div class="bg-white/20 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <img src="https://img.icons8.com/ios-filled/100/ffffff/teacher.png" alt="Guru" class="w-9 h-9">
                    </div>
                    <div class="text-5xl sm:text-6xl font-extrabold text-white counter mb-2"
                        data-target="{{ $statistik->guru ?? 0 }}">0</div>
                    <p class="text-[#CAF0F8] font-semibold text-lg">Guru</p>
                    <p class="text-white/50 text-xs mt-1">Tenaga Pendidik</p>
                </div>

                <!-- Siswa — sedikit lebih besar di tengah -->
                <div class="stat-ring bg-white/15 backdrop-blur-md rounded-3xl p-10 text-center card-hover sm:-mt-4 sm:mb-4"
                    data-aos="zoom-in" data-aos-delay="200">
                    <div class="bg-[#F4A261]/30 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <img src="https://img.icons8.com/ios-filled/100/ffffff/student-male.png" alt="Siswa" class="w-9 h-9">
                    </div>
                    <div class="text-5xl sm:text-6xl font-extrabold text-white counter mb-2"
                        data-target="{{ ($statistik->kelas7 ?? 0) + ($statistik->kelas8 ?? 0) + ($statistik->kelas9 ?? 0) }}">0</div>
                    <p class="text-[#CAF0F8] font-semibold text-lg">Siswa</p>
                    <p class="text-white/50 text-xs mt-1">Aktif Terdaftar</p>
                </div>

                <!-- Staf -->
                <div class="stat-ring bg-white/10 backdrop-blur-md rounded-3xl p-8 text-center card-hover"
                    data-aos="zoom-in" data-aos-delay="300">
                    <div class="bg-white/20 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <img src="https://img.icons8.com/ios-filled/100/ffffff/conference.png" alt="Staf" class="w-9 h-9">
                    </div>
                    <div class="text-5xl sm:text-6xl font-extrabold text-white counter mb-2"
                        data-target="{{ $statistik->staf ?? 0 }}">0</div>
                    <p class="text-[#CAF0F8] font-semibold text-lg">Staf</p>
                    <p class="text-white/50 text-xs mt-1">Tenaga Kependidikan</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Wave divider -->
    <div class="wave-divider -mb-1" style="background: linear-gradient(135deg, #023E8A, #00B4D8);">
        <svg viewBox="0 0 1440 80" xmlns="http://www.w3.org/2000/svg">
            <path fill="#023E8A" d="M0,40 C240,80 480,0 720,40 C960,80 1200,0 1440,40 L1440,80 L0,80 Z"/>
        </svg>
    </div>


    <!-- =============================================
     FAQ
     ============================================= -->
<section class="py-20 sm:py-24 relative overflow-hidden bg-white">

    <!-- Dekorasi -->
    <div class="absolute top-10 left-10 w-64 h-64 border border-[#CAF0F8] rounded-full pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 w-48 h-48 border border-[#CAF0F8] rounded-full pointer-events-none"></div>
    <div class="absolute inset-0 pointer-events-none"
        style="background-image: radial-gradient(circle, #CAF0F8 1px, transparent 1px); background-size: 28px 28px; opacity: 0.5;"></div>

    <div class="max-w-7xl mx-auto px-6 sm:px-8 relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

        <!-- Teks kiri -->
        <div data-aos="fade-right">
            <div class="inline-flex items-center gap-2 bg-[#CAF0F8] border border-[#90E0EF] text-[#0077B6] text-xs font-bold px-4 py-2 rounded-full mb-6">
                <span class="w-2 h-2 bg-[#F4A261] rounded-full animate-pulse"></span>
                FAQ
            </div>

            <h2 class="font-display text-4xl sm:text-5xl font-bold text-[#023E8A] leading-tight mb-6">
                Pertanyaan yang<br>
                Sering <span class="text-[#0077B6]">Ditanyakan</span>
            </h2>

            <div class="flex items-center gap-3 mb-6">
                <span class="w-14 h-1 bg-[#F4A261] rounded-full"></span>
                <span class="w-8 h-1 bg-[#00B4D8] rounded-full"></span>
                <span class="w-4 h-1 bg-[#CAF0F8] rounded-full"></span>
            </div>

            <p class="text-gray-500 text-base max-w-md leading-relaxed">
                Temukan jawaban atas pertanyaan umum seputar
                <span class="font-semibold text-[#023E8A]">SMAN 1 Pesisir Tengah</span>.
            </p>
        </div>

        <!-- Accordion FAQ kanan -->
        <div class="space-y-3" data-aos="fade-left">

            @php
                $faqs = [
                    ['q' => 'Apa itu SMAN 1 Pesisir Tengah?',           'a' => 'SMAN 1 Pesisir Tengah adalah sekolah menengah atas negeri di Kabupaten Pesisir Barat, Lampung yang berfokus pada pendidikan berkualitas dan pembentukan karakter siswa.'],
                    ['q' => 'Apa saja fasilitas yang tersedia?',         'a' => 'Sekolah menyediakan ruang kelas nyaman, laboratorium, perpustakaan, lapangan olahraga, serta fasilitas pendukung pembelajaran lainnya.'],
                    ['q' => 'Bagaimana cara mendaftar?',                'a' => 'Pendaftaran dapat dilakukan melalui jalur PPDB online sesuai jadwal yang ditetapkan oleh Dinas Pendidikan.'],
                    ['q' => 'Apakah tersedia kegiatan ekstrakurikuler?', 'a' => 'Ya, tersedia berbagai kegiatan seperti olahraga, seni, pramuka, dan organisasi siswa.'],
                    ['q' => 'Bagaimana sistem pembelajaran?',            'a' => 'SMAN 1 Pesisir Tengah menerapkan Kurikulum Merdeka dengan pendekatan pembelajaran aktif dan kreatif.'],
                    ['q' => 'Apakah sekolah sudah terakreditasi?',       'a' => 'Ya, SMAN 1 Pesisir Tengah telah terakreditasi A sebagai bukti kualitas pendidikan yang tinggi.'],
                ];
            @endphp

            @foreach ($faqs as $i => $faq)
                <div x-data="{ open: false }"
                    class="border border-[#CAF0F8] rounded-2xl overflow-hidden transition-all duration-300 shadow-sm"
                    :class="open ? 'border-[#00B4D8] shadow-md' : 'hover:border-[#90E0EF]'">

                    <!-- Pertanyaan -->
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between text-left px-6 py-4 gap-4 transition"
                        :class="open ? 'bg-[#CAF0F8]' : 'bg-white hover:bg-[#f0fafd]'">

                        <div class="flex items-center gap-4">
                            <span class="text-[#00B4D8] text-xs font-bold tabular-nums flex-shrink-0">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <span class="text-[#023E8A] font-semibold text-sm sm:text-base">{{ $faq['q'] }}</span>
                        </div>

                        <div class="w-8 h-8 flex-shrink-0 flex items-center justify-center rounded-full border transition"
                            :class="open ? 'bg-[#0077B6] border-[#0077B6] text-white' : 'border-[#90E0EF] text-[#0077B6]'">
                            <svg :class="open ? 'rotate-180' : ''"
                                class="w-4 h-4 transition-transform duration-300"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>

                    <!-- Jawaban -->
                    <div x-show="open"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-1"
                        class="px-6 pb-5 pt-4 ml-8 text-gray-500 text-sm leading-relaxed border-t border-[#CAF0F8]">
                        {{ $faq['a'] }}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

    {{-- <!-- Wave bottom -->
    <div class="wave-divider -mt-1" style="background: linear-gradient(135deg, #023E8A, #00B4D8);">
        <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg">
            <path fill="#f8fafc" d="M0,30 C480,60 960,0 1440,30 L1440,60 L0,60 Z"/>
        </svg>
    </div> --}}

    <!-- =============================================
         SCRIPTS
         ============================================= -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 750, once: true, offset: 80, easing: 'ease-out-cubic' });

        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll(".counter");
            let animated = false;
            const speed = 60;

            const run = () => {
                counters.forEach(counter => {
                    const target = +counter.getAttribute("data-target");
                    const step = () => {
                        const current = +counter.innerText;
                        const inc = Math.ceil(target / speed);
                        if (current < target) {
                            counter.innerText = Math.min(current + inc, target);
                            setTimeout(step, 20);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    step();
                });
            };

            const observer = new IntersectionObserver(entries => {
                if (entries[0].isIntersecting && !animated) {
                    animated = true;
                    run();
                }
            }, { threshold: 0.4 });

            const statsSection = document.querySelector("#statistik-section");
            if (statsSection) observer.observe(statsSection);
        });
    </script>

@endsection