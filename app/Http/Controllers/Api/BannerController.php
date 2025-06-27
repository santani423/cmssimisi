<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\SubBannerImage;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $page = request()->input('page', 1);
            $size = request()->input('size', 10);
            $query = Banner::query()->orderBy('created_at', 'desc');

            $banners = $query->paginate($size, ['*'], 'page', $page);

            return response()->json([
                'message' => 'List Banners',
                'data' => $banners,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve banners',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'image_path' => 'required',
        //     'discover_more' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'is_active' => 'required|boolean',
        //     // 'sub_banner_images' => 'nullable|array',
        //     // 'sub_banner_images.*.path_img' => 'required_with:sub_banner_images|string|max:255',
        // ]);

        try {
            $image_path = 'assets/item/group126.png';
            if ($request->hasFile('image_path')) {
                $file = $request->file('image_path');
                $image_path = 'storage/' . $file->store('uploads/banner', 'public');
            }
            $banner = new Banner();
            $banner->title = $request->input('title');
            $banner->image_path = $image_path;
            $banner->discover_more = $request->input('discover_more');
            $banner->description = $request->input('description');
            $banner->is_active = $request->input('is_active');
            $banner->code = 'banner' . date('YmdHis') . '_' . rand(1000, 9999);
            $banner->save();

            // Handle sub-banner images if provided
            // if ($request->has('sub_banner_images')) {
            //     foreach ($request->input('sub_banner_images') as $subImage) {
            //         $banner->subBannerImages()->create([
            //             'path_img' => $subImage['path_img'],
            //         ]);
            //     }
            // }

            for ($i = 1; $i < 3; $i++) {
                $subBanner = new SubBannerImage();
                $subBanner->banner_id = $banner->id;
                $subBanner->path_img = 'assets/item/group126.png';
                if ($request->hasFile('sub_banner_images_' . $i)) {
                    $file = $request->file('sub_banner_images_' . $i);
                    $subBanner->path_img = 'storage/' . $file->store('uploads/banner', 'public');
                }
                $subBanner->save();
            }

            return response()->json([
                'message' => 'Banner created successfully',
                'data' => $banner,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create banner',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'image_path' => 'required',
        //     'discover_more' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'is_active' => 'required|boolean',
        //     // 'sub_banner_images' => 'nullable|array',
        //     // 'sub_banner_images.*.path_img' => 'required_with:sub_banner_images|string|max:255',
        // ]);

        try {
            $banner = Banner::where('id', $id)->first();
            $image_path = $banner->image_path;
            if ($request->hasFile('image_path')) {
                $file = $request->file('image_path');
                $image_path = 'storage/' . $file->store('uploads/banner', 'public');
            }
            $banner->title = $request->input('title');
            $banner->image_path = $image_path;
            $banner->discover_more = $request->input('discover_more');
            $banner->description = $request->input('description');
            $banner->is_active = $request->input('is_active');
            $banner->save();

            // Handle sub-banner images if provided
            // if ($request->has('sub_banner_images')) {
            //     foreach ($request->input('sub_banner_images') as $subImage) {
            //         $banner->subBannerImages()->create([
            //             'path_img' => $subImage['path_img'],
            //         ]);
            //     }
            // }

            foreach ($banner->SubBannersImage as $i => $subImage) {
                if ($request->hasFile('sub_banner_' . $subImage->id)) {
                    $file = $request->file('sub_banner_' . $subImage->id);
                    $subImage->path_img = 'storage/' . $file->store('uploads/banner', 'public');
                }
                $subImage->save();
            }

            return response()->json([
                'message' => 'Banner update successfully',
                'data' => $banner,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update banner',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($code)
    {
        try {
            $banner = Banner::where('code', $code)->first();
            if (!$banner) {
                return response()->json([
                    'message' => 'Banner not found',
                ], 404);
            }
            $banner->delete();

            return response()->json([
                'message' => 'Banner deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete banner',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
