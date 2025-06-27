<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index(){
        try {
            $settings = \App\Models\Setting::first();
            if (!$settings) {
                $settings = new \App\Models\Setting();
                $settings->save();
            } 
            return response()->json([
                'success' => true,
                'message' => 'List Setting retrieved successfully',
                'data' => $settings,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error retrieving settings',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
