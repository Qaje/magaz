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
/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */
// Route::apiresource('users','UserController');

$router->post('users/login',['uses'=>'UserController@getToken']);
// Route::post('user/login', ['middleware'=>'auth', 'user'=>'UserController@getToken']);
// $router->group(['middleware' => ['auth']],function () use ($router){
    Route::apiResource('users','UserController');
    Route::apiResource('rols','RolController');
// });


Route::apiResource('transactions','TransactionController');
// Route::apiresource('categories','CategoryController');