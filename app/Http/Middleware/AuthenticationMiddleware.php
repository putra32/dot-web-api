<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization');
        $data = explode(" ", $token);
        if ($token) {

            if ($data[0] == 'Bearer') {
                if ($data) {
                    return $next($request);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Check token',
                    ], 422);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Check token',
                ], 422);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'user cannot allowed'
            ]);
        }
    }
}
