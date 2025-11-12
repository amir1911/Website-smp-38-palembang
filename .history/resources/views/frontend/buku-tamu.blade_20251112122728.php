@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-blue-100 font-[Poppins] px-4 py-10">
  <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md border border-blue-100 hover:shadow-blue-200 transition-all duration-300">

    <h1 class="text-3xl font-bold mb-6 text-center text-blue-600 animate-fade-in">
      📖 Buku Tamu Digital
    </h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center shadow-sm">
        {{ session('success') }}
      </div>
    @endif

    {{-- === FORM (Kamera di atas tapi masih dalam form) === --}}
    <form action="{{ route('buku-tamu.store') }}" method="POST" class="space-y-6 animate-fade-in">
      @csrf

      {{-- Kamera --}}
      <div class="text-center">
        <video id="video" width="320" height="240" autoplay
               class="border border-gray-300 rounded-lg shadow-sm mx-auto"></video>
        <canvas id="canvas" width="320" height="240" class="hidden"></canvas>
        <input type="hidden" name="foto" id="foto"> {{-- <== PENTING, ada di dalam form --}}

        <div class="mt-4 flex justify-center gap-3">
          <button type="button" id="captureBtn"
                  class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition transform hover:-translate-y-0.5">
            📸 Ambil Foto
          </button>
          <button type="button" id="switchBtn"
                  class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg shadow transition transform hover:-translate-y-0.5">
            🔄 Ganti Kamera
          </button>
        </div>

        {{-- Preview hasil foto --}}
        <div id="previewContainer" class="mt-5 hidden">
          <p class="font-medium text-gray-600 mb-2">Hasil Foto:</p>
          <img id="previewImage" src="" alt="Hasil foto"
               class="rounded-lg border mx-auto w-64 shadow-md mb-3">
          <button type="button" id="deletePreviewBtn"
                  class="bg-red-600 hover:bg-red-700 text-white px-4 py-1.5 rounded-lg text-sm transition">
            🗑 Hapus Foto
          </button>
        </div>
      </div>

      {{-- Input Form --}}
      <div>
        <label class="block font-semibold mb-1 text-gray-700">Nama</label>
        <input type="text" name="nama" required
               class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 outline-none">
      </div>

      <div>
        <label class="block font-semibold mb-1 text-gray-700">Instansi</label>
        <input type="text" name="instansi"
               class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 outline-none">
      </div>

      <div>
        <label class="block font-semibold mb-1 text-gray-700">Keperluan</label>
        <input type="text" name="keperluan"
               class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 outline-none">
      </div>

      {{-- Tombol Kirim --}}
      <button type="submit"
              class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-semibold shadow-md transition mt-4">
        Kirim
      </button>
    </form>
  </div>
</div>

{{-- Animasi muncul lembut --}}
<style>
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(10px); }
  to { opacity: 1; transform: translateY(0); }
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
      video: { facingMode: useFrontCamera ? 'user' : 'environment' }
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
