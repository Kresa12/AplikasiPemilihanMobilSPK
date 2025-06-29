<?php

namespace App\Http\Controllers;

use App\Models\Pembobotan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembobotanController extends Controller
{
    /**
     * Show the form for editing the user's weights.
     */
    public function edit()
    {
        // Dapatkan bobot untuk user yang sedang login
        // Jika belum ada, buat bobot default
        $pembobotan = Auth::user()->pembobotan ?? new Pembobotan([
            'user_id' => Auth::id(),
            'w1' => 0.2, // Harga Beli
            'w2' => 0.2, // Fitur
            'w3' => 0.2, // Model
            'w4' => 0.2, // Harga Jual
            'w5' => 0.2, // Nilai Pabrikan
        ]);

        return view('pembobotans.edit', compact('pembobotan'));
    }

    /**
     * Update the user's weights in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'w1' => 'required|numeric|min:0|max:1',
            'w2' => 'required|numeric|min:0|max:1',
            'w3' => 'required|numeric|min:0|max:1',
            'w4' => 'required|numeric|min:0|max:1',
            'w5' => 'required|numeric|min:0|max:1',
        ]);

        // Cek total bobot harus 1 (atau mendekati 1 karena floating point)
        $totalBobot = $request->w1 + $request->w2 + $request->w3 + $request->w4 + $request->w5;
        if (abs($totalBobot - 1) > 0.01) { // Toleransi 0.01 untuk floating point
            return redirect()->back()->withErrors('Total bobot harus 1.0 (saat ini: ' . round($totalBobot, 2) . ')')->withInput();
        }

        $pembobotan = Auth::user()->pembobotan;

        if ($pembobotan) {
            $pembobotan->update($request->only(['w1', 'w2', 'w3', 'w4', 'w5']));
        } else {
            // Buat entri baru jika belum ada
            Pembobotan::create(array_merge($request->only(['w1', 'w2', 'w3', 'w4', 'w5']), ['user_id' => Auth::id()]));
        }

        return redirect()->route('pembobotans.edit')->with('success', 'Bobot berhasil diperbarui.');
    }
}