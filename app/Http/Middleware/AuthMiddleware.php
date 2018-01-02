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
            $user = DB::table('users')->where('remember_token', $key[0])->first();
            if(!empty($user)){
                //$request->request->add(['userid' => '123']);
                return $next($request)
                    ->header('Access-Control-Allow-Origin', '*')
                    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

                //return $next($request);

            }
            else {
                return response()->json(['Authorization failed']);
            }




        }
        return response()->json(['Api Key not Found']);






    }
}
