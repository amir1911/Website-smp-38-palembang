<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'kategori_id',
        'tanggal_mulai',
        'thumbnail',
    ];

    public function kategori()
    {
        return $this->belongsTo(AnnouncementCategory::class, 'kategori_id');
    }
}
