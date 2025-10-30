@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative w-full h-[500px] overflow-hidden">
  <img src="{{ asset('images/kelas38.jpg') }}" 
       alt="SMPN 38 Palembang" 
       class="w-full h-full object-cover brightness-75">
  
  <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white">
    <h2 class="text-3xl md:text-5xl font-bold mb-3">Welcome</h2>
    <h3 class="text-2xl md:text-4xl font-extrabold">SMPN 38 Palembang</h3>
  </div>
</section>

<!-- Section Tambahan -->
<section class="max-w-6xl mx-auto py-16 px-6 text-center">
  <h2 class="text-3xl font-bold text-indigo-700 mb-6">Tentang Sekolah</h2>
  <p class="text-gray-600 leading-relaxed max-w-3xl mx-auto">
    SMP Negeri 38 Palembang berkomitmen untuk menciptakan generasi pelajar yang berprestasi, 
    berkarakter, dan siap menghadapi tantangan global dengan semangat kebersamaan dan inovasi.
  </p>
</section>
@endsection
