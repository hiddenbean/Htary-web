<?php

use Illuminate\Http\Request;

use App\User;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserCollection;

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

Route::middleware('auth:api')->group(function () {
    Route::get('test', function () {
        return "hello world";
    });
    
    Route::get('login', 'Api\Auth\LoginController@login');
});

Route::post('register', 'Api\Auth\RegisterController@store');
Route::post('token', 'Api\Auth\ApiTokenController@update');