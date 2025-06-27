<?php

namespace App\Http\Controllers;

use App\Models\ItemDesc;
use App\Models\ItemDescPaket;
use App\Models\Paket;
use App\Models\RuangMedia;
use App\Models\TypePaket;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        return view('cms.index');
    }

    public function create()
    {
        return view('cms.create');
    }

    public function store(Request $request)
    {
        // Logic to store data
    }

    public function edit($id)
    {
        return view('cms.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update data
    }

    public function destroy($id)
    {
        // Logic to delete data
    }
    public function show($id)
    {
        return view('cms.show', compact('id'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        // Logic to search data
        return view('cms.search', compact('query'));
    }


    function paket($code)
    {
        return view('cms.paket.index', compact('code'));
    }
    function paketWilayah($code)
    {
        $wilayah = Wilayah::where('code', $code)->first();
        return view('cms.paket.index', compact('code', 'wilayah'));
    }

    function paketCreate(Request $request, $code)
    {
        $wilayah = Wilayah::where('code', $code)->first();
        // dd($wilayah);
        $typePaket = TypePaket::where('code', $request->jenis)->first();
        $ItemDesc = ItemDesc::query()
            ->join('set_item_des_pakets as idp', 'idp.item_desc_id', '=', 'item_descs.id')
            ->join('type_pakets', 'type_pakets.id', '=', 'idp.paket_id')
            ->where('type_pakets.code', $request->jenis)
            ->select('item_descs.*')
            ->get();
            // dd($ItemDesc);



        return view('cms.paket.create', compact('code', 'wilayah', 'ItemDesc', 'typePaket'));
    }

    function paketStore(Request $request)
    {
        // Logic to store data
        // return redirect()->route('cms.paket', ['code' => $code]);
        // dd($request->all());

        try {
           
            // return response()->json([
            //     'success' => true,     
            //     'message' => 'Paket successfully created',
            // ], 201);
            $thumbnailPath = 'assets/item/group126.png';
            if ($request->hasFile('thumbnail_img')) {
                $file = $request->file('thumbnail_img');
                $thumbnailPath = $file->store('uploads/thumbnails', 'public');
            }
            $pdf = 'assets/item/sempel.pdf';
            if ($request->hasFile('pdf')) {
                $file = $request->file('pdf');
                $pdf = $file->store('uploads/pdf', 'public');
            }

            $typePaket = TypePaket::where('id', $request->paket_id)->first();

            if (!$typePaket) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Type Paket code',
                    'code' => $request->code,
                ], 400);
            }

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
            $wilayah = Wilayah::where('id', $request->wilayah_id)->first();
            return redirect()->route('cms.paket', $wilayah->code )->with('success', 'Paket successfully created');
            // return response()->json([
            //     'success' => true,
            //     'data' => $paket, 
            //     'wilayag' =>$typePaket->code,       
            //     'message' => 'Paket successfully created',
            // ], 201);

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

    function paketUpdate(Request $request, $code)
    {
        // Logic to store data
        // return redirect()->route('cms.paket', ['code' => $code]);
        // dd($request->all());

        try {
            $paket = Paket::where('code', $code)->first();
            // return response()->json([
            //     'success' => true,     
            //     'message' => 'Paket successfully created',
            // ], 201);
            $thumbnailPath = $paket->thumbnail_img;
            if ($request->hasFile('thumbnail_img')) {
                $file = $request->file('thumbnail_img');
                $thumbnailPath = 'storage/' .$file->store('uploads/thumbnails', 'public');
            }
            $pdf =  $paket->pdf;
            if ($request->hasFile('pdf')) {
                $file = $request->file('pdf');
                $pdf = 'storage/' .$file->store('uploads/pdf', 'public');
            }

            $typePaket = TypePaket::where('id', $request->paket_id)->first();

            if (!$typePaket) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Type Paket code',
                    'code' => $request->code,
                ], 400);
            }

           
            $paket->wilayah_id = $request->wilayah_id;
            $paket->type_paket_id = $request->paket_id;
            $paket->minimal_orang = $request->minimal_orang;
            $paket->name = $request->name;
            $paket->thumbnail_img = $thumbnailPath;
            $paket->pdf =  $pdf;
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
                $item =  ItemDescPaket::where('id', $request->item_desc_id[$key])->first(); 
                $item->desc = $request->deskripsi[$key];
                $item->save();
            }
            $wilayah = Wilayah::where('id', $paket->wilayah_id)->first();
            return redirect()->route('cms.paket', $wilayah->code )->with('success', 'Paket successfully created');
            // return response()->json([
            //     'success' => true,
            //     'data' => $paket, 
            //     'wilayag' =>$typePaket->code,       
            //     'message' => 'Paket successfully created',
            // ], 201);

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

    function paketEdit($code)
    { 
       
        $paket = Paket::where('code', $code)->first();
        
        $typePaket = TypePaket::where('id', $paket->type_paket_id)->first();
        $wilayah = Wilayah::where('id', $paket->wilayah_id)->first();
        $ItemDesc = ItemDesc::query()
        ->join('item_desc_pakets as idp', 'idp.item_desc_id', '=', 'item_descs.id') 
        ->where('idp.paket_id', $typePaket->id)
        ->select('item_descs.name as item_desc_name','idp.*')
        ->get();
        
        return view('cms.paket.edit', compact('code', 'wilayah', 'ItemDesc', 'paket', 'typePaket'));
    }
    function paketShow($code)
    {
        $paket = Paket::where('code', $code)->first();
        return view('cms.paket.show', compact('code', 'paket'));
    }
    function paketDelete($code, $id)
    {
        return view('cms.paket.delete', compact('code', 'id'));
    }


    function ruangMeida()
    {
        return view('cms.ruangMedia.index');
    }
    function ruangMediaCreate()
    {
        return view('cms.ruangMedia.create');
    }
    function ruangMediaStore(Request $request)
    {
        // Logic to store data
        // return redirect()->route('cms.ruang.media');
    }
    function ruangMediaEdit($code)
    {
        $media = RuangMedia::where('code', $code)->first();
        return view('cms.ruangMedia.edit', compact('media', 'code'));
    }
    function ruangMediaShow($code)
    {
        $ruangMedia = RuangMedia::where('code', $code)->first();
        return view('cms.ruangMedia.show', compact('ruangMedia'));
    }

    function profile()
    {
        $user = User::find(auth()->id());
        // dd($user);
        return view('cms.profile.index', compact('user'));
    }

    function profileUpdate(Request $request)
    {
        $user = User::find(auth()->id());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
