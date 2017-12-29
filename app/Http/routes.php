<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->post('/login', function (Request $request) use ($app) {
    $user = DB::table('users')->where('email', $request->input('email'))->first();
    dd($user);
    if (Hash::check($request->input('password'), $user->password)){
        $api_key = str_random(20);
        DB::table('users')->where('email', $request->input('email'))->update(['remember_token' => $api_key]);
        return response()->json(['status' => 200, 'api_key' => $api_key]);
    }
    else {
        return response()->json(['status' =>'login failed']);
    }
});

 $app->get('/tasks', ['middleware' => 'Auth', function (Request $request) {
    $tasks = DB::table('tasks')->get();
    $results = ['asdfaf', 'asdfasf', 'asdfasf', 'werwrw'];
    return $tasks;
    //return $request->headers->get('name');
}]);

