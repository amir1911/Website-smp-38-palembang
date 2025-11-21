{{-- @extends('layouts.app')

@section('title', 'Pengumuman Alumni')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4">
        <h1 class="text-3xl font-bold text-center text-blue-700 mb-10">📢 Pengumuman Alumni</h1>

        @if ($pengumuman->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($pengumuman as $item)
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition p-4 flex flex-col">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" 
                                 alt="Foto Pengumuman" 
                                 class="rounded-xl mb-3 h-40 w-full object-cover">
                        @endif

                        <h2 class="text-lg font-semibold text-gray-800">{{ $item->judul }}</h2>
                        <p class="text-sm text-gray-500 mb-2">📅 {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</p>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit(strip_tags($item->isi), 120) }}</p>

                        @if ($item->file_pdf)
                            <a href="{{ asset('storage/' . $item->file_pdf) }}" 
                               target="_blank"
                               class="mt-auto inline-flex items-center justify-center bg-blue-600 text-white text-sm font-medium py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                                📄 Download PDF
                            </a>
                        @else
                            <span class="mt-auto text-gray-400 text-sm italic">Tidak ada file PDF</span>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20">
                <p class="text-gray-500 text-lg">Belum ada pengumuman untuk alumni 📭</p>
            </div>
        @endif
    </div>
</div>
@endsection --}}
