<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/



Route::middleware('lock')->group(function () {
    //AdminUserController
    Route::resource("users",   AdminUsersController::class)->except('destroy','edit');
    Route::post('/destroy', 'AdminUsersController@destroy')->name("users.destroy");
    Route::get('/EditProfile', 'AdminUsersController@edit')->name("users.edit"); //to show Edit Profile Page
    Route::get("ChangeBanStatus/{userid}/{currentStatus}",'AdminUsersController@ChangeBanStatus')->name("user.ban");
    Route::get("ChangeRole/{userid}",'AdminUsersController@ChangeRole')->name("user.set");




//AdminMainController
    Route::resource("main",    AdminMainController::class);


//AdminCategoryController
    Route::resource("category",AdminCategoryController::class)->except(['destroy']);
    Route::post('/destroyCategory', 'AdminCategoryController@destroy')->name("category.destroy");


});



//LockScreenController
Route::get('lockscreen', 'LockScreenController@lockscreen')->name("user.lock");
Route::post('lockscreen', 'LockScreenController@unlock')->name("lock.imp");
