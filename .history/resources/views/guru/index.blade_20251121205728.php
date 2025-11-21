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

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(180deg, #D6E9F8 0%, #B8D9F0 100%);
      min-height: 100vh;
    }

    /* Card Styles */
    .teacher-card {
      background: white;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
    }

    .teacher-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    /* Photo Section */
    .photo-section {
      background: linear-gradient(180deg, #91C8E8 0%, #6BB4DD 100%);
      padding: 2.5rem 1.5rem 1.5rem;
      position: relative;
    }

    .teacher-photo {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      border: 5px solid white;
      object-fit: cover;
      margin: 0 auto;
      display: block;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .photo-placeholder {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      border: 5px solid white;
      background: white;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Badge Styles */
    .category-badge {
      position: absolute;
      top: 14px;
      left: 14px;
      background: rgba(255, 255, 255, 0.95);
      padding: 5px 14px;
      border-radius: 14px;
      font-size: 11px;
      font-weight: 700;
      color: #1E40AF;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .info-badge {
      background: #3B82F6;
      color: white;
      padding: 7px 18px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 7px;
      box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);
    }

    .star-icon {
      color: #FDB241;
      font-size: 10px;
    }

    /* Location Tag */
    .location-tag {
      color: #6B7280;
      font-size: 13px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 5px;
      margin-top: 10px;
    }

    /* Social Button */
    .social-btn {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      color: white;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    .social-btn:hover {
      transform: scale(1.1);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
    }

    /* Header Badge */
    .header-badge {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      padding: 10px 20px;
      border-radius: 24px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
    }

    .header-badge:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
    }

    .quote-card {
      background: white;
      border-radius: 16px;
      padding: 1.5rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      max-width: 700px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <!-- Header Section -->
  <header class="text-center py-12 px-4">
    <!-- Icon -->
    <div class="inline-block mb-5">
      <div class="w-20 h-20 mx-auto bg-white rounded-full flex items-center justify-center shadow-lg">
        <i class="fas fa-graduation-cap text-4xl text-blue-600"></i>
      </div>
    </div>
    
    <!-- Title -->
    <h1 class="text-4xl md:text-5xl font-bold text-blue-900 mb-6">
      Guru SMP Negeri 38 Palembang
    </h1>
    
    <!-- Quote Card -->
    <div class="quote-card">
      <p class="text-gray-700 text-sm md:text-base leading-relaxed">
        "Bertemu dengan tenaga pendidikan dan staff terbaik kami yang berperan penting dalam 
        membentuk masa depan siswa menuju generasi yang cerdas dan berakhlak mulia."
      </p>
    </div>

    <!-- Header Badges -->
    <div class="flex flex-wrap justify-center gap-4 mt-8">
      <div class="header-badge">
        <i class="fas fa-award text-blue-600"></i>
        <span class="text-gray-800 font-semibold text-sm">Profesional</span>
      </div>
      <div class="header-badge">
        <i class="fas fa-certificate text-blue-600"></i>
        <span class="text-gray-800 font-semibold text-sm">Bersertifikat</span>
      </div>
      <div class="header-badge">
        <i class="fas fa-heart text-blue-600"></i>
        <span class="text-gray-800 font-semibold text-sm">Berdedikasi</span>
      </div>
    </div>
  </header>

  <!-- Teachers Grid -->
  <section class="container mx-auto px-4 md:px-6 pb-20">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
      @forelse ($gurus as $guru)
        <div class="teacher-card">
          
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
                <i class="fas fa-user text-6xl text-gray-300"></i>
              </div>
            @endif
          </div>

          <!-- Info Section -->
          <div class="p-6 text-center">
            <!-- Name -->
            <h3 class="text-xl font-bold text-gray-900 mb-3">
              {{ $guru->nama }}
            </h3>

            <!-- Position Badge -->
            <div class="mb-3">
              <span class="info-badge">
                @if ($guru->kategori === 'Guru')
                  <span class="star-icon">★</span>
                  <span>{{ $guru->jabatan ?? 'Staff Organisasi' }}</span>
                  <span class="star-icon">★</span>
                @else
                  <span>{{ $guru->jabatan ?? 'Staff Organisasi' }}</span>
                @endif
              </span>
            </div>

            <!-- Subject (if available) -->
            @if ($guru->mata_pelajaran)
              <div class="mb-3">
                <span class="info-badge">
                  <i class="fas fa-book text-sm"></i>
                  <span>{{ $guru->mata_pelajaran }}</span>
                </span>
              </div>
            @endif

            <!-- Location -->
            <div class="location-tag">
              <i class="fas fa-map-marker-alt text-blue-500"></i>
              <span>Palembang</span>
            </div>

            <!-- Social Media -->
            <div class="flex justify-center gap-3 mt-5">
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

              @if (!$guru->instagram)
                <div class="text-gray-400 text-xs italic mt-2">
                  <i class="fas fa-link-slash mr-1"></i>
                  Tidak ada kontak
                </div>
              @endif
            </div>
          </div>
        </div>
      @empty
        <!-- Empty State -->
        <div class="col-span-full">
          <div class="teacher-card p-12 text-center">
            <div class="w-24 h-24 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
              <i class="fas fa-users-slash text-5xl text-blue-400"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Data</h3>
            <p class="text-gray-500">Data guru dan staff belum tersedia saat ini</p>
          </div>
        </div>
      @endforelse
    </div>
  </section>
</body>
</html>
@endsection