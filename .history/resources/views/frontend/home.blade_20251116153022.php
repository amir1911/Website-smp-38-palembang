@extends('layouts.app')

@section('content')
<!-- Import Google Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Carousel Section -->
<section class="relative w-full overflow-hidden font-[Poppins]" 
     x-data="{ current: 1, total: {{ count($carousels) }} }" 
     x-init="setInterval(() => { current = current === total ? 1 : current + 1 }, 5000)">

    <!-- Slide Items -->
    <template x-for="(item, index) in {{ $carousels->toJson() }}" :key="index">
        <div 
            x-show="current === index + 1" 
            x-transition:enter="transition ease-out duration-700"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            class="relative w-full h-[280px] sm:h-[400px] md:h-[500px] lg:h-[600px] xl:h-[650px]">

            <img :src="'/storage/' + item.gambar" 
                 :alt="item.judul" 
                 class="w-full h-full object-cover brightness-75">

            <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4 sm:px-6 md:px-8">
                <h3 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-extrabold text-yellow-300 drop-shadow-lg animate-fade-in" x-text="item.judul"></h3>
            </div>
        </div>
    </template>

    <!-- Tombol Navigasi -->
    <div class="absolute inset-0 flex justify-between items-center px-2 sm:px-4 md:px-6">
        <button @click="current = current === 1 ? total : current - 1" 
                class="bg-[#49ADFF] bg-opacity-70 hover:bg-opacity-90 text-white rounded-full p-2 sm:p-3 md:p-4 transition-all duration-300 transform hover:scale-110 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button @click="current = current === total ? 1 : current + 1" 
                class="bg-[#49ADFF] bg-opacity-70 hover:bg-opacity-90 text-white rounded-full p-2 sm:p-3 md:p-4 transition-all duration-300 transform hover:scale-110 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <!-- Indikator -->
    <div class="absolute bottom-4 sm:bottom-6 left-0 right-0 flex justify-center space-x-2">
        <template x-for="i in total">
            <button 
                @click="current = i" 
                class="w-2 h-2 sm:w-3 sm:h-3 rounded-full transition-all duration-500"
                :class="current === i ? 'bg-white scale-125' : 'bg-gray-400 opacity-60'"></button>
        </template>
    </div>
</section>

<!-- Section Sambutan Kepala Sekolah - Professional Design -->
<section class="relative bg-gradient-to-br from-slate-50 via-white to-sky-50 py-16 sm:py-20 md:py-24 lg:py-32 font-['Inter'] overflow-hidden">
  
  <!-- Background Decorations -->
  <div class="absolute top-0 right-0 w-96 h-96 bg-sky-100 rounded-full blur-3xl opacity-30 -translate-y-1/2 translate-x-1/2"></div>
  <div class="absolute bottom-0 left-0 w-96 h-96 bg-cyan-100 rounded-full blur-3xl opacity-30 translate-y-1/2 -translate-x-1/2"></div>
  
  <!-- Subtle pattern overlay -->
  <div class="absolute inset-0 opacity-[0.02]" 
       style="background-image: radial-gradient(circle at 2px 2px, rgb(14 165 233) 1px, transparent 0); background-size: 32px 32px;">
  </div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
    
    <!-- Section Header -->
    <div class="text-center mb-12 sm:mb-16 md:mb-20" data-aos="fade-down" data-aos-duration="600">
      <div class="inline-flex items-center gap-3 mb-4">
        <div class="w-8 h-px bg-sky-400"></div>
        <svg class="w-5 h-5 text-sky-500" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3z"/>
        </svg>
        <div class="w-8 h-px bg-sky-400"></div>
      </div>
      <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-light text-slate-800 tracking-tight" style="font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;">
        Sambutan Kepala Sekolah
      </h2>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-12 lg:gap-16 items-center">

      <!-- Foto Kepala Sekolah -->
      <div class="lg:col-span-5 flex flex-col items-center lg:items-start" data-aos="fade-right" data-aos-duration="800">
        <div class="relative group">
          <!-- Main photo container -->
          <div class="relative overflow-hidden rounded-2xl shadow-2xl transform transition-all duration-500 hover:shadow-3xl">
            <!-- Image -->
            <div class="relative w-[280px] sm:w-[320px] md:w-[360px] lg:w-[400px] xl:w-[440px] aspect-[3/4] overflow-hidden bg-slate-100">
              <img src="{{ asset('storage/guru/windah.jpg') }}" 
                   alt="Kepala Sekolah" 
                   class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
              
              <!-- Gradient overlay -->
              <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </div>
            
            <!-- Decorative border -->
            <div class="absolute inset-0 border-2 border-sky-400/0 group-hover:border-sky-400/50 rounded-2xl transition-all duration-500"></div>
          </div>
          
          <!-- Corner accents -->
          <div class="absolute -top-3 -left-3 w-16 h-16 border-l-4 border-t-4 border-sky-400 rounded-tl-2xl opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
          <div class="absolute -bottom-3 -right-3 w-16 h-16 border-r-4 border-b-4 border-cyan-400 rounded-br-2xl opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
          
          <!-- Floating card shadow -->
          <div class="absolute inset-0 bg-sky-400/20 blur-2xl -z-10 scale-95 group-hover:scale-100 transition-transform duration-500"></div>
        </div>

        <!-- Name & Title Card -->
        <div class="mt-8 text-center lg:text-left w-full max-w-[280px] sm:max-w-[320px] md:max-w-[360px] lg:max-w-[400px] xl:max-w-[440px]">
          <div class="bg-white rounded-xl shadow-lg border border-slate-100 p-6 transform transition-all duration-500 hover:shadow-xl">
            <h3 class="text-2xl sm:text-3xl font-semibold text-slate-800 mb-2" style="font-family: 'Plus Jakarta Sans', sans-serif;">
              Windah
            </h3>
            <div class="flex items-center justify-center lg:justify-start gap-2 text-sky-600">
              <div class="w-8 h-px bg-sky-300"></div>
              <p class="text-sm sm:text-base font-medium uppercase tracking-wider">Kepala Sekolah</p>
            </div>
            
            <!-- Optional: Badge -->
            <div class="mt-4 inline-flex items-center gap-2 bg-sky-50 text-sky-700 px-4 py-2 rounded-full text-xs font-semibold">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
              </svg>
              <span>Periode 2020 - Sekarang</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Teks Sambutan -->
      <div class="lg:col-span-7" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200">
        <div class="space-y-6 md:space-y-8">
          
          <!-- Greeting -->
          <div class="relative">
            <div class="absolute -left-4 top-0 bottom-0 w-1 bg-gradient-to-b from-sky-400 to-cyan-400 rounded-full"></div>
            <p class="text-lg sm:text-xl md:text-2xl text-slate-600 italic font-light pl-6" style="font-family: 'Plus Jakarta Sans', sans-serif;">
              Assalamu'alaikum warahmatullahi wabarakatuh
            </p>
          </div>

          <!-- Main Content -->
          <div class="prose prose-slate max-w-none">
            <p class="text-base sm:text-lg md:text-xl leading-relaxed text-slate-700 text-justify">
              Puji syukur kita panjatkan ke hadirat Allah SWT, karena atas rahmat dan karunia-Nya,
              <span class="font-semibold text-sky-700">SMP Negeri 38 Palembang</span> dapat terus berkomitmen memberikan pendidikan terbaik bagi
              generasi penerus bangsa.
            </p>
            
            <p class="text-base sm:text-lg md:text-xl leading-relaxed text-slate-700 text-justify">
              Kami senantiasa berupaya menciptakan lingkungan belajar yang kondusif, inovatif, dan berkarakter, 
              sehingga setiap siswa dapat berkembang secara optimal baik dalam aspek akademik maupun non-akademik.
            </p>

            <p class="text-base sm:text-lg md:text-xl leading-relaxed text-slate-700 text-justify">
              Dengan dukungan tenaga pendidik yang profesional dan dedikasi seluruh warga sekolah, 
              kami optimis dapat mencetak generasi yang cerdas, berakhlak mulia, dan siap menghadapi tantangan masa depan.
            </p>
          </div>

          <!-- Quote/Highlight -->
          <div class="bg-gradient-to-br from-sky-50 to-cyan-50 border-l-4 border-sky-400 rounded-r-xl p-6 md:p-8 shadow-sm">
            <svg class="w-8 h-8 text-sky-400 mb-3" fill="currentColor" viewBox="0 0 24 24">
              <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
            </svg>
            <p class="text-lg md:text-xl font-medium text-slate-800 leading-relaxed italic">
              "Bersama kita wujudkan pendidikan berkualitas untuk masa depan gemilang"
            </p>
          </div>

          <!-- Signature -->
          <div class="flex items-center gap-4 pt-4">
            <div class="flex-1 h-px bg-slate-200"></div>
            <div class="text-center">
              <p class="text-sm text-slate-500 mb-1">Wassalamu'alaikum warahmatullahi wabarakatuh</p>
              <p class="text-base font-semibold text-slate-700">Windah</p>
              <p class="text-xs text-slate-500 uppercase tracking-wider">Kepala Sekolah</p>
            </div>
            <div class="flex-1 h-px bg-slate-200"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom decoration -->
    <div class="mt-16 flex justify-center" data-aos="fade-up" data-aos-delay="400">
      <div class="flex gap-2">
        <div class="w-2 h-2 rounded-full bg-sky-400"></div>
        <div class="w-2 h-2 rounded-full bg-cyan-400"></div>
        <div class="w-2 h-2 rounded-full bg-blue-400"></div>
      </div>
    </div>
  </div>
</section>

<!-- Google Fonts (jika belum ada) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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