<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    use HasFactory;

    protected $table = 'staf'; // sesuaikan dengan nama tabel
    protected $fillable = ['nama', 'jabatan'];
}
