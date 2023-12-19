<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleTres
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rol1, $rol2, $rol3): Response
    {
        if (session('Rol') == $rol1 || session('Rol') == $rol2 || session('Rol') == $rol3) {
            return $next($request);
        }

        return redirect()->route('carrito.index');
    }
}
