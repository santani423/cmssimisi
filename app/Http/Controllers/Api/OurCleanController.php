<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OurClean;
use Illuminate\Http\Request;

class OurCleanController extends Controller
{
    public function index(Request $request)
    {
        try {
            $page = $request->input('page', 1);
            $size = $request->input('size', 10);

            $query = OurClean::query();

            $query->orderBy('created_at', 'desc');

            $ourClean = $query->paginate($size, ['*'], 'page', $page);

            return response()->json([
                'success' => true,
                'message' => 'List Paket retrieved successfully',
                'data' => $ourClean,
                'wilayah' => $request->input('wilayah_id'),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve paket',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $ourClean = OurClean::find($id);

            if (!$ourClean) {
                return response()->json([
                    'success' => false,
                    'message' => 'OurClean not found',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'OurClean detail retrieved successfully',
                'data' => $ourClean,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve OurClean detail',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $ourClean = OurClean::find($id);

            if (!$ourClean) {
                return response()->json([
                    'success' => false,
                    'message' => 'OurClean not found',
                ], 404);
            }

            $validatedData = $request->validate([
                // Sesuaikan field berikut dengan kolom pada tabel OurClean
                'nama' => 'sometimes|string|max:255',
                'deskripsi' => 'sometimes|string',
                'wilayah_id' => 'sometimes|integer',
                // tambahkan validasi field lain sesuai kebutuhan
            ]);

            $ourClean->update($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'OurClean updated successfully',
                'data' => $ourClean,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update OurClean',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $ourClean = OurClean::find($id);

            if (!$ourClean) {
                return response()->json([
                    'success' => false,
                    'message' => 'OurClean not found',
                ], 404);
            }

            $ourClean->delete();

            return response()->json([
                'success' => true,
                'message' => 'OurClean deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete OurClean',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
