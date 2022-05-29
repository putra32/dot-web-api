<?php

namespace App\Library;

use Illuminate\Support\Facades\Http;

class DirectApi
{
    public static function response($url, $qs)
    {
        $headers = array('key' => env('API_KEY_RAJAONGKIR'));
        $res = Http::withHeaders($headers)->acceptJson()->get($url . $qs);
        $data = json_decode($res, true);
        return $data;
    }
}
