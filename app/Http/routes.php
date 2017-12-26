<?php
use Illuminate\Http\Response;
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
$app->get('/tasks', function (Request $request) use ($app) {

    $results =  ['asdfaf','asdfasf','asdfasf','werwrw'];


    return $results;
    //return $request->headers->get('name');
});

