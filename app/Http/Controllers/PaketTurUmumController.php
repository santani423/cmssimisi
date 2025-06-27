<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\PaketTurUmum;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class PaketTurUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $wilayah = Wilayah::all();
        return view('paketTurUmum.index', compact('wilayah'));
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
        $paket = Paket::where('code',$code)->first();
        // dd($paket);
      
        return view('paketTurUmum.detail',compact('paket'));
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
