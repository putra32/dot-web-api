<?php

namespace App\Http\Controllers;

use App\Library\AdminToken;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if ($email == 'admin@admin.com' && $password == '1234') {
            $token = AdminToken::Create($email);
            return response()->json([
                'success' => true,
                'message' => 'login success',
                'token' => $token,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'email / password incorrect'
            ]);
        }
    }
}
