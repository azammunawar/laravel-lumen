<?php

namespace App\Http\Middleware;
use DB;
use Closure;

class AuthMiddleware
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
        if ($request->header('Authorization')) {
            $key = explode(' ',$request->header('Authorization'));
            $user = DB::table('users')->where('remember_token', $key[0]);
            if(!empty($user)){
                //$request->request->add(['userid' => '123']);
                return $next($request);

            }

        }
        else {
            return $request->header('Authorization');
        }





    }
}
