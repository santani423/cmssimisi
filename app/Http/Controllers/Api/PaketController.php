<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ItemDesc;
use App\Models\ItemDescPaket;
use App\Models\Paket;
use App\Models\TypePaket;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // return response()->json([
        //     'success' => true,
        //     'message' => 'List Paket retrieved successfully', 
        //     'wilayah' => $request->input('type_paket'),
        // ], 200);
        try {
            $page = $request->input('page', 1);
            $size = $request->input('size', 10); 
            $query = Paket::query();

            if ($request->has('paket_id')) {
                $query->where('id', $request->input('paket_id'));
            }

            if ($request->has('wilayah_id') && $request->input('wilayah_id') != null) {
                $query->join('wilayahs', 'pakets.wilayah_id', '=', 'wilayahs.id')
                    ->where('wilayahs.code', $request->input('wilayah_id'));
            }
            
            $typePaket = TypePaket::where('code', $request->type_paket)->first();
            // dd($typePaket);
            if ($typePaket) {
                $query->join('type_pakets', 'pakets.type_paket_id', '=', 'type_pakets.id')
                    ->where('type_pakets.id', $typePaket->id);
            }

            $query->orderBy('pakets.created_at', 'desc');
            $query->select('pakets.*' );
            
            

            $paket = $query->paginate($size, ['*'], 'page', $page);
            // dd($paket);
            return response()->json([
                'success' => true,
                'message' => 'List Paket retrieved successfully',
                'data' => $paket,
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'success' => true,
            'message' => 'Create Paket form retrieved successfully',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        // return response()->json([ 
        //     'message' => 'Paket successfully created',
        //     'data' => $request->item_desc_id,
        // ], 201);
        try {
           
            return response()->json([
                'success' => true,     
                'message' => 'Paket successfully created',
            ], 201);
            $thumbnailPath = 'assets/item/group126.png';
            // if ($request->hasFile('thumbnail_img')) {
            //     $file = $request->file('thumbnail_img');
            //     $thumbnailPath = $file->store('uploads/thumbnails', 'public');
            // }
            $pdf = 'assets/item/sempel.pdf';
            // if ($request->hasFile('pdf')) {
            //     $file = $request->file('pdf');
            //     $pdf = $file->store('uploads/pdf', 'public');
            // }

            $typePaket = TypePaket::where('id', $request->paket_id)->first();

            // if (!$typePaket) {
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'Invalid Type Paket code',
            //         'code' => $request->code,
            //     ], 400);
            // }

            $paket = new Paket();
            $paket->wilayah_id = $request->wilayah_id;
            $paket->type_paket_id = $request->paket_id;
            $paket->minimal_orang = $request->minimal_orang;
            $paket->name = $request->name;
            $paket->thumbnail_img = 'storage/' . $thumbnailPath;
            $paket->pdf = 'storage/' . $pdf;
            $paket->start_date_departure = $request->start_date_departure;
            $paket->end_date_departure = $request->end_date_departure;
            // $paket->hotel_bintang_1 = $request->hotel_bintang_1 ? 1 : 0;
            // $paket->hotel_bintang_2 = $request->hotel_bintang_2 ? 1 : 0;
            // $paket->hotel_bintang_3 = $request->hotel_bintang_3 ? 1 : 0;
            // $paket->hotel_bintang_4 = $request->hotel_bintang_4 ? 1 : 0;
            // $paket->hotel_bintang_5 = $request->hotel_bintang_5 ? 1 : 0;
            $paket->transportation_ticket = $request->transportation_ticket ? 1 : 0;
            $paket->code = $request->code . '_' . $request->wilayah_id . '_' . date('YmdHis') . '_' . rand(1000, 9999);
            $paket->description = $request->description ?? null;
            $paket->price = (int) $request->price;

            $paket->save();

            // return response()->json([ 
            //     'message' => 'Paket successfully created',
            //     'data' => $request->item_desc_id,
            // ], 201);
            foreach ($request->item_desc_id as $key => $itemDescId) {
                $item = new ItemDescPaket();
                $item->item_desc_id = $itemDescId;
                $item->paket_id = $paket->id;
                $item->desc = $request->deskripsi[$key];
                $item->save();
            }
            return response()->json([
                'success' => true,
                'data' => $paket, 
                'wilayag' =>$typePaket->code,       
                'message' => 'Paket successfully created',
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $ve->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store paket',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request,$code)
    {
        try {
            $paket = Paket::where('code', $code)->first();
            $thumbnailPath = $paket->thumbnail_img;
            if ($request->hasFile('thumbnail_img')) {
                $file = $request->file('thumbnail_img');
                $thumbnailPath = 'storage/' .$file->store('uploads/thumbnails', 'public');
            }
            $pdf = $paket->pdf;
            if ($request->hasFile('pdf')) {
                $file = $request->file('pdf');
                $pdf = 'storage/' .$file->store('uploads/pdf', 'public');
            }

            // $typePaket = TypePaket::where('code', $request->code)->first();

            // if (!$typePaket) {
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'Invalid Type Paket code',
            //         'code' => $request->code,
            //     ], 400);
            // }

           
            $paket->wilayah_id = $request->wilayah_id;
            // $paket->type_paket_id = $typePaket->id;
            $paket->name = $request->name;
            $paket->thumbnail_img =  $thumbnailPath;
            $paket->pdf =  $pdf;
            $paket->start_date_departure = $request->start_date_departure;
            $paket->end_date_departure = $request->end_date_departure;
            $paket->hotel_bintang_1 = $request->hotel_bintang_1 ? 1 : 0;
            $paket->hotel_bintang_2 = $request->hotel_bintang_2 ? 1 : 0;
            $paket->hotel_bintang_3 = $request->hotel_bintang_3 ? 1 : 0;
            $paket->hotel_bintang_4 = $request->hotel_bintang_4 ? 1 : 0;
            $paket->hotel_bintang_5 = $request->hotel_bintang_5 ? 1 : 0;
            $paket->transportation_ticket = $request->transportation_ticket ? 1 : 0;
            // $paket->code = $request->code . '_' . $request->wilayah_id . '_' . date('YmdHis') . '_' . rand(1000, 9999);
            $paket->description = $request->description ?? null;
            $paket->price = (int) $request->price;

            $paket->save();
            foreach ($request->item_desc_id as $key => $itemDescId) {
                $item =  ItemDescPaket::where('id', $itemDescId)->first();
                
                $item->desc = $request->deskripsi[$key];
                $item->save();
            }
            return response()->json([
                'success' => true,
                'data' => $paket,
                'message' => 'Paket successfully created',
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $ve) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $ve->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to store paket',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Paket retrieved successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $paket = Paket::where('code', $id)->first();
            if (!$paket) {
                return response()->json([
                    'success' => false,
                    'message' => 'Paket not found',
                ], 404);
            }
            $paket->delete();
            return response()->json([
                'success' => true,
                'message' => 'Paket successfully deleted',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete paket',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
