@extends('layouts.app')

@section('content')
<!-- Import Google Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

<style>
:root {
    --blue-dark: #1D4E89;   /* Biru tua */
    --blue-main: #2D6BB5;   /* Biru sedang */
    --blue-light: #A6C9FF;  /* Biru muda */
}
</style>

<!-- School Website Carousel -->
<section class="relative w-full overflow-hidden font-[Poppins] bg-gradient-to-b from-[var(--blue-light)]/10 via-[var(--blue-main)]/10 to-white"
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

    <!-- Slide Items -->
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
                <!-- IMAGE -->
                <div class="relative w-full h-full">
                    <img :src="'/storage/' + item.gambar" 
                         :alt="item.judul" 
                         class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t 
                                from-[var(--blue-dark)]/80 
                                via-[var(--blue-main)]/40 
                                to-transparent"></div>
                </div>

                <!-- TEXT -->
                <div class="absolute left-0 right-0 px-6 sm:px-8 md:px-12 lg:px-16" style="bottom: 110px;">
                    <div class="w-full max-w-7xl mx-auto">
                        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-3 sm:mb-4">
                            <span x-text="item.judul"></span>
                        </h2>

                        <p class="text-sm sm:text-base md:text-lg text-blue-100 max-w-2xl leading-relaxed"
                           x-text="item.deskripsi"></p>
                    </div>
                </div>

            </div>

        </template>

    </div>

    <!-- Navigation Buttons -->
    <div class="absolute inset-0 flex justify-between items-center px-4 sm:px-6 md:px-8 pointer-events-none">
        <button @click="current = current === 1 ? total : current - 1; progress = 0;"
                class="pointer-events-auto group bg-white hover:bg-[var(--blue-main)] text-[var(--blue-main)] hover:text-white
                       rounded-full p-3 sm:p-4 transition-all duration-300 transform hover:scale-110 hover:-translate-x-1 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button @click="current = current === total ? 1 : current + 1; progress = 0;"
                class="pointer-events-auto group bg-white hover:bg-[var(--blue-main)] text-[var(--blue-main)] hover:text-white
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
                        
                        <div class="h-1 sm:h-1.5 bg-[var(--blue-light)] rounded-full overflow-hidden">
                            <div 
                                x-show="current === i"
                                class="h-full bg-gradient-to-r from-[var(--blue-main)] to-[var(--blue-dark)] rounded-full transition-all duration-100"
                                :style="`width: ${current === i ? progress : 0}%`">
                            </div>
                        </div>

                        <div x-show="current === i" 
                             class="absolute -top-8 left-1/2 -translate-x-1/2 
                                    bg-[var(--blue-main)] text-white text-xs 
                                    px-2 py-1 rounded whitespace-nowrap">
                            Slide <span x-text="i"></span>
                        </div>
                    </button>
                </template>
            </div>

            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2 text-sm sm:text-base font-semibold text-[var(--blue-dark)]">
                    <span x-text="current"></span>
                    <span class="text-[var(--blue-light)]">/</span>
                    <span x-text="total"></span>
                </div>

                <button @click="autoplay = !autoplay; progress = 0;"
                        class="bg-[var(--blue-light)] hover:bg-[var(--blue-main)] text-[var(--blue-dark)] hover:text-white rounded-lg p-2 transition-all duration-300">
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

<!-- Section Kepala Sekolah -->
<section class="bg-[var(--blue-dark)] text-white py-12 sm:py-16 md:py-20 lg:py-24 font-poppins relative overflow-hidden">
  <!-- Decorative Elements -->
  <div class="absolute inset-0 opacity-20">
    <svg class="absolute bottom-0 w-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill="white" fill-opacity="0.3" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,101.3C1248,85,1344,75,1392,69.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </div>

  <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center px-4 sm:px-6 md:px-8 relative z-10">

    <!-- Foto Kepala Sekolah -->
    <div class="flex flex-col items-center" data-aos="fade-right">
      <h3 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight mb-6">
        Sambutan <br>
        <span class="text-[var(--blue-light)]">Kepala Sekolah</span>
      </h3>

      <div class="relative group mb-6">
        <div class="absolute inset-0 bg-gradient-to-br from-[var(--blue-light)] to-[var(--blue-main)] 
                    rounded-3xl transform rotate-3 group-hover:rotate-6 transition-all duration-500"></div>
        
        <div class="relative bg-white p-3 rounded-3xl shadow-2xl">
          <div class="rounded-2xl overflow-hidden w-[260px] sm:w-[300px]">
            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=500&fit=crop" 
                 class="w-full h-[320px] object-cover">
          </div>

          <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-white text-[var(--blue-dark)] px-6 py-3 rounded-full shadow-xl">
            <h2 class="text-xl font-bold">Windah</h2>
          </div>
        </div>
      </div>

      <div class="flex items-center gap-3 bg-white/20 px-6 py-3 rounded-full border border-white/40">
        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
        <p class="text-sm font-semibold">Kepala Sekolah</p>
      </div>
    </div>

    <!-- Teks Sambutan -->
    <div data-aos="fade-left">
      <div class="bg-white/15 backdrop-blur-md rounded-3xl p-8 shadow-2xl border border-white/30">
        
        <p class="italic text-[var(--blue-light)] font-medium text-lg mb-4">
          Assalamu'alaikum warahmatullahi wabarakatuh
        </p>

        <p class="text-justify text-white/90 mb-4">
          Puji syukur kita panjatkan ke hadirat Allah SWT, karena atas rahmat dan karunia-Nya,
          <span class="font-semibold text-[var(--blue-light)]">SMP Negeri 38 Palembang</span> dapat terus berkomitmen
          memberikan pendidikan terbaik bagi generasi penerus bangsa.
        </p>

        <p class="text-justify text-white/90 mb-4">
          Kami senantiasa berupaya menciptakan lingkungan belajar yang inovatif dan berbasis karakter
          untuk membentuk siswa-siswi yang unggul dan santun.
        </p>

        <p class="text-justify text-white/90 mb-6">
          Mari bersama-sama kita wujudkan visi dan misi sekolah untuk menciptakan generasi berkualitas.
        </p>

        <p class="italic text-[var(--blue-light)] font-medium mb-6">
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
</section>


<!-- Section Profil Sekolah -->
<section class="relative bg-gradient-to-br from-[var(--blue-dark)]/10 via-white to-[var(--blue-light)]/20 py-20 font-[Poppins] overflow-hidden">

  <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center px-6">

    <!-- Teks -->
    <div data-aos="fade-right">
      <span class="inline-flex items-center gap-2 bg-[var(--blue-light)] text-[var(--blue-dark)] px-4 py-2 rounded-full text-sm font-semibold">
        Sekolah Unggulan
      </span>

      <h2 class="text-5xl font-extrabold text-[var(--blue-dark)] mt-4">
        SMP NEGERI 38 <br> PALEMBANG
      </h2>

      <p class="mt-6 text-gray-700 leading-relaxed text-lg">
        Sekolah unggulan berbasis 
        <span class="font-semibold text-[var(--blue-main)] relative">
          Kurikulum Merdeka
        </span> 
        yang berkomitmen membentuk generasi berkarakter, mandiri, dan kreatif.
      </p>

      <a href="/profile"
         class="mt-8 inline-block bg-gradient-to-r from-[var(--blue-dark)] to-[var(--blue-main)]
                text-white px-8 py-4 rounded-full shadow-lg hover:shadow-xl hover:-translate-y-1 
                transition-all font-semibold">
        Selengkapnya →
      </a>
    </div>

    <!-- Logo -->
    <div class="flex justify-center" data-aos="zoom-in">
      <div class="relative bg-white/70 backdrop-blur-md shadow-2xl rounded-3xl p-10 border border-[var(--blue-light)]">
        <img src="{{ asset('storage/logo/smp38palembang.jpg') }}" 
             class="w-[340px] object-contain drop-shadow-lg">
      </div>
    </div>

  </div>
</section>


<!-- Ekstrakurikuler -->
<section class="max-w-7xl mx-auto mt-16 px-6 relative"
  x-data="{ scrollLeft() { $refs.carousel.scrollBy({ left: -350, behavior: 'smooth' }) }, 
           scrollRight() { $refs.carousel.scrollBy({ left: 350, behavior: 'smooth' }) } }">

  <h2 class="text-4xl font-extrabold text-center mb-12 
             bg-gradient-to-r from-[var(--blue-dark)] to-[var(--blue-main)] bg-clip-text text-transparent"
      data-aos="fade-up">
    Kegiatan Ekstrakurikuler
  </h2>

  <!-- Carousel -->
  <div x-ref="carousel"
       class="flex gap-8 overflow-x-auto scrollbar-hide snap-x pb-10 scroll-smooth">

    @foreach($ekstrakurikulers as $index => $item)
    <div class="flex-shrink-0 w-72 bg-white/70 backdrop-blur-md rounded-3xl shadow-lg 
                border border-[var(--blue-light)] hover:-translate-y-2 hover:shadow-2xl transition-all"
         data-aos="zoom-in" data-aos-delay="{{ $index * 120 }}">
         
      <div class="h-52 flex items-center justify-center bg-white rounded-t-3xl">
        <img src="{{ asset('storage/' . $item->foto) }}" class="max-h-44 object-contain">
      </div>

      <div class="p-6 text-center">
        <h3 class="text-lg font-semibold text-[var(--blue-dark)] mb-2">
          {{ $item->nama_kegiatan }}
        </h3>
        <p class="text-gray-600">{{ Str::limit($item->deskripsi, 90) }}</p>
      </div>
    </div>
    @endforeach
  </div>

</section>


<!-- Keunggulan Sekolah -->
<section class="py-20 bg-[var(--blue-light)]/15">
  <div class="max-w-7xl mx-auto text-center px-6">

    <h2 class="text-4xl font-bold text-[var(--blue-dark)] mb-12">
      Keunggulan Sekolah Kami
    </h2>

    <div class="grid md:grid-cols-3 gap-10">

      @foreach([
        ['icon' => 'sekolah.png', 'judul' => 'Sistem Smart School', 'deskripsi' => 'Pemanfaatan teknologi digital di sekolah.'],
        ['icon' => 'Terakreditasi A.png', 'judul' => 'Terakreditasi A', 'deskripsi' => 'Kualitas pendidikan yang sangat baik.'],
        ['icon' => 'kurikulum merdeka.png', 'judul' => 'Kurikulum Merdeka', 'deskripsi' => 'Pembelajaran kreatif dan fleksibel.']
      ] as $index => $card)

      <div class="group bg-white rounded-3xl shadow-md hover:shadow-2xl p-8 border border-[var(--blue-light)]
                  hover:-translate-y-2 transition-all"
           data-aos="zoom-in" data-aos-delay="{{ $index * 150 }}">

        <img src="{{ asset('storage/sekolah/' . $card['icon']) }}" class="w-20 mx-auto mb-4">

        <h3 class="text-[var(--blue-dark)] font-semibold text-xl mb-2">
          {{ $card['judul'] }}
        </h3>

        <p class="text-gray-600">{{ $card['deskripsi'] }}</p>

      </div>

      @endforeach
    </div>

  </div>
</section>


<!-- Statistik Sekolah -->
<section class="py-20 bg-white" id="statistik-section">
  <div class="text-center">

    <h2 class="text-5xl font-extrabold mb-14 text-[var(--blue-dark)]">
      STATISTIK SEKOLAH
    </h2>

    <div class="flex flex-wrap justify-center gap-12">

      <div class="w-44 h-44 rounded-full border-4 flex flex-col items-center justify-center shadow-lg 
                  border-[var(--blue-main)] hover:scale-110 transition">
        <img src="https://img.icons8.com/ios-filled/100/1D4E89/teacher.png" class="w-14">
        <span class="text-4xl font-extrabold counter text-[var(--blue-dark)]" data-target="{{ $statistik->guru ?? 0 }}">0</span>
        <span class="text-gray-600 mt-1">Guru</span>
      </div>

      <div class="w-44 h-44 rounded-full border-4 flex flex-col items-center justify-center shadow-lg 
                  border-[var(--blue-main)] hover:scale-110 transition">
        <img src="https://img.icons8.com/ios-filled/100/1D4E89/student-male.png" class="w-14">
        <span class="text-4xl font-extrabold counter text-[var(--blue-dark)]" 
              data-target="{{ ($statistik->kelas7 ?? 0) + ($statistik->kelas8 ?? 0) + ($statistik->kelas9 ?? 0) }}">0</span>
        <span class="text-gray-600 mt-1">Siswa</span>
      </div>

      <div class="w-44 h-44 rounded-full border-4 flex flex-col items-center justify-center shadow-lg 
                  border-[var(--blue-main)] hover:scale-110 transition">
        <img src="https://img.icons8.com/ios-filled/100/1D4E89/conference.png" class="w-14">
        <span class="text-4xl font-extrabold counter text-[var(--blue-dark)]" 
              data-target="{{ $statistik->staf ?? 0 }}">0</span>
        <span class="text-gray-600 mt-1">Staf</span>
      </div>

    </div>
  </div>
</section>

@endsection
