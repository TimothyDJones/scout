<?php

use Illuminate\Http\Request;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Routes for roles and permissions
Route::post('role', 'JwtAuthenticateController@createRole');
Route::post('permission', 'JwtAuthenticateController@createPermission');
Route::post('assign-role', 'JwtAuthenticateController@assignRole');
Route::post('attach-permission', 'JwtAuthenticateController@attachPermission');

Route::group(['prefix' => 'api', 'middleware' => ['ability:admin,create-users']], function() {
	Route::get('users', 'JwtAuthenticateController@index');
});

Route::post('authenticate', 'JwtAuthenticateController@authenticate');