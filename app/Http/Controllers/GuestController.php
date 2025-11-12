<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    public function index()
    {
        return view('frontend.buku-tamu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'instansi' => 'nullable|string|max:255',
            'keperluan' => 'nullable|string|max:255',
            'foto' => 'required|string',
        ]);

        // Simpan foto dari base64
        $image = str_replace('data:image/png;base64,', '', $request->foto);
        $image = str_replace(' ', '+', $image);
        $imageName = 'guest-' . time() . '.png';
        Storage::disk('public')->put('guests/' . $imageName, base64_decode($image));

        Guest::create([
            'nama' => $request->nama,
            'instansi' => $request->instansi,
            'keperluan' => $request->keperluan,
            'foto' => 'guests/' . $imageName,
        ]);

        return redirect()->back()->with('success', 'Terima kasih! Data Anda telah tercatat.');
    }
}

