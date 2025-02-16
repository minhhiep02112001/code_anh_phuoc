<?php

namespace App\Http\Middleware;

use App\Models\LoggedDevice;
use Closure;
use Illuminate\Http\Request;

class LogUserActions
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
        $user = Auth::user();
        // Ghi log thông tin người dùng và hành động
        if ($user) {
            LoggedDevice::create([
                'user_id' => $user->id,
                'ip_address' => $request->ip(),
                'device_code' => $request->header('Device-Code'), // assuming the device code is sent in the header
                'user_agent' => $request->header('User-Agent'),
                'time' => now(),
            ]);
        }

        return $next($request); 
    }
}
