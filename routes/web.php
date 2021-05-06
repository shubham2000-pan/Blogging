<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------\------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'BlogController@blog');
Route::get('blog_detailes/{id}', 'BlogController@blog_detailes');
Route::post('blog_comment-store', 'BlogcommentController@store');
Route::post('blog_comment_reply-store', 'ReplyController@store');
Route::post('blog_comment_likes', 'LikescommentController@store');


Route::group(['middleware' => ['auth']], function () {
Route::get('admin', 'AdmindashbordController@index');
Route::get('add_user', 'UserController@create');
Route::post('usar-store', 'UserController@store');
Route::get('user_list', 'UserController@index');
Route::post('user-list', 'UserController@ajax');
Route::get('delete-user/{id}', 'UserController@destroy');
Route::get('user_edit/{id}', 'UserController@edit');
Route::post('user_upadate', 'UserController@update');
Route::get('blog_create', 'BlogController@create');
Route::post('blog-store', 'BlogController@store');
});
?>