<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pabrikan extends Model
{
    use HasFactory;

    protected $table = 'pabrikan'; // Specify the table name if it's not the plural form of the model name
    protected $primaryKey = 'id_pabrikan'; // Specify the primary key if it's not 'id'

    protected $fillable = [
        'merk_pabrikan',
        'nilai',
    ];

    public function mobils()
    {
        return $this->hasMany(Mobil::class, 'id_pabrikan', 'id_pabrikan');
    }
}