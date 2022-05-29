<?php

namespace App\Library;

use Illuminate\Support\Facades\Http;

class DirectApi
{
    public static function response()
    {
        $headers = array('key' => env('API_KEY_RAJAONGKIR'));
        $res = Http::withHeaders($headers)->acceptJson()->get('https://api.rajaongkir.com/starter/city');
        $data = json_decode($res, true);
        return $data;
    }
}