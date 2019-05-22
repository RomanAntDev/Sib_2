<?php

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    dd('hi');
//    return $request->user();
//});
Auth::routes();
Route::group(['middleware' => ['json.response']], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:api');

    Route::post('/create', 'UsersController@createNewUser');

    Route::post('/createvendor', 'UsersController@createNewVendor');

    Route::post('/info/{user}', 'UsersController@editUser');

    Route::post('/message', 'MailController@sendMail');


    // public routes
    Route::post('/login', 'Api\AuthController@login')->name('login.api');
    Route::post('/register', 'Api\AuthController@register')->name('register.api');

    // private routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'Api\AuthController@logout')->name('logout');
    });
});

Route::get('users', 'UsersController@index');