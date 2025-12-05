@extends('layouts.app')

@section('title', 'Guru SMP Negeri 38 Palembang')

@section('content')
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Guru SMP Negeri 38 Palembang</title>
        <link rel="stylesheet" href="{{ asset('css/guru.css') }}">

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

      
    </head>

    <body>
        <div class="content-wrapper">
            <!-- Header Section -->
            <header class="text-center py-16 px-4">
                <!-- Icon -->
                <div class="inline-block mb-6 header-icon">
                    <div
                        class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center shadow-2xl border-4 border-white/50">
                        <i class="fas fa-graduation-cap text-5xl shimmer-text"></i>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-6xl font-black text-white mb-8 drop-shadow-2xl">
                    <span class="shimmer-text">Guru SMP Negeri 38 Palembang</span>
                </h1>

                <!-- Quote Card -->
                <div class="quote-card" data-aos="fade-up">
                    <p class="text-gray-800 text-sm md:text-base leading-relaxed font-medium">
                        <i class="fas fa-quote-left text-blue-400 mr-2 text-2xl"></i>
                        Bertemu dengan tenaga pendidikan dan staff terbaik kami yang berperan penting dalam
                        membentuk masa depan siswa menuju generasi yang cerdas dan berakhlak mulia.
                        <i class="fas fa-quote-right text-blue-400 ml-2 text-2xl"></i>
                    </p>
                </div>

                <!-- Header Badges -->
                <div class="flex flex-wrap justify-center gap-5 mt-10" data-aos="fade-up" data-aos-delay="100">
                    <div class="header-badge">
                        <i class="fas fa-award text-blue-600 text-xl"></i>
                        <span class="text-gray-800 font-bold text-sm">Profesional</span>
                    </div>
                    <div class="header-badge">
                        <i class="fas fa-certificate text-blue-600 text-xl"></i>
                        <span class="text-gray-800 font-bold text-sm">Bersertifikat</span>
                    </div>
                    <div class="header-badge">
                        <i class="fas fa-heart text-blue-600 text-xl"></i>
                        <span class="text-gray-800 font-bold text-sm">Berdedikasi</span>
                    </div>
                </div>
            </header>

            <!-- Teachers Grid -->
            <section class="container mx-auto px-4 md:px-6 pb-12">
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    @forelse ($gurus as $guru)
                        <div class="teacher-card" data-aos="fade-up" data-aos-duration="600"
                            data-aos-delay="{{ $loop->index * 50 }}">

                            <!-- Photo Section -->
                            <div class="photo-section">
                                <!-- Category Badge -->
                                <div class="category-badge">
                                    <i class="fa-solid fa-briefcase"></i>
                                    <span>{{ $guru->kategori }}</span>
                                </div>

                                <!-- Photo -->
                                @if ($guru->foto)
                                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                        class="teacher-photo">
                                @else
                                    <div class="photo-placeholder">
                                        <i class="fas fa-user text-7xl text-gray-300"></i>
                                    </div>
                                @endif
                            </div>

                            <!-- Info Section -->
                            <div class="p-7 text-center">
                                <!-- Name -->
                                <h3 class="text-xl font-black text-gray-900 mb-4 name-decoration">
                                    {{ $guru->nama }}
                                </h3>

                                <!-- Position Badge -->
                                <div class="mb-4">
                                    <span class="info-badge">
                                        @if ($guru->kategori === 'Guru')
                                            <span class="star-icon">★</span>
                                            <span>{{ $guru->jabatan ?? 'Guru' }}</span>
                                            <span class="star-icon">★</span>
                                        @else
                                            <i class="fas fa-user-tie"></i>
                                            <span>{{ $guru->jabatan ?? 'Staff ' }}</span>
                                        @endif
                                    </span>
                                </div>

                                <!-- Subject (if available) -->
                                @if ($guru->mata_pelajaran)
                                    <div class="mb-4">
                                        <span class="info-badge">
                                            <i class="fas fa-book text-sm"></i>
                                            <span>{{ $guru->mata_pelajaran }}</span>
                                        </span>
                                    </div>
                                @endif

                                <!-- NIP (if available) -->
                                <!-- NIP untuk Guru dan Staff -->
@if ($guru->nip)
    <div class="mb-4 text-xs text-gray-600 font-semibold">
        <i class="fas fa-id-card text-blue-500 mr-1"></i>
        NIP: {{ $guru->nip }}
    </div>
@endif


                                <!-- Divider -->
                                <div
                                    class="w-16 h-1 bg-gradient-to-r from-blue-400 via-blue-500 to-blue-400 rounded-full mx-auto mb-5">
                                </div>

                                <!-- Social Media -->
                                <div class="flex justify-center gap-4">
                                    @if ($guru->facebook)
                                        <a href="{{ $guru->facebook }}" target="_blank" class="social-btn"
                                            style="background: linear-gradient(135deg, #1877F2 0%, #0C63D4 100%);"
                                            title="Facebook {{ $guru->nama }}" rel="noopener noreferrer">
                                            <i class="fab fa-facebook-f text-lg"></i>
                                        </a>
                                    @endif

                                    @if ($guru->instagram)
                                        <a href="{{ $guru->instagram }}" target="_blank" class="social-btn"
                                            style="background: linear-gradient(135deg, #E1306C 0%, #C13584 50%, #833AB4 100%);"
                                            title="Instagram {{ $guru->nama }}" rel="noopener noreferrer">
                                            <i class="fab fa-instagram text-lg"></i>
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
                            <div class="teacher-card p-16 text-center" data-aos="fade-up">
                                <div
                                    class="w-32 h-32 mx-auto bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center mb-6">
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
                        <div class="pagination-wrapper">
                            <!-- Pagination Info -->
                            <div class="flex justify-center mb-4">
                                <div class="pagination-info">
                                    <i class="fas fa-list-ul"></i>
                                    <span class="pagination-info-text">
                                        Halaman 
                                        <span class="pagination-info-numbers">{{ $gurus->currentPage() }}</span>
                                        dari
                                        <span class="pagination-info-numbers">{{ $gurus->lastPage() }}</span>
                                        
                                        <span class="mx-2">•</span>
                                        
                                        <span class="pagination-info-numbers">{{ $gurus->total() }}</span>
                                        Total Data
                                    </span>
                                </div>
                            </div>

                            <!-- Custom Pagination Links -->
                            <div class="pagination-container">
                                <nav role="navigation" aria-label="Pagination Navigation">
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($gurus->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link">
                                                    <i class="fas fa-chevron-left"></i>
                                                </span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a href="{{ $gurus->previousPageUrl() }}" class="page-link" rel="prev">
                                                    <i class="fas fa-chevron-left"></i>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @foreach ($gurus->getUrlRange(1, $gurus->lastPage()) as $page => $url)
                                            @if ($page == $gurus->currentPage())
                                                <li class="page-item active">
                                                    <span class="page-link">{{ $page }}</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endforeach

                                        {{-- Next Page Link --}}
                                        @if ($gurus->hasMorePages())
                                            <li class="page-item">
                                                <a href="{{ $gurus->nextPageUrl() }}" class="page-link" rel="next">
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">
                                                    <i class="fas fa-chevron-right"></i>
                                                </span>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        </div>

        <!-- Scripts -->
        <script>
            // Initialize AOS Animation
            AOS.init({
                once: true,
                duration: 600,
                easing: 'ease-out-cubic'
            });

            // 3D Tilt Effect on Cards
            document.querySelectorAll('.teacher-card').forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const rotateX = (y - centerY) / 20;
                    const rotateY = (centerX - x) / 20;

                    card.style.transform =
                        `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-16px)`;
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = '';
                });
            });

            // Parallax effect on scroll
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const parallax = document.querySelector('body::before');
                if (parallax) {
                    document.body.style.backgroundPosition = `center ${scrolled * 0.5}px`;
                }
            });

            // Smooth scroll to top when pagination is clicked
            document.querySelectorAll('.pagination a').forEach(link => {
                link.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            });
        </script>
    </body>

    </html>
@endsection