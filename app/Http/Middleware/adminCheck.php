<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('filament.admin.auth.login');
        }

        $user = Auth::user();

        if ($user->role !== 'admin') {
            // Auth::logout();

            return redirect()
                ->route('filament.admin.auth.login')
                ->withErrors([
                    'auth' => 'Anda tidak memiliki akses ke panel admin.',
                ]);
        }

        return $next($request);
    }
}
