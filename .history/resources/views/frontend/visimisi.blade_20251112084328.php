@extends('layouts.app')

@section('title', 'Visi & Misi Sekolah')

@section('content')
{{-- ===== AOS CSS (Animate On Scroll) ===== --}}
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<section class="bg-gradient-to-b from-blue-50 to-white py-16 md:py-20 px-6 md:px-10">
    <div class="max-w-6xl mx-auto text-center">

        {{-- ===== JUDUL HALAMAN ===== --}}
        <div data-aos="fade-down" data-aos-duration="800" class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 font-semibold px-4 py-1.5 rounded-full text-sm shadow-sm mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 110-16 8 8 0 010 16z" />
            </svg>
            Visi & Misi Sekolah
        </div>

        <h2 data-aos="fade-up" data-aos-duration="900" class="text-3xl md:text-4xl font-bold text-blue-700 mb-2">
            SMP Negeri 38 Palembang
        </h2>

        <p data-aos="fade-up" data-aos-delay="200" class="text-gray-600 text-base md:text-lg mb-12 max-w-3xl mx-auto">
            Komitmen dalam membentuk generasi berkarakter dan berdaya saing melalui nilai IMTAQ, 
            kemandirian, kolaborasi, dan kepemimpinan.
        </p>

        {{-- ===== VISI SEKOLAH ===== --}}
        <div class="max-w-4xl mx-auto mb-16" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-2xl font-bold text-blue-700 mb-4 text-center">A. Visi Sekolah</h3>
            <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-lg p-8 md:p-10 border border-blue-100">
                <p class="text-gray-700 text-lg md:text-xl leading-relaxed italic text-center">
                    “Mewujudkan generasi yang berkarakter yang mengedepankan IMTAQ, 
                    kemandirian, kolaborasi, dan kepemimpinan sebagai pondasi utama.”
                </p>
            </div>
        </div>

        {{-- ===== MISI SEKOLAH ===== --}}
        <div class="max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="400">
            <h3 class="text-2xl font-bold text-blue-700 mb-6 text-center">B. Misi Sekolah</h3>
            <div class="bg-blue-50 rounded-3xl shadow-md p-8 md:p-10 border border-blue-100">
                <ul class="space-y-4 text-gray-700 text-base md:text-lg leading-relaxed list-decimal list-inside text-left md:text-justify">
                    <li>Menerapkan kurikulum yang berfokus pada pengembangan karakter.</li>
                    <li>Meningkatkan kerjasama dengan orang tua dan masyarakat untuk mendukung pengembangan karakter murid.</li>
                    <li>Mengembangkan potensi murid agar memiliki jiwa kemandirian, kolaborasi, dan kepemimpinan yang kuat.</li>
                    <li>Menciptakan lingkungan sekolah yang kondusif serta mendorong partisipasi aktif dalam kegiatan yang berdampak positif pada masyarakat.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ===== AOS SCRIPT ===== --}}
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        once: true, // animasi hanya sekali saat scroll
        offset: 100 // jarak pemicu animasi
    });
</script>
@endsection
