<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DirectorRoleMiddleware
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
        $user =auth()->user();

        if (!$user){
            return redirect()->route('login');
        }

        if ($user->getRole() !== 'director'){

            return abort(403,'Sizda director roli yoq');
        }

        return $next($request);
    }
}
