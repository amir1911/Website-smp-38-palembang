@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<!-- Import Google Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<!-- Font Awesome CDN (ikon sosial media) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Ml4bPQ4mHwCBcGvYCBef7hZ1VGpBkhFwU8ZzRY7r5cE1aM9y3fAtK7hP6Hu3B3TQhJHjv72EdbDe8eHqavHOAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<section class="py-20 font-[Poppins] -mb-20"
         style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-5 gap-10 items-start">

        {{-- ==================== INFORMASI & GOOGLE MAP ==================== --}}
        {{-- Order 1 untuk mobile (tampil di atas) --}}
        <div class="lg:col-span-3 space-y-8 order-1" data-aos="fade-right">
            <h3 class="text-3xl font-bold text-white mb-3">Alamat Sekolah</h3>
            <p class="text-white/90 leading-relaxed text-justify text-sm sm:text-base">
                SMP Negeri 38 Palembang merupakan sekolah unggulan yang berkomitmen membentuk generasi berkarakter, cerdas, dan berdaya saing. 
                Berlokasi strategis di wilayah Palembang, sekolah kami dilengkapi dengan berbagai fasilitas modern untuk mendukung kegiatan belajar mengajar.
            </p>

            {{-- Google Map --}}
            <div class="rounded-2xl overflow-hidden shadow-md border border-white/20 hover:shadow-xl transition duration-500">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.583878197617!2d104.77328107472947!3d-2.935240997041048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b76eaabf5c3c9%3A0x91a4d87e554b1c20!2sSMP%20Negeri%2038%20Palembang!5e0!3m2!1sid!2sid!4v1760871744026!5m2!1sid!2sid" 
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        {{-- ==================== FORM KONTAK ==================== --}}
        {{-- Order 2 untuk mobile (tampil di bawah) --}}
        <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-500 order-2" data-aos="fade-left">
            <h2 class="text-2xl font-bold mb-4 text-[#20477A]">Kontak Kami</h2>
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
                        class="w-full border border-gray-300 p-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-[#2C8BEF] transition">
                    <input name="email" type="email" placeholder="E-mail*" required 
                        class="w-full border border-gray-300 p-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-[#2C8BEF] transition">
                    <input name="phone" type="text" placeholder="No. HP*" required 
                        class="w-full border border-gray-300 p-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-[#2C8BEF] transition">
                    <input name="subject" type="text" placeholder="Subjek" 
                        class="w-full border border-gray-300 p-2.5 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-[#2C8BEF] transition">
                    <textarea name="message" placeholder="Tulis pesan Anda..." required 
                        class="w-full border border-gray-300 p-3 rounded-2xl h-28 text-sm focus:outline-none focus:ring-2 focus:ring-[#2C8BEF] transition"></textarea>
                </div>

                <button type="submit" 
                    class="bg-[#4C8BBE] w-full text-white py-2.5 rounded-full font-semibold text-sm hover:bg-[#1f7bd6] active:scale-95 transition duration-300">
                    Kirim Pesan ✉️
                </button>
            </form>

            {{-- Ikon Sosial Media --}}
            <div class="flex justify-center space-x-6 mt-6">
                <a href="#" class="text-[#4C8BBE] hover:text-[#1f7bd6] text-xl transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-[#2C8BEF] hover:text-[#1f7bd6] text-xl transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-[#2C8BEF] hover:text-[#1f7bd6] text-xl transition"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- Animasi Scroll --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script>
    AOS.init({
        duration: 900,
        once: true,
    });
</script>
@endsection