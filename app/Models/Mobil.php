<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mobil',
        'pabrikan_id'
    ];

    // --- Relasi ke Penilaian ---
    // Satu mobil bisa memiliki banyak penilaian
    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function pabrikan() // Tambahkan relasi ini
    {
        return $this->belongsTo(Pabrikan::class);
    }
}