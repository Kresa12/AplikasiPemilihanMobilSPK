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
        return view('pabrikan.index', compact('pabrikans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pabrikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'merk_pabrikan' => 'required|string|max:255',
            'nilai' => 'required|integer',
        ]);

        Pabrikan::create($request->all());

        return redirect()->route('pabrikan.index')->with('success', 'Pabrikan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pabrikan $pabrikan)
    {
        return view('pabrikan.show', compact('pabrikan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pabrikan $pabrikan)
    {
        return view('pabrikan.edit', compact('pabrikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pabrikan $pabrikan)
    {
        $request->validate([
            'merk_pabrikan' => 'required|string|max:255',
            'nilai' => 'required|integer',
        ]);

        $pabrikan->update($request->all());

        return redirect()->route('pabrikan.index')->with('success', 'Pabrikan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pabrikan $pabrikan)
    {
        $pabrikan->delete();

        return redirect()->route('pabrikan.index')->with('success', 'Pabrikan deleted successfully.');
    }
}