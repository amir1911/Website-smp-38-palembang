@extends('layouts.app')

@section('content')
<!-- Import Google Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

<!-- School Website Carousel - Educational Theme -->
<section class="relative w-full overflow-hidden font-[Poppins] bg-gradient-to-b from-white via-blue-50/30 to-white"
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
         }, 6000);

         setInterval(() => {
             if (autoplay) {
                 progress = progress >= 100 ? 0 : progress + 1.667;
             }
         }, 100);
     "
     @mouseenter="autoplay = false"
     @mouseleave="autoplay = true">

    <!-- Slide Items Wrapper -->
    <div class="relative w-full h-[350px] sm:h-[450px] md:h-[550px] lg:h-[600px] xl:h-[650px] overflow-hidden">

        <template x-for="(item, index) in {{ $carousels->toJson() }}" :key="index">

            <div 
                x-show="current === index + 1"
                class="absolute inset-0 w-full h-full"
                
                x-transition:enter="transition-all duration-700 ease-out"
                x-transition:enter-start="opacity-0 translate-x-40"
                x-transition:enter-end="opacity-100 translate-x-0"

                x-transition:leave="transition-all duration-700 ease-in"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 -translate-x-40"
            >

                <!-- IMAGE SLIDE -->
                <div class="relative w-full h-full">
                    <img :src="'/storage/' + item.gambar" 
                         :alt="item.judul" 
                         class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 via-blue-900/30 to-transparent"></div>
                </div>

                <!-- TEXT CONTENT (FIXED POSITION) -->
                <div class="absolute left-0 right-0 px-6 sm:px-8 md:px-12 lg:px-16"
     style="bottom: 110px;">   <!-- Atur tinggi teks di sini -->

    <div class="w-full max-w-7xl mx-auto">


                        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-3 sm:mb-4">
                            <span x-text="item.judul"></span>
                        </h2>

                        <p class="text-sm sm:text-base md:text-lg text-blue-50 max-w-2xl leading-relaxed"
                           x-text="item.deskripsi"></p>

                    </div>
                </div>

            </div>

        </template>

    </div>



    <!-- Navigation Buttons -->
    <div class="absolute inset-0 flex justify-between items-center px-4 sm:px-6 md:px-8 pointer-events-none">
        <button @click="current = current === 1 ? total : current - 1; progress = 0;"
                class="pointer-events-auto group bg-white hover:bg-blue-600 text-blue-600 hover:text-white
                       rounded-full p-3 sm:p-4 transition-all duration-300 transform hover:scale-110 hover:-translate-x-1 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button @click="current = current === total ? 1 : current + 1; progress = 0;"
                class="pointer-events-auto group bg-white hover:bg-blue-600 text-blue-600 hover:text-white
                       rounded-full p-3 sm:p-4 transition-all duration-300 transform hover:scale-110 hover:translate-x-1 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>



    <!-- Indicators -->
    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-white/95 to-transparent backdrop-blur-sm py-4 sm:py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 flex items-center justify-between">

            <div class="flex items-center space-x-2 sm:space-x-3">
                <template x-for="i in total" :key="i">
                    <button 
                        @click="current = i; progress = 0;" 
                        class="group relative transition-all duration-300"
                        :class="current === i ? 'w-12 sm:w-16' : 'w-8 sm:w-10'">
                        
                        <div class="h-1 sm:h-1.5 bg-blue-200 rounded-full overflow-hidden">
                            <div 
                                x-show="current === i"
                                class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full transition-all duration-100"
                                :style="`width: ${current === i ? progress : 0}%`">
                            </div>
                        </div>

                        <div x-show="current === i" 
                             class="absolute -top-8 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-xs px-2 py-1 rounded whitespace-nowrap">
                            Slide <span x-text="i"></span>
                        </div>
                    </button>
                </template>
            </div>

            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2 text-sm sm:text-base font-semibold text-blue-700">
                    <span x-text="current"></span>
                    <span class="text-blue-400">/</span>
                    <span x-text="total"></span>
                </div>

                <button @click="autoplay = !autoplay; progress = 0;"
                        class="bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg p-2 transition-all duration-300">
                    <svg x-show="autoplay" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor">
                        <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
                    </svg>
                    <svg x-show="!autoplay" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

</section>



//kata sambutan kepala sekolah 
<section class="bg-[#49ADFF] text-white py-12 sm:py-16 md:py-20 lg:py-24 font-poppins relative overflow-hidden">
  
  <!-- Animated Wave Background -->
  <div class="absolute inset-0 opacity-20">
    <svg class="absolute bottom-0 w-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill="white" fill-opacity="0.3" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,101.3C1248,85,1344,75,1392,69.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </div>

  <!-- Floating Geometric Shapes -->
  <div class="absolute top-20 left-10 w-16 h-16 border-4 border-white/30 rounded-lg rotate-45 animate-wave"></div>
  <div class="absolute top-40 right-20 w-12 h-12 bg-cyan-300/20 rounded-full"></div>
  <div class="absolute bottom-32 left-1/4 w-20 h-20 border-4 border-white/20"></div>
  <div class="absolute bottom-20 right-1/3 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
  
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 lg:gap-16 items-center px-4 sm:px-6 md:px-8 relative z-10">

    <!-- Foto Kepala Sekolah -->
    <div class="flex flex-col items-center" data-aos="fade-right" data-aos-duration="800">
      
      <!-- Title Above Photo -->
      <div class="mb-6 text-center">
        {{-- <span class="inline-block px-5 py-2 bg-white text-[#49ADFF] rounded-full text-sm font-semibold mb-4 shadow-lg">
          👋 Selamat Datang
        </span> --}}
        <h3 class="text-3xl sm:text-4xl md:text-5xl font-bold drop-shadow-lg leading-tight">
          Sambutan <br/>
          <span class="text-cyan-200">Kepala Sekolah</span>
        </h3>
      </div>

      <!-- Photo with Modern Frame -->
      <div class="relative group mb-6">
        <!-- Background Decoration -->
        <div class="absolute inset-0 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-3xl transform rotate-3 group-hover:rotate-6 transition-transform duration-500"></div>
        
        <!-- Photo Container -->
        <div class="relative bg-white p-3 rounded-3xl shadow-2xl transform group-hover:-translate-y-2 transition-all duration-500">
          <div class="relative rounded-2xl overflow-hidden w-[240px] sm:w-[280px] md:w-[320px] lg:w-[360px]">
            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=500&fit=crop" 
                 alt="Kepala Sekolah" 
                 class="w-full h-[280px] sm:h-[320px] md:h-[360px] lg:h-[400px] object-cover transform group-hover:scale-105 transition-transform duration-700">
            
            <!-- Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#49ADFF]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
          </div>
          
          <!-- Name Badge Inside Photo Frame -->
          <div class="absolute -bottom-4 left-1/2 transform -translate-x-1/2 bg-white text-[#49ADFF] px-6 py-3 rounded-full shadow-xl">
            <h2 class="text-xl sm:text-2xl font-bold whitespace-nowrap">Windah</h2>
          </div>
        </div>
      </div>
      
      <!-- Role Badge -->
      <div class="flex items-center gap-3 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full border border-white/30 shadow-lg">
        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
        <p class="text-sm sm:text-base font-semibold">Kepala Sekolah</p>
      </div>
    </div>

    <!-- Teks Sambutan -->
    <div data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
      
      <!-- Content Card -->
      <div class="bg-white/15 backdrop-blur-md rounded-3xl p-6 sm:p-8 md:p-10 shadow-2xl border border-white/30">
        
        <div class="space-y-5 text-sm sm:text-base md:text-lg leading-relaxed">
          <!-- Salam Pembuka -->
          <p class="italic text-cyan-50 font-medium text-base sm:text-lg">
            Assalamu'alaikum warahmatullahi wabarakatuh
          </p>
          
          <!-- Paragraf 1 -->
          <p class="text-justify">
            Puji syukur kita panjatkan ke hadirat Allah SWT, karena atas rahmat dan karunia-Nya,
            <span class="font-semibold text-cyan-100">SMP Negeri 38 Palembang</span> dapat terus berkomitmen memberikan pendidikan terbaik bagi
            generasi penerus bangsa.
          </p>
          
          <!-- Paragraf 2 -->
          <p class="text-justify">
            Kami senantiasa berupaya menciptakan lingkungan belajar yang kondusif, inovatif, dan 
            berbasis karakter untuk membentuk siswa-siswi yang cerdas, berakhlak mulia, dan siap 
            menghadapi tantangan masa depan.
          </p>

          <!-- Paragraf 3 -->
          <p class="text-justify">
            Mari bersama-sama kita wujudkan visi dan misi sekolah untuk menciptakan generasi yang 
            unggul dalam prestasi dan santun dalam budi pekerti.
          </p>
        </div>

        <!-- Closing -->
        <div class="mt-8 pt-6 border-t border-white/30">
          <p class="text-cyan-100 font-medium italic mb-6">
            Wassalamu'alaikum warahmatullahi wabarakatuh
          </p>
          
          <div class="flex items-center gap-4">
            <div class="w-16 h-0.5 bg-cyan-300"></div>
            <div>
              <p class="font-bold text-lg">Windah</p>
              <p class="text-sm text-cyan-100">Kepala SMP Negeri 38 Palembang</p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<script>
  AOS.init({
    duration: 800,
    once: true,
    offset: 100
  });
</script>


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

<style>
@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>
@endsection