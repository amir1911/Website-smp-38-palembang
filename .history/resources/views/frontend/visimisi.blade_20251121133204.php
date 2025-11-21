@extends('layouts.app')

@section('title', 'Visi & Misi Sekolah')

@section('content')

<!-- Background Gradient Section -->
<div class="w-full px-6 md:px-12 lg:px-20 py-16 md:py-24 -mb-20"
     style="background: linear-gradient(180deg, #4A7CB8 0%, #6B9AD0 30%, #9CC1E6 60%, #BFD9F3 100%);">

    <div class="max-w-4xl mx-auto">

        <!-- ========== VISI SECTION ========== -->
        <div class="mb-12">
            <!-- Title Visi -->
            <div class="flex justify-center mb-6">
                <span class="inline-block text-white text-lg md:text-xl lg:text-2xl font-bold 
                            px-8 md:px-10 py-3 rounded-full shadow-lg"
                      style="background: linear-gradient(90deg, #1E5799 0%, #2B7BC4 50%, #1E5799 100%);">
                    Visi SMP Negeri 38 Palembang
                </span>
            </div>

            <!-- Card Visi -->
            <div class="bg-white rounded-[30px] shadow-xl p-8 md:p-10">
                <p class="text-gray-700 text-base md:text-lg leading-relaxed text-center italic">
                    "Menjadi sekolah unggul dalam prestasi, berkarakter, berwawasan 
                    lingkungan, dan berlandaskan iman serta taqwa."
                </p>
            </div>
        </div>

        <!-- ========== MISI SECTION ========== -->
        <div>
            <!-- Title Misi -->
            <div class="flex justify-center mb-6">
                <span class="inline-block text-white text-lg md:text-xl lg:text-2xl font-bold 
                            px-8 md:px-10 py-3 rounded-full shadow-lg"
                      style="background: linear-gradient(90deg, #1E5799 0%, #2B7BC4 50%, #1E5799 100%);">
                    Misi SMP Negeri 38 Palembang
                </span>
            </div>

            <!-- Card Misi -->
            <div class="bg-white rounded-[30px] shadow-xl p-8 md:p-10">
                <ul class="space-y-4 text-gray-700 text-sm md:text-base leading-relaxed">
                    <li class="flex items-start">
                        <span class="mr-3 text-gray-500">•</span>
                        <span>Meningkatkan mutu pembelajaran berbasis teknologi digital.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-3 text-gray-500">•</span>
                        <span>Menumbuhkan karakter disiplin, jujur, dan tanggung jawab.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-3 text-gray-500">•</span>
                        <span>Meningkatkan prestasi akademik dan non-akademik secara berkelanjutan.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-3 text-gray-500">•</span>
                        <span>Mewujudkan lingkungan sekolah yang hijau, sehat dan ramah anak.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="mr-3 text-gray-500">•</span>
                        <span>Membangun kolaborasi dengan masyarakat dan dunia pendidikan.</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</div>

@endsection