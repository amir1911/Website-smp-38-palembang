@extends('layouts.app')

@section('title', 'Guru SMAN 1 Pesisir Tengah')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    .font-display { font-family: 'Playfair Display', serif; }
    body, * { font-family: 'Plus Jakarta Sans', sans-serif; }

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

    /* Teacher Card */
    .teacher-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid #CAF0F8;
        box-shadow: 0 4px 16px rgba(2, 62, 138, 0.06);
        transition: transform 0.35s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.35s ease;
        will-change: transform;
    }
    .teacher-card:hover {
        box-shadow: 0 20px 48px rgba(2, 62, 138, 0.16);
    }

    /* Photo section */
    .photo-wrap {
        position: relative;
        height: 220px;
        background: linear-gradient(135deg, #CAF0F8 0%, #90E0EF 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .photo-wrap::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(circle, rgba(0,119,182,0.08) 1px, transparent 1px);
        background-size: 20px 20px;
    }
    .photo-wrap img {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #ffffff;
        box-shadow: 0 8px 24px rgba(2,62,138,0.20);
        position: relative;
        z-index: 1;
        transition: transform 0.4s cubic-bezier(0.34,1.56,0.64,1);
    }
    .teacher-card:hover .photo-wrap img {
        transform: scale(1.07);
    }
    .photo-placeholder {
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: #E0F4FB;
        border: 4px solid #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
    }

    /* Category badge */
    .cat-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(2,62,138,0.85);
        backdrop-filter: blur(6px);
        color: #CAF0F8;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 99px;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 5px;
        z-index: 2;
    }

    /* Info badge */
    .info-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #EFF8FF;
        color: #023E8A;
        font-size: 12px;
        font-weight: 600;
        padding: 5px 14px;
        border-radius: 99px;
        border: 1px solid #CAF0F8;
    }
    .info-pill.subject {
        background: #FFF3E8;
        color: #c4600a;
        border-color: #fddcba;
    }

    /* Divider */
    .card-divider {
        width: 40px;
        height: 3px;
        background: linear-gradient(90deg, #00B4D8, #0077B6);
        border-radius: 99px;
        margin: 0 auto;
    }

    /* Social btn */
    .social-btn {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .social-btn:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 6px 16px rgba(0,0,0,0.2);
    }

    /* Pagination */
    .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 10px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        color: #023E8A;
        background: #ffffff;
        border: 1.5px solid #CAF0F8;
        transition: all 0.2s ease;
        text-decoration: none;
    }
    .page-link:hover { background: #EFF8FF; border-color: #0077B6; color: #0077B6; }
    .page-item.active .page-link {
        background: linear-gradient(135deg, #0077B6, #023E8A);
        color: white;
        border-color: transparent;
        box-shadow: 0 4px 12px rgba(0,119,182,0.35);
    }
    .page-item.disabled .page-link { color: #cbd5e1; background: #f8fafc; pointer-events: none; }

    @keyframes fadeUp {
        from { opacity:0; transform:translateY(20px); }
        to   { opacity:1; transform:translateY(0); }
    }
    .fade-up { animation: fadeUp 0.6s ease forwards; }
    .fade-up-d1 { animation-delay: 0.1s; opacity:0; }
    .fade-up-d2 { animation-delay: 0.2s; opacity:0; }
    .fade-up-d3 { animation-delay: 0.3s; opacity:0; }
</style>

<!-- =============================================
     HERO BANNER
     ============================================= -->
<div class="relative overflow-hidden bg-[#023E8A] stripe-bg">
    <div class="absolute inset-0 dot-grid"></div>
    <div class="absolute -top-16 -right-16 w-72 h-72 bg-white/5 rounded-full"></div>
    <div class="absolute top-12 right-40 w-36 h-36 bg-white/5 rounded-full"></div>
    <div class="absolute -bottom-10 -left-10 w-52 h-52 bg-[#00B4D8]/10 rounded-full"></div>

    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-16 sm:py-20 relative z-10">

        <!-- Breadcrumb -->
        <div class="flex items-center gap-2 text-[#90E0EF] text-xs font-semibold mb-6 fade-up fade-up-d1">
            <a href="/" class="hover:text-white transition">Beranda</a>
            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-white">Tenaga Pendidik</span>
        </div>

        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-8">
            <div>
                <span class="text-[#90E0EF] text-xs font-bold tracking-[4px] uppercase mb-3 block fade-up fade-up-d1">
                    SMAN 1 Pesisir Tengah
                </span>
                <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight fade-up fade-up-d2">
                    Tenaga <span class="text-[#00B4D8]">Pendidik</span>
                </h1>
                <div class="flex items-center gap-3 mt-4 fade-up fade-up-d3">
                    <span class="w-14 h-1 bg-[#F4A261] rounded-full"></span>
                    <span class="w-8 h-1 bg-[#00B4D8] rounded-full"></span>
                    <span class="w-4 h-1 bg-white/30 rounded-full"></span>
                </div>
            </div>

            <!-- Quote card -->
            <div class="fade-up fade-up-d3 max-w-sm bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl p-5">
                <svg class="w-6 h-6 text-[#00B4D8] mb-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                </svg>
                <p class="text-[#CAF0F8] text-sm leading-relaxed">
                    Tenaga pendidik profesional yang berkomitmen membentuk generasi cerdas dan berakhlak mulia.
                </p>
            </div>
        </div>

        <!-- Badges row -->
        <div class="flex flex-wrap gap-3 mt-8 fade-up fade-up-d3">
            @foreach([['fas fa-award','Profesional'], ['fas fa-certificate','Bersertifikat'], ['fas fa-heart','Berdedikasi']] as $b)
            <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 text-white text-xs font-semibold px-4 py-2 rounded-full backdrop-blur-sm">
                <i class="{{ $b[0] }} text-[#F4A261]"></i>
                {{ $b[1] }}
            </div>
            @endforeach
        </div>
    </div>

    <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" class="block -mb-1">
        <path fill="#f8fafc" d="M0,30 C480,60 960,0 1440,30 L1440,60 L0,60 Z"/>
    </svg>
</div>

<!-- =============================================
     TEACHER GRID
     ============================================= -->
<section class="bg-slate-50 py-16 sm:py-20">
    <div class="max-w-7xl mx-auto px-6 sm:px-8">

        @if($gurus->count())
        <!-- Count info -->
        <div class="flex items-center justify-between mb-10">
            <div>
                <p class="text-[#023E8A] font-bold text-lg">Daftar Guru &amp; Staff</p>
                <p class="text-gray-400 text-sm mt-0.5">{{ $gurus->total() }} tenaga pendidik terdaftar</p>
            </div>
            <div class="hidden sm:flex items-center gap-2 bg-white border border-[#CAF0F8] rounded-xl px-4 py-2 text-sm text-gray-500 shadow-sm">
                <svg class="w-4 h-4 text-[#0077B6]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                Hal. {{ $gurus->currentPage() }} / {{ $gurus->lastPage() }}
            </div>
        </div>
        @endif

        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">
            @forelse ($gurus as $guru)
                <div class="teacher-card"
                    data-aos="fade-up"
                    data-aos-duration="600"
                    data-aos-delay="{{ $loop->index * 60 }}">

                    <!-- Photo -->
                    <div class="photo-wrap">
                        <div class="cat-badge">
                            <i class="fas fa-briefcase text-[10px]"></i>
                            {{ $guru->kategori }}
                        </div>

                        @if($guru->foto)
                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                        @else
                            <div class="photo-placeholder">
                                <i class="fas fa-user text-5xl text-[#90E0EF]"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Info -->
                    <div class="p-6 text-center">

                        <!-- Name -->
                        <h3 class="font-bold text-[#023E8A] text-lg leading-snug mb-4">
                            {{ $guru->nama }}
                        </h3>

                        <!-- Jabatan pill -->
                        <div class="mb-3">
                            <span class="info-pill">
                                @if($guru->kategori === 'Guru')
                                    <i class="fas fa-chalkboard-teacher text-xs"></i>
                                @else
                                    <i class="fas fa-user-tie text-xs"></i>
                                @endif
                                {{ $guru->jabatan ?? ($guru->kategori === 'Guru' ? 'Guru' : 'Staff') }}
                            </span>
                        </div>

                        <!-- Mata pelajaran -->
                        @if($guru->mata_pelajaran)
                        <div class="mb-3">
                            <span class="info-pill subject">
                                <i class="fas fa-book text-xs"></i>
                                {{ $guru->mata_pelajaran }}
                            </span>
                        </div>
                        @endif

                        <!-- NIP -->
                        @if($guru->nip)
                        <p class="text-xs text-gray-400 font-medium mb-4">
                            <i class="fas fa-id-card text-[#0077B6] mr-1"></i>
                            NIP: {{ $guru->nip }}
                        </p>
                        @endif

                        <div class="card-divider mb-5"></div>

                        <!-- Social -->
                        <div class="flex justify-center gap-3">
                            @if($guru->facebook)
                                <a href="{{ $guru->facebook }}" target="_blank" rel="noopener noreferrer"
                                    class="social-btn"
                                    style="background: linear-gradient(135deg, #1877F2, #0C63D4);"
                                    title="Facebook {{ $guru->nama }}">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif

                            @if($guru->instagram)
                                <a href="{{ $guru->instagram }}" target="_blank" rel="noopener noreferrer"
                                    class="social-btn"
                                    style="background: linear-gradient(135deg, #E1306C, #C13584, #833AB4);"
                                    title="Instagram {{ $guru->nama }}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif

                            @if(!$guru->facebook && !$guru->instagram)
                                <span class="text-gray-300 text-xs italic flex items-center gap-1.5 py-1">
                                    <i class="fas fa-minus"></i> Tidak ada kontak
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

            @empty
                <!-- Empty state -->
                <div class="col-span-full">
                    <div class="bg-white rounded-3xl border border-[#CAF0F8] shadow-sm p-16 text-center" data-aos="fade-up">
                        <div class="w-24 h-24 mx-auto bg-[#EFF8FF] rounded-full flex items-center justify-center mb-6">
                            <i class="fas fa-users-slash text-4xl text-[#90E0EF]"></i>
                        </div>
                        <h3 class="font-bold text-[#023E8A] text-xl mb-2">Belum Ada Data</h3>
                        <p class="text-gray-400 text-sm">Data guru dan staff belum tersedia saat ini.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- ===== PAGINATION ===== -->
        @if($gurus->hasPages())
        <div class="mt-14 flex flex-col items-center gap-4" data-aos="fade-up">

            <!-- Info -->
            <div class="inline-flex items-center gap-2 bg-white border border-[#CAF0F8] rounded-xl px-5 py-2.5 text-sm text-gray-500 shadow-sm">
                <i class="fas fa-layer-group text-[#0077B6] text-xs"></i>
                Halaman
                <span class="font-bold text-[#023E8A]">{{ $gurus->currentPage() }}</span>
                dari
                <span class="font-bold text-[#023E8A]">{{ $gurus->lastPage() }}</span>
                &nbsp;·&nbsp;
                <span class="font-bold text-[#023E8A]">{{ $gurus->total() }}</span>
                data
            </div>

            <!-- Links -->
            <nav>
                <ul class="flex items-center gap-2 flex-wrap justify-center">

                    {{-- Prev --}}
                    @if($gurus->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link"><i class="fas fa-chevron-left text-xs"></i></span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $gurus->previousPageUrl() }}" class="page-link" rel="prev"
                                onclick="window.scrollTo({top:0,behavior:'smooth'})">
                                <i class="fas fa-chevron-left text-xs"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Pages --}}
                    @foreach($gurus->getUrlRange(1, $gurus->lastPage()) as $page => $url)
                        @if($page == $gurus->currentPage())
                            <li class="page-item active">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="{{ $url }}" class="page-link"
                                    onclick="window.scrollTo({top:0,behavior:'smooth'})">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if($gurus->hasMorePages())
                        <li class="page-item">
                            <a href="{{ $gurus->nextPageUrl() }}" class="page-link" rel="next"
                                onclick="window.scrollTo({top:0,behavior:'smooth'})">
                                <i class="fas fa-chevron-right text-xs"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link"><i class="fas fa-chevron-right text-xs"></i></span>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>
        @endif

    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ once: true, duration: 600, easing: 'ease-out-cubic' });

    // 3D tilt effect
    document.querySelectorAll('.teacher-card').forEach(card => {
        card.addEventListener('mousemove', e => {
            const r = card.getBoundingClientRect();
            const x = e.clientX - r.left, y = e.clientY - r.top;
            const cx = r.width / 2, cy = r.height / 2;
            card.style.transform =
                `perspective(900px) rotateX(${(y-cy)/22}deg) rotateY(${(cx-x)/22}deg) translateY(-10px)`;
        });
        card.addEventListener('mouseleave', () => { card.style.transform = ''; });
    });
</script>

@endsection