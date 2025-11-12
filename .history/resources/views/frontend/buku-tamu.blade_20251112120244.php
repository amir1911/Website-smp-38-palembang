<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Buku Tamu Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 flex items-center justify-center min-h-screen font-sans">
  <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6 text-center text-blue-600">📖 Buku Tamu Digital</h1>

    @if(session('success'))
      <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('buku-tamu.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label class="block font-semibold">Nama</label>
        <input type="text" name="nama" required class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" />
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Instansi</label>
        <input type="text" name="instansi" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" />
      </div>

      <div class="mb-4">
        <label class="block font-semibold">Keperluan</label>
        <input type="text" name="keperluan" required class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" />
      </div>

      <div class="mb-4 text-center">
        <video id="video" width="320" height="240" autoplay class="border rounded mb-2"></video>
        <canvas id="canvas" width="320" height="240" class="hidden"></canvas>
        <input type="hidden" name="foto" id="foto" />

        <div class="flex justify-center gap-2 mt-2">
          <button type="button" id="captureBtn" class="bg-blue-600 text-white px-4 py-2 rounded-lg">📸 Ambil Foto</button>
          <button type="button" id="switchBtn" class="bg-gray-600 text-white px-4 py-2 rounded-lg">🔄 Ganti Kamera</button>
          <button type="button" id="deleteBtn" class="hidden bg-red-600 text-white px-4 py-2 rounded-lg">🗑️ Hapus</button>
        </div>
      </div>

      <div id="preview" class="hidden text-center mb-4">
        <img id="previewImg" src="" alt="Preview Foto" class="mx-auto rounded-lg border w-64 h-48 object-cover" />
      </div>

      <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700">Kirim</button>
    </form>
  </div>

  <script>
    const video = document.getElementById("video");
    const canvas = document.getElementById("canvas");
    const captureBtn = document.getElementById("captureBtn");
    const switchBtn = document.getElementById("switchBtn");
    const deleteBtn = document.getElementById("deleteBtn");
    const fotoInput = document.getElementById("foto");
    const preview = document.getElementById("preview");
    const previewImg = document.getElementById("previewImg");

    let currentStream = null;
    let useFrontCamera = true;

    async function startCamera() {
      if (currentStream) {
        currentStream.getTracks().forEach((track) => track.stop());
      }

      const constraints = {
        video: {
          facingMode: useFrontCamera ? "user" : "environment",
        },
      };

      try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        currentStream = stream;
        video.srcObject = stream;
      } catch (err) {
        alert("Tidak dapat mengakses kamera: " + err.message);
      }
    }

    startCamera();

    captureBtn.addEventListener("click", () => {
      const context = canvas.getContext("2d");
      context.drawImage(video, 0, 0, canvas.width, canvas.height);
      const imageData = canvas.toDataURL("image/png");
      fotoInput.value = imageData;
      previewImg.src = imageData;
      preview.classList.remove("hidden");
      deleteBtn.classList.remove("hidden");
      alert("📸 Foto berhasil diambil!");
    });

    switchBtn.addEventListener("click", () => {
      useFrontCamera = !useFrontCamera;
      startCamera();
    });

    deleteBtn.addEventListener("click", () => {
      fotoInput.value = "";
      preview.classList.add("hidden");
      deleteBtn.classList.add("hidden");
    });
  </script>
</body>
</html>
