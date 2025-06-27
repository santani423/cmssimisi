<?php

namespace App\Http\Controllers;

use App\Models\SewaTransportasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SewaTransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transportasi = SewaTransportasi::all();
        return view('cms.sewa_transportasi.index', compact('transportasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.sewa_transportasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_unit' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'tipe' => 'nullable|string|max:255',
            'no_polisi' => 'required|string|max:255|unique:sewa_transportasis',
            'tahun' => 'nullable|integer',
            'warna' => 'nullable|string|max:255',
            'kapasitas_penumpang' => 'nullable|integer',
            'fasilitas' => 'nullable|string',
            'harga_sewa_per_hari' => 'required|numeric',
            'tersedia' => 'boolean',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $validated['foto'] = $file->storeAs('sewa_transportasi', $filename, 'public');
        }

        SewaTransportasi::create($validated);

        return redirect()->route('cms.sewa_transportasi.index')->with('success', 'Data unit transportasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SewaTransportasi $sewaTransportasi)
    {
        return view('cms.sewa_transportasi.show', compact('sewaTransportasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SewaTransportasi $sewaTransportasi)
    {
        return view('cms.sewa_transportasi.edit', compact('sewaTransportasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SewaTransportasi $sewaTransportasi)
    {
        $validated = $request->validate([
            'nama_unit' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:255',
            'merek' => 'required|string|max:255',
            'tipe' => 'nullable|string|max:255',
            'no_polisi' => 'required|string|max:255|unique:sewa_transportasis,no_polisi,' . $sewaTransportasi->id,
            'tahun' => 'nullable|integer',
            'warna' => 'nullable|string|max:255',
            'kapasitas_penumpang' => 'nullable|integer',
            'fasilitas' => 'nullable|string',
            'harga_sewa_per_hari' => 'required|numeric',
            'tersedia' => 'boolean',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($sewaTransportasi->foto && Storage::disk('public')->exists($sewaTransportasi->foto)) {
                Storage::disk('public')->delete($sewaTransportasi->foto);
            }
            $file = $request->file('foto');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $validated['foto'] = $file->storeAs('sewa_transportasi', $filename, 'public');
        }

        $sewaTransportasi->update($validated);

        return redirect()->route('cms.sewa_transportasi.index')->with('success', 'Data unit transportasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SewaTransportasi $sewaTransportasi)
    {
        if ($sewaTransportasi->foto && Storage::disk('public')->exists($sewaTransportasi->foto)) {
            Storage::disk('public')->delete($sewaTransportasi->foto);
        }

        $sewaTransportasi->delete();

        return redirect()->route('cms.sewa_transportasi.index')->with('success', 'Data unit transportasi berhasil dihapus.');
    }
}
