<?php

use App\Http\Controllers\AlumniPengumumanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengumumanController;


// Halaman utama (Carousel)
Route::get('/', [CarouselController::class, 'index'])->name('home');

// Halaman guru
Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
//halaman galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;

// GET: tampilkan halaman form kontak
Route::get('/contact', function () {
    return view('frontend.contact'); // sesuaikan dengan nama file blade kontak kamu
})->name('contact.page');

// POST: proses kirim form
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// use App\Http\Controllers\PengumumanController;

// Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
// Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
// Route::get('/pengumuman/kategori/{id}', [PengumumanController::class, 'byKategori'])->name('pengumuman.byKategori');

Route::get('/profile', function () {
    return view('frontend.profile');
})->name('profile');

Route::get('/alumni/pengumuman', [AlumniPengumumanController::class, 'index'])->name('alumni.pengumuman');





Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{id}', [PengumumanController::class, 'show'])->name('pengumuman.show');
Route::get('/pengumuman/kategori/{id}', [PengumumanController::class, 'byKategori'])->name('pengumuman.byKategori');


use App\Http\Controllers\SearchController;

Route::get('/search', [SearchController::class, 'search'])->name('search');

// use App\Http\Controllers\HomeController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index'])->name('login');

// Route::middleware(['auth', 'role:super_admin'])->group(function () {
//     Route::get('/adminsuper', function () {
//         return 'Hello World';
//     });
// });



// Halaman Profil Sekolah
Route::get('/profile', function () {
    return view('frontend.profile');
})->name('profile');

// Halaman Visi & Misi Sekolah
Route::get('/visimisi', function () {
    return view('frontend.visimisi');
})->name('visimisi');

// Halaman Struktur Organisasi
Route::get('/struktur', function () {
    return view('frontend.struktur');
})->name('struktur');

use App\Http\Controllers\PublicGuestController;

Route::get('/buku-tamu', [PublicGuestController::class, 'index'])->name('buku-tamu.index');
Route::post('/buku-tamu', [PublicGuestController::class, 'store'])->name('buku-tamu.store');
