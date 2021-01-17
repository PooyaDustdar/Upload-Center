<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\View\View;
use Redirect;

class RoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $type = Auth::user()->type;
            if($type != "admin")
                return Redirect::to('user');

            $_ENV['user_type']='admin';
            return $next($request);
        }
        return Redirect::to('login');
    }
}
