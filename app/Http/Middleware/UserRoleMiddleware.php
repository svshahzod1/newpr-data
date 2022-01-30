<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class UserRoleMiddleware
{

    public function handle(Request $request, Closure $next ,$role = false )
    {
        $user =auth()->user();

        if (!$user){
            return redirect()->route('login');
        }

//        dd($user->getRole());

        if (!$user->getRole() ){
            abort(403,'Sizda Xarakatni davom ettirish uchun umuman ruhsat yoq');
        }

        if ($role &&  $user->getRole() !== $role){
            abort(403,'Sizda Xarakatni davom ettirish uchun kerakli ruhsat yoq');
        }

        return $next($request);
    }
}
