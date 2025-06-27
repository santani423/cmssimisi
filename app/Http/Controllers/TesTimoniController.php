<?php

namespace App\Http\Controllers;

use App\Models\TesTimoni;
use Illuminate\Http\Request;

class TesTimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data dari model TesTimoni
        $tesTimonis = TesTimoni::all();

        // Mengembalikan view dengan data yang diambil
        return view('cms.tes_timoni.index', compact('tesTimonis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cms.tes_timoni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name'       => 'nullable|string|max:255',
            'email'      => 'nullable|email|unique:tes_timonis,email',
            'phone'      => 'nullable|string|max:255',
            'tes_timoni' => 'nullable|string',
            'is_active'  => 'required|boolean',
        ]);

        // Simpan data ke database
        $tesTimoni = new TesTimoni();
        $tesTimoni->name       = $request->name;
        $tesTimoni->email      = $request->email;
        $tesTimoni->phone      = $request->phone;
        $tesTimoni->tes_timoni = $request->tes_timoni;
        $tesTimoni->is_active  = $request->is_active;
        $tesTimoni->save();

        return redirect()->route('cms.tes_timoni')->with('success', 'Data Tes Timoni berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TesTimoni $tesTimoni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TesTimoni $tesTimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $tesTimoni)
    {
     
  
    
        // Update data
        TesTimoni::whereId($tesTimoni)->update([
            'name'        => $request->input('name'),
            'email'       => $request->input('email'),
            'phone'       => $request->input('phone'),
            'tes_timoni'  => $request->input('tes_timoni'),
            'is_active'   => $request->input('is_active'),
        ]);
    
        // Redirect kembali dengan pesan sukses
        return redirect()
            ->route('cms.tes_timoni')
            ->with('success', 'Testimoni berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tesTimoni)
    {
        // Hapus data
        TesTimoni::whereId($tesTimoni)->delete();
    
        // Redirect kembali ke dengan flash message
        return redirect()
            ->route('cms.tes_timoni')
            ->with('success', 'Testimoni berhasil dihapus.');
    }
}
