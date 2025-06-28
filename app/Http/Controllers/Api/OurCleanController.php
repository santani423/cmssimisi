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
}
