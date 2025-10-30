<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'isi',
        'file_pdf',
        'foto',
        'kategori_id',
        'tanggal',
        'status',
    ];

   public function kategori()
    {
        return $this->belongsTo(KategoriPengumuman::class, 'kategori_id');
    }
}


 
