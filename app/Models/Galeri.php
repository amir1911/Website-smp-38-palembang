<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'kategori_id',
        'judul',
        'foto',
        'deskripsi',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriGaleri::class, 'kategori_id');
    }
}
