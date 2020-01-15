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

//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','HomeController@index')->name('index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('home', 'HomeController');



Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index');

    Route::prefix('acc_admin')->group(function () {
    	Route::get('/', 'Admin\AdminController@getList');

    	Route::get('add', 'Admin\AdminController@getAdd');
    	Route::post('add', 'Admin\AdminController@postAdd');

    	Route::get('edit', 'Admin\AdminController@getEdit');
    	Route::post('edit', 'Admin\AdminController@postEdit');

    	Route::get('delete', 'Admin\AdminController@getDelete');
    });

    Route::prefix('posts')->group(function () {
    	Route::get('/', 'Admin\PostController@getList');

    	Route::get('add', 'Admin\PostController@getAdd');
    	Route::post('add', 'Admin\PostController@postAdd');

    	Route::get('edit', 'Admin\PostController@getEdit');
    	Route::post('edit', 'Admin\PostController@postEdit');

    	Route::get('delete', 'Admin\PostController@getDelete');
    });

    Route::prefix('users')->group(function () {
    	Route::get('/', 'Admin\UserController@getList');

    	Route::get('add', 'Admin\UserController@getAdd');
    	Route::post('add', 'Admin\UserController@postAdd');

    	Route::get('edit', 'Admin\UserController@getEdit');
    	Route::post('edit', 'Admin\UserController@postEdit');

    	Route::get('delete', 'Admin\UserController@getDelete');
    });

    Route::prefix('categories')->group(function () {
    	Route::get('/', 'Admin\CategoryController@getList');

    	Route::get('add', 'Admin\CategoryController@getAdd');
    	Route::post('add', 'Admin\CategoryController@postAdd');

    	Route::get('edit', 'Admin\CategoryController@getEdit');
    	Route::post('edit', 'Admin\CategoryController@postEdit');

    	Route::get('delete', 'Admin\CategoryController@getDelete');
    });

    Route::prefix('tags')->group(function () {
    	Route::get('/', 'Admin\TagController@getList');

    	Route::get('add', 'Admin\TagController@getAdd');
    	Route::post('add', 'Admin\TagController@postAdd');

    	Route::get('edit', 'Admin\TagController@getEdit');
    	Route::post('edit', 'Admin\TagController@postEdit');

    	Route::get('delete', 'Admin\TagController@getDelete');
    });

    Route::prefix('comments')->group(function () {
    	Route::get('/', 'Admin\CommentController@getList');

    	Route::get('add', 'Admin\CommentController@getAdd');
    	Route::post('add', 'Admin\CommentController@postAdd');

    	Route::get('edit', 'Admin\CommentController@getEdit');
    	Route::post('edit', 'Admin\CommentController@postEdit');

    	Route::get('delete', 'Admin\CommentController@getDelete');
    });

    Route::prefix('menu')->group(function () {
    	Route::get('/', 'Admin\MenuController@getList');

    	Route::get('add', 'Admin\MenuController@getAdd');
    	Route::post('add', 'Admin\MenuController@postAdd');

    	Route::get('edit', 'Admin\MenuController@getEdit');
    	Route::post('edit', 'Admin\MenuController@postEdit');

    	Route::get('delete', 'Admin\MenuController@getDelete');
    });
});
