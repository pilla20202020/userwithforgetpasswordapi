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

Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('/forgetpassword', 'App\Http\Controllers\Api\AuthController@forgetPassword');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/logout', 'App\Http\Controllers\Api\AuthController@logout');
    Route::get('details', 'App\Http\Controllers\Api\AuthController@details');

    Route::resource('todayshare', 'App\Http\Controllers\Api\TodayShare\TodayShareController')->middleware('role:SuperAdmin');
    Route::get('todayshare/destroy/{id}', 'App\Http\Controllers\Api\TodayShare\TodayShareController@destroy')->name('todayshare.delete')->middleware('role:SuperAdmin');
});


