<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
        'register',  // Tambahkan rute register untuk pengecualian CSRF
        'halaman-profil', // Pengecualian untuk halaman profil
    ];

    public function handle($request, Closure $next)
    {
        // Jika flag csrf.skip aktif, lewati validasi CSRF
        if (app()->bound('csrf.skip') && app()->get('csrf.skip') === true) {
            return $next($request);
        }

        // Lanjutkan normal
        return parent::handle($request, $next);
    }
}