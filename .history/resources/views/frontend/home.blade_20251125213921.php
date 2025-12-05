@extends('layouts.app')

@section('content')
<!-- Import Google Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- ========================================
     CAROUSEL SECTION
     ======================================== -->
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
                x-transition:leave-end="opacity-0 -translate-x-40">

                <!-- Image Slide -->
                <div class="relative w-full h-full">
                    <img :src="'/storage/' + item.gambar" 
                         :alt="item.judul" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 via-blue-900/30 to-transparent"></div>
                </div>

                <!-- Text Content -->
                <div class="absolute left-0 right-0 bottom-28 px-6 sm:px-8 md:px-12 lg:px-16">
                    <div class="w-full max-w-7xl mx-auto">
                        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-white mb-3 sm:mb-4"
                            x-text="item.judul"></h2>
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
                class="pointer-events-auto group bg-white hover:bg-blue-600 text-blue-600 hover:text-white rounded-full p-3 sm:p-4 transition-all duration-300 transform hover:scale-110 hover:-translate-x-1 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button @click="current = current === total ? 1 : current + 1; progress = 0;"
                class="pointer-events-auto group bg-white hover:bg-blue-600 text-blue-600 hover:text-white rounded-full p-3 sm:p-4 transition-all duration-300 transform hover:scale-110 hover:translate-x-1 shadow-lg">
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

<!-- ========================================
     SAMBUTAN KEPALA SEKOLAH
     ======================================== -->
<section class="bg-[#1D4E89] text-white py-16 sm:py-20 md:py-24 font-poppins relative overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 opacity-10">
        <svg class="absolute bottom-0 w-full" viewBox="0 0 1440 320" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="white" fill-opacity="0.5" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,101.3C1248,85,1344,75,1392,69.3L1440,64V320H0Z"/>
        </svg>
    </div>

    <!-- Floating Decorations -->
    <div class="absolute top-20 left-10 w-16 h-16 border-4 border-white/20 rounded-lg rotate-45"></div>
    <div class="absolute top-40 right-20 w-12 h-12 bg-blue-400/20 rounded-full"></div>
    <div class="absolute bottom-32 left-1/4 w-20 h-20 border-4 border-white/10 rounded-lg"></div>
    
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center px-6 sm:px-8 relative z-10">
        
        <!-- Photo Section -->
        <div class="flex flex-col items-center">
            <div class="mb-8 text-center">
                <h3 class="text-3xl sm:text-4xl md:text-5xl font-bold drop-shadow-lg">
                    Sambutan<br/>
                    <span class="text-blue-300">Kepala Sekolah</span>
                </h3>
            </div>

            <!-- Photo Frame -->
            <div class="relative group mb-6">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-blue-500 rounded-3xl rotate-3 group-hover:rotate-6 transition-all duration-500"></div>
                
                <div class="relative bg-white p-3 rounded-3xl shadow-2xl group-hover:-translate-y-2 transition-all duration-500">
                    <div class="rounded-2xl overflow-hidden w-[280px] sm:w-[320px] md:w-[360px]">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&h=500&fit=crop" 
                             alt="Kepala Sekolah"
                             class="w-full h-[320px] sm:h-[360px] md:h-[400px] object-cover group-hover:scale-105 transition duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
                    </div>

                    <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-white text-[#1D4E89] px-8 py-3 rounded-full shadow-xl">
                        <h2 class="text-xl sm:text-2xl font-bold">Windah</h2>
                    </div>
                </div>
            </div>

            <!-- Role Badge -->
            <div class="flex items-center justify-center gap-3 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full border border-white/30 shadow-lg">
                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                <p class="text-sm sm:text-base font-semibold">Kepala Sekolah</p>
            </div>
        </div>

        <!-- Message Content -->
        <div>
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 sm:p-10 shadow-2xl border border-white/20">
                <div class="space-y-5 text-sm sm:text-base leading-relaxed">
                    <p class="italic text-blue-300 font-medium text-lg">
                        Assalamu'alaikum warahmatullahi wabarakatuh
                    </p>
                    
                    <p class="text-justify text-white/90">
                        Puji syukur kita panjatkan ke hadirat Allah SWT. 
                        <span class="font-semibold text-blue-300">SMP Negeri 38 Palembang</span>
                        dapat terus berkomitmen memberikan pendidikan terbaik bagi generasi penerus bangsa.
                    </p>

                    <p class="text-justify text-white/90">
                        Kami berupaya menciptakan lingkungan belajar yang inovatif, inklusif, dan berprestasi. Dengan dukungan tenaga pendidik profesional dan fasilitas memadai, kami yakin dapat mencetak generasi yang unggul dalam akademik maupun karakter.
                    </p>

                    <p class="text-justify text-white/90">
                        Mari bersama-sama mewujudkan visi dan misi sekolah untuk menciptakan siswa yang cerdas, berakhlak mulia, dan siap menghadapi tantangan masa depan.
                    </p>
                </div>

                <div class="mt-8 pt-6 border-t border-white/20">
                    <p class="text-blue-300 font-medium italic mb-4">
                        Wassalamu'alaikum warahmatullahi wabarakatuh
                    </p>
                    
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-0.5 bg-blue-300"></div>
                        <div>
                            <p class="font-bold text-lg text-white">Windah</p>
                            <p class="text-sm text-blue-300">Kepala SMP Negeri 38 Palembang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     PROFIL SEKOLAH
     ======================================== -->
<section class="bg-[#DCEBFA] text-[#1D4E89] py-16 sm:py-20 md:py-24 font-poppins relative overflow-hidden">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center px-6 relative z-10">

        <!-- School Photo → MOBILE: atas (order-1), DESKTOP: kanan (lg:order-2) -->
        <div class="flex justify-center order-1 lg:order-2" data-aos="fade-left" data-aos-delay="200">
            <div class="relative bg-[#1D4E89] rounded-3xl p-4 shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2">
                <img src="{{ asset('storage/logo/smp38palembang.jpg') }}"
                     alt="SMP Negeri 38 Palembang"
                     class="rounded-2xl w-full h-auto object-cover">
                <p class="text-white text-center text-lg font-semibold mt-4">
                    SMP NEGERI 38 PALEMBANG
                </p>
            </div>
        </div>

        <!-- Text Content → MOBILE: bawah (order-2), DESKTOP: kiri (lg:order-1) -->
        <div data-aos="fade-right" class="space-y-6 text-center lg:text-left order-2 lg:order-1">
            <span class="inline-flex items-center gap-2 bg-white text-[#1D4E89] px-4 py-2 rounded-full text-sm font-semibold shadow">
                ★ Sekolah Unggulan
            </span>

            <h2 class="text-4xl sm:text-5xl font-extrabold leading-tight">
                SMP NEGERI 38<br/>PALEMBANG
            </h2>

            <div class="flex items-center justify-center lg:justify-start gap-3">
                <span class="w-12 h-1 bg-[#1D4E89] rounded-full"></span>
                <span class="w-8 h-1 bg-blue-400 rounded-full"></span>
                <span class="w-6 h-1 bg-blue-300 rounded-full"></span>
            </div>

            <p class="text-base sm:text-lg text-gray-700 leading-relaxed max-w-lg mx-auto lg:mx-0">
                Sekolah menengah pertama negeri yang berkomitmen mencetak generasi unggul, berakhlak mulia, dan berprestasi dalam akademik maupun non-akademik.
            </p>

            <a href="/profile"
               class="inline-flex items-center gap-2 bg-[#1D4E89] hover:bg-[#163A63] text-white px-8 py-4 rounded-full shadow-lg transition-all duration-300 font-semibold hover:gap-3">
                Selengkapnya
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>

    </div>
</section>


<!-- ========================================
     EKSTRAKURIKULER
     ======================================== -->
<section 
    class="py-16 sm:py-20 md:py-24 bg-gradient-to-b from-[#1D4E89] to-[#DBEDFF] relative overflow-hidden"
    x-data="{ 
        scrollLeft() { $refs.carousel.scrollBy({ left: -350, behavior: 'smooth' }) }, 
        scrollRight() { $refs.carousel.scrollBy({ left: 350, behavior: 'smooth' }) } 
    }">

    <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white text-center mb-12 drop-shadow-lg" data-aos="fade-up">
        Kegiatan Ekstrakurikuler
    </h2>

    <!-- Left Navigation -->
    <button 
        @click="scrollLeft"
        class="hidden lg:flex absolute left-6 top-1/2 -translate-y-1/2 bg-white text-[#1D4E89] p-3 rounded-full shadow-xl hover:scale-110 transition z-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <!-- Carousel -->
    <div 
        x-ref="carousel"
        class="max-w-7xl mx-auto flex gap-8 overflow-x-auto scrollbar-hide snap-x snap-mandatory scroll-smooth pb-10 px-6 cursor-grab active:cursor-grabbing">

        @foreach($ekstrakurikulers as $index => $item)
        <div 
            class="flex-shrink-0 w-80 bg-white rounded-3xl shadow-xl p-5 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl snap-center"
            data-aos="zoom-in"
            data-aos-delay="{{ $index * 100 }}">

            <div class="rounded-2xl overflow-hidden h-48 mb-5 bg-gray-100">
                <img 
                    src="{{ asset('storage/' . $item->foto) }}" 
                    alt="{{ $item->nama_kegiatan }}" 
                    class="w-full h-full object-cover transition duration-700 hover:scale-110">
            </div>

            <div class="bg-[#1D4E89] text-white font-semibold text-lg rounded-full py-3 mb-4 text-center">
                {{ $item->nama_kegiatan }}
            </div>

            <p class="text-gray-700 text-center leading-relaxed text-sm">
                {{ Str::limit($item->deskripsi, 100) }}
            </p>
        </div>
        @endforeach
    </div>

    <!-- Right Navigation -->
    <button 
        @click="scrollRight"
        class="hidden lg:flex absolute right-6 top-1/2 -translate-y-1/2 bg-white text-[#1D4E89] p-3 rounded-full shadow-xl hover:scale-110 transition z-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</section>

<!-- ========================================
     KEUNGGULAN SEKOLAH
     ======================================== -->
<section class="py-16 sm:py-20 bg-[#DBEDFF]">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-12 text-[#1D4E89]" data-aos="fade-up">
            Keunggulan Sekolah
        </h2>

        <div class="bg-[#1D4E89] rounded-3xl px-8 sm:px-12 py-16 shadow-2xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach([
                    ['icon' => 'sekolah.png', 'judul' => 'Sistem Smart School', 
                     'deskripsi' => 'Sekolah kami mulai menerapkan Sistem Smart School sebagai upaya memanfaatkan teknologi dalam kegiatan sekolah.'],

                    ['icon' => 'Terakreditasi A.png', 'judul' => 'Akreditasi A', 
                     'deskripsi' => 'Sekolah kami berstatus Akreditasi A, yang menunjukkan kualitas pembelajaran, tenaga pendidik, serta pengelolaan sekolah yang sangat baik.'],

                    ['icon' => 'kurikulum merdeka.png', 'judul' => 'Kurikulum Merdeka', 
                     'deskripsi' => 'Sekolah kami menerapkan Kurikulum Merdeka yang menekankan kebebasan belajar, penguatan karakter, dan pengembangan potensi sesuai minat siswa.']
                ] as $index => $card)

                <div 
                    data-aos="zoom-in"
                    data-aos-delay="{{ $index * 150 }}"
                    class="flex flex-col items-center text-center px-4 group">
                    
                    <div class="bg-white p-5 rounded-2xl shadow-md mb-5 group-hover:scale-110 transition-transform duration-300">
                        <img 
                            src="{{ asset('storage/sekolah/' . $card['icon']) }}"
                            alt="{{ $card['judul'] }}"
                            class="w-16 h-16">
                    </div>

                    <h3 class="text-white font-bold text-xl mb-3">
                        {{ $card['judul'] }}
                    </h3>

                    <p class="text-white/90 text-sm leading-relaxed">
                        {{ $card['deskripsi'] }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- ========================================
     STATISTIK SEKOLAH
     ======================================== -->
<section id="statistik-section" class="py-16 sm:py-20 md:py-24 bg-gradient-to-b from-[#DBEDFF] to-white">
    <div class="container mx-auto text-center px-6">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold mb-14 text-[#1D4E89]" data-aos="fade-up">
            Statistik Sekolah
        </h2>

        <div class="flex flex-wrap justify-center gap-8 sm:gap-10">
            <!-- Guru -->
            <div class="bg-[#1D4E89] rounded-full p-6 sm:p-8 flex flex-col items-center justify-center shadow-xl 
                        w-40 h-40 sm:w-48 sm:h-48 md:w-52 md:h-52 
                        hover:scale-110 hover:shadow-2xl transition duration-300"
                 data-aos="zoom-in"
                 data-aos-delay="100">
                <div class="bg-white rounded-full p-2 sm:p-3 mb-3 shadow-md">
                    <img src="https://img.icons8.com/ios-filled/100/1D4E89/teacher.png" class="w-10 h-10 sm:w-14 sm:h-14">
                </div>
                <span class="text-4xl sm:text-5xl font-extrabold text-white counter" data-target="{{ $statistik->guru ?? 0 }}">0</span>
                <span class="text-lg sm:text-xl text-white mt-1 sm:mt-2">Guru</span>
            </div>

            <!-- Siswa -->
            <div class="bg-[#1D4E89] rounded-full p-6 sm:p-8 flex flex-col items-center justify-center shadow-xl 
                        w-40 h-40 sm:w-48 sm:h-48 md:w-52 md:h-52
                        hover:scale-110 hover:shadow-2xl transition duration-300"
                 data-aos="zoom-in"
                 data-aos-delay="200">
                <div class="bg-white rounded-full p-2 sm:p-3 mb-3 shadow-md">
                    <img src="https://img.icons8.com/ios-filled/100/1D4E89/student-male.png" class="w-10 h-10 sm:w-14 sm:h-14">
                </div>
                <span class="text-4xl sm:text-5xl font-extrabold text-white counter" 
                      data-target="{{ ($statistik->kelas7 ?? 0) + ($statistik->kelas8 ?? 0) + ($statistik->kelas9 ?? 0) }}">0</span>
                <span class="text-lg sm:text-xl text-white mt-1 sm:mt-2">Siswa</span>
            </div>

            <!-- Staf -->
            <div class="bg-[#1D4E89] rounded-full p-6 sm:p-8 flex flex-col items-center justify-center shadow-xl 
                        w-40 h-40 sm:w-48 sm:h-48 md:w-52 md:h-52
                        hover:scale-110 hover:shadow-2xl transition duration-300"
                 data-aos="zoom-in"
                 data-aos-delay="300">
                <div class="bg-white rounded-full p-2 sm:p-3 mb-3 shadow-md">
                    <img src="https://img.icons8.com/ios-filled/100/1D4E89/conference.png" class="w-10 h-10 sm:w-14 sm:h-14">
                </div>
                <span class="text-4xl sm:text-5xl font-extrabold text-white counter" data-target="{{ $statistik->staf ?? 0 }}">0</span>
                <span class="text-lg sm:text-xl text-white mt-1 sm:mt-2">Staf</span>
            </div>
        </div>
    </div>
</section>


<!-- ========================================
     SCRIPTS & STYLES
     ======================================== -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100,
        easing: 'ease-in-out'
    });

    // Counter Animation
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".counter");
        const speed = 60;
        let animated = false;

        const animateCounters = () => {
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute("data-target");
                    const count = +counter.innerText;
                    const increment = Math.ceil(target / speed);

                    if (count < target) {
                        counter.innerText = count + increment;
                        setTimeout(updateCount, 20);
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

<style>
/* Hide scrollbar */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

/* Smooth transitions */
* {
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}

/* Responsive adjustments */
@media (max-width: 640px) {
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
}
</style>

@endsection