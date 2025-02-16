<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\TokenRepository;
use Lcobucci\JWT\Token\Parser;

class CheckAuthenticateClient
{
    public function handle($request, Closure $next)
    {
        $token = $request->cookie('access_token');
        $refreshToken = $request->cookie('refresh_token');

        if ($token) {
            $tokenId = (new  Parser())->parse($token)->getHeader('jti');
            $tokenRepository = app(TokenRepository::class);
            $tokenModel = $tokenRepository->find($tokenId);

            if ($tokenModel && !$tokenModel->revoked) {
                $request->headers->set('Authorization', 'Bearer ' . $token);
            } else {
                // Token hết hạn, thực hiện làm mới token
                if ($refreshToken) {
                    $response = Http::asForm()->post(env('APP_URL') . '/oauth/token', [
                        'grant_type' => 'refresh_token',
                        'refresh_token' => $refreshToken,
                        'client_id' => env('PASSPORT_CLIENT_ID'),
                        'client_secret' => env('PASSPORT_CLIENT_SECRET'),
                    ]);

                    if ($response->successful()) {
                        $tokenData = $response->json();
                        $newAccessToken = $tokenData['access_token'];
                        $newRefreshToken = $tokenData['refresh_token'];

                        // Cập nhật cookie mới
                        cookie()->queue(cookie('authen_access_token', $newAccessToken, 60));
                        cookie()->queue(cookie('authen_refresh_token', $newRefreshToken, 43200));

                        // Thêm token mới vào header
                        $request->headers->set('Authorization', 'Bearer ' . $newAccessToken);
                    } else {
                        return response()->json(['error' => 'Unauthorized'], 401);
                    }
                } else {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }
            }
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $next($request);
    }
}
