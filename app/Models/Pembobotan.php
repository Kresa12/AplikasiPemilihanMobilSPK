<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembobotan extends Model
{
    use HasFactory;

    protected $table = 'pembobotan';
    protected $primaryKey = 'id_pembobotan';

    protected $fillable = [
        'id_user',
        'w1',
        'w2',
        'w3',
        'w4',
        'w5',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}