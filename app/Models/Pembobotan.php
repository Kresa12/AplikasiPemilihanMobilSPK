<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembobotan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'w1',
        'w2',
        'w3',
        'w4',
        'w5',
    ];

    // --- Relasi ke User ---
    // Satu set pembobotan dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}