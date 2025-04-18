<?php

// app/Http/Middleware/IsPerusahaan.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsPerusahaan
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'perusahaan') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Kamu tidak punya akses ke halaman ini.');
    }
}

