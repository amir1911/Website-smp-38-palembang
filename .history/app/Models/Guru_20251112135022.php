<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    // 🟢 Tambahkan semua kolom yang boleh disimpan
    protected $fillable = [
        'nama',
        'mata_pelajaran',
        'jabatan',
        'foto',
        'facebook',
        'instagram',
        'nip',
        'kategori',
    ];


}
