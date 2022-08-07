<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UsersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

Route::get('/{vue?}',function(){
    return view('welcome');
})->where('vue','[\/\w\.-]*');

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user_login','UsersController@user_login');
Route::post('/get_all_users','UsersController@get_all_users');
Route::post('/logout','UsersController@logout');

