@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center font-[Poppins] px-4 py-10 -mb-20"
        style="background: linear-gradient(180deg, #4A7CB8 0%, #5E8FC5 20%, #7BA6D4 40%, #9CBFE3 60%, #B8D4EE 80%, #D0E4F5 100%);">
        <div
            class="bg-white p-8 rounded-3xl shadow-2xl w-full max-w-2xl border-2 border-[#4C8BBE] hover:shadow-[#4C8BBE]/50 transition-all duration-300">

            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-[#4C8BBE] rounded-full shadow-lg mb-4">
                    <span class="text-4xl">📖</span>
                </div>
                <h1 class="text-4xl font-bold text-[#4C8BBE] animate-fade-in mb-2">
                    Buku Tamu Digital
                </h1>
                <p class="text-[#4C8BBE] text-sm font-medium">Silakan lengkapi data dan ambil foto Anda</p>
            </div>

            {{-- Pesan sukses --}}
            @if (session('success'))
                <div class="bg-[#4C8BBE] text-white p-4 rounded-xl mb-6 text-center shadow-lg animate-fade-in">
                    <div class="flex items-center justify-center gap-2">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            {{-- === FORM (Kamera di atas tapi masih dalam form) === --}}
            <form action="{{ route('buku-tamu.store') }}" method="POST" class="space-y-6 animate-fade-in">
                @csrf

                {{-- Bagian Kamera --}}
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl border-2 border-[#4C8BBE] shadow-inner">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-[#4C8BBE] rounded-lg flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-[#4C8BBE]">Ambil Foto</h2>
                    </div>

                    <div class="text-center">
                        <div class="relative inline-block">
                            <video id="video" width="320" height="240" autoplay
                                class="border-4 border-white rounded-2xl shadow-xl mx-auto bg-gray-900"></video>
                            <div
                                class="absolute -bottom-2 -right-2 w-8 h-8 bg-[#4C8BBE] rounded-full flex items-center justify-center shadow-lg">
                                <div class="w-3 h-3 bg-white rounded-full animate-pulse"></div>
                            </div>
                        </div>
                        <canvas id="canvas" width="320" height="240" class="hidden"></canvas>
                        <input type="hidden" name="foto" id="foto">

                        <div class="mt-5 flex justify-center gap-3 flex-wrap">
                            <button type="button" id="captureBtn"
                                class="bg-[#4C8BBE] hover:bg-[#3d6f99] text-white px-6 py-3 rounded-xl shadow-lg transition-all transform hover:scale-105 active:scale-95 font-semibold flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Ambil Foto
                            </button>
                            <button type="button" id="switchBtn"
                                class="bg-[#4C8BBE] hover:bg-[#3d6f99] text-white px-6 py-3 rounded-xl shadow-lg transition-all transform hover:scale-105 active:scale-95 font-semibold flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Ganti Kamera
                            </button>
                        </div>

                        {{-- Preview hasil foto --}}
                        <div id="previewContainer" class="mt-6 hidden">
                            <div class="bg-white p-4 rounded-2xl border-2 border-[#4C8BBE] shadow-lg">
                                <div class="flex items-center gap-2 mb-3">
                                    <svg class="w-5 h-5 text-[#4C8BBE]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p class="font-bold text-[#4C8BBE]">Foto Berhasil Diambil</p>
                                </div>
                                <img id="previewImage" src="" alt="Hasil foto"
                                    class="rounded-xl border-4 border-[#4C8BBE] mx-auto w-full max-w-xs shadow-md mb-4">
                                <button type="button" id="deletePreviewBtn"
                                    class="w-full bg-[#4C8BBE] hover:bg-[#3d6f99] text-white px-4 py-2.5 rounded-xl text-sm font-semibold transition-all transform hover:scale-105 active:scale-95 shadow-md flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Hapus Foto
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bagian Form Data --}}
                <div class="bg-gradient-to-br from-blue-50 to-white p-6 rounded-2xl border-2 border-[#4C8BBE] shadow-inner">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-10 h-10 bg-[#4C8BBE] rounded-lg flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-[#4C8BBE]">Data Tamu</h2>
                    </div>

                    <div class="space-y-4">
                        {{-- Input Nama --}}
                        <div>
                            <label class="block font-semibold mb-2 text-gray-700 text-sm flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#4C8BBE]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Nama Lengkap
                            </label>
                            <input type="text" name="nama" required
                                class="w-full border-2 border-[#4C8BBE] rounded-xl p-3 focus:ring-2 focus:ring-[#4C8BBE] focus:border-[#4C8BBE] outline-none transition-all bg-white shadow-sm hover:border-[#3d6f99]"
                                placeholder="Masukkan nama lengkap Anda">
                        </div>

                        {{-- Input Instansi --}}
                        <div>
                            <label class="block font-semibold mb-2 text-gray-700 text-sm flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#4C8BBE]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Instansi / Perusahaan
                            </label>
                            <input type="text" name="instansi"
                                class="w-full border-2 border-[#4C8BBE] rounded-xl p-3 focus:ring-2 focus:ring-[#4C8BBE] focus:border-[#4C8BBE] outline-none transition-all bg-white shadow-sm hover:border-[#3d6f99]"
                                placeholder="Nama instansi atau perusahaan">
                        </div>

                        {{-- Input Keperluan --}}
                        <div>
                            <label class="block font-semibold mb-2 text-gray-700 text-sm flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#4C8BBE]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Keperluan
                            </label>
                            <textarea name="keperluan" rows="3"
                                class="w-full border-2 border-[#4C8BBE] rounded-xl p-3 focus:ring-2 focus:ring-[#4C8BBE] focus:border-[#4C8BBE] outline-none transition-all bg-white shadow-sm hover:border-[#3d6f99] resize-none"
                                placeholder="Jelaskan keperluan kunjungan Anda"></textarea>
                        </div>
                    </div>
                </div>

                {{-- Tombol Kirim --}}
                <button type="submit"
                    class="w-full bg-[#4C8BBE] hover:bg-[#3d6f99] text-white py-4 rounded-xl font-bold shadow-xl transition-all transform hover:scale-[1.02] active:scale-[0.98] text-lg flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Kirim Data Tamu
                </button>
            </form>

            {{-- Footer --}}
            <div class="text-center mt-6 text-gray-500 text-xs">
                <p> Buku Tamu Digital. Terima kasih atas kunjungan Anda.</p>
            </div>
        </div>
    </div>

    {{-- Animasi muncul lembut --}}
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }
    </style>

    {{-- Script Kamera --}}
    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const captureBtn = document.getElementById('captureBtn');
        const switchBtn = document.getElementById('switchBtn');
        const fotoInput = document.getElementById('foto');
        const previewContainer = document.getElementById('previewContainer');
        const previewImage = document.getElementById('previewImage');
        const deletePreviewBtn = document.getElementById('deletePreviewBtn');

        let currentStream = null;
        let useFrontCamera = true;

        async function startCamera() {
            if (currentStream) {
                currentStream.getTracks().forEach(track => track.stop());
            }
            const constraints = {
                video: {
                    facingMode: useFrontCamera ? 'user' : 'environment'
                }
            };
            try {
                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                currentStream = stream;
                video.srcObject = stream;
            } catch (err) {
                console.error('Gagal mengakses kamera:', err);
                alert('Tidak dapat mengakses kamera. Pastikan izin kamera diberikan.');
            }
        }

        startCamera();

        captureBtn.addEventListener('click', () => {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, 320, 240);
            const imageData = canvas.toDataURL('image/png');
            fotoInput.value = imageData;
            previewImage.src = imageData;
            previewContainer.classList.remove('hidden');
            previewContainer.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest'
            });
        });

        switchBtn.addEventListener('click', () => {
            useFrontCamera = !useFrontCamera;
            startCamera();
        });

        deletePreviewBtn.addEventListener('click', () => {
            fotoInput.value = '';
            previewImage.src = '';
            previewContainer.classList.add('hidden');
        });
    </script>
@endsection
