<?php

namespace App\Library;

use Firebase\JWT\JWT;

class AdminToken
{
    public static function Create($email)
    {
        $payload = [
            'iss' => 'my token',
            'data' => $email,
            'iat' => time(),
            'exp' => time() * ((60*60)*24)*365,
        ];

        $alg = 'HS256';
        $token = JWT::encode($payload, env('JWT_SECRET'), $alg);
        return $token;
    }
}