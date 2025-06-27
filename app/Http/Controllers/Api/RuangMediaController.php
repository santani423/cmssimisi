<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RuangMedia;
use Illuminate\Http\Request;

class RuangMediaController extends Controller
{
    public function index(Request $request)
    {
        try {
            $page = $request->input('page', 1);
            $size = $request->input('size', 10);
            $query = RuangMedia::query()->orderBy('created_at', 'desc');

            $ruangMedia = $query->paginate($size, ['*'], 'page', $page);

            return response()->json([
                'message' => 'List Ruang Media',
                'data' => $ruangMedia, 
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve ruang media',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'thumbnail_img' => 'required',
            'title' => 'required|string|max:255', 
            'resume' => 'required|string',
            'content' => 'required|string',
        ]);

        try {
            $thumbnailPath = 'assets/item/group126.png';
            if ($request->hasFile('thumbnail_img')) {
                $file = $request->file('thumbnail_img');
                $thumbnailPath = 'storage/' .$file->store('uploads/thumbnails', 'public');
            }
             
            $ruangMedia = new RuangMedia();
            $ruangMedia->thumbnail_img = $thumbnailPath;
            $ruangMedia->title = $request->input('title');
            $ruangMedia->code =  'ruang_media'. date('YmdHis') . '_' . rand(1000, 9999);
            $ruangMedia->resume = $request->input('resume');
            $ruangMedia->content = $request->input('content');
            $ruangMedia->save();

            return response()->json([
                'message' => 'Ruang Media created successfully',
                'data' => $ruangMedia,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create ruang media',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    function destroy($code)
    {
        try {
            $ruangMedia = RuangMedia::where('code', $code)->first();
            $ruangMedia->delete();

            return response()->json([
                'message' => 'Ruang Media deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete ruang media',
                'error' => $e->getMessage()
            ], 500);
        }
        
    }
    public function update(Request $request,$code)
    {
        $request->validate([ 
            'title' => 'required|string|max:255', 
            'resume' => 'required|string',
            'content' => 'required|string',
        ]);

        try {
            $ruangMedia = RuangMedia::where('code', $code)->first();
            $thumbnailPath = $ruangMedia->thumbnail_img;
            if ($request->hasFile('thumbnail_img')) {
                $file = $request->file('thumbnail_img');
                $thumbnailPath = 'storage/' .$file->store('uploads/thumbnails', 'public');
            }
             
             
            $ruangMedia->thumbnail_img = $thumbnailPath;
            $ruangMedia->title = $request->input('title'); 
            $ruangMedia->resume = $request->input('resume');
            $ruangMedia->content = $request->input('content');
            $ruangMedia->save();

            return response()->json([
                'message' => 'Ruang Media created successfully',
                'data' => $ruangMedia,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create ruang media',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
