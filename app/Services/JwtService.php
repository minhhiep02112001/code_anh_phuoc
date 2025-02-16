<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtService
{
    public static function createToken($payload = [])
    {
        // Lấy Private Key từ biến môi trường
        $privateKey = env('PASSPORT_PRIVATE_KEY');

        // Thông tin payload (dữ liệu bạn muốn mã hóa)
        $payload = array_merge($payload, [
            'iss' => env("APP_NAME"),             // Issuer (ứng dụng phát hành)
            'iat' => time(),                 // Thời điểm phát hành
            'exp' => time() + 3600 * 24 * 365,          // Thời điểm hết hạn (1 giờ)
        ]);

        // Tạo JWT token
        return JWT::encode($payload, $privateKey, 'RS256');
    }
}
