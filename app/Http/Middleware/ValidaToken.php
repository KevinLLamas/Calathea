<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Models\Usuario;
use App\Models\Departamentos;
class ValidaToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(is_null(Session::get("id"))){
            Session::flush();
            return Redirect::to('/login');
        }
        else{
            return $next($request);
        }
    }
}