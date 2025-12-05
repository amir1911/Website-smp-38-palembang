@extends('layouts.app')

@section('title', 'Guru SMP Negeri 38 Palembang')

@section('content')
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guru SMP Negeri 38 Palembang</title>

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

        <!-- AOS Animation -->
        <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            poppins: ['Poppins', 'sans-serif'],
                        },
                        animation: {
                            'gradient-shift': 'gradientShift 15s ease infinite',
                            'shimmer': 'shimmer 3s linear infinite',
                            'float': 'floatIcon 3s ease-in-out infinite',
                            'twinkle': 'starTwinkle 2s ease-in-out infinite',
                            'pulse-badge': 'badgePulse 2s ease-in-out infinite',
                            'border-glow': 'borderGlow 3s ease infinite',
                        },
                        keyframes: {
                            gradientShift: {
                                '0%, 100%': { backgroundPosition: '0% 50%' },
                                '50%': { backgroundPosition: '100% 50%' },
                            },
                            shimmer: {
                                '0%': { backgroundPosition: '-200% 0' },
                                '100%': { backgroundPosition: '200% 0' },
                            },
                            floatIcon: {
                                '0%, 100%': { transform: 'translateY(0px)' },
                                '50%': { transform: 'translateY(-10px)' },
                            },
                            starTwinkle: {
                                '0%, 100%': { opacity: '1', transform: 'scale(1)' },
                                '50%': { opacity: '0.7', transform: 'scale(0.9)' },
                            },
                            badgePulse: {
                                '0%, 100%': { boxShadow: '0 4px 12px rgba(0, 0, 0, 0.15)' },
                                '50%': { boxShadow: '0 4px 20px rgba(59, 130, 246, 0.4)' },
                            },
                            borderGlow: {
                                '0%, 100%': { opacity: '0.3' },
                                '50%': { opacity: '0.8' },
                            },
                        },
                    }
                }
            }
        </script>

        <style>
            * {
                font-family: 'Poppins', sans-serif;
            }

            body {
                background-size: 400% 400%;
            }

            .shimmer-text {
                background: linear-gradient(90deg, #3b82f6 0%, #2563eb 25%, #1d4ed8 50%, #2563eb 75%, #3b82f6 100%);
                background-size: 200% 100%;
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                animation: shimmer 3s linear infinite;
            }

            .name-decoration::after {
                content: '';
                position: absolute;
                bottom: -4px;
                left: 50%;
                transform: translateX(-50%);
                width: 0;
                height: 3px;
                background: linear-gradient(90deg, #3b82f6, #2563eb);
                border-radius: 2px;
                transition: width 0.4s ease;
            }

            .teacher-card:hover .name-decoration::after {
                width: 100%;
            }

            .quote-card::before {
                content: '';
                position: absolute;
                top: -2px;
                left: -2px;
                right: -2px;
                bottom: -2px;
                background: linear-gradient(45deg, #3b82f6, #2563eb, #60a5fa, #3b82f6);
                background-size: 300% 300%;
                border-radius: 24px;
                z-index: -1;
                animation: borderGlow 3s ease infinite;
            }

            .photo-shine::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.4) 50%, transparent 70%);
                transform: rotate(45deg);
                transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .teacher-card:hover .photo-shine::before {
                left: 100%;
            }

            .social-ripple::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: translate(-50%, -50%);
                transition: width 0.6s, height 0.6s;
            }

            .social-ripple:hover::before {
                width: 200%;
                height: 200%;
            }

            @keyframes borderGlow {
                0%, 100% { opacity: 0.3; }
                50% { opacity: 0.8; }
            }
        </style>
    </head>

    <body class="bg-gradient-to-br from-indigo-100 via-blue-50 to-sky-100 animate-gradient-shift min-h-screen relative overflow-x-hidden font-poppins">
        
        <!-- Background Overlay -->
        <div class="fixed inset-0 pointer-events-none z-0">
            <div class="absolute inset-0" style="background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);"></div>
        </div>

        <div class="relative z-10">
            <!-- Header Section -->
            <header class="text-center py-16 px-4">
                <!-- Icon -->
                <div class="inline-block mb-6 animate-float">
                    <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center shadow-2xl border-4 border-white/50">
                        <i class="fas fa-graduation-cap text-5xl shimmer-text"></i>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-6xl font-black text-white mb-8 drop-shadow-2xl">
                    <span class="shimmer-text">Guru SMP Negeri 38 Palembang</span>
                </h1>

                <!-- Quote Card -->
                <div class="quote-card max-w-3xl mx-auto bg-white/95 backdrop-blur-xl rounded-3xl p-8 shadow-xl border-2 border-white/50 relative overflow-hidden" data-aos="fade-up">
                    <p class="text-gray-800 text-sm md:text-base leading-relaxed font-medium">
                        <i class="fas fa-quote-left text-blue-400 mr-2 text-2xl"></i>
                        Bertemu dengan tenaga pendidikan dan staff terbaik kami yang berperan penting dalam
                        membentuk masa depan siswa menuju generasi yang cerdas dan berakhlak mulia.
                        <i class="fas fa-quote-right text-blue-400 ml-2 text-2xl"></i>
                    </p>
                </div>

                <!-- Header Badges -->
                <div class="flex flex-wrap justify-center gap-5 mt-10" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-white/95 backdrop-blur-md px-6 py-3 rounded-[28px] flex items-center gap-3 shadow-lg transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl border-2 border-white/50 hover:border-white/80">
                        <i class="fas fa-award text-blue-600 text-xl"></i>
                        <span class="text-gray-800 font-bold text-sm">Profesional</span>
                    </div>
                    <div class="bg-white/95 backdrop-blur-md px-6 py-3 rounded-[28px] flex items-center gap-3 shadow-lg transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl border-2 border-white/50 hover:border-white/80">
                        <i class="fas fa-certificate text-blue-600 text-xl"></i>
                        <span class="text-gray-800 font-bold text-sm">Bersertifikat</span>
                    </div>
                    <div class="bg-white/95 backdrop-blur-md px-6 py-3 rounded-[28px] flex items-center gap-3 shadow-lg transition-all duration-500 hover:-translate-y-1 hover:shadow-2xl border-2 border-white/50 hover:border-white/80">
                        <i class="fas fa-heart text-blue-600 text-xl"></i>
                        <span class="text-gray-800 font-bold text-sm">Berdedikasi</span>
                    </div>
                </div>
            </header>

            <!-- Teachers Grid -->
            <section class="container mx-auto px-4 md:px-6 pb-12">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    @forelse ($gurus as $guru)
                        <div class="teacher-card bg-white/95 backdrop-blur-xl rounded-[28px] overflow-hidden shadow-[0_8px_32px_rgba(0,0,0,0.15),0_0_0_1px_rgba(255,255,255,0.3)_inset] transition-all duration-500 border-2 border-white/40 hover:-translate-y-4 hover:shadow-[0_24px_48px_rgba(0,0,0,0.25),0_0_0_1px_rgba(255,255,255,0.5)_inset,0_0_60px_rgba(59,130,246,0.4)] hover:border-white/60" 
                             data-aos="fade-up" 
                             data-aos-duration="600"
                             data-aos-delay="{{ $loop->index * 50 }}">

                            <!-- Photo Section -->
                            <div class="photo-shine bg-gradient-to-br from-blue-300 to-blue-500 p-10 pb-6 relative overflow-hidden">
                                <!-- Category Badge -->
                                <div class="absolute top-4 left-4 bg-white/98 backdrop-blur-sm px-4 py-1.5 rounded-2xl text-[11px] font-extrabold text-blue-600 shadow-md flex items-center gap-1.5 z-10 animate-pulse-badge border border-blue-500/30">
                                    <i class="fa-solid fa-briefcase"></i>
                                    <span>{{ $guru->kategori }}</span>
                                </div>

                                <!-- Photo -->
                                @if ($guru->foto)
                                    <img src="{{ asset('storage/' . $guru->foto) }}" 
                                         alt="{{ $guru->nama }}"
                                         class="w-[140px] h-[140px] rounded-full border-[6px] border-white object-cover mx-auto block shadow-[0_8px_24px_rgba(0,0,0,0.2),0_0_0_4px_rgba(255,255,255,0.3)] relative z-10 transition-all duration-700 hover:scale-[1.15] hover:rotate-[5deg] hover:shadow-[0_12px_32px_rgba(0,0,0,0.3),0_0_0_6px_rgba(255,255,255,0.5)]">
                                @else
                                    <div class="w-[140px] h-[140px] rounded-full border-[6px] border-white bg-white mx-auto flex items-center justify-center shadow-[0_8px_24px_rgba(0,0,0,0.2),0_0_0_4px_rgba(255,255,255,0.3)] relative z-10 transition-all duration-700 hover:scale-[1.15] hover:rotate-[5deg]">
                                        <i class="fas fa-user text-7xl text-gray-300"></i>
                                    </div>
                                @endif

                                <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(circle at 50% 50%, transparent 40%, rgba(0, 0, 0, 0.1) 100%);"></div>
                            </div>

                            <!-- Info Section -->
                            <div class="p-7 text-center">
                                <!-- Name -->
                                <h3 class="text-xl font-black text-gray-900 mb-4 relative inline-block name-decoration">
                                    {{ $guru->nama }}
                                </h3>

                                <!-- Position Badge -->
                                <div class="mb-4">
                                    <span class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-5 py-2 rounded-3xl text-xs font-bold shadow-[0_4px_12px_rgba(59,130,246,0.4)] transition-all duration-300 hover:scale-105 hover:shadow-[0_6px_16px_rgba(59,130,246,0.5)]">
                                        @if ($guru->kategori === 'Guru')
                                            <span class="text-yellow-300 text-[11px] animate-twinkle">★</span>
                                            <span>{{ $guru->jabatan ?? 'Guru' }}</span>
                                            <span class="text-yellow-300 text-[11px] animate-twinkle">★</span>
                                        @else
                                            <i class="fas fa-user-tie"></i>
                                            <span>{{ $guru->jabatan ?? 'Staff' }}</span>
                                        @endif
                                    </span>
                                </div>

                                <!-- Subject -->
                                @if ($guru->mata_pelajaran)
                                    <div class="mb-4">
                                        <span class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white px-5 py-2 rounded-3xl text-xs font-bold shadow-[0_4px_12px_rgba(59,130,246,0.4)] transition-all duration-300 hover:scale-105 hover:shadow-[0_6px_16px_rgba(59,130,246,0.5)]">
                                            <i class="fas fa-book text-sm"></i>
                                            <span>{{ $guru->mata_pelajaran }}</span>
                                        </span>
                                    </div>
                                @endif

                                <!-- NIP -->
                                @if ($guru->kategori === 'Guru' && $guru->nip)
                                    <div class="mb-4 text-xs text-gray-600 font-semibold">
                                        <i class="fas fa-id-card text-blue-500 mr-1"></i>
                                        NIP: {{ $guru->nip }}
                                    </div>
                                @endif

                                <!-- Divider -->
                                <div class="w-16 h-1 bg-gradient-to-r from-blue-400 via-blue-500 to-blue-400 rounded-full mx-auto mb-5"></div>

                                <!-- Social Media -->
                                <div class="flex justify-center gap-4">
                                    @if ($guru->facebook)
                                        <a href="{{ $guru->facebook }}" 
                                           target="_blank" 
                                           class="social-ripple w-[42px] h-[42px] rounded-full flex items-center justify-center text-white shadow-[0_4px_12px_rgba(0,0,0,0.2)] transition-all duration-500 relative overflow-hidden hover:-translate-y-1 hover:scale-[1.15] hover:rotate-[10deg] hover:shadow-[0_8px_20px_rgba(0,0,0,0.3)]"
                                           style="background: linear-gradient(135deg, #1877F2 0%, #0C63D4 100%);"
                                           title="Facebook {{ $guru->nama }}" 
                                           rel="noopener noreferrer">
                                            <i class="fab fa-facebook-f text-lg relative z-10"></i>
                                        </a>
                                    @endif

                                    @if ($guru->instagram)
                                        <a href="{{ $guru->instagram }}" 
                                           target="_blank" 
                                           class="social-ripple w-[42px] h-[42px] rounded-full flex items-center justify-center text-white shadow-[0_4px_12px_rgba(0,0,0,0.2)] transition-all duration-500 relative overflow-hidden hover:-translate-y-1 hover:scale-[1.15] hover:rotate-[10deg] hover:shadow-[0_8px_20px_rgba(0,0,0,0.3)]"
                                           style="background: linear-gradient(135deg, #E1306C 0%, #C13584 50%, #833AB4 100%);"
                                           title="Instagram {{ $guru->nama }}" 
                                           rel="noopener noreferrer">
                                            <i class="fab fa-instagram text-lg relative z-10"></i>
                                        </a>
                                    @endif

                                    @if (!$guru->facebook && !$guru->instagram)
                                        <div class="text-gray-400 text-xs italic flex items-center gap-2 py-2">
                                            <i class="fas fa-link-slash"></i>
                                            <span>Tidak ada kontak</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Empty State -->
                        <div class="col-span-full">
                            <div class="bg-white/95 backdrop-blur-xl rounded-[28px] p-16 text-center shadow-xl border-2 border-white/40" data-aos="fade-up">
                                <div class="w-32 h-32 mx-auto bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mb-6">
                                    <i class="fas fa-users-slash text-6xl text-blue-400"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Data</h3>
                                <p class="text-gray-600">Data guru dan staff belum tersedia saat ini</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </section>

            <!-- Pagination Section -->
            @if($gurus->hasPages())
                <section class="container mx-auto px-4 md:px-6 pb-24">
                    <div class="flex justify-center" data-aos="fade-up" data-aos-duration="800">
                        <div class="inline-block bg-white/95 backdrop-blur-xl rounded-3xl px-6 md:px-8 py-6 shadow-[0_8px_32px_rgba(0,0,0,0.15),0_0_0_1px_rgba(255,255,255,0.3)_inset] border-2 border-white/40">
                            
                            <!-- Pagination Info -->
                            <div class="flex justify-center mb-5">
                                <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-50 to-blue-100 px-5 py-2.5 rounded-2xl shadow-[0_4px_12px_rgba(59,130,246,0.2)]">
                                    <i class="fas fa-list-ul text-blue-600 text-sm"></i>
                                    <span class="text-blue-900 text-[13px] md:text-sm font-bold">
                                        Halaman 
                                        <span class="text-blue-600 font-black">{{ $gurus->currentPage() }}</span>
                                        dari
                                        <span class="text-blue-600 font-black">{{ $gurus->lastPage() }}</span>
                                        
                                        <span class="mx-2">•</span>
                                        
                                        <span class="text-blue-600 font-black">{{ $gurus->total() }}</span>
                                        Total Data
                                    </span>
                                </div>
                            </div>

                            <!-- Pagination Links -->
                            <nav role="navigation" aria-label="Pagination Navigation">
                                <ul class="flex items-center gap-2">
                                    {{-- Previous Page --}}
                                    @if ($gurus->onFirstPage())
                                        <li>
                                            <span class="flex items-center justify-center min-w-[38px] md:min-w-[44px] h-[38px] md:h-11 rounded-xl bg-gradient-to-br from-gray-50 to-gray-100 text-gray-300 border-2 border-gray-200 cursor-not-allowed">
                                                <i class="fas fa-chevron-left text-[13px]"></i>
                                            </span>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $gurus->previousPageUrl() }}" 
                                               class="flex items-center justify-center min-w-[38px] md:min-w-[44px] h-[38px] md:h-11 rounded-xl bg-gradient-to-br from-blue-50 to-sky-50 text-blue-600 font-bold text-sm border-2 border-blue-200 shadow-[0_2px_8px_rgba(59,130,246,0.15)] transition-all duration-300 hover:-translate-y-1 hover:bg-gradient-to-br hover:from-blue-100 hover:to-sky-100 hover:shadow-[0_4px_16px_rgba(59,130,246,0.3)] hover:border-blue-300"
                                               rel="prev">
                                                <i class="fas fa-chevron-left text-[13px]"></i>
                                            </a>
                                        </li>
                                    @endif

                                    {{-- Page Numbers --}}
                                    @foreach ($gurus->getUrlRange(1, $gurus->lastPage()) as $page => $url)
                                        @if ($page == $gurus->currentPage())
                                            <li>
                                                <span class="flex items-center justify-center min-w-[38px] md:min-w-[44px] h-[38px] md:h-11 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 text-white font-bold text-[13px] md:text-sm border-2 border-blue-600 shadow-[0_6px_20px_rgba(59,130,246,0.5),0_0_0_3px_rgba(59,130,246,0.2)] scale-[1.08]">
                                                    {{ $page }}
                                                </span>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ $url }}" 
                                                   class="flex items-center justify-center min-w-[38px] md:min-w-[44px] h-[38px] md:h-11 rounded-xl bg-gradient-to-br from-blue-50 to-sky-50 text-blue-600 font-bold text-[13px] md:text-sm border-2 border-blue-200 shadow-[0_2px_8px_rgba(59,130,246,0.15)] transition-all duration-300 hover:-translate-y-1 hover:bg-gradient-to-br hover:from-blue-100 hover:to-sky-100 hover:shadow-[0_4px_16px_rgba(59,130,246,0.3)] hover:border-blue-300">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach

                                    {{-- Next Page --}}
                                    @if ($gurus->hasMorePages())
                                        <li>
                                            <a href="{{ $gurus->nextPageUrl() }}" 
                                               class="flex items-center justify-center min-w-[38px] md:min-w-[44px] h-[38px] md:h-11 rounded-xl bg-gradient-to-br from-blue-50 to-sky-50 text-blue-600 font-bold text-sm border-2 border-blue-200 shadow-[0_2px_8px_rgba(59,130,246,0.15)] transition-all duration-300 hover:-translate-y-1 hover:bg-gradient-to-br hover:from-blue-100 hover:to-sky-100 hover:shadow-[0_4px_16px_rgba(59,130,246,0.3)] hover:border-blue-300"
                                               rel="next">
                                                <i class="fas fa-chevron-right text-[13px]"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <span class="flex items-center justify-center min-w-[38px] md:min-w-[44px] h-[38px] md:h-11 rounded-xl bg-gradient-to-br from-gray-50 to-gray-100 text-gray-300 border-2 border-gray-200 cursor-not-allowed">
                                                <i class="fas fa-chevron-right text-[13px]"></i>
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
            @endif
        </div>

        <!-- Scripts -->
        <script>
            // Initialize AOS
            AOS.init({
                once: true,
                duration: 600,
                easing: 'ease-out-cubic'
            });

            // 3D Tilt Effect
            document.querySelectorAll('.teacher-card').forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    const rotateX = (y - centerY) / 20;
                    const rotateY = (centerX - x) / 20;
                    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-16px)`;
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = '';
                });
            });

            // Smooth scroll on pagination
            document.querySelectorAll('nav a[href]').forEach(link => {
                link.addEventListener('click', function() {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            });
        </script>
    </body>

    </html>
@endsection