<?php

namespace App\Http\Middleware;

use Auth;
use Redirect;

class RoleIndex
{

    public function handle()
    {
        if(Auth::check())
            $type = Auth::user()->type;
        return Redirect::to((isset($type) && $type!= null) ? $type :"login");
    }
}