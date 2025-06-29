<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mobil_id',
        'harga_beli',
        'fitur',
        'model',
        'harga_jual',
        'tanggal_penilaian',
    ];

    // --- Relasi ke User ---
    // Satu penilaian dilakukan oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // --- Relasi ke Mobil ---
    // Satu penilaian untuk satu mobil
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}