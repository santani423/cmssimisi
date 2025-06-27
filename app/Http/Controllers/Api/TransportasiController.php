<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SewaTransportasi;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
   
    public function index(Request $request)
    {
         
        try {
            $page = $request->input('page', 1);
            $size = $request->input('size', 10);
            $query = SewaTransportasi::query();
            $data = $query->paginate($size, ['*'], 'page', $page);
            return response()->json([
                'message' => 'List Unit',
                'data' => $data,
                'wilayah' => $request->input('wilayah_id'),
            ], 200);
        } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Failed to retrieve Unit',
                    'error' => $e->getMessage()
                ], 500);
        }
    }
}
