<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BypassCsrfForLocust
{
    public function handle(Request $request, Closure $next)
    {
        $userAgent = strtolower($request->header('User-Agent', ''));
        $ip = $request->ip();

        if (
            app()->environment('local') &&
            str_contains($userAgent, 'locust') &&
            in_array($ip, ['127.0.0.1', '::1'])
        ) {
            // Tandai bahwa CSRF boleh diskip
            app()->singleton('csrf.skip', fn () => true);
        }

        return $next($request);
    }
}
