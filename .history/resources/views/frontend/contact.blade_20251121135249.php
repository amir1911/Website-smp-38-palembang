@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')

<!-- Background Gradient Section -->
<div class="w-full px-4 sm:px-6 md:px-12 lg:px-20 py-12 sm:py-16 md:py-24 -mb-20"
     style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">

    <div class="max-w-6xl mx-auto">

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

        <!-- ========== MAIN CONTENT ========== -->
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 md:gap-8 mx-2 sm:mx-0">

            <!-- ===== INFORMASI & GOOGLE MAP ===== -->
            <div class="lg:col-span-3 space-y-6">
                
                <!-- Card Alamat -->
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-5 sm:p-6 md:p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center shadow-md flex-shrink-0"
                             style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                            <i class="fas fa-map-marker-alt text-white text-lg sm:text-xl"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">
                            Alamat Sekolah
                        </h3>
                    </div>
                    
                    <p class="text-gray-600 leading-relaxed text-sm sm:text-base mb-6 text-justify">
                        SMP Negeri 38 Palembang merupakan sekolah unggulan yang berkomitmen membentuk generasi berkarakter, cerdas, dan berdaya saing. 
                        Berlokasi strategis di wilayah Palembang, sekolah kami dilengkapi dengan berbagai fasilitas modern untuk mendukung kegiatan belajar mengajar.
                    </p>

                    <!-- Google Map -->
                    <div class="rounded-xl sm:rounded-2xl overflow-hidden shadow-md border border-gray-200">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.583878197617!2d104.77328107472947!3d-2.935240997041048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b76eaabf5c3c9%3A0x91a4d87e554b1c20!2sSMP%20Negeri%2038%20Palembang!5e0!3m2!1sid!2sid!4v1760871744026!5m2!1sid!2sid" 
                            width="100%" 
                            height="300" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="w-full">
                        </iframe>
                    </div>
                </div>

                <!-- Card Info Kontak -->
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-5 sm:p-6 md:p-8">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center shadow-md flex-shrink-0"
                             style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                            <i class="fas fa-address-book text-white text-lg sm:text-xl"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">
                            Informasi Kontak
                        </h3>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <!-- Telepon -->
                        <div class="flex items-center gap-3 p-3 sm:p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                                 style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                                <i class="fas fa-phone-alt text-white text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Telepon</p>
                                <p class="text-sm sm:text-base font-semibold text-gray-800">0815-3282-xxx</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-center gap-3 p-3 sm:p-4 bg-gray-50 rounded-xl border border-gray-100">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                                 style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                                <i class="fas fa-envelope text-white text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Email</p>
                                <p class="text-sm sm:text-base font-semibold text-gray-800 break-all">smpn_38plg@yahoo.co.id</p>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="flex items-center gap-3 p-3 sm:p-4 bg-gray-50 rounded-xl border border-gray-100 sm:col-span-2">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0"
                                 style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                                <i class="fas fa-map-marker-alt text-white text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-medium">Alamat</p>
                                <p class="text-sm sm:text-base font-semibold text-gray-800">Jl. Tanjung Sari No.1, Palembang</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ===== FORM KONTAK ===== -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-5 sm:p-6 md:p-8 sticky top-24">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl flex items-center justify-center shadow-md flex-shrink-0"
                             style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                            <i class="fas fa-paper-plane text-white text-lg sm:text-xl"></i>
                        </div>
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800">
                            Kirim Pesan
                        </h3>
                    </div>
                    
                    <p class="text-gray-500 mb-5 text-xs sm:text-sm">
                        Kirimkan pertanyaan atau saran Anda melalui form di bawah ini.
                    </p>

                    <!-- Alert Success -->
                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4 text-xs sm:text-sm border border-green-200 flex items-center gap-2">
                            <i class="fas fa-check-circle"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-3 sm:space-y-4">
                        @csrf
                        
                        <input name="name" type="text" placeholder="Nama Lengkap *" required 
                            class="w-full border border-gray-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                        
                        <input name="email" type="email" placeholder="E-mail *" required 
                            class="w-full border border-gray-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                        
                        <input name="phone" type="text" placeholder="No. HP *" required 
                            class="w-full border border-gray-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                        
                        <input name="subject" type="text" placeholder="Subjek" 
                            class="w-full border border-gray-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50">
                        
                        <textarea name="message" placeholder="Tulis pesan Anda..." required rows="4"
                            class="w-full border border-gray-200 p-3 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-gray-50 resize-none"></textarea>

                        <button type="submit" 
                            class="w-full text-white py-3 rounded-xl font-semibold text-sm sm:text-base shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2"
                            style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 100%);">
                            <i class="fas fa-paper-plane"></i>
                            Kirim Pesan
                        </button>
                    </form>

                    <!-- Social Media -->
                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <p class="text-xs text-gray-500 text-center mb-3">Ikuti Kami</p>
                        <div class="flex justify-center space-x-4">
                            <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-md hover:shadow-lg transition-all hover:scale-110"
                               style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/smpn38_palembang" target="_blank" 
                               class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-md hover:shadow-lg transition-all hover:scale-110"
                               style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.tiktok.com/@spentipanplg" target="_blank"
                               class="w-10 h-10 rounded-full flex items-center justify-center text-white shadow-md hover:shadow-lg transition-all hover:scale-110"
                               style="background: linear-gradient(135deg, #1A4E8A 0%, #2575B8 100%);">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
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

</div>

@endsection