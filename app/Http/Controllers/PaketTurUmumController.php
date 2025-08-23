<?php

namespace App\Http\Controllers;

use App\Models\JenisPaket;
use App\Models\Paket;
use App\Models\PaketTurUmum;
use App\Models\Setting;
use App\Models\TypePaket;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class PaketTurUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $wilayah = Wilayah::all();
        $jenisPaket = JenisPaket::where('code', $request->jenis_paket)->first();
        $typePaket = TypePaket::where('code', $request->type_paket)->first();
        $wilayah_id = $request->wilayah_id ?? '';
        return view('paketTurUmum.index', compact('wilayah', 'jenisPaket', 'typePaket', 'wilayah_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($code)
    {
        $paket = Paket::where('code', $code)->first();
        if (!$paket) {
            abort(404);
        }

        $setting = Setting::first();
        // dd($setting);
        return view('paketTurUmum.detail', compact('paket', 'setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketTurUmum $paketTurUmum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaketTurUmum $paketTurUmum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketTurUmum $paketTurUmum)
    {
        //
    }
}
