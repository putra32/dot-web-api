<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class CityController extends BaseController
{
    public function index(Request $request)
    {
        if ($request->has('id')) {
            $id = $request->input('id');
            $city = City::where('id', $id)->first();
            if ($city) {
                return response()->json([
                    'success' => true,
                    'message' => 'One of the city in Indonesia',
                    'data' => $city,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'There are not data on the database',
                ], 404);
            }
        } else {
            $city = City::all();
            if($city){
                return response()->json([
                    'success' => true,
                    'message' => 'List cities in Indonesia',
                    'data' => $city,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data not found'
                ], 404);
            }
        }
    }
}
