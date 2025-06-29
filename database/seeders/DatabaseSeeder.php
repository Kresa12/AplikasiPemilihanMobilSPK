<?php

namespace Database\Seeders;

use App\Models\User; // Pastikan ini diimport
use App\Models\Pabrikan; // Pastikan ini diimport
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Untuk hash password

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil seeder lain jika ada, atau langsung masukkan data di sini

        // Contoh Seeder untuk User
        User::create([
            'name' => 'Admin Esa',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), // Password: password
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'), // Password: password
            'email_verified_at' => now(),
        ]);

        // Contoh Seeder untuk Pabrikan
        Pabrikan::create(['merk_pabrikan' => 'Toyota', 'nilai' => 5]);
        Pabrikan::create(['merk_pabrikan' => 'BMW', 'nilai' => 4]);
        Pabrikan::create(['merk_pabrikan' => 'Ford', 'nilai' => 3]);
        Pabrikan::create(['merk_pabrikan' => 'Daihatsu', 'nilai' => 4]);
        Pabrikan::create(['merk_pabrikan' => 'Wuling', 'nilai' => 2]);

        // Jika Anda memiliki seeder lain (misal: MobilSeeder, PenilaianSeeder)
        // $this->call([
        //     MobilSeeder::class,
        //     // PenilaianSeeder::class,
        // ]);
    }
}