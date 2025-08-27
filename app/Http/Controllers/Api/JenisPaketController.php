<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JenisPaket;
use App\Models\Paket;
use App\Models\TypePaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisPaketController extends Controller
{
    public function index(Request $request)
    {
        try {
            $page = (int) $request->input('page', 1);
            $size = (int) $request->input('size', 10);

            // Ambil data dari tabel type_pakets
            $typePakets = TypePaket::all();

            // Query JenisPaket dengan paginasi
            $paket = JenisPaket::paginate($size, ['*'], 'page', $page);

            return response()->json([
                'message' => 'List Paket',
                'data' => $paket->items(),
                'pagination' => [
                    'current_page' => $paket->currentPage(),
                    'last_page' => $paket->lastPage(),
                    'per_page' => $paket->perPage(),
                    'total' => $paket->total(),
                ],
                'typePakets' => $typePakets,
                'wilayah' => $request->input('wilayah_id'),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve paket',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function menuPaket(Request $request)
    {
        try {
            // Ambil semua jenis paket beserta type paket yang terkait lewat pakets
            $jenisPakets = JenisPaket::with('typePakets')->get();

            return response()->json([
                'message' => 'List Menu Paket',
                'data' => $jenisPakets->map(function ($jenis) {
                    return [
                        'jenisPaket' => $jenis->name,
                        'typePakets' => $jenis->typePakets->map(function ($type) {
                            return [
                                'id' => $type->id,
                                'name' => $type->name,
                                'code' => $type->code,
                            ];
                        }),
                    ];
                }),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve paket',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}