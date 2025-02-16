<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
class SaveHistoryGame
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
        $param = $request->route()->parameters(); 
        $this->saveCookie('history_game', $param['id'], 1);
        return $next($request);
    }
    public function saveCookie ($key, $value, $action = 0, $time = (30 * 34 * 60 * 60))
    {
        $data = json_decode(Cookie::get($key)) ?? [];
        if (!empty($data)) {
            $data = array_filter($data, function ($item) use ($value) {
                return $item  != $value;
            });
            $data = array_slice($data, 0, 59);
        }
        if (!empty($action)) $data[] = $value;
        return Cookie::queue($key, json_encode($data), $time);
    }
}
