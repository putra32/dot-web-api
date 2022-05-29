<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function healthcheck()
    {
        $version = '1.0.0';
        $response = array('version'=>$version);
        return response()->json($response, 200);
    }
}
