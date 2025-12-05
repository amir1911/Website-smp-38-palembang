<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // penting untuk Str::limit()

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
        'instagram_link',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriPengumuman::class, 'kategori_id');
    }

    // 🔹 Deskripsi otomatis dari isi (max 150 karakter)
    public function getDeskripsiAttribute()
    {
        return Str::limit(strip_tags($this->isi), 150, '...');
    }
}
