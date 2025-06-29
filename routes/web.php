<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController; // Import
use App\Http\Controllers\PabrikanController; // Import
use App\Http\Controllers\PembobotanController; // Import
use App\Http\Controllers\PenilaianController; // Import
use App\Http\Controllers\SpkController; // Kita akan buat controller ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome'); // Atau landing.blade.php jika Anda punya halaman landing
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Rute untuk Admin (Misalnya, jika ada role admin, tambahkan middleware admin) ---
    // Untuk saat ini, kita asumsikan semua yang login bisa mengelola ini
    // Atau Anda bisa memisahkan ini di grup middleware 'admin' jika ada role system
    Route::resource('mobils', MobilController::class);
    Route::resource('pabrikans', PabrikanController::class)->except(['show']); // Pabrikan tidak perlu show detail

    // --- Rute untuk User (Penilaian dan Pembobotan) ---
    Route::resource('penilaians', PenilaianController::class);
    Route::get('penilaians/{mobil}/create', [PenilaianController::class, 'createForMobil'])->name('penilaians.createForMobil');


    // Rute untuk Pembobotan
    Route::get('/pembobotans', [PembobotanController::class, 'edit'])->name('pembobotans.edit');
    Route::put('/pembobotans', [PembobotanController::class, 'update'])->name('pembobotans.update');

    // --- Rute untuk Sistem Pendukung Keputusan (WP) ---
    Route::get('/spk/hasil', [SpkController::class, 'hitungDanTampilkanHasil'])->name('spk.hasil');
});

require __DIR__.'/auth.php';