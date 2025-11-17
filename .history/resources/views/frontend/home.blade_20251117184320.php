@extends('layouts.app')

@section('content')
<!-- Import Google Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Modern Carousel Section - Blue Theme -->
<section class="relative w-full overflow-hidden font-[Poppins] bg-gradient-to-br from-blue-50 via-cyan-50 to-sky-100" 
     x-data="{ 
         current: 1, 
         total: {{ count($carousels) }},
         autoplay: true,
         progress: 0
     }" 
     x-init="
         setInterval(() => { 
             if (autoplay) {
                 current = current === total ? 1 : current + 1;
                 progress = 0;
             }
         }, 5000);
         setInterval(() => {
             if (autoplay) {
                 progress = progress >= 100 ? 0 : progress + 2;
             }
         }, 100);
     "
     @mouseenter="autoplay = false"
     @mouseleave="autoplay = true">

    <!-- Slide Items -->
    <template x-for="(item, index) in {{ $carousels->toJson() }}" :key="index">
        <div 
            x-show="current === index + 1" 
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 scale-95 blur-sm"
            x-transition:enter-end="opacity-100 scale-100 blur-0"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="relative w-full h-[320px] sm:h-[450px] md:h-[550px] lg:h-[650px] xl:h-[700px]">

            <!-- Image Container with Modern Frame -->
            <div class="relative w-full h-full overflow-hidden rounded-3xl mx-auto max-w-[95%] sm:max-w-full 
                        shadow-[0_20px_60px_rgba(59,130,246,0.3)] 
                        ring-4 ring-blue-200/50 ring-offset-4 ring-offset-blue-50">
                <img :src="'/storage/' + item.gambar" 
                     :alt="item.judul" 
                     class="w-full h-full object-cover scale-105 hover:scale-110 transition-transform duration-[3000ms]">
                
                <!-- Blue Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-900/70 via-cyan-800/40 to-transparent"></div>
                
                <!-- Animated Wave Pattern -->
                <div class="absolute bottom-0 left-0 right-0 h-32 opacity-20">
                    <svg class="w-full h-full" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M0,60 C300,100 600,20 900,60 C1050,80 1200,60 1200,60 L1200,120 L0,120 Z" fill="#3B82F6" class="animate-wave"/>
                    </svg>
                </div>

                <!-- Corner Accents -->
                <div class="absolute top-0 left-0 w-24 h-24 border-t-4 border-l-4 border-cyan-400/60 rounded-tl-3xl"></div>
                <div class="absolute bottom-0 right-0 w-24 h-24 border-b-4 border-r-4 border-blue-400/60 rounded-br-3xl"></div>
            </div>

            <!-- Content Overlay -->
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6 sm:px-8 md:px-12 lg:px-16">
                <!-- Decorative Badge -->
                <div class="mb-4 sm:mb-6 animate-[bounceIn_1s_ease-out]">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 blur-xl opacity-50 rounded-full"></div>
                        <div class="relative bg-gradient-to-r from-cyan-400 via-blue-400 to-blue-500 px-6 py-2 rounded-full
                                    shadow-[0_0_30px_rgba(59,130,246,0.5)]">
                            <span class="text-white font-bold text-xs sm:text-sm tracking-wider">FEATURED</span>
                        </div>
                    </div>
                </div>

                <!-- Title with Glass Effect -->
                <div class="relative mb-4 sm:mb-6">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-cyan-600/20 backdrop-blur-xl rounded-2xl transform -rotate-1"></div>
                    <h3 class="relative text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-black text-white 
                               mb-3 sm:mb-4 leading-tight px-6 py-3
                               drop-shadow-[0_4px_20px_rgba(0,0,0,0.5)]
                               bg-gradient-to-r from-cyan-300 via-blue-300 to-sky-200 bg-clip-text text-transparent
                               animate-[fadeInUp_0.8s_ease-out]" 
                        x-text="item.judul"
                        style="text-shadow: 2px 2px 10px rgba(59,130,246,0.8), 0 0 30px rgba(59,130,246,0.4);
                               -webkit-text-stroke: 1px rgba(255,255,255,0.3);"></h3>
                </div>

                <!-- Subtitle -->
                <p class="text-sm sm:text-base md:text-lg lg:text-xl text-blue-100 max-w-3xl mx-auto
                          drop-shadow-[0_2px_10px_rgba(0,0,0,0.8)]
                          bg-blue-900/20 backdrop-blur-sm px-6 py-3 rounded-xl
                          animate-[fadeInUp_1s_ease-out_0.2s_both]"
                   x-text="item.deskripsi || ''"></p>

                <!-- CTA Button -->
                <div class="mt-6 sm:mt-8 animate-[fadeInUp_1.2s_ease-out_0.4s_both]">
                    <button class="group relative bg-gradient-to-r from-cyan-400 via-blue-500 to-blue-600 
                                   hover:from-cyan-500 hover:via-blue-600 hover:to-blue-700
                                   text-white font-bold px-8 sm:px-10 py-3 sm:py-3.5 rounded-full
                                   transform hover:scale-105 hover:-translate-y-1 transition-all duration-300
                                   shadow-[0_10px_40px_rgba(59,130,246,0.4)] hover:shadow-[0_15px_50px_rgba(59,130,246,0.6)]
                                   overflow-hidden">
                        <span class="relative z-10 flex items-center space-x-2">
                            <span>Selengkapnya</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                            </svg>
                        </span>
                        <div class="absolute inset-0 bg-white/20 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-500"></div>
                    </button>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation Buttons - Blue Theme -->
    <div class="absolute inset-0 flex justify-between items-center px-3 sm:px-6 md:px-8 lg:px-12 pointer-events-none">
        <button @click="current = current === 1 ? total : current - 1; progress = 0;" 
                class="pointer-events-auto group relative 
                       bg-gradient-to-br from-cyan-400 to-blue-500
                       hover:from-cyan-500 hover:to-blue-600
                       text-white rounded-full 
                       p-3 sm:p-4 md:p-5 transition-all duration-300 
                       transform hover:scale-110 hover:-translate-x-2
                       shadow-[0_10px_40px_rgba(59,130,246,0.4)] hover:shadow-[0_15px_50px_rgba(59,130,246,0.6)]
                       ring-2 ring-white/30">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <div class="absolute inset-0 rounded-full bg-white/0 group-hover:bg-white/20 transition-colors"></div>
        </button>
        <button @click="current = current === total ? 1 : current + 1; progress = 0;" 
                class="pointer-events-auto group relative 
                       bg-gradient-to-br from-cyan-400 to-blue-500
                       hover:from-cyan-500 hover:to-blue-600
                       text-white rounded-full 
                       p-3 sm:p-4 md:p-5 transition-all duration-300 
                       transform hover:scale-110 hover:translate-x-2
                       shadow-[0_10px_40px_rgba(59,130,246,0.4)] hover:shadow-[0_15px_50px_rgba(59,130,246,0.6)]
                       ring-2 ring-white/30">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6 md:w-7 md:h-7 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
            <div class="absolute inset-0 rounded-full bg-white/0 group-hover:bg-white/20 transition-colors"></div>
        </button>
    </div>

    <!-- Modern Progress Indicators -->
    <div class="absolute bottom-6 sm:bottom-8 left-0 right-0 flex flex-col items-center space-y-4 sm:space-y-5">
        <!-- Progress Bars -->
        <div class="flex justify-center space-x-2 sm:space-x-3">
            <template x-for="i in total" :key="i">
                <div class="relative group cursor-pointer" @click="current = i; progress = 0;">
                    <!-- Glow Effect -->
                    <div x-show="current === i" 
                         class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 blur-md opacity-50 rounded-full scale-150"></div>
                    
                    <!-- Track -->
                    <div class="relative w-12 sm:w-16 md:w-20 h-1.5 sm:h-2 bg-white/30 backdrop-blur-sm rounded-full overflow-hidden
                                ring-1 ring-white/20">
                        <!-- Progress -->
                        <div 
                            x-show="current === i"
                            class="h-full bg-gradient-to-r from-cyan-400 via-blue-400 to-blue-500 rounded-full 
                                   shadow-[0_0_15px_rgba(59,130,246,0.8)]
                                   transition-all duration-100 ease-linear"
                            :style="`width: ${current === i ? progress : 0}%`">
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Counter with Glass Effect -->
        <div class="flex items-center space-x-3 bg-gradient-to-r from-blue-600/40 to-cyan-600/40 
                    backdrop-blur-xl px-6 py-2.5 rounded-full
                    ring-2 ring-white/30
                    shadow-[0_8px_32px_rgba(59,130,246,0.3)]">
            <div class="flex items-center space-x-2">
                <span class="text-white text-base sm:text-lg font-bold" x-text="current"></span>
                <div class="w-px h-4 bg-white/40"></div>
                <span class="text-blue-100 text-sm sm:text-base font-medium" x-text="total"></span>
            </div>
        </div>
    </div>

    <!-- Pause/Play Button -->
    <button @click="autoplay = !autoplay; progress = 0;"
            class="absolute top-5 sm:top-6 right-5 sm:right-6 
                   bg-gradient-to-br from-blue-500 to-cyan-600
                   hover:from-blue-600 hover:to-cyan-700
                   text-white rounded-full p-2.5 sm:p-3
                   transition-all duration-300 transform hover:scale-110 hover:rotate-90
                   shadow-[0_8px_30px_rgba(59,130,246,0.4)] hover:shadow-[0_10px_40px_rgba(59,130,246,0.6)]
                   ring-2 ring-white/30
                   z-10">
        <svg x-show="autoplay" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
        </svg>
        <svg x-show="!autoplay" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M8 5v14l11-7z"/>
        </svg>
    </button>

    <!-- Floating Decorative Elements -->
    <div class="absolute top-10 left-10 w-20 h-20 bg-cyan-400/10 rounded-full blur-2xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-32 h-32 bg-blue-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
</section>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounceIn {
    0% {
        opacity: 0;
        transform: scale(0.3);
    }
    50% {
        opacity: 1;
        transform: scale(1.05);
    }
    70% {
        transform: scale(0.9);
    }
    100% {
        transform: scale(1);
    }
}

@keyframes wave {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.animate-wave {
    animation: wave 3s ease-in-out infinite;
}
</style>

<!-- Section Sambutan Kepala Sekolah -->
<section class="bg-[#49ADFF] text-white py-12 sm:py-16 md:py-20 lg:py-24 font-[Poppins] overflow-hidden">
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-10 lg:gap-12 items-center px-4 sm:px-6 md:px-8">

    <!-- Foto Kepala Sekolah -->
    <div class="flex flex-col items-center" data-aos="fade-right" data-aos-duration="800">
      <div class="border-4 border-cyan-300 rounded-2xl overflow-hidden shadow-2xl w-[240px] sm:w-[280px] md:w-[320px] lg:w-[380px] xl:w-[420px] transform hover:scale-105 transition-all duration-700">
        <img src="{{ asset('storage/guru/windah.jpg') }}" 
             alt="Kepala Sekolah" 
             class="w-full h-[240px] sm:h-[280px] md:h-[340px] lg:h-[400px] object-cover">
      </div>
      <h2 class="mt-4 text-xl sm:text-2xl md:text-3xl font-semibold animate-bounce-slow">Windah</h2>
      <p class="text-sm sm:text-base text-cyan-200 mt-1">Kepala Sekolah</p>
    </div>

    <!-- Teks Sambutan -->
    <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
      <h3 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-3 md:mb-4">Sambutan Kepala Sekolah</h3>
      <p class="italic mb-4 text-sm sm:text-base md:text-lg">Assalamu'alaikum warahmatullahi wabarakatuh</p>
      <p class="text-justify text-sm sm:text-base md:text-lg leading-relaxed mb-3">
        Puji syukur kita panjatkan ke hadirat Allah SWT, karena atas rahmat dan karunia-Nya,
        SMP Negeri 38 Palembang dapat terus berkomitmen memberikan pendidikan terbaik bagi
        generasi penerus bangsa...
      </p>
    </div>
  </div>
</section>

<!-- Section Profil Sekolah -->
<section class="bg-white py-16 sm:py-20 md:py-24 lg:py-28 font-[Poppins] overflow-hidden">
  <div class="max-w-7xl mx-auto flex flex-col-reverse lg:grid lg:grid-cols-2 gap-8 md:gap-10 lg:gap-12 items-center px-4 sm:px-6 md:px-8">

    <!-- Kiri: Teks Profil -->
    <div data-aos="fade-right" data-aos-duration="800" class="text-center lg:text-left">
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#49ADFF] mb-2">
        SMP NEGERI 38
      </h2>
      <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black mb-4 md:mb-6">
        PALEMBANG
      </h3>

      <div class="h-[3px] bg-black mx-auto lg:mx-0 w-1/2 sm:w-2/3 mb-6 md:mb-8"></div>

      <p class="text-gray-700 text-base sm:text-lg md:text-xl mb-6 md:mb-8 leading-relaxed">
        SMP Negeri 38 Palembang merupakan sekolah unggulan berbasis 
        <span class="font-medium">Kurikulum Merdeka</span> yang berkomitmen membentuk generasi
        berkarakter, mandiri, dan kreatif dalam menghadapi tantangan masa depan.
      </p>

      <a href="/profile"
         class="inline-flex items-center justify-center gap-2 bg-[#49ADFF] text-white px-6 sm:px-8 py-3 sm:py-3.5 md:py-4 rounded-full shadow-md hover:bg-[#2796f0] transition-all duration-500 transform hover:scale-105 text-sm sm:text-base md:text-lg">
        Learn More
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>

    <!-- Kanan: Logo Sekolah -->
    <div class="flex justify-center mb-10 lg:mb-0" data-aos="zoom-in-up" data-aos-duration="800" data-aos-delay="200">
      <div class="bg-gradient-to-br from-[#F9FBFF] to-[#E9F3FF] shadow-xl rounded-3xl p-6 sm:p-8 md:p-10 hover:scale-105 transition-transform duration-500">
        <img src="{{ asset('storage/logo/smp38palembang.jpg') }}" 
             alt="Logo Sekolah"
             class="w-[200px] sm:w-[260px] md:w-[340px] lg:w-[420px] h-auto object-contain mx-auto animate-float">
      </div>
    </div>

  </div>
</section>


<!-- Section Ekstrakurikuler -->
<section 
  class="max-w-7xl mx-auto mt-12 sm:mt-16 md:mt-20 px-4 sm:px-6 md:px-8 relative mb-16"
  x-data="{ 
    scrollLeft() { $refs.carousel.scrollBy({ left: -350, behavior: 'smooth' }) }, 
    scrollRight() { $refs.carousel.scrollBy({ left: 350, behavior: 'smooth' }) } 
  }"
>
  <!-- Judul -->
  <h2 
    class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-extrabold text-center mb-8 sm:mb-10 md:mb-12 bg-gradient-to-r from-[#007BFF] to-[#00D4FF] bg-clip-text text-transparent select-none"
    data-aos="fade-up"
    data-aos-duration="800"
  >
    Kegiatan Ekstrakurikuler
  </h2>

  <!-- Tombol Navigasi Kiri -->
  <button 
    @click="scrollLeft"
    class="hidden lg:flex absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 bg-white/80 backdrop-blur-md p-3 rounded-full shadow-lg hover:bg-[#007BFF] hover:text-white transition-all duration-300 z-10 hover:scale-110"
  >
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
  </button>

  <!-- Carousel -->
  <div 
    x-ref="carousel"
    class="flex gap-6 md:gap-8 overflow-x-auto scrollbar-hide snap-x snap-mandatory scroll-smooth pb-8 cursor-grab active:cursor-grabbing px-2"
  >
    @foreach($ekstrakurikulers as $index => $item)
      <div 
        class="flex-shrink-0 w-64 sm:w-72 md:w-80 lg:w-[340px] bg-white/80 backdrop-blur-xl rounded-3xl shadow-lg hover:shadow-2xl border border-white/30 transition-all duration-500 transform hover:-translate-y-2 hover:scale-[1.02] snap-center"
        data-aos="zoom-in"
        data-aos-duration="800"
        data-aos-delay="{{ $index * 100 }}"
      >
        <!-- Gambar -->
        <div class="flex items-center justify-center h-48 sm:h-52 md:h-56 bg-gradient-to-br from-[#f7fbff] to-[#eef5ff] rounded-t-3xl">
          <img 
            src="{{ asset('storage/' . $item->foto) }}" 
            alt="{{ $item->nama_kegiatan }}" 
            class="max-h-44 sm:max-h-48 md:max-h-52 max-w-[90%] object-contain rounded-xl transition-transform duration-700 hover:scale-105"
          >
        </div>

        <!-- Konten -->
        <div class="p-5 text-center select-none">
          <h3 class="text-base sm:text-lg md:text-xl font-semibold text-gray-800 mb-2">
            {{ $item->nama_kegiatan }}
          </h3>
          <p class="text-gray-600 text-sm md:text-base leading-relaxed">
            {{ Str::limit($item->deskripsi, 100) }}
          </p>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Tombol Navigasi Kanan -->
  <button 
    @click="scrollRight"
    class="hidden lg:flex absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 bg-white/80 backdrop-blur-md p-3 rounded-full shadow-lg hover:bg-[#007BFF] hover:text-white transition-all duration-300 z-10 hover:scale-110"
  >
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
    </svg>
  </button>
</section>

<!-- Section Keunggulan Sekolah -->
<section class="py-12 sm:py-16 md:py-20 bg-gradient-to-b from-white to-gray-50 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 text-center">
    <h3 class="text-[#49ADFF] text-xs sm:text-sm md:text-base font-semibold mb-2" data-aos="fade-down" data-aos-duration="800">Our Service</h3>
    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-8 sm:mb-10 md:mb-12" data-aos="fade-down" data-aos-duration="800" data-aos-delay="100">
      Keunggulan Sekolah Kami
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10">
      @foreach([
        ['icon' => 'sekolah.png', 'judul' => 'Sistem Smart School', 'deskripsi' => 'Sekolah kami mulai menerapkan Sistem Smart School sebagai upaya memanfaatkan teknologi dalam kegiatan sekolah.'],
        ['icon' => 'Terakreditasi A.png', 'judul' => 'Terakreditasi A', 'deskripsi' => 'Sekolah kami berstatus Akreditasi A, yang menunjukkan kualitas pembelajaran dan tenaga pendidik yang sangat baik.'],
        ['icon' => 'kurikulum merdeka.png', 'judul' => 'Kurikulum Merdeka', 'deskripsi' => 'Sekolah kami sudah menerapkan Kurikulum Merdeka yang menekankan pada kebebasan belajar dan penguatan karakter.']
      ] as $index => $card)
      <div data-aos="zoom-in" data-aos-duration="800" data-aos-delay="{{ $index * 150 + 300 }}"
           class="group flex flex-col items-center text-center p-6 sm:p-8 bg-white rounded-3xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-[#49ADFF]/5 via-transparent to-[#49ADFF]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <img src="{{ asset('storage/sekolah/' . $card['icon']) }}" 
             alt="{{ $card['judul'] }}" 
             class="w-16 h-16 sm:w-20 sm:h-20 mb-4 relative z-10 transform transition-transform duration-500 group-hover:scale-110 group-hover:rotate-3">
        <h3 class="text-[#49ADFF] font-semibold text-base sm:text-lg md:text-xl mb-2 relative z-10">{{ $card['judul'] }}</h3>
        <p class="text-gray-600 text-sm sm:text-base leading-relaxed relative z-10">{{ $card['deskripsi'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Statistik Sekolah -->
<section class="py-16 sm:py-20 md:py-24 bg-gray-50" id="statistik-section">
    <div class="container mx-auto text-center px-4 sm:px-6 md:px-8">
        <!-- Judul -->
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-10 sm:mb-12 md:mb-14 tracking-wide" style="color: #49ADFF;" data-aos="fade-up" data-aos-duration="800">
            STATISTIK SEKOLAH
        </h2>

        <div class="flex flex-wrap justify-center gap-6 sm:gap-8 md:gap-10">
            <!-- Kartu Statistik: Guru -->
            <div class="bg-white rounded-full border-4 p-6 sm:p-8 flex flex-col items-center shadow-lg 
                        w-40 h-40 sm:w-48 sm:h-48 md:w-52 md:h-52 justify-center hover:scale-110 transition transform duration-300 hover:shadow-2xl"
                 style="border-color: #49ADFF;"
                 data-aos="zoom-in"
                 data-aos-duration="800"
                 data-aos-delay="100">
                <img src="https://img.icons8.com/ios-filled/100/49ADFF/teacher.png" 
                     alt="Guru" class="mb-2 sm:mb-3 w-12 h-12 sm:w-16 sm:h-16">
                <span class="text-3xl sm:text-4xl md:text-5xl font-extrabold counter" 
                      style="color: #49ADFF;"
                      data-target="{{ $statistik->guru ?? 0 }}">0</span>
                <span class="text-base sm:text-lg md:text-xl text-gray-600 mt-1">Guru</span>
            </div>

            <!-- Kartu Statistik: Siswa -->
            <div class="bg-white rounded-full border-4 p-6 sm:p-8 flex flex-col items-center shadow-lg 
                        w-40 h-40 sm:w-48 sm:h-48 md:w-52 md:h-52 justify-center hover:scale-110 transition transform duration-300 hover:shadow-2xl"
                 style="border-color: #49ADFF;"
                 data-aos="zoom-in"
                 data-aos-duration="800"
                 data-aos-delay="200">
                <img src="https://img.icons8.com/ios-filled/100/49ADFF/student-male.png" 
                     alt="Siswa" class="mb-2 sm:mb-3 w-12 h-12 sm:w-16 sm:h-16">
                <span class="text-3xl sm:text-4xl md:text-5xl font-extrabold counter" 
                      style="color: #49ADFF;"
                      data-target="{{ ($statistik->kelas7 ?? 0) + ($statistik->kelas8 ?? 0) + ($statistik->kelas9 ?? 0) }}">0</span>
                <span class="text-base sm:text-lg md:text-xl text-gray-600 mt-1">Siswa</span>
            </div>

            <!-- Kartu Statistik: Staf -->
            <div class="bg-white rounded-full border-4 p-6 sm:p-8 flex flex-col items-center shadow-lg 
                        w-40 h-40 sm:w-48 sm:h-48 md:w-52 md:h-52 justify-center hover:scale-110 transition transform duration-300 hover:shadow-2xl"
                 style="border-color: #49ADFF;"
                 data-aos="zoom-in"
                 data-aos-duration="800"
                 data-aos-delay="300">
                <img src="https://img.icons8.com/ios-filled/100/49ADFF/conference.png" 
                     alt="Staf" class="mb-2 sm:mb-3 w-12 h-12 sm:w-16 sm:h-16">
                <span class="text-3xl sm:text-4xl md:text-5xl font-extrabold counter" 
                      style="color: #49ADFF;"
                      data-target="{{ $statistik->staf ?? 0 }}">0</span>
                <span class="text-base sm:text-lg md:text-xl text-gray-600 mt-1">Staf</span>
            </div>
        </div>
    </div>

    <!-- Script: Angka berjalan saat discroll -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll(".counter");
            const speed = 80;
            let animated = false;

            const animateCounters = () => {
                counters.forEach(counter => {
                    const updateCount = () => {
                        const target = +counter.getAttribute("data-target");
                        const count = +counter.innerText;
                        const increment = Math.ceil(target / speed);

                        if (count < target) {
                            counter.innerText = count + increment;
                            setTimeout(updateCount, 25);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    updateCount();
                });
            };

            const section = document.querySelector("#statistik-section");
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting && !animated) {
                    animateCounters();
                    animated = true;
                }
            }, { threshold: 0.5 });

            observer.observe(section);
        });
    </script>
</section>

<!-- AOS Animation -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true,
    offset: 80,
    easing: 'ease-in-out',
    disable: function() {
      return window.innerWidth < 768;
    }
  });
</script>

<!-- Custom Animation -->
<style>
@keyframes fade-in {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
  animation: fade-in 1.2s ease-in-out both;
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-8px); }
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}

@keyframes bounce-slow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-6px); }
}

.animate-bounce-slow {
  animation: bounce-slow 2.5s ease-in-out infinite;
}

.scrollbar-hide::-webkit-scrollbar {
  display: none;
}

.scrollbar-hide {
  -ms-overflow-style: none;
  scrollbar-width: none;
}

/* Smooth transitions untuk semua elemen */
* {
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Responsif untuk mobile kecil */
@media (max-width: 640px) {
  .animate-float {
    animation: float 4s ease-in-out infinite;
  }
  
  .animate-bounce-slow {
    animation: bounce-slow 3s ease-in-out infinite;
  }
}
</style>
@endsection