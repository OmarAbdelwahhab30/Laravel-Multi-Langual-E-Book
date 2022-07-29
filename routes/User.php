<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "User" middleware group. Now create something great!
|
*/

//UserMainController
Route::get("home",'UserMainController@index')->name("user.home");


//UploadBookController
Route::get("uploadBook","UploadBookController@index")->name("uploadpage");
Route::post("uploadBook","UploadBookController@upload")->name("book.upload");


//UserCategoryController
Route::get("category/{id}","UserCategoryController@index")->name("user.category");


//UserBookController
Route::get("book/{id}","UserBookController@index")->name("user.book");
Route::get("deletebook/{id}","UserBookController@DeleteBook")->name("book.delete");
Route::get("bookEvent/{id}","UserBookController@FireDownloadBookEvent")->name("bookEvent.fire");


//UserCommentsController
Route::post("addComment/{id}","UserCommentsController@ValidateComments")->name("book.comment");
Route::get("deletecomment/{id}","UserCommentsController@DeleteComment")->name("comment.delete");
