<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api lấy danh sách bài viết chưa update Ivivu
Route::get('posts', 'Crawl\PostController@index')->name('posts');
Route::post('posts/{id}', 'Crawl\PostController@update')->name('posts');
Route::post('posts', 'Crawl\PostController@insert')->name('posts');

//mytour
Route::get('mytour', 'Crawl\MyTourController@index')->name('mytour');
Route::post('mytour/{id}', 'Crawl\MyTourController@update')->name('mytour');
Route::post('mytour', 'Crawl\MyTourController@insert')->name('mytour');