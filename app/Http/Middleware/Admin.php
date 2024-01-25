<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class Admin
{
        // Admin.php
    public function handle($request, Closure $next)
    {
       $user = auth()->user();

        if ($user && $user->hasRole('admin')) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');

       /* $user = Auth::user();
        if ($user->hasRole('admin')) {
               // Obtén los nombres de los roles asignados al usuario
            $roles = $user->getRoleNames();

            // Imprime o haz lo que necesites con la información de roles
            dd($roles);
        }
        abort(403, 'Unauthorized action.');
    }*/

    }
}
