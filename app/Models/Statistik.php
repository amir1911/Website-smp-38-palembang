<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model
{
    use HasFactory;

    protected $fillable = [
        'guru',
        'kelas7',
        'kelas8',
        'kelas9',
        'staf',
    ];
}
