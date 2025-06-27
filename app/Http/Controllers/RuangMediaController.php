<?php

namespace App\Http\Controllers;

use App\Models\RuangMedia;
use Illuminate\Http\Request;

class RuangMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        return view('ruangMedia.index');
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
    public function show($ruangMedia)
    {
        $ruangMedia = RuangMedia::where('code', $ruangMedia)->firstOrFail();
        // dd($ruangMedia);
        return view('ruangMedia.detail',compact('ruangMedia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RuangMedia $ruangMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RuangMedia $ruangMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RuangMedia $ruangMedia)
    {
        //
    }
}
