<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Pastikan ini ada jika Anda menginstal Sanctum

class User extends Authenticatable // implements MustVerifyEmail // Hapus "implements MustVerifyEmail" jika tidak memerlukannya
{
    use HasApiTokens, HasFactory, Notifiable; // Hapus HasApiTokens jika tidak menginstal Sanctum

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // --- Relasi ke Pembobotan ---
    // Satu user memiliki satu set pembobotan
    public function pembobotan()
    {
        return $this->hasOne(Pembobotan::class);
    }

    // --- Relasi ke Penilaian ---
    // Satu user bisa memiliki banyak penilaian
    public function penilaians()
    {
        return $this->hasMany(Penilaian::class);
    }
}