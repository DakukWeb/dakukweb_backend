<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class Customer
{
        // CustomerMiddleware.php
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if ($user && $user->hasRole('customer')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
