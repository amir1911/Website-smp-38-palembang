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



{{-- //kata sambutan kepala sekolah --}}
<section class="bg-[var(--blue-dark)] text-white py-12 sm:py-16 md:py-20 lg:py-24 font-poppins relative overflow-hidden">

  <!-- Animated Wave Background -->
  <div class="absolute inset-0 opacity-20">
    <svg class="absolute bottom-0 w-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill="white" fill-opacity="0.3"
        d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,101.3C1248,85,1344,75,1392,69.3L1440,64V320H0Z"/>
    </svg>
  </div>

  <!-- Floating Shapes -->
  <div class="absolute top-20 left-10 w-16 h-16 border-4 border-white/30 rounded-lg rotate-45 animate-wave"></div>
  <div class="absolute top-40 right-20 w-12 h-12 bg-[var(--blue-light)]/20 rounded-full"></div>
  <div class="absolute bottom-32 left-1/4 w-20 h-20 border-4 border-white/20"></div>
  <div class="absolute bottom-20 right-1/3 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
  
  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 lg:gap-16 items-center px-4 sm:px-6 md:px-8 relative z-10">

    <!-- FOTO KEPALA SEKOLAH -->
    <div class="flex flex-col items-center" data-aos="fade-right">
      
      <div class="mb-6 text-center">
        <h3 class="text-3xl sm:text-4xl md:text-5xl font-bold drop-shadow-lg leading-tight">
          Sambutan <br/>
          <span class="text-[var(--blue-light)]">Kepala Sekolah</span>
        </h3>
      </div>

      <!-- FRAME FOTO -->
      <div class="relative group mb-6">
        <div class="absolute inset-0 bg-gradient-to-br from-[var(--blue-light)] to-[var(--blue-main)] 
                    rounded-3xl rotate-3 group-hover:rotate-6 transition-all duration-500"></div>
        
        <div class="relative bg-white p-3 rounded-3xl shadow-2xl group-hover:-translate-y-2 transition-all duration-500">
          <div class="rounded-2xl overflow-hidden w-[240px] sm:w-[280px] md:w-[320px] lg:w-[360px]">
            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=500&fit=crop" 
                 class="w-full h-[280px] sm:h-[320px] md:h-[360px] lg:h-[400px] object-cover group-hover:scale-105 transition duration-700">

            <!-- Gradient overlay -->
            <div class="absolute inset-0 bg-gradient-to-t 
                        from-[var(--blue-main)]/80 via-transparent to-transparent 
                        opacity-0 group-hover:opacity-100 transition duration-500"></div>
          </div>

          <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 
                      bg-white text-[var(--blue-main)] px-6 py-3 rounded-full shadow-xl">
            <h2 class="text-xl sm:text-2xl font-bold">Windah</h2>
          </div>
        </div>
      </div>

      <!-- ROLE BADGE -->
      <div class="flex items-center gap-3 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full border border-white/30 shadow-lg">
        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
        <p class="text-sm sm:text-base font-semibold">Kepala Sekolah</p>
      </div>
    </div>

    <!-- TEKS SAMBUTAN -->
    <div data-aos="fade-left" data-aos-delay="200">
      
      <div class="bg-white/10 backdrop-blur-md rounded-3xl p-6 sm:p-8 md:p-10 shadow-2xl border border-white/20">
        
        <div class="space-y-5 text-sm sm:text-base md:text-lg leading-relaxed">
          <p class="italic text-[var(--blue-light)] font-medium text-base sm:text-lg">
            Assalamu'alaikum warahmatullahi wabarakatuh
          </p>
          
          <p class="text-justify text-white/90">
            Puji syukur kita panjatkan ke hadirat Allah SWT…
            <span class="font-semibold text-[var(--blue-light)]">SMP Negeri 38 Palembang</span>
            dapat terus berkomitmen memberikan pendidikan terbaik bagi generasi penerus bangsa.
          </p>

          <p class="text-justify text-white/90">
            Kami berupaya menciptakan lingkungan belajar yang inovatif…
          </p>

          <p class="text-justify text-white/90">
            Mari bersama-sama mewujudkan visi dan misi sekolah…
          </p>
        </div>

        <div class="mt-8 pt-6 border-t border-white/20">
          <p class="text-[var(--blue-light)] font-medium italic mb-6">
            Wassalamu'alaikum warahmatullahi wabarakatuh
          </p>
          
          <div class="flex items-center gap-4">
            <div class="w-16 h-0.5 bg-[var(--blue-light)]"></div>
            <div>
              <p class="font-bold text-lg text-white">Windah</p>
              <p class="text-sm text-[var(--blue-light)]">Kepala SMP Negeri 38 Palembang</p>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>





<section class="bg-[#DCEBFA] text-[#1D4E89] py-16 sm:py-20 md:py-24 font-poppins relative overflow-hidden">

  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center px-6 relative z-10">

    <!-- TEKS PROFIL SEKOLAH -->
    <div data-aos="fade-right" class="space-y-6 text-center lg:text-left">

      <!-- Badge -->
      <span class="inline-flex items-center gap-2 bg-white text-[#1D4E89] px-4 py-2 rounded-full text-sm font-semibold shadow">
        ★ Sekolah Unggulan
      </span>

      <!-- Judul -->
      <h2 class="text-4xl sm:text-5xl font-extrabold leading-tight text-[#1D4E89]">
        SMP NEGERI 38 <br/> PALEMBANG
      </h2>

      <!-- Ornamen Garis -->
      <div class="flex items-center justify-center lg:justify-start gap-3">
        <span class="w-10 h-1 bg-[#1D4E89] rounded-full"></span>
        <span class="w-10 h-1 bg-[#3EA5E8] rounded-full"></span>
        <span class="w-10 h-1 bg-[#33C3F8] rounded-full"></span>
      </div>

      <!-- Deskripsi -->
      <p class="text-base sm:text-lg md:text-xl text-gray-700 leading-relaxed max-w-md mx-auto lg:mx-0">
        xxx
      </p>

      <!-- Tombol -->
      <a href="/profile"
         class="inline-flex items-center gap-2 bg-[#1D4E89] hover:bg-[#163A63] text-white px-8 py-4 rounded-full shadow-lg transition-all duration-300 text-base font-semibold">
        Selengkapnya
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
      </a>

    </div>

    <!-- FOTO SEKOLAH -->
    <div class="flex justify-center" data-aos="fade-left" data-aos-delay="200">

      <div class="relative bg-[#1D4E89] rounded-3xl p-4 shadow-xl">
        <img src="{{ asset('storage/logo/smp38palembang.jpg') }}"
             alt="SMP Negeri 38 Palembang"
             class="rounded-2xl w-full h-auto object-cover">

        <p class="text-white text-center text-lg font-semibold mt-4">
          SMP NEGERI 38 PALEMBANG
        </p>
      </div>

    </div>

  </div>
</section>


<!-- Section Ekstrakurikuler -->
<section class="bg-gradient-to-b from-[#2B5A8E] via-[#3A6BA0] to-[#5B8DC4] py-16 sm:py-20 md:py-24 px-4 relative">
  
  <div class="max-w-6xl mx-auto relative z-10">
    
    <!-- Judul -->
    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center text-white mb-12 tracking-wide" 
        data-aos="fade-down"
        data-aos-duration="800">
      Kegiatan Ekstrakulikuler
    </h2>

    <!-- Carousel Container -->
    <div 
      x-data="{ 
        scrollLeft() { $refs.carousel.scrollBy({ left: -350, behavior: 'smooth' }) }, 
        scrollRight() { $refs.carousel.scrollBy({ left: 350, behavior: 'smooth' }) } 
      }"
      class="relative">

      <!-- Tombol Navigasi Kiri -->
      <button 
        @click="scrollLeft"
        class="hidden lg:flex absolute -left-6 top-1/2 -translate-y-1/2 bg-[#5B8DC4] text-white p-3 rounded-full shadow-lg hover:bg-[#4A7BAF] transition-all duration-300 z-20"
        aria-label="Scroll Left">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
      </button>

      <!-- Carousel -->
      <div 
        x-ref="carousel"
        class="flex gap-6 overflow-x-auto scrollbar-hide snap-x snap-mandatory scroll-smooth pb-6">
        
        @foreach($ekstrakurikulers as $index => $item)
        <div 
          class="flex-shrink-0 w-[280px] snap-center"
          data-aos="fade-up"
          data-aos-duration="700"
          data-aos-delay="{{ $index * 100 }}">
          
          <!-- Card -->
          <div class="bg-white rounded-2xl overflow-hidden shadow-xl border-[6px] border-white transition-all duration-300">
            
            <!-- Gambar -->
            <div class="relative h-44 overflow-hidden bg-white p-3">
              <img 
                src="{{ asset('storage/' . $item->foto) }}" 
                alt="{{ $item->nama_kegiatan }}" 
                class="w-full h-full object-cover rounded-lg"
                loading="lazy">
            </div>

            <!-- Badge Label Biru -->
            <div class="bg-[#2B5A8E] text-white text-center py-2.5 px-4 font-semibold text-base">
              {{ $item->nama_kegiatan }}
            </div>

            <!-- Deskripsi -->
            <div class="p-4 bg-white">
              <p class="text-gray-700 text-xs leading-relaxed text-center">
                {{ Str::limit($item->deskripsi, 80) }}
              </p>
            </div>

          </div>
        </div>
        @endforeach

      </div>

      <!-- Tombol Navigasi Kanan -->
      <button 
        @click="scrollRight"
        class="hidden lg:flex absolute -right-6 top-1/2 -translate-y-1/2 bg-[#5B8DC4] text-white p-3 rounded-full shadow-lg hover:bg-[#4A7BAF] transition-all duration-300 z-20"
        aria-label="Scroll Right">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
      </button>

    </div>
  </div>

</section>


<!-- Section Keunggulan Sekolah -->
<section class="py-16 sm:py-20 md:py-24 bg-gradient-to-b from-[#5B8DC4] to-[#7BA3D1]">
  
  <div class="max-w-6xl mx-auto px-4 sm:px-6 md:px-8">

    <!-- Judul Section -->
    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center text-white mb-12 tracking-wide"
        data-aos="fade-down" 
        data-aos-duration="700">
      Keunggulan Sekolah
    </h2>

    <!-- Container Card Biru Gelap -->
    <div class="bg-[#2B5A8E] rounded-[2rem] px-8 sm:px-12 md:px-16 py-12 sm:py-14 md:py-16 shadow-2xl"
         data-aos="zoom-in" 
         data-aos-duration="800">

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">

        @foreach([
          [
            'icon' => 'sekolah.png', 
            'judul' => 'Sistem Smart School', 
            'deskripsi' => 'Sekolah kami mulai menerapkan Sistem Smart School sebagai upaya memanfaatkan teknologi dalam kegiatan sekolah.'
          ],
          [
            'icon' => 'Terakreditasi A.png', 
            'judul' => 'Akreditasi', 
            'deskripsi' => 'Sekolah kami berstatus Akreditasi A, yang menunjukkan kualitas pembelajaran dan tenaga pendidik yang sangat baik.'
          ],
          [
            'icon' => 'kurikulum merdeka.png', 
            'judul' => 'Kurikulum Merdeka', 
            'deskripsi' => 'Sekolah kami telah menerapkan Kurikulum Merdeka yang menekankan kebebasan belajar dan penguatan karakter.'
          ]
        ] as $index => $card)

        <!-- Card Item -->
        <div 
          data-aos="fade-up" 
          data-aos-duration="700" 
          data-aos-delay="{{ $index * 150 }}"
          class="flex flex-col items-center text-center">

          <!-- Icon dengan Background Putih Bulat -->
          <div class="mb-5 w-24 h-24 sm:w-28 sm:h-28 bg-white rounded-full flex items-center justify-center shadow-lg">
            <img 
              src="{{ asset('storage/sekolah/' . $card['icon']) }}" 
              alt="Icon {{ $card['judul'] }}" 
              class="w-14 h-14 sm:w-16 sm:h-16 object-contain"
              loading="lazy">
          </div>

          <!-- Judul -->
          <h3 class="text-white font-bold text-lg sm:text-xl mb-3">
            {{ $card['judul'] }}
          </h3>

          <!-- Deskripsi -->
          <p class="text-white/90 text-sm sm:text-base leading-relaxed max-w-xs">
            {{ $card['deskripsi'] }}
          </p>

        </div>

        @endforeach

      </div>

    </div>

  </div>
</section>


<!-- Section Statistik Sekolah -->
<section class="py-16 sm:py-20 md:py-24 bg-gradient-to-b from-[#7BA3D1] to-[#A0BFDC]">
    
    <div class="container mx-auto px-4 sm:px-6 md:px-8">
        
        <!-- Judul -->
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center text-white mb-16 tracking-wide" 
            data-aos="fade-up" 
            data-aos-duration="800">
            Statistik Sekolah
        </h2>

        <!-- Grid Statistik -->
        <div class="flex flex-wrap justify-center gap-8 sm:gap-12 md:gap-16">
            
            <!-- Kartu Statistik: Guru -->
            <div class="relative"
                 data-aos="zoom-in"
                 data-aos-duration="800"
                 data-aos-delay="100">
                <div class="bg-white rounded-full w-44 h-44 sm:w-52 sm:h-52 md:w-56 md:h-56 flex flex-col items-center justify-center shadow-xl transition-transform duration-300 hover:scale-105">
                    
                    <!-- Icon -->
                    <div class="mb-3">
                        <img src="https://img.icons8.com/ios-filled/80/5B8DC4/teacher.png" 
                             alt="Guru" class="w-14 h-14 sm:w-16 sm:h-16">
                    </div>
                    
                    <!-- Angka Counter -->
                    <span class="text-4xl sm:text-5xl md:text-6xl font-bold text-[#5B8DC4] counter mb-1" 
                          data-target="{{ $statistik->guru ?? 45 }}">0</span>
                    
                    <!-- Label -->
                    <span class="text-lg sm:text-xl font-semibold text-gray-700">Guru</span>
                </div>
            </div>

            <!-- Kartu Statistik: Murid -->
            <div class="relative"
                 data-aos="zoom-in"
                 data-aos-duration="800"
                 data-aos-delay="200">
                <div class="bg-white rounded-full w-44 h-44 sm:w-52 sm:h-52 md:w-56 md:h-56 flex flex-col items-center justify-center shadow-xl transition-transform duration-300 hover:scale-105">
                    
                    <!-- Icon -->
                    <div class="mb-3">
                        <img src="https://img.icons8.com/ios-filled/80/5B8DC4/student-male.png" 
                             alt="Murid" class="w-14 h-14 sm:w-16 sm:h-16">
                    </div>
                    
                    <!-- Angka Counter -->
                    <span class="text-4xl sm:text-5xl md:text-6xl font-bold text-[#5B8DC4] counter mb-1" 
                          data-target="{{ ($statistik->kelas7 ?? 0) + ($statistik->kelas8 ?? 0) + ($statistik->kelas9 ?? 0) }}">0</span>
                    
                    <!-- Label -->
                    <span class="text-lg sm:text-xl font-semibold text-gray-700">Murid</span>
                </div>
            </div>

            <!-- Kartu Statistik: Staf -->
            <div class="relative"
                 data-aos="zoom-in"
                 data-aos-duration="800"
                 data-aos-delay="300">
                <div class="bg-white rounded-full w-44 h-44 sm:w-52 sm:h-52 md:w-56 md:h-56 flex flex-col items-center justify-center shadow-xl transition-transform duration-300 hover:scale-105">
                    
                    <!-- Icon -->
                    <div class="mb-3">
                        <img src="https://img.icons8.com/ios-filled/80/5B8DC4/conference.png" 
                             alt="Staf" class="w-14 h-14 sm:w-16 sm:h-16">
                    </div>
                    
                    <!-- Angka Counter -->
                    <span class="text-4xl sm:text-5xl md:text-6xl font-bold text-[#5B8DC4] counter mb-1" 
                          data-target="{{ $statistik->staf ?? 20 }}">0</span>
                    
                    <!-- Label -->
                    <span class="text-lg sm:text-xl font-semibold text-gray-700">Staf</span>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // Kecepatan animasi
    
    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const increment = target / speed;
        
        const updateCount = () => {
            const count = +counter.innerText;
            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCount, 10);
            } else {
                counter.innerText = target;
            }
        };
        
        updateCount();
    };
    
    // Intersection Observer untuk trigger animasi saat scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => observer.observe(counter));
});
</script>

<style>
/* Hide scrollbar untuk carousel */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* Custom shadow untuk hover effect */
.hover\:shadow-3xl:hover {
    box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.35);
}
</style>
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

<script>
  AOS.init({
    duration: 800,
    once: true,
    offset: 100
  });
</script>
@endsection