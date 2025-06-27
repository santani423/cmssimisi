<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TypePaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypePaketController extends Controller
{
    public function index(Request $request)
    {
        try {
            $page = (int) $request->input('page', 1);
            $size = (int) $request->input('size', 10);

            // Ambil data TypePaket dengan paginasi
            $paginator = TypePaket::paginate($size, ['*'], 'page', $page);

            // Ambil collection hasil paginasi
            $items = $paginator->getCollection()->map(function ($typePaket) {
                // Tambahkan data 'pakets' dari query manual
                $typePaket->pakets = DB::table('pakets')
                    ->where('type_paket_id', $typePaket->id)
                    ->get();

                return $typePaket;
            });

            // Set collection baru yang sudah dimodifikasi
            $paginator->setCollection($items);

            return response()->json([
                'message' => 'List Paket',
                'data' => $paginator,
                'wilayah' => $request->input('wilayah_id'),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve paket',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
