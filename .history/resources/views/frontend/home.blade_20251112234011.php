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
            class="relative w-full h-[260px] sm:h-[380px] md:h-[550px] lg:h-[650px]">

            <img :src="'/storage/' + item.gambar" 
                 :alt="item.judul" 
                 class="w-full h-full object-cover brightness-75">

            <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white px-4">
                <h3 class="text-lg sm:text-2xl md:text-4xl font-extrabold text-yellow-300 drop-shadow-md animate-fade-in" x-text="item.judul"></h3>
            </div>
        </div>
    </template>

    <!-- Tombol Navigasi -->
    <div class="absolute inset-0 flex justify-between items-center px-2 sm:px-4">
        <button @click="current = current === 1 ? total : current - 1" 
                class="bg-[#49ADFF] bg-opacity-70 hover:bg-opacity-90 text-white rounded-full p-1 sm:p-2 transition transform hover:scale-110">
            ❮
        </button>
        <button @click="current = current === total ? 1 : current + 1" 
                class="bg-[#49ADFF] bg-opacity-70 hover:bg-opacity-90 text-white rounded-full p-1 sm:p-2 transition transform hover:scale-110">
            ❯
        </button>
    </div>

    <!-- Indikator -->
    <div class="absolute bottom-3 sm:bottom-5 left-0 right-0 flex justify-center space-x-2">
        <template x-for="i in total">
            <button 
                @click="current = i" 
                class="w-2 h-2 sm:w-3 sm:h-3 rounded-full transition-all duration-500"
                :class="current === i ? 'bg-white scale-125' : 'bg-gray-400 opacity-60'"></button>
        </template>
    </div>
</section>

<!-- Section Sambutan Kepala Sekolah -->
<section class="bg-[#49ADFF] text-white py-16 font-[Poppins] overflow-hidden">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center px-6">

    <!-- Foto Kepala Sekolah -->
    <div class="flex flex-col items-center" data-aos="fade-right">
      <div class="border-4 border-cyan-300 rounded-2xl overflow-hidden shadow-lg w-[280px] sm:w-[320px] md:w-[380px] lg:w-[420px] transform hover:scale-105 transition-all duration-700">
        <img src="{{ asset('storage/guru/windah.jpg') }}" 
             alt="Kepala Sekolah" 
             class="w-full h-[280px] sm:h-[340px] md:h-[400px] object-cover">
      </div>
      <h2 class="mt-4 text-xl sm:text-2xl font-semibold animate-bounce-slow">Windah</h2>
    </div>

    <!-- Teks Sambutan -->
    <div data-aos="fade-left">
      <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-3">Sambutan Kepala Sekolah</h3>
      <p class="italic mb-4 text-sm sm:text-base">Assalamu’alaikum warahmatullahi wabarakatuh</p>
      <p class="text-justify text-sm sm:text-base leading-relaxed mb-3">
        Puji syukur kita panjatkan ke hadirat Allah SWT, karena atas rahmat dan karunia-Nya,
        SMP Negeri 38 Palembang dapat terus berkomitmen memberikan pendidikan terbaik bagi
        generasi penerus bangsa...
      </p>
    </div>
  </div>
</section>

<!-- Section Profil Sekolah -->
<section class="bg-white py-20 font-[Poppins] overflow-hidden">
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10 items-center px-6">

    <!-- Kiri: Teks Profil -->
    <div data-aos="fade-right">
      <h2 class="text-3xl sm:text-4xl font-extrabold text-[#49ADFF] mb-2">SMP NEGERI 38</h2>
      <h3 class="text-2xl sm:text-3xl font-bold text-black mb-4">PALEMBANG</h3>

      <div class="h-[3px] bg-black w-2/3 mb-6"></div>

      <p class="text-gray-700 text-base sm:text-lg mb-8 leading-relaxed">
        SMP Negeri 38 Palembang merupakan sekolah unggulan berbasis 
        <span class="font-medium">Kurikulum Merdeka</span> yang berkomitmen membentuk generasi
        berkarakter, mandiri, dan kreatif dalam menghadapi tantangan masa depan.
      </p>

      <a href="#"
         class="inline-flex items-center gap-2 bg-[#49ADFF] text-white px-6 sm:px-7 py-3 sm:py-3.5 rounded-full shadow-md hover:bg-[#2796f0] transition-all duration-500 transform hover:scale-110">
        Learn More
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </a>
    </div>

    <!-- Kanan: Logo Sekolah -->
    <div class="flex justify-center" data-aos="zoom-in-up">
      <div class="bg-white shadow-xl rounded-3xl p-6 sm:p-8 hover:scale-105 transition-transform duration-500">
        <img src="{{ asset('storage/logo/smp38palembang.jpg') }}" 
             alt="Logo Sekolah"
             class="w-[260px] sm:w-[320px] md:w-[420px] h-auto object-contain mx-auto animate-float">
      </div>
    </div>
  </div>
</section>

<!-- Section Ekstrakurikuler -->
<!-- Section Ekstrakurikuler -->
<!-- Section Ekstrakurikuler -->
<section 
  class="max-w-7xl mx-auto mt-20 px-6 relative"
  x-data="{ 
    scrollLeft() { $refs.carousel.scrollBy({ left: -350, behavior: 'smooth' }) }, 
    scrollRight() { $refs.carousel.scrollBy({ left: 350, behavior: 'smooth' }) } 
  }"
>
  <!-- Judul -->
  <h2 
    class="text-3xl md:text-4xl font-extrabold text-center mb-12 bg-gradient-to-r from-[#007BFF] to-[#00D4FF] bg-clip-text text-transparent select-none"
    data-aos="fade-up"
  >
    Kegiatan Ekstrakurikuler
  </h2>

  <!-- Tombol Navigasi Kiri -->
  <button 
    @click="scrollLeft"
    class="hidden md:flex absolute left-0 top-1/2 -translate-y-1/2 bg-white/70 backdrop-blur-md p-3 rounded-full shadow-lg hover:bg-[#007BFF] hover:text-white transition duration-300 z-10"
  >
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
  </button>

  <!-- Carousel -->
  <div 
    x-ref="carousel"
    class="flex gap-8 overflow-x-auto scrollbar-hide snap-x snap-mandatory scroll-smooth pb-8 cursor-grab active:cursor-grabbing px-2"
  >
    @foreach($ekstrakurikulers as $item)
      <div 
        class="flex-shrink-0 w-72 md:w-80 bg-white/80 backdrop-blur-xl rounded-3xl shadow-lg hover:shadow-2xl border border-white/30 transition-all duration-500 transform hover:-translate-y-2 hover:scale-[1.02] snap-center"
        data-aos="zoom-in"
      >
        <!-- Gambar (tidak terpotong) -->
        <div class="flex items-center justify-center h-56 bg-gradient-to-br from-[#f7fbff] to-[#eef5ff]">
          <img 
            src="{{ asset('storage/' . $item->foto) }}" 
            alt="{{ $item->nama_kegiatan }}" 
            class="max-h-52 max-w-[90%] object-contain rounded-xl transition-transform duration-700 hover:scale-105"
          >
        </div>

        <!-- Konten -->
        <div class="p-5 text-center select-none">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">
            {{ $item->nama_kegiatan }}
          </h3>
          <p class="text-gray-600 text-sm leading-relaxed">
            {{ Str::limit($item->deskripsi, 100) }}
          </p>
        </div>
      </div>
    @endforeach
  </div>

  <!-- Tombol Navigasi Kanan -->
  <button 
    @click="scrollRight"
    class="hidden md:flex absolute right-0 top-1/2 -translate-y-1/2 bg-white/70 backdrop-blur-md p-3 rounded-full shadow-lg hover:bg-[#007BFF] hover:text-white transition duration-300 z-10"
  >
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
    </svg>
  </button>
</section>



<!-- Section Keunggulan Sekolah -->
<section class="py-16 bg-gradient-to-b from-white to-gray-50 overflow-hidden">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h3 class="text-[#49ADFF] text-sm font-semibold mb-2" data-aos="fade-down">Our Service</h3>
    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-12" data-aos="fade-down" data-aos-delay="100">
      Keunggulan Sekolah Kami
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      @foreach([
        ['icon' => 'sekolah.png', 'judul' => 'Sistem Smart School', 'deskripsi' => 'Sekolah kami mulai menerapkan Sistem Smart School sebagai upaya memanfaatkan teknologi dalam kegiatan sekolah.'],
        ['icon' => 'Terakreditasi A.png', 'judul' => 'Terakreditasi A', 'deskripsi' => 'Sekolah kami berstatus Akreditasi A, yang menunjukkan kualitas pembelajaran dan tenaga pendidik yang sangat baik.'],
        ['icon' => 'kurikulum merdeka.png', 'judul' => 'Kurikulum Merdeka', 'deskripsi' => 'Sekolah kami sudah menerapkan Kurikulum Merdeka yang menekankan pada kebebasan belajar dan penguatan karakter.']
      ] as $index => $card)
      <div data-aos="zoom-in" data-aos-delay="{{ $index * 150 + 300 }}"
           class="group flex flex-col items-center text-center p-8 bg-white rounded-3xl shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-[#49ADFF]/5 via-transparent to-[#49ADFF]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <img src="{{ asset('storage/sekolah/' . $card['icon']) }}" 
             alt="{{ $card['judul'] }}" 
             class="w-20 h-20 mb-4 relative z-10 transform transition-transform duration-500 group-hover:scale-110 group-hover:rotate-3">
        <h3 class="text-[#49ADFF] font-semibold text-lg mb-2 relative z-10">{{ $card['judul'] }}</h3>
        <p class="text-gray-600 text-sm leading-relaxed relative z-10">{{ $card['deskripsi'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>


{{-- //statistik-sekolah --}}
<section class="py-20 bg-gray-50" id="statistik-section">
    <div class="container mx-auto text-center px-4">
        <!-- Judul -->
        <h2 class="text-4xl md:text-5xl font-extrabold mb-14 tracking-wide" style="color: #49ADFF;">
            STATISTIK SEKOLAH
        </h2>

        <div class="flex flex-wrap justify-center gap-10">
            <!-- Kartu Statistik: Guru -->
            <div class="bg-white rounded-full border-4 p-8 flex flex-col items-center shadow-lg 
                        w-48 h-48 justify-center hover:scale-110 transition transform duration-300 hover:shadow-2xl"
                 style="border-color: #49ADFF;">
                <img src="https://img.icons8.com/ios-filled/100/49ADFF/teacher.png" 
                     alt="Guru" class="mb-3 w-16 h-16">
                <span class="text-4xl font-extrabold counter" 
                      style="color: #49ADFF;"
                      data-target="{{ $statistik->guru ?? 0 }}">0</span>
                <span class="text-lg text-gray-600 mt-1">Guru</span>
            </div>

            <!-- Kartu Statistik: Siswa -->
            <div class="bg-white rounded-full border-4 p-8 flex flex-col items-center shadow-lg 
                        w-48 h-48 justify-center hover:scale-110 transition transform duration-300 hover:shadow-2xl"
                 style="border-color: #49ADFF;">
                <img src="https://img.icons8.com/ios-filled/100/49ADFF/student-male.png" 
                     alt="Siswa" class="mb-3 w-16 h-16">
                <span class="text-4xl font-extrabold counter" 
                      style="color: #49ADFF;"
                      data-target="{{ ($statistik->kelas7 ?? 0) + ($statistik->kelas8 ?? 0) + ($statistik->kelas9 ?? 0) }}">0</span>
                <span class="text-lg text-gray-600 mt-1">Siswa</span>
            </div>

            <!-- Kartu Statistik: Staf -->
            <div class="bg-white rounded-full border-4 p-8 flex flex-col items-center shadow-lg 
                        w-48 h-48 justify-center hover:scale-110 transition transform duration-300 hover:shadow-2xl"
                 style="border-color: #49ADFF;">
                <img src="https://img.icons8.com/ios-filled/100/49ADFF/conference.png" 
                     alt="Staf" class="mb-3 w-16 h-16">
                <span class="text-4xl font-extrabold counter" 
                      style="color: #49ADFF;"
                      data-target="{{ $statistik->staf ?? 0 }}">0</span>
                <span class="text-lg text-gray-600 mt-1">Staf</span>
            </div>
        </div>
    </div>

    <!-- Script: Angka berjalan saat discroll -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll(".counter");
            const speed = 80;
            let animated = false; // agar tidak jalan dua kali

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

            // Gunakan Intersection Observer agar aktif saat discroll
            const section = document.querySelector("#statistik-section");
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting && !animated) {
                    animateCounters();
                    animated = true; // hanya sekali animasi
                }
            }, { threshold: 0.5 }); // aktif ketika 50% elemen terlihat

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
    offset: 100,
    easing: 'ease-in-out'
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
  50% { transform: translateY(-6px); }
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}

@keyframes bounce-slow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-4px); }
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

</style>
@endsection
