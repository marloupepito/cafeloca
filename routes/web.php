<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UsersController;
use Illuminate\Http\Request;
use App\Mail\Registration;
use Illuminate\Support\Facades\Mail;
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
   if($request->user()->message !== 'Unauthenticated'){
    return $request->user();
   }
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



Route::post('/sendotp', function (Request $request) {
    $otp = rand(100000,999999);
    session(['otp' => $otp]);
    Mail::to($request->email)->send(new Registration());
    return view('email.Registration');
});

Route::post('/user_login','UsersController@user_login');
Route::post('/get_all_users','UsersController@get_all_users');
Route::post('/logout','UsersController@logout');
Route::post('/otp_submit','UsersController@otp_submit');
Route::post('/add_user','UsersController@add_user');

