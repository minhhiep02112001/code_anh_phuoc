<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Redirect_301
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
        $url = trim($request->url(), '/');
        $url = str_replace('http://', 'https://', $url);
        
        $check_link = DB::table('st_redirect')->where('url_old', $url)->where('is_status',1)->first();
        
        if(!empty($check_link)){
            return redirect($check_link->url_new, 301);
        }  
        return $next($request);
    }
}
