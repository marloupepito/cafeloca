<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UsersController;
use App\http\Controllers\ProductController;
use App\http\Controllers\CoverPhotoController;
use App\http\Controllers\StarRateController;
use Illuminate\Http\Request;
use App\Mail\Registration;
use App\Mail\ForgetPassword;
use App\Mail\NotApproved;
use App\Mail\Approved;
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
    $request->session()->put('otp', $otp);
    Mail::to($request->email)->send(new Registration());
    return view('email.Registration');
});

Route::post('/sendotp2', function (Request $request) {
    $otp = rand(100000,999999);
    $request->session()->put('otp', $otp);
    Mail::to($request->email)->send(new ForgetPassword());
    return view('email.ForgetPassword');
});

Route::post('/notapproved', function (Request $request) {
    Mail::to($request->email)->send(new NotApproved());
    return view('email.NotApproved');
});

Route::post('/approved', function (Request $request) {
    Mail::to($request->email)->send(new Approved());
    return view('email.Approved');
});

Route::post('/user_login','UsersController@user_login');
Route::post('/get_all_users','UsersController@get_all_users');
Route::post('/logout','UsersController@logout');
Route::post('/otp_submit','UsersController@otp_submit');
Route::post('/add_user','UsersController@add_user');
Route::post('/get_user_id','UsersController@get_user_id');
Route::post('/approve_user','UsersController@approve_user');
Route::post('/edit_profile','UsersController@edit_profile');
Route::post('/upload_profile','UsersController@upload_profile');
Route::post('/change_location_lng_lat','UsersController@change_location_lng_lat');
Route::post('/get_counted_user','UsersController@get_counted_user');
Route::post('/get_email','UsersController@get_email');
Route::post('/change_password','UsersController@change_password');
Route::post('/delete_branch','UsersController@delete_branch');
Route::post('/upload_documents','UsersController@upload_documents');
Route::post('/get_every_documents','UsersController@get_every_documents');
Route::post('/delete_documents','UsersController@delete_documents');




Route::post('/post_product','ProductController@post_product');
Route::post('/get_branch_post','ProductController@get_branch_post');
Route::post('/get_all_post','ProductController@get_all_post');
Route::post('/get_every_product_post','ProductController@get_every_product_post');
Route::post('/get_menu','ProductController@get_menu');
Route::post('/get_search_menu','ProductController@get_search_menu');
Route::post('/get_search_menu2','ProductController@get_search_menu2');
Route::post('/deletePost','ProductController@deletePost');


Route::post('/add_cover_photo','CoverPhotoController@add_cover_photo');
Route::post('/get_coffee_cover','CoverPhotoController@get_coffee_cover');
Route::post('/get_coffee_cover2','CoverPhotoController@get_coffee_cover2');


Route::post('/get_star_rating','StarRateController@get_star_rating');
Route::post('/submit_post_rating','StarRateController@submit_post_rating');
Route::post('/get_branch_rating','StarRateController@get_branch_rating');
Route::post('/get_user_rating','StarRateController@get_user_rating');
Route::post('/get_selected_product','StarRateController@get_selected_product');



