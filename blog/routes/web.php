<?php

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
Route::get('index','IndexController@index');
Route::get('about','IndexController@about');
Route::any('guestbook','IndexController@guestbook');
Route::get('shuo','IndexController@shuo');
Route::get('note','IndexController@note');
Route::get('picture','IndexController@picture');
Route::get('learn','IndexController@learn');
Route::get('test','IndexController@test');
Route::prefix('articles')->group(function () {
    Route::get('show/{id}','ArticlesController@show');
    Route::get('selecttop','ArticlesController@selecttop');
    Route::post('condition','ArticlesController@condition');
    Route::any('news','ArticlesController@news');
    Route::post('comment/{id}','ArticlesController@comment');
});
Route::any('admin/login','AdminController@login');
Route::any('admin/register','AdminController@register');
Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['checklogin']], function () {
        Route::any('jiance','AdminController@jiance');
        Route::any('index','AdminController@index');
        Route::any('create','AdminController@create');
        Route::any('jiazai','AdminController@jiazai');
        Route::any('test','AdminController@jiazai');
        Route::any('preedit/{id}','AdminController@preedit');
        Route::any('delete/{id}','AdminController@delete');
    });
});

