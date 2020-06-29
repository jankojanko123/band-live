<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/about', 'PagesController@about');
Route::get('/tv', 'TvController@index');
Route::get('/archive', 'PagesController@archive');
Route::get('/services', 'PagesController@services');
Route::resource('posts', 'PostsController');

//php artisan route:list
//+--------+-----------+-------------------+---------------+-----------------------------------------------+-----------
//---+
//| Domain | Method    | URI               | Name          | Action                                        | Middleware
//   |
//+--------+-----------+-------------------+---------------+-----------------------------------------------+-----------
//---+
//|        | GET|HEAD  | /                 |               | App\Http\Controllers\PagesController@index    | web
//   |
//|        | GET|HEAD  | about             |               | App\Http\Controllers\PagesController@about    | web
//   |
//|        | GET|HEAD  | api/user          |               | Closure                                       | api,auth:a
//pi |
//|        | GET|HEAD  | posts             | posts.index   | App\Http\Controllers\PostsController@index    | web
//   |
//|        | POST      | posts             | posts.store   | App\Http\Controllers\PostsController@store    | web
//   |
//|        | GET|HEAD  | posts/create      | posts.create  | App\Http\Controllers\PostsController@create   | web
//   |
//|        | GET|HEAD  | posts/{post}      | posts.show    | App\Http\Controllers\PostsController@show     | web
//   |
//|        | PUT|PATCH | posts/{post}      | posts.update  | App\Http\Controllers\PostsController@update   | web
//   |
//|        | DELETE    | posts/{post}      | posts.destroy | App\Http\Controllers\PostsController@destroy  | web
//   |
//|        | GET|HEAD  | posts/{post}/edit | posts.edit    | App\Http\Controllers\PostsController@edit     | web
//   |
//|        | GET|HEAD  | services          |               | App\Http\Controllers\PagesController@services | web
//   |
//+--------+-----------+-------------------+---------------+-----------------------------------------------+-----------
//---+





Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('/', 'PostsController@index');

Route::get('/add', 'AutoPostsController@getAllData');


Route::get('space_invaders', function()
{
    return view('hidden/space_invaders');
});

Route::get('post/{id}/islikedbyme', 'PostController@isLikedByMe');
Route::post('post/like', 'PostController@like');



