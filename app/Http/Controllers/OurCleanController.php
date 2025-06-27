<?php

namespace App\Http\Controllers;

use App\Models\OurClean;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurCleanController extends Controller
{
    public function index()
    {
        $ourCleans = OurClean::all();
        return view('cms.our_clean.index', compact('ourCleans'));
    }

    public function create()
    {
        return view('cms.our_clean.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_our_clien_id' => 'required',
            'name' => 'nullable|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:our_cleans,email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('ourcleans'), $filename);
            $validated['img'] = 'ourcleans/' . $filename;
        }

        OurClean::create($validated);

        return redirect()->route('cms.our_clean.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(OurClean $ourClean)
    {
        return view('cms.our_clean.show', compact('ourClean'));
    }

    public function edit(OurClean $ourClean)
    {
        return view('cms.our_clean.edit', compact('ourClean'));
    }

    public function update(Request $request, OurClean $ourClean)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:our_cleans,email,' . $ourClean->id,
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('img')) {
            // Hapus gambar lama jika ada
            if ($ourClean->img) {
                Storage::disk('public')->delete($ourClean->img);
            }
            $file = $request->file('img');
            $filename = uniqid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('ourcleans'), $filename);
            $validated['img'] = 'ourcleans/' . $filename;
        }

        $ourClean->update($validated);

        return redirect()->route('cms.our_clean.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(OurClean $ourClean)
    {
        // Soft delete
        $ourClean->delete();
        return redirect()->route('cms.our_clean.index')->with('success', 'Data berhasil dihapus.');
    }
}
