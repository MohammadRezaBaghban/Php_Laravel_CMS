<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('posts/', 'PostsApiController@index' );
Route::get('posts/{id}', 'PostsApiController@show' );
Route::delete('posts/{id}', 'PostsApiController@delete' );
Route::put('posts/{id}','PostsApiController@update');
Route::post('posts/', 'PostsApiController@store' );

