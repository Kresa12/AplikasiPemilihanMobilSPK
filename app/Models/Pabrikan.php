<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pabrikan extends Model
{
    use HasFactory;

    // Tidak perlu menambahkan protected $table = 'pabrikan';
    // Laravel secara otomatis akan menggunakan 'pabrikans'

    protected $fillable = [
        'merk_pabrikan',
        'nilai',
    ];

    // Jika nanti ada relasi, tambahkan di sini
}