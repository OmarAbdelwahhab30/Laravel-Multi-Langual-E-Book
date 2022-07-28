<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * {...} are called  ellipsis parameters that consider $roles as array we can loop through them
     */
    public function handle($request, Closure $next,...$roles)
    {
        if (Auth::check()){
            $user = Auth::user();  // is equal to getting an object from User eloquent
            $UserRoles = $user->ReturnUserRoles();
            if (!empty($UserRoles)) {
                foreach ($roles as $role) {
                    if (in_array($role, $UserRoles)) {
                        return $next($request);
                    }
                }
            }else{
                return redirect()->back();
            }
        }
        return redirect()->back();
    }
}
