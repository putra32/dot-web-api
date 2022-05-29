<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ProvinceController extends BaseController
{
    public function index(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->input('id');
            $province = Province::where('id', $id)->first();
            if ($province) {
                return response()->json([
                    'success' => true,
                    'message' => 'On of the province in Indonesia',
                    'data' => $province,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'There are not data on the database',
                ]);
            }
        } else {
            $province = Province::all();
            return response()->json([
                'success' => true,
                'message' => 'List provinces in Indonesia',
                'data' => $province,
            ], 200);
        }
    }
}
