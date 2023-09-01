<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategori = kategori::all();
        return view('kategori.index', compact('kategori'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
            'dkr' => 'required',
        ]);

        $kategori = kategori::create($request->all());
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori, $id)
    {
        //
        $kategori = kategori::find($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori, $id)
    {
        //
        $kategori = kategori::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori, $id)
    {
        //
        $request->validate([
            'nama' => 'required',
            'dkr' => 'required',
        ]);
        $kategori = kategori::find($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori, $id)
    {
        //
        $kategori = kategori::find($id)->delete();
        return back();
    }
}
