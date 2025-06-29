<?php

namespace App\Http\Controllers;

use App\Models\Pabrikan;
use Illuminate\Http\Request;

class PabrikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pabrikans = Pabrikan::all();
        return view('pabrikans.index', compact('pabrikans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pabrikans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merk_pabrikan' => 'required|string|max:255|unique:pabrikans',
            'nilai' => 'required|integer|min:1|max:5', // Batasan nilai 1-5 sesuai contoh Anda
        ]);

        Pabrikan::create($request->all());

        return redirect()->route('pabrikans.index')->with('success', 'Pabrikan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pabrikan $pabrikan)
    {
        return view('pabrikans.edit', compact('pabrikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pabrikan $pabrikan)
    {
        $request->validate([
            'merk_pabrikan' => 'required|string|max:255|unique:pabrikans,merk_pabrikan,' . $pabrikan->id,
            'nilai' => 'required|integer|min:1|max:5',
        ]);

        $pabrikan->update($request->all());

        return redirect()->route('pabrikans.index')->with('success', 'Pabrikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pabrikan $pabrikan)
    {
        $pabrikan->delete();
        return redirect()->route('pabrikans.index')->with('success', 'Pabrikan berhasil dihapus.');
    }
}