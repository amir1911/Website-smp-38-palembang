@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">
  <h1 class="text-3xl md:text-4xl font-bold text-center text-blue-600 mb-12">
    {{ $title }}
  </h1>

  @if($guru->isEmpty())
    <p class="text-center text-gray-500 text-lg">Belum ada data yang ditambahkan.</p>
  @else
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    @foreach ($guru as $item)
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift transition-all">
        <img src="{{ asset('storage/' . $item->foto) }}" 
             alt="{{ $item->nama }}" 
             class="w-full h-64 object-cover">
        <div class="p-5">
          <h2 class="text-xl font-bold text-gray-800">{{ $item->nama }}</h2>
          <p class="text-gray-600">{{ $item->mata_pelajaran }}</p>
          <p class="text-sm text-gray-500 mt-1 italic">{{ $item->jabatan }}</p>
          <div class="flex space-x-3 mt-4">
            @if($item->facebook)
              <a href="{{ $item->facebook }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                <i class="fab fa-facebook text-lg"></i>
              </a>
            @endif
            @if($item->instagram)
              <a href="{{ $item->instagram }}" target="_blank" class="text-pink-500 hover:text-pink-700">
                <i class="fab fa-instagram text-lg"></i>
              </a>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
  @endif
</div>
@endsection
