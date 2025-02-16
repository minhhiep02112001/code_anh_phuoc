<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $public_key = env('PASSPORT_PUBLIC_KEY');
        $privateKey = env('PASSPORT_PRIVATE_KEY');
        $jwtClass = new JWT;

        // $payload = [
        //     'iss' => 'https://laosiam.site/', // Issuer
        //     'aud' => 'laosiam.site/', // Audience
        //     'iat' => time(), // Issued at
        //     'exp' => time() + 3600 * 24 * 365, // Expiration time (1 giờ)
        //     'data' => [
        //         'userId' => 123,
        //         'email' => 'admin@example.com'
        //     ]
        // ];
        // $jwt = $jwtClass::encode($payload, $privateKey, 'RS256');
        // dd($jwt);
        if (property_exists($jwtClass, 'leeway')) {
            $jwtClass::$leeway += 15;
        }

        $token = $request->bearerToken();

        if (empty($token)) {
            return response()->json([
                'status' => false,
                'message' => "Unauthorized !!! Token null",
            ], 401);
        }

        try {
            $decoded = $jwtClass::decode($token, new Key($public_key, 'RS256')); 
            return $next($request);
        } catch (\Exception $ex) {
            return response()->json([
                'status' => false,
                'message' => "Token fails !!! {$ex->getMessage()}"
            ], 401);
        }
    }
}
