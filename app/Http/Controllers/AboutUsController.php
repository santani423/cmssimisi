<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = AboutUs::find(1);
        return view('cms.about_us.edit', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'video' => 'nullable|string',
            'code' => 'nullable|string|max:255',
            'discover_more' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'customer' => 'nullable|string|max:255',
            'personal_team' => 'nullable|string|max:255',
            'destinasi_tour' => 'nullable|string|max:255',
        ]);

        AboutUs::whereId('1')->update($validated);

        return redirect()->route('cms.about_us.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutUs $aboutUs)
    {
        return view('about_us.show', compact('aboutUs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $aboutUs)
    {
        return view('about_us.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutUs $aboutUs)
    {
        $validated = $request->validate([
            'video' => 'nullable|string', 
            'discover_more' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'customer' => 'nullable|string|max:255',
            'personal_team' => 'nullable|string|max:255',
            'destinasi_tour' => 'nullable|string|max:255',
        ]);

        $aboutUs->update($validated);

        return redirect()->route('about_us.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutUs)
    {
        $aboutUs->delete();
        return redirect()->route('about_us.index')->with('success', 'Data berhasil dihapus.');
    }
}
