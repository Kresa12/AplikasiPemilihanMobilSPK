<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penilaians = Penilaian::where('user_id', Auth::id())->with('mobil')->get();
        return view('penilaians.index', compact('penilaians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobils = Mobil::all();
        return view('penilaians.create', compact('mobils'));
    }

    /**
     * Show the form for creating a new resource for a specific mobil.
     */
    public function createForMobil(Mobil $mobil)
    {
        // Cek apakah user sudah pernah menilai mobil ini
        $existingPenilaian = Penilaian::where('user_id', Auth::id())
                                      ->where('mobil_id', $mobil->id)
                                      ->first();

        if ($existingPenilaian) {
            return redirect()->route('penilaians.edit', $existingPenilaian->id)
                             ->with('info', 'Anda sudah menilai mobil ini. Anda bisa mengedit penilaian Anda.');
        }

        return view('penilaians.create_for_mobil', compact('mobil'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'harga_beli' => 'required|numeric|min:0',
            'fitur' => 'required|numeric|min:0',
            'model' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'tanggal_penilaian' => 'nullable|date',
        ]);

        $penilaian = Penilaian::create([
            'user_id' => Auth::id(),
            'mobil_id' => $request->mobil_id,
            'harga_beli' => $request->harga_beli,
            'fitur' => $request->fitur,
            'model' => $request->model,
            'harga_jual' => $request->harga_jual,
            'tanggal_penilaian' => $request->tanggal_penilaian ?? now(),
        ]);

        return redirect()->route('penilaians.index')->with('success', 'Penilaian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penilaian $penilaian)
    {
        // Pastikan user hanya bisa melihat penilaiannya sendiri
        if ($penilaian->user_id !== Auth::id()) {
            abort(403); // Forbidden
        }
        return view('penilaians.show', compact('penilaian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penilaian $penilaian)
    {
        // Pastikan user hanya bisa mengedit penilaiannya sendiri
        if ($penilaian->user_id !== Auth::id()) {
            abort(403); // Forbidden
        }
        $mobils = Mobil::all(); // Untuk dropdown pilihan mobil jika diperlukan
        return view('penilaians.edit', compact('penilaian', 'mobils'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        // Pastikan user hanya bisa mengupdate penilaiannya sendiri
        if ($penilaian->user_id !== Auth::id()) {
            abort(403); // Forbidden
        }

        $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'harga_beli' => 'required|numeric|min:0',
            'fitur' => 'required|numeric|min:0',
            'model' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'tanggal_penilaian' => 'nullable|date',
        ]);

        $penilaian->update([
            'mobil_id' => $request->mobil_id,
            'harga_beli' => $request->harga_beli,
            'fitur' => $request->fitur,
            'model' => $request->model,
            'harga_jual' => $request->harga_jual,
            'tanggal_penilaian' => $request->tanggal_penilaian ?? now(),
        ]);

        return redirect()->route('penilaians.index')->with('success', 'Penilaian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penilaian $penilaian)
    {
        // Pastikan user hanya bisa menghapus penilaiannya sendiri
        if ($penilaian->user_id !== Auth::id()) {
            abort(403); // Forbidden
        }
        $penilaian->delete();
        return redirect()->route('penilaians.index')->with('success', 'Penilaian berhasil dihapus.');
    }
}