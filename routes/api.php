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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\LoginController@dologin'); // API Login
Route::post('forgotpass', 'API\LoginController@forgotpass');
Route::post('gantipass', 'API\LoginController@gantipass');
Route::post('uploads', 'API\DaruratController@uploads');
Route::GET('kategori-darurat', 'API\KategoriController@kategori');
