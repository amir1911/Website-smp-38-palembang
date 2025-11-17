@extends('layouts.app')

@section('content')
<!-- Import Google Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Modern Carousel Section -->
<section class="relative w-full overflow-hidden font-[Poppins] bg-gradient-to-br from-slate-50 to-slate-100" 
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
            x-transition:enter-start="opacity-0 translate-x-full"
            x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-700"
            x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 -translate-x-full"
            class="relative w-full h-[320px] sm:h-[450px] md:h-[550px] lg:h-[650px] xl:h-[700px]">

            <!-- Image with Overlay -->
            <div class="relative w-full h-full overflow-hidden rounded-2xl mx-auto max-w-[95%] sm:max-w-full shadow-2xl">
                <img :src="'/storage/' + item.gambar" 
                     :alt="item.judul" 
                     class="w-full h-full object-cover scale-105 hover:scale-110 transition-transform duration-[3000ms]">
                
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
                
                <!-- Animated Accent Lines -->
                <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-yellow-400 via-yellow-300 to-transparent opacity-60"></div>
                <div class="absolute bottom-0 right-0 w-full h-1 bg-gradient-to-r from-transparent via-yellow-300 to-yellow-400 opacity-60"></div>
            </div>

            <!-- Content Overlay -->
            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6 sm:px-8 md:px-12 lg:px-16">
                <!-- Decorative Element -->
                <div class="mb-4 sm:mb-6">
                    <div class="w-16 h-1 sm:w-20 sm:h-1.5 bg-gradient-to-r from-yellow-400 to-yellow-300 rounded-full mx-auto animate-pulse"></div>
                </div>

                <!-- Title -->
                <h3 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-3 sm:mb-4 leading-tight px-4
                           drop-shadow-[0_4px_20px_rgba(0,0,0,0.8)]
                           animate-[fadeInUp_0.8s_ease-out]" 
                    x-text="item.judul"
                    style="text-shadow: 2px 2px 8px rgba(0,0,0,0.9), 0 0 20px rgba(251,191,36,0.3);"></h3>

                <!-- Subtitle/Description (if available) -->
                <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-200 max-w-3xl mx-auto
                          drop-shadow-[0_2px_10px_rgba(0,0,0,0.8)]
                          animate-[fadeInUp_1s_ease-out_0.2s_both]"
                   x-text="item.deskripsi || ''"></p>

                <!-- CTA Button (optional) -->
                <div class="mt-6 sm:mt-8 animate-[fadeInUp_1.2s_ease-out_0.4s_both]">
                    <button class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-500 hover:to-yellow-600
                                   text-gray-900 font-bold px-6 sm:px-8 py-2.5 sm:py-3 rounded-full
                                   transform hover:scale-105 transition-all duration-300
                                   shadow-[0_4px_20px_rgba(251,191,36,0.4)] hover:shadow-[0_6px_30px_rgba(251,191,36,0.6)]">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation Buttons -->
    <div class="absolute inset-0 flex justify-between items-center px-3 sm:px-6 md:px-8 lg:px-12 pointer-events-none">
        <button @click="current = current === 1 ? total : current - 1; progress = 0;" 
                class="pointer-events-auto group relative bg-white/90 backdrop-blur-sm hover:bg-white text-gray-800 rounded-full 
                       p-2.5 sm:p-3.5 md:p-4 transition-all duration-300 
                       transform hover:scale-110 hover:-translate-x-1
                       shadow-[0_4px_20px_rgba(0,0,0,0.15)] hover:shadow-[0_6px_30px_rgba(0,0,0,0.25)]
                       border border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 group-hover:-translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            <div class="absolute inset-0 rounded-full bg-gradient-to-r from-yellow-400/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
        </button>
        <button @click="current = current === total ? 1 : current + 1; progress = 0;" 
                class="pointer-events-auto group relative bg-white/90 backdrop-blur-sm hover:bg-white text-gray-800 rounded-full 
                       p-2.5 sm:p-3.5 md:p-4 transition-all duration-300 
                       transform hover:scale-110 hover:translate-x-1
                       shadow-[0_4px_20px_rgba(0,0,0,0.15)] hover:shadow-[0_6px_30px_rgba(0,0,0,0.25)]
                       border border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
            <div class="absolute inset-0 rounded-full bg-gradient-to-l from-yellow-400/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
        </button>
    </div>

    <!-- Modern Indicators with Progress -->
    <div class="absolute bottom-6 sm:bottom-8 left-0 right-0 flex flex-col items-center space-y-3 sm:space-y-4">
        <!-- Progress Indicators -->
        <div class="flex justify-center space-x-2 sm:space-x-3">
            <template x-for="i in total" :key="i">
                <div class="relative group cursor-pointer" @click="current = i; progress = 0;">
                    <!-- Background Track -->
                    <div class="w-10 sm:w-14 md:w-16 h-1 sm:h-1.5 bg-white/30 backdrop-blur-sm rounded-full overflow-hidden">
                        <!-- Active Progress Bar -->
                        <div 
                            x-show="current === i"
                            class="h-full bg-gradient-to-r from-yellow-400 to-yellow-300 rounded-full transition-all duration-100 ease-linear"
                            :style="`width: ${current === i ? progress : 0}%`">
                        </div>
                    </div>
                    <!-- Hover Effect -->
                    <div class="absolute inset-0 rounded-full bg-white/20 scale-0 group-hover:scale-110 transition-transform duration-300"></div>
                </div>
            </template>
        </div>

        <!-- Counter Display -->
        <div class="flex items-center space-x-2 bg-black/40 backdrop-blur-md px-4 py-1.5 rounded-full">
            <span class="text-white text-xs sm:text-sm font-semibold" x-text="current"></span>
            <span class="text-white/60 text-xs sm:text-sm">/</span>
            <span class="text-white/80 text-xs sm:text-sm font-medium" x-text="total"></span>
        </div>
    </div>

    <!-- Pause/Play Button -->
    <button @click="autoplay = !autoplay; progress = 0;"
            class="absolute top-4 sm:top-6 right-4 sm:right-6 
                   bg-black/40 backdrop-blur-md hover:bg-black/60 
                   text-white rounded-full p-2 sm:p-2.5
                   transition-all duration-300 transform hover:scale-110
                   shadow-lg z-10">
        <svg x-show="autoplay" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <svg x-show="!autoplay" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </button>
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