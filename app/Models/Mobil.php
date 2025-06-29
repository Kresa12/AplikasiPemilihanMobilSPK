<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';
    protected $primaryKey = 'id_mobil';

    protected $fillable = [
        'id_pabrikan',
        'nama_mobil',
    ];

    public function pabrikan()
    {
        return $this->belongsTo(Pabrikan::class, 'id_pabrikan', 'id_pabrikan');
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'id_mobil', 'id_mobil');
    }
}