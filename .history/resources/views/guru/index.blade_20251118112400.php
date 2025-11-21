@extends('layouts.app')

@section('title', 'Guru & Staff SMP Negeri 38 Palembang')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guru & Staff SMP Negeri 38 Palembang</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#49ADFF',
            'blue-light': '#80C9FF',
            'blue-dark': '#2196F3',
          }
        }
      }
    }
  </script>

  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    .content-wrapper {
      position: relative;
      z-index: 1;
    }

    .teacher-card {
      background: white;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      border: 2px solid rgba(73, 173, 255, 0.1);
    }

    .teacher-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 20px 40px rgba(73, 173, 255, 0.3);
      border-color: #49ADFF;
    }

    .photo-wrapper {
      position: relative;
      overflow: hidden;
    }

    .photo-wrapper::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.4), transparent);
      transform: rotate(45deg);
      transition: all 0.6s;
    }

    .teacher-card:hover .photo-wrapper::before {
      left: 100%;
    }

    .teacher-photo {
      transition: all 0.5s ease;
    }

    .teacher-card:hover .teacher-photo {
      transform: scale(1.1);
    }

    .social-btn {
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
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
      transition: width 0.4s, height 0.4s;
    }

    .social-btn:hover::before {
      width: 100px;
      height: 100px;
    }

    .social-btn:hover {
      transform: translateY(-3px) scale(1.1);
    }

    .subject-badge {
      background: linear-gradient(135deg, #49ADFF 0%, #2196F3 100%);
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% {
        opacity: 1;
        transform: scale(1);
      }
      50% {
        opacity: 0.9;
        transform: scale(1.02);
      }
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0px);
      }
      50% {
        transform: translateY(-15px);
      }
    }

    .float-animation {
      animation: float 3s ease-in-out infinite;
    }

    @keyframes wave {
      0%, 100% {
        transform: rotate(0deg);
      }
      25% {
        transform: rotate(-10deg);
      }
      75% {
        transform: rotate(10deg);
      }
    }

    .wave-animation:hover {
      animation: wave 0.5s ease-in-out;
    }

    @keyframes shimmer {
      0% {
        background-position: -1000px 0;
      }
      100% {
        background-position: 1000px 0;
      }
    }

    .shimmer-text {
      background: linear-gradient(90deg, #49ADFF 0%, #80C9FF 50%, #49ADFF 100%);
      background-size: 1000px 100%;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: shimmer 3s linear infinite;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(73, 173, 255, 0.3);
    }

    .bg-blue-gradient {
      background: linear-gradient(135deg, #49ADFF 0%, #2196F3 100%);
    }

    .icon-decoration {
      position: relative;
    }

    .icon-decoration::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 60px;
      height: 60px;
      background: rgba(73, 173, 255, 0.2);
      border-radius: 50%;
      z-index: -1;
      animation: pulse-ring 2s infinite;
    }

    @keyframes pulse-ring {
      0% {
        transform: translate(-50%, -50%) scale(0.8);
        opacity: 1;
      }
      100% {
        transform: translate(-50%, -50%) scale(1.5);
        opacity: 0;
      }
    }
  </style>
</head>

<body>
  <div class="content-wrapper">
    <!-- Header Section -->
    <header class="text-center py-16 px-4">
      <div class="inline-block mb-4 float-animation">
        <div class="w-16 h-16 mx-auto bg-white rounded-full flex items-center justify-center shadow-2xl border-4 border-blue-400">
          <i class="fas fa-chalkboard-teacher text-3xl text-blue-500"></i>
        </div>
      </div>
      
      <h1 class="text-3xl md:text-4xl font-extrabold shimmer-text mb-4 drop-shadow-lg">
        Guru & Staff SMP Negeri 38 Palembang
      </h1>
      
      <div class="max-w-4xl mx-auto glass-card rounded-3xl p-6 mt-6 shadow-2xl">
        <p class="text-gray-700 text-sm md:text-base leading-relaxed">
          <i class="fas fa-quote-left text-blue-400 mr-2"></i>
          Bertemu dengan tenaga pendidik dan staf terbaik kami yang berperan penting dalam 
          <span class="font-bold text-blue-600">membentuk masa depan siswa</span> menuju generasi yang cerdas dan berakhlak mulia
          <i class="fas fa-quote-right text-blue-400 ml-2"></i>
        </p>
      </div>

      <div class="flex flex-wrap justify-center gap-3 mt-6">
        <div class="glass-card px-4 py-2 rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-105">
          <i class="fas fa-award text-blue-500 mr-2 text-sm"></i>
          <span class="text-gray-700 font-semibold text-xs">Profesional</span>
        </div>
        <div class="glass-card px-4 py-2 rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-105">
          <i class="fas fa-certificate text-blue-500 mr-2 text-sm"></i>
          <span class="text-gray-700 font-semibold text-xs">Bersertifikat</span>
        </div>
        <div class="glass-card px-4 py-2 rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-105">
          <i class="fas fa-heart text-blue-500 mr-2 text-sm"></i>
          <span class="text-gray-700 font-semibold text-xs">Berdedikasi</span>
        </div>
      </div>
    </header>

    <!-- Teachers Grid -->
   @extends('layouts.app')

@section('title', 'Guru & Staff SMP Negeri 38 Palembang')

@section('content')
<div class="content-wrapper">

  <!-- HEADER -->
  <header class="text-center py-16 px-4">
    <div class="inline-block mb-4 float-animation">
      <div class="w-16 h-16 mx-auto bg-white rounded-full flex items-center justify-center shadow-2xl border-4 border-blue-400">
        <i class="fas fa-chalkboard-teacher text-3xl text-blue-500"></i>
      </div>
    </div>

    <h1 class="text-3xl md:text-4xl font-extrabold shimmer-text mb-4 drop-shadow-lg">
      Guru & Staff SMP Negeri 38 Palembang
    </h1>

    <div class="max-w-4xl mx-auto glass-card rounded-3xl p-6 mt-6 shadow-2xl">
      <p class="text-gray-700 text-sm md:text-base leading-relaxed">
        <i class="fas fa-quote-left text-blue-400 mr-2"></i>
        Bertemu dengan tenaga pendidik dan staf terbaik kami yang berperan penting dalam 
        <span class="font-bold text-blue-600">membentuk masa depan siswa</span> menuju generasi yang cerdas dan berakhlak mulia
        <i class="fas fa-quote-right text-blue-400 ml-2"></i>
      </p>
    </div>

    <div class="flex flex-wrap justify-center gap-3 mt-6">
      {{-- header badges --}}
      @php
        $badges = [
          ['icon' => 'fa-award', 'text' => 'Profesional'],
          ['icon' => 'fa-certificate', 'text' => 'Bersertifikat'],
          ['icon' => 'fa-heart', 'text' => 'Berdedikasi'],
        ];
      @endphp

      @foreach ($badges as $item)
        <div class="glass-card px-4 py-2 rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-105">
          <i class="fas {{ $item['icon'] }} text-blue-500 mr-2 text-sm"></i>
          <span class="text-gray-700 font-semibold text-xs">{{ $item['text'] }}</span>
        </div>
      @endforeach
    </div>
  </header>

  <!-- GRID GURU -->
  <section class="container mx-auto px-4 md:px-6 pb-20">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
      @forelse ($gurus as $guru)
        <div data-aos="fade-up"
             data-aos-duration="700"
             data-aos-delay="{{ $loop->index * 50 }}"
             class="teacher-card relative rounded-3xl overflow-hidden shadow-xl">

          {{-- badge kategori pojok kiri atas --}}
          <div class="absolute top-4 left-4 z-20">
            <span class="px-3 py-1.5 rounded-full text-white text-xs font-semibold shadow-lg {{ $guru->kategori === 'Guru' ? 'bg-blue-600' : 'bg-green-600' }}">
              <i class="fas fa-user-tag mr-1 text-xs"></i>
              {{ $guru->kategori }}
            </span>
          </div>

          {{-- photo --}}
          <div class="photo-wrapper bg-blue-gradient p-8 relative">
            <div class="absolute top-4 right-4 wave-animation">
              <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-lg icon-decoration">
                <i class="fas fa-user-graduate text-blue-500 text-xl"></i>
              </div>
            </div>

            @if ($guru->foto)
              <img src="{{ asset('storage/' . $guru->foto) }}"
                   alt="{{ $guru->nama }}"
                   class="teacher-photo w-40 h-40 mx-auto rounded-full border-4 border-white object-cover shadow-2xl ring-4 ring-blue-200">
            @else
              <div class="teacher-photo w-40 h-40 mx-auto rounded-full border-4 border-white bg-gray-100 flex items-center justify-center shadow-2xl ring-4 ring-blue-200">
                <i class="fas fa-user text-6xl text-gray-300"></i>
              </div>
            @endif
          </div>

          {{-- info --}}
          <div class="p-6 text-center">
            <h3 class="text-lg font-bold text-gray-800 mb-1 capitalize hover:text-blue-600 transition-colors">
              {{ $guru->nama }}
            </h3>

            @if ($guru->kategori === 'Guru' && $guru->nip)
              <p class="text-center text-gray-600 text-xs font-semibold mb-2 bg-blue-50 px-3 py-1.5 rounded-full border border-blue-200 shadow-sm inline-block mx-auto">
                <i class="fas fa-id-card text-blue-500 mr-1 text-sm"></i>
                NIP: {{ $guru->nip }}
              </p>
            @endif

            <p class="text-gray-600 text-xs font-semibold uppercase tracking-wider mb-3">
              {{ $guru->jabatan ?? 'Tenaga Pendidik' }}
            </p>

            @if ($guru->mata_pelajaran)
              <div class="mb-3 flex justify-center">
                <span class="subject-badge inline-block px-4 py-1.5 rounded-full text-white text-xs font-semibold shadow-lg">
                  <i class="fas fa-book-open mr-1.5"></i> {{ $guru->mata_pelajaran }}
                </span>
              </div>
            @endif

            <div class="relative mb-4">
              <div class="border-t-2 border-blue-100"></div>
              <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white px-2">
                <i class="fas fa-share-alt text-blue-400 text-xs"></i>
              </div>
            </div>

            <div class="flex justify-center gap-3 mb-3">
              @if ($guru->facebook)
                <a href="{{ $guru->facebook }}" target="_blank" class="social-btn w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white shadow-lg hover:shadow-2xl hover:bg-blue-700" title="Facebook {{ $guru->nama }}">
                  <i class="fab fa-facebook-f text-sm"></i>
                </a>
              @endif

              @if ($guru->instagram)
                <a href="{{ $guru->instagram }}" target="_blank" class="social-btn w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 via-pink-500 to-orange-400 flex items-center justify-center text-white shadow-lg hover:shadow-2xl" title="Instagram {{ $guru->nama }}">
                  <i class="fab fa-instagram text-sm"></i>
                </a>
              @endif

              @if (!$guru->facebook && !$guru->instagram)
                <div class="text-gray-400 text-xs italic flex items-center gap-1.5">
                  <i class="fas fa-link-slash text-xs"></i>
                  <span>Tidak ada kontak</span>
                </div>
              @endif
            </div>

            <div class="mt-4 flex justify-center gap-1">
              <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
              <div class="w-2 h-2 bg-blue-300 rounded-full"></div>
              <div class="w-2 h-2 bg-blue-200 rounded-full"></div>
            </div>
          </div>
        </div>

      @empty
        <div class="col-span-full">
          <div class="glass-card rounded-3xl p-12 text-center shadow-2xl">
            <div class="w-24 h-24 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
              <i class="fas fa-users-slash text-4xl text-blue-400"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-700 mb-2">Belum Ada Data</h3>
            <p class="text-gray-500 text-sm">Data guru dan staff belum tersedia saat ini</p>
          </div>
        </div>
      @endforelse

    </div>
  </section>
</div>


  <script>
    // Initialize AOS
    AOS.init({ 
      once: true,
      duration: 700,
      easing: 'ease-out-cubic'
    });

    // Add 3D tilt effect to cards
    document.querySelectorAll('.teacher-card').forEach(card => {
      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        const rotateX = (y - centerY) / 25;
        const rotateY = (centerX - x) / 25;
        
        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-12px)`;
      });
      
      card.addEventListener('mouseleave', () => {
        card.style.transform = '';
      });
    });
  </script>
</body>
</html>
@endsection