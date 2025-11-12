<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buku Tamu Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-blue-50 to-gray-100 flex items-center justify-center min-h-screen font-[Poppins]">
  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md border border-blue-100">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">📖 Buku Tamu Digital</h1>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center shadow-sm">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('buku-tamu.store') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label class="block font-semibold mb-1">Nama</label>
        <input type="text" name="nama" required class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 outline-none">
      </div>

      <div>
        <label class="block font-semibold mb-1">Instansi</label>
        <input type="text" name="instansi" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 outline-none">
      </div>

      <div>
        <label class="block font-semibold mb-1">Keperluan</label>
        <input type="text" name="keperluan" class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-400 outline-none">
      </div>

      <!-- Kamera -->
      <div class="text-center">
        <video id="video" width="320" height="240" autoplay class="border border-gray-300 rounded-lg shadow-sm mx-auto"></video>
        <canvas id="canvas" width="320" height="240" class="hidden"></canvas>
        <input type="hidden" name="foto" id="foto">

        <div class="mt-4 flex justify-center gap-2">
          <button type="button" id="captureBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">📸 Ambil Foto</button>
          <button type="button" id="switchBtn" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition">🔄 Ganti Kamera</button>
        </div>

        <!-- Preview hasil foto -->
        <div id="previewContainer" class="mt-4 hidden">
          <p class="font-medium text-gray-600 mb-1">Hasil Foto:</p>
          <img id="previewImage" src="" alt="Hasil foto" class="rounded-lg border mx-auto w-64 shadow-md">
        </div>
      </div>

      <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-semibold transition mt-4">Kirim</button>
    </form>
  </div>

  <script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureBtn = document.getElementById('captureBtn');
    const switchBtn = document.getElementById('switchBtn');
    const fotoInput = document.getElementById('foto');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');

    let currentStream = null;
    let useFrontCamera = true; // default: kamera depan

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

    // Jalankan kamera pertama kali
    startCamera();

    // Tombol ambil foto
    captureBtn.addEventListener('click', () => {
      const context = canvas.getContext('2d');
      context.drawImage(video, 0, 0, 320, 240);
      const imageData = canvas.toDataURL('image/png');
      fotoInput.value = imageData;

      // Tampilkan preview foto
      previewImage.src = imageData;
      previewContainer.classList.remove('hidden');
    });

    // Tombol ganti kamera
    switchBtn.addEventListener('click', () => {
      useFrontCamera = !useFrontCamera;
      startCamera();
    });
  </script>
</body>
</html>
