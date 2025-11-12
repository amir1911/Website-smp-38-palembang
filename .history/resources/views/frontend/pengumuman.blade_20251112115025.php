@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">📢 Pengumuman</h1>

    {{-- Bagian Pengumuman dengan File PDF --}}
    @if ($pengumumanPdf->count() > 0)
        <div class="bg-white rounded-2xl shadow p-6 mb-8">
            <h2 class="text-2xl font-semibold text-indigo-600 mb-4">📄 Pengumuman dengan File PDF</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 rounded-lg">
                    <thead class="bg-indigo-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-700 font-medium">Judul</th>
                            <th class="px-4 py-2 text-left text-gray-700 font-medium">Kategori</th>
                            <th class="px-4 py-2 text-left text-gray-700 font-medium">Tanggal</th>
                            <th class="px-4 py-2 text-center text-gray-700 font-medium">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($pengumumanPdf as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $item->judul }}</td>
                                <td class="px-4 py-3">
                                    <span class="bg-indigo-50 text-indigo-600 px-3 py-1 rounded-full text-sm">
                                        {{ $item->kategori->nama_kategori ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">{{ $item->created_at->format('d M Y') }}</td>
                                <td class="px-4 py-3 text-center">
                                    <a href="{{ asset('storage/'.$item->file_pdf) }}" target="_blank"
                                       class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                 d="M12 4v16m8-8H4" />
                                        </svg>
                                        Download PDF
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    {{-- Bagian Pengumuman Biasa --}}
    <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-6">
        @forelse ($pengumumanBiasa as $item)
            <div class="bg-white shadow rounded-2xl overflow-hidden hover:shadow-lg transition">
                @if ($item->foto)
                    <img src="{{ asset('storage/'.$item->foto) }}" class="w-full h-48 object-cover" alt="Foto Pengumuman">
                @endif
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item->judul }}</h3>
                    <p class="text-sm text-gray-600 mb-3 line-clamp-3">{{ $item->isi }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs bg-gray-100 text-gray-700 px-3 py-1 rounded-full">
                            {{ $item->kategori->nama_kategori ?? '-' }}
                        </span>
                        <span class="text-xs text-gray-500">{{ $item->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500 py-10">
                Tidak ada pengumuman untuk saat ini.
            </div>
        @endforelse
    </div>
</div>
@endsection
