<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'email',
        'website',
        'logo',
        'nama_kepala_sekolah'
    ];
}
