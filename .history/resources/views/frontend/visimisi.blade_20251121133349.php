@extends('layouts.app')

@section('title', 'Visi & Misi Sekolah')

@section('content')

<!-- Background Gradient Section -->
<div class="w-full px-4 sm:px-6 md:px-12 lg:px-20 py-12 sm:py-16 md:py-24 -mb-20"
     style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">

    <div class="max-w-3xl mx-auto">

        <!-- ========== VISI SECTION ========== -->
        <div class="mb-8 sm:mb-10 md:mb-12">
            <!-- Title Visi -->
            <div class="flex justify-center mb-4 sm:mb-5 md:mb-6">
                <h2 class="inline-block text-white text-base sm:text-lg md:text-xl lg:text-2xl font-bold 
                            px-5 sm:px-6 md:px-8 lg:px-10 py-2 sm:py-2.5 md:py-3 rounded-full shadow-lg text-center"
                      style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 50%, #1A4E8A 100%);">
                    Visi SMP Negeri 38 Palembang
                </h2>
            </div>

            <!-- Card Visi -->
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-5 sm:p-6 md:p-8 lg:p-10 mx-2 sm:mx-0">
                <p class="text-gray-600 text-sm sm:text-base md:text-lg leading-relaxed text-center">
                    "Menjadi sekolah unggul dalam prestasi, berkarakter, berwawasan 
                    lingkungan, dan berlandaskan iman serta taqwa."
                </p>
            </div>
        </div>

        <!-- ========== MISI SECTION ========== -->
        <div>
            <!-- Title Misi -->
            <div class="flex justify-center mb-4 sm:mb-5 md:mb-6">
                <h2 class="inline-block text-white text-base sm:text-lg md:text-xl lg:text-2xl font-bold 
                            px-5 sm:px-6 md:px-8 lg:px-10 py-2 sm:py-2.5 md:py-3 rounded-full shadow-lg text-center"
                      style="background: linear-gradient(90deg, #1A4E8A 0%, #2575B8 50%, #1A4E8A 100%);">
                    Misi SMP Negeri 38 Palembang
                </h2>
            </div>

            <!-- Card Misi -->
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-5 sm:p-6 md:p-8 lg:p-10 mx-2 sm:mx-0">
                <ul class="space-y-3 sm:space-y-4 text-gray-600 text-sm sm:text-base leading-relaxed">
                    <li class="flex items-start">
                        <span class="mr-2 sm:mr-3 text-gray-400 font-bold">•</span>
                        <span>Meningkatkan mutu pembelajaran berbasis teknologi digital.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2 sm:mr-3 text-gray-400 font-bold">•</span>
                        <span>Menumbuhkan karakter disiplin, jujur, dan tanggung jawab.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2 sm:mr-3 text-gray-400 font-bold">•</span>
                        <span>Meningkatkan prestasi akademik dan non-akademik secara berkelanjutan.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2 sm:mr-3 text-gray-400 font-bold">•</span>
                        <span>Mewujudkan lingkungan sekolah yang hijau, sehat dan ramah anak.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-2 sm:mr-3 text-gray-400 font-bold">•</span>
                        <span>Membangun kolaborasi dengan masyarakat dan dunia pendidikan.</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</div>

@endsection