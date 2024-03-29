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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('news/create', 'Admin\NewsController@add');
  Route::post('news/create', 'Admin\NewsController@create');
  Route::get('profile/create', 'Admin\ProfileController@add');
  Route::post('profile/create', 'Admin\ProfileController@create');
  Route::get('profile/edit', 'Admin\ProfileController@edit');
  Route::post('profile/edit', 'Admin\ProfileController@update');
  Route::get('news', 'Admin\NewsController@index');
  Route::get('profile', 'Admin\ProfileController@index');
  Route::get('news/edit', 'Admin\NewsController@edit'); // 追記
  Route::post('news/edit', 'Admin\NewsController@update'); // 追記
  Route::get('news/delete', 'Admin\NewsController@delete'); // 追記
  Route::get('profile/edit', 'Admin\ProfileController@edit'); // 追記2
  Route::post('profile/edit', 'Admin\ProfileController@update'); // 追記2
  Route::get('profile/delete', 'Admin\ProfileController@delete'); // 追記2
  Route::get('/', 'NewsController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
