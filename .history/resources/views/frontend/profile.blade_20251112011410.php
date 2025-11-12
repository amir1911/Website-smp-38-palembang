@extends('layouts.app')

@section('content')
<section class="py-20 bg-gray-50 font-[Poppins]">

    <!-- Bagian Tentang Sekolah -->
    <div class="max-w-5xl mx-auto text-center px-6">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">
            Tentang <span class="text-[#49ADFF]">SMP Negeri 38</span> Palembang
        </h2>

        <!-- Gambar Sekolah -->
        <div class="w-full h-64 bg-gray-200 rounded-xl mb-8 flex items-center justify-center">
            <span class="text-gray-400">[ Foto Sekolah di sini ]</span>
        </div>

        <!-- Deskripsi -->
        <p class="text-gray-700 leading-relaxed text-justify">
            SMP Negeri 38 Palembang merupakan salah satu sekolah menengah pertama negeri yang berada di bawah naungan 
            Dinas Pendidikan Kota Palembang. Sekolah ini berdiri sebagai wujud dari upaya pemerintah dalam memperluas 
            akses pendidikan bagi masyarakat Palembang, khususnya di wilayah yang terus berkembang.
        </p>
        <p class="text-gray-700 leading-relaxed text-justify mt-4">
            Sejak berdiri, SMP Negeri 38 Palembang berkomitmen untuk menjadi lembaga pendidikan yang unggul dalam prestasi 
            akademik maupun nonakademik, serta berperan aktif dalam membentuk generasi muda yang berkarakter, beriman, dan 
            berwawasan luas. 
        </p>
        <p class="text-gray-700 leading-relaxed text-justify mt-4">
            Dengan dukungan berbagai pihak — baik pemerintah, guru, maupun masyarakat — SMP Negeri 38 Palembang terus 
            berkembang menjadi sekolah yang lebih modern, nyaman, dan berorientasi pada kemajuan teknologi.
        </p>
    </div>

    <!-- Bagian Visi dan Misi -->
    <div class="max-w-5xl mx-auto mt-20 px-6">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-4">
            VISI dan MISI
        </h2>
        <h3 class="text-[#49ADFF] text-center text-xl font-semibold mb-10">
            SPENTIPAN
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Kartu Visi -->
            <div class="bg-[#49ADFF] text-white p-6 rounded-2xl shadow-lg">
                <h4 class="font-semibold text-lg mb-2">SMP Negeri 38 Palembang:</h4>
                <p class="italic text-sm leading-relaxed">
                    “Mewujudkan generasi berkarakter yang mengedepankan IMTAQ, 
                    kemandirian, kolaborasi, dan kepemimpinan sebagai pondasi utama.”
                </p>
            </div>

            <!-- Daftar Misi -->
            <div class="bg-white p-6 rounded-2xl shadow-lg text-gray-700">
                <ol class="list-decimal list-inside space-y-3 text-justify">
                    <li>Menerapkan kurikulum yang berfokus pada pengembangan karakter.</li>
                    <li>Meningkatkan kerja sama dengan orang tua dan masyarakat untuk mendukung pengembangan karakter murid.</li>
                    <li>Mengembangkan potensi murid agar memiliki jiwa kemandirian, kolaborasi, dan kepemimpinan yang kuat.</li>
                    <li>Meningkatkan lingkungan sekolah yang kondusif serta mendorong partisipasi aktif dalam kegiatan yang berdampak positif pada masyarakat.</li>
                </ol>
            </div>
        </div>
    </div>

</section>
@endsection
