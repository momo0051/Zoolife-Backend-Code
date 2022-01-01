<?php

namespace App\Http\Middleware;

use Closure;

class LocalizationMiddleware
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
        $local = 'ar';
        if($request->hasHeader('X-localization') && $request->header('X-localization') == 'en') {
           $local = $request->header('X-localization');
        }
        app()->setLocale($local);

        return $next($request);
    }
}
