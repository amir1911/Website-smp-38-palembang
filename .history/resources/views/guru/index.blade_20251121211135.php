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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #e0e7ff 0%, #dbeafe 50%, #e0f2fe 100%);
      background-size: 400% 400%;
      animation: gradientShift 15s ease infinite;
      min-height: 100vh;
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                  radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
      pointer-events: none;
      z-index: 1;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .content-wrapper {
      position: relative;
      z-index: 2;
    }

    /* Card Styles with Glass Effect */
    .teacher-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 28px;
      overflow: hidden;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15), 
                  0 0 0 1px rgba(255, 255, 255, 0.3) inset;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      border: 2px solid rgba(255, 255, 255, 0.4);
    }

    .teacher-card:hover {
      transform: translateY(-16px) rotateX(5deg);
      box-shadow: 0 24px 48px rgba(0, 0, 0, 0.25),
                  0 0 0 1px rgba(255, 255, 255, 0.5) inset,
                  0 0 60px rgba(59, 130, 246, 0.4);
      border-color: rgba(255, 255, 255, 0.6);
    }

    /* Photo Section with Advanced Effects */
    .photo-section {
      background: linear-gradient(135deg, #93c5fd 0%, #60a5fa 100%);
      padding: 2.5rem 1.5rem 1.5rem;
      position: relative;
      overflow: hidden;
    }

    .photo-section::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, 
        transparent 30%, 
        rgba(255, 255, 255, 0.4) 50%, 
        transparent 70%);
      transform: rotate(45deg);
      transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .teacher-card:hover .photo-section::before {
      left: 100%;
    }

    .photo-section::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 50% 50%, transparent 40%, rgba(0, 0, 0, 0.1) 100%);
      pointer-events: none;
    }

    .teacher-photo {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      border: 6px solid white;
      object-fit: cover;
      margin: 0 auto;
      display: block;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2),
                  0 0 0 4px rgba(255, 255, 255, 0.3);
      transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      z-index: 2;
    }

    .teacher-card:hover .teacher-photo {
      transform: scale(1.15) rotate(5deg);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.3),
                  0 0 0 6px rgba(255, 255, 255, 0.5);
    }

    .photo-placeholder {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      border: 6px solid white;
      background: white;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2),
                  0 0 0 4px rgba(255, 255, 255, 0.3);
      transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      z-index: 2;
    }

    .teacher-card:hover .photo-placeholder {
      transform: scale(1.15) rotate(5deg);
    }

    /* Badge Styles */
    .category-badge {
      position: absolute;
      top: 16px;
      left: 16px;
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(10px);
      padding: 6px 16px;
      border-radius: 16px;
      font-size: 11px;
      font-weight: 800;
      color: #2563eb;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      display: flex;
      align-items: center;
      gap: 6px;
      z-index: 10;
      animation: badgePulse 2s ease-in-out infinite;
      border: 1px solid rgba(37, 99, 235, 0.3);
    }

    @keyframes badgePulse {
      0%, 100% {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
      }
      50% {
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.4);
      }
    }

    .info-badge {
      background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
      color: white;
      padding: 8px 20px;
      border-radius: 24px;
      font-size: 12px;
      font-weight: 700;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
      transition: all 0.3s ease;
    }

    .info-badge:hover {
      transform: scale(1.05);
      box-shadow: 0 6px 16px rgba(59, 130, 246, 0.5);
    }

    .star-icon {
      color: #FFD700;
      font-size: 11px;
      animation: starTwinkle 2s ease-in-out infinite;
    }

    @keyframes starTwinkle {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.7; transform: scale(0.9); }
    }

    /* Location Tag */
    .location-tag {
      color: #6B7280;
      font-size: 13px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 5px;
      margin-top: 12px;
      padding: 6px 14px;
      background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
      border-radius: 20px;
      display: inline-flex;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    /* Social Button */
    .social-btn {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      color: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      position: relative;
      overflow: hidden;
    }

    .social-btn::before {
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

    .social-btn:hover::before {
      width: 100%;
      height: 100%;
    }

    .social-btn:hover {
      transform: translateY(-4px) scale(1.15) rotate(10deg);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    /* Header Styles */
    .header-icon {
      animation: floatIcon 3s ease-in-out infinite;
    }

    @keyframes floatIcon {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
    }

    .header-badge {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(15px);
      padding: 12px 24px;
      border-radius: 28px;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      border: 2px solid rgba(255, 255, 255, 0.5);
    }

    .header-badge:hover {
      transform: translateY(-4px) scale(1.05);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
      border-color: rgba(255, 255, 255, 0.8);
    }

    .quote-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 24px;
      padding: 2rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
      max-width: 750px;
      margin: 0 auto;
      border: 2px solid rgba(255, 255, 255, 0.5);
      position: relative;
      overflow: hidden;
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

    @keyframes borderGlow {
      0%, 100% { opacity: 0.3; }
      50% { opacity: 0.8; }
    }

    .shimmer-text {
      background: linear-gradient(90deg, #3b82f6 0%, #2563eb 25%, #1d4ed8 50%, #2563eb 75%, #3b82f6 100%);
      background-size: 200% 100%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: shimmer 3s linear infinite;
    }

    @keyframes shimmer {
      0% { background-position: -200% 0; }
      100% { background-position: 200% 0; }
    }

    /* Decorative Elements */
    .name-decoration {
      position: relative;
      display: inline-block;
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
  </style>
</head>

<body>
  <div class="content-wrapper">
    <!-- Header Section -->
    <header class="text-center py-16 px-4">
      <!-- Icon -->
      <div class="inline-block mb-6 header-icon">
        <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center shadow-2xl border-4 border-white/50">
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
    <section class="container mx-auto px-4 md:px-6 pb-24">
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
        @forelse ($gurus as $guru)
          <div class="teacher-card" 
               data-aos="fade-up" 
               data-aos-duration="600"
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
                <img src="{{ asset('storage/' . $guru->foto) }}" 
                     alt="{{ $guru->nama }}"
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
                    <span>{{ $guru->jabatan ?? 'Staff Organisasi' }}</span>
                    <span class="star-icon">★</span>
                  @else
                    <i class="fas fa-user-tie"></i>
                    <span>{{ $guru->jabatan ?? 'Staff Organisasi' }}</span>
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
              @if ($guru->kategori === 'Guru' && $guru->nip)
                <div class="mb-4 text-xs text-gray-600 font-semibold">
                  <i class="fas fa-id-card text-blue-500 mr-1"></i>
                  NIP: {{ $guru->nip }}
                </div>
              @endif

              <!-- Location -->
              <div class="flex justify-center mb-5">
                <div class="location-tag">
                  <i class="fas fa-map-marker-alt text-blue-600"></i>
                  <span class="font-semibold">Palembang</span>
                </div>
              </div>

              <!-- Divider -->
              <div class="w-16 h-1 bg-gradient-to-r from-blue-400 via-blue-500 to-blue-400 rounded-full mx-auto mb-5"></div>

              <!-- Social Media -->
              <div class="flex justify-center gap-4">
                @if ($guru->facebook)
                  <a href="{{ $guru->facebook }}" 
                     target="_blank"
                     class="social-btn"
                     style="background: linear-gradient(135deg, #1877F2 0%, #0C63D4 100%);"
                     title="Facebook {{ $guru->nama }}"
                     rel="noopener noreferrer">
                    <i class="fab fa-facebook-f text-lg"></i>
                  </a>
                @endif

                @if ($guru->instagram)
                  <a href="{{ $guru->instagram }}" 
                     target="_blank"
                     class="social-btn"
                     style="background: linear-gradient(135deg, #E1306C 0%, #C13584 50%, #833AB4 100%);"
                     title="Instagram {{ $guru->nama }}"
                     rel="noopener noreferrer">
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
        
        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-16px)`;
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
  </script>
</body>
</html>
@endsection