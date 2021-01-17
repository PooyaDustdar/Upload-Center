<?php

namespace App\Http\Middleware;
use Auth;
use Redirect;
use Closure;

class RoleUser
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
            if($type != "user") {
                $_ENV['user_type'] = 'admin';
                return Redirect::to('admin');
            }
            return $next($request);
        }
        return Redirect::to('login');
    }
}
