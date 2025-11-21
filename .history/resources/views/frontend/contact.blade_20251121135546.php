@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<!-- Import Google Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Background Gradient Section -->
<div class="w-full px-4 sm:px-6 md:px-12 lg:px-20 py-12 sm:py-16 md:py-24 -mb-20"
     style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">

    <!-- ========== HEADER SECTION ========== -->
    <div class="text-center mb-8 sm:mb-10 md:mb-12">
        <div class="inline-block bg-white/20 backdrop-blur-sm px-5 sm:px-6 md:px-8 py-1.5 sm:py-2 rounded-full mb-2 sm:mb-3 border border-white/30">
            <h1 class="text-white text-xs sm:text-sm md:text-base lg:text-lg font-bold tracking-wide">
                KONTAK KAMI
            </h1>
        </div>
        <h2 class="text-white text-base sm:text-lg md:text-xl lg:text-2xl font-bold tracking-wide">
            SMP NEGERI 38 PALEMBANG
        </h2>
    </div>

    <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-5 gap-6 md:gap-10 items-start">

        {{-- ==================== INFORMASI & GOOGLE MAP ==================== --}}
        <div class="lg:col-span-3 space-y-6 order-1">
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-5 sm:p-6 md:p-8">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-3">Alamat Sekolah</h3>
                <p class="text-gray-600 leading-relaxed text-justify text-sm sm:text-base mb-6">
                    SMP Negeri 38 Palembang merupakan sekolah unggulan yang berkomitmen membentuk generasi berkarakter, cerdas, dan berdaya saing. 
                    Berlokasi strategis di wilayah Palembang, sekolah kami dilengkapi dengan berbagai fasilitas modern untuk mendukung kegiatan belajar mengajar.
                </p>

                {{-- Google Map --}}
                <div class="rounded-xl sm:rounded-2xl overflow-hidden shadow-md border border-gray-200">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.583878197617!2d104.77328107472947!3d-2.935240997041048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b76eaabf5c3c9%3A0x91a4d87e554b1c20!2sSMP%20Negeri%2038%20Palembang!5e0!3m2!1sid!2sid!4v1760871744026!5m2!1sid!2sid" 
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        {{-- ==================== FORM KONTAK ==================== --}}
        <div class="lg:col-span-2 order-2">
            <div class="bg-white p-5 sm:p-6 md:p-8 rounded-2xl sm:rounded-3xl shadow-xl">
                <h2 class="text-xl sm:text-2xl font-bold mb-4 text-gray-800">Kontak Kami</h2>
                <p class="text-gray-500 mb-5 text-sm">
                    Kirimkan pertanyaan atau saran Anda melalui form di bawah ini.
                </p>

                {{-- Alert jika berhasil --}}
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-sm border border-green-200">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-3">
                    @csrf
                    <div class="space-y-3">
                        <input name="name" type="text" placeholder="Nama Lengkap*" required 
                            class="w-full border border-gray-300 p-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        <input name="email" type="email" placeholder="E-mail*" required 
                            class="w-full border border-gray-300 p-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        <input name="phone" type="text" placeholder="No. HP*" required 
                            class="w-full border border-gray-300 p-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        <input name="subject" type="text" placeholder="Subjek" 
                            class="w-full border border-gray-300 p-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        <textarea name="message" placeholder="Tulis pesan Anda..." required 
                            class="w-full border border-gray-300 p-3 rounded-2xl h-28 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition"></textarea>
                    </div>

                    <button type="submit" 
                        class="w-full text-white py-2.5 rounded-full font-semibold text-sm shadow-md hover:shadow-lg active:scale-95 transition duration-300"
                        style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                        Kirim Pesan ✉️
                    </button>
                </form>

                {{-- Ikon Sosial Media --}}
                <div class="flex justify-center space-x-4 mt-6">
                    <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-md hover:shadow-lg transition-all"
                       style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/smpn38_palembang" target="_blank" 
                       class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-md hover:shadow-lg transition-all"
                       style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com/@spentipanplg" target="_blank"
                       class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-md hover:shadow-lg transition-all"
                       style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ========== TOMBOL KEMBALI ========== -->
    <div class="flex justify-center mt-6 sm:mt-8 md:mt-10">
        <a href="/" 
           class="inline-block text-white px-6 sm:px-7 md:px-8 py-2 sm:py-2.5 rounded-full font-semibold 
                  shadow-md hover:shadow-lg transition-all duration-300 text-sm sm:text-base"
           style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 50%, #1A4E8A 100%);">
            Kembali
        </a>
    </div>

</div>

@endsection