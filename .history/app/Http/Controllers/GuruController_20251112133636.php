<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function guru()
    {
        $gurus = Guru::where('jabatan', '!=', 'Staff')->get();
        return view('guru', compact('gurus'));

    }

    public function staff()
{
    $gurus = Guru::where('jabatan', 'Staff')->get();
    return view('guru.guru', compact('gurus'));
}

}
