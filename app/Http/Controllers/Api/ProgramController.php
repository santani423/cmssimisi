<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    // ✅ GET all
    public function index()
    {
        $programs = Program::latest()->get();
        return response()->json($programs);
    }

    // ✅ GET single
    public function show($id)
    {
        $program = Program::findOrFail($id);
        return response()->json($program);
    }

    // ✅ CREATE
    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pdf_path' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $slug = Str::slug($request->nama_program);

        $pdfPath = null;
        if ($request->hasFile('pdf_path')) {
            $pdfPath = $request->file('pdf_path')->store('programs', 'public');
        }

        $program = Program::create([
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'slug' => $slug,
            'pdf_path' => $pdfPath,
        ]);

        return response()->json([
            'message' => 'Program created successfully!',
            'data' => $program,
        ], 201);
    }

    // ✅ UPDATE
    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $request->validate([
            'nama_program' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pdf_path' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $slug = Str::slug($request->nama_program);

        if ($request->hasFile('pdf_path')) {
            if ($program->pdf_path) {
                Storage::disk('public')->delete($program->pdf_path);
            }
            $program->pdf_path = $request->file('pdf_path')->store('programs', 'public');
        }

        $program->update([
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'slug' => $slug,
            'pdf_path' => $program->pdf_path,
        ]);

        return response()->json([
            'message' => 'Program updated successfully!',
            'data' => $program,
        ]);
    }

    // ✅ DELETE
    public function destroy($id)
    {
        $program = Program::findOrFail($id);

        if ($program->pdf_path) {
            Storage::disk('public')->delete($program->pdf_path);
        }

        $program->delete();

        return response()->json(['message' => 'Program deleted successfully!']);
    }
}
