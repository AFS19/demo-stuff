<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectLogoutUserToHomePage
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->routeIs('filament.admin.auth.logout') || $request->routeIs('filament.doctor.auth.logout') || $request->routeIs('filament.patient.auth.logout')) {
            $user = Auth::user();

            // Log the user out
            Auth::logout();

            // Invalidate the session only if the user was authenticated
            if ($user) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }

            return to_route('welcome');
        }

        return $next($request);
    }
}
