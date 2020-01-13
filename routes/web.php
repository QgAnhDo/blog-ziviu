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

Route::get('dangnhap', function () {
    return view('login');
});
Route::post('dangnhap', 'LoginController@login');

Route::get('dangky', function () {
    return view('register');
});
Route::post('dangnhap', 'LoginController@getLogin');

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');

    Route::prefix('acc-admin')->group(function () {
    	Route::get('/', 'Admin\AdminController@getList')->name('admin.acc-admin');

    	Route::get('add', 'Admin\AdminController@getAdd')->name('admin.acc-admin.add');
    	Route::post('add', 'Admin\AdminController@postAdd')->name('admin.acc-admin.add');

    	Route::get('edit', 'Admin\AdminController@getEdit')->name('admin.acc-admin.edit');
    	Route::post('edit', 'Admin\AdminController@postEdit')->name('admin.acc-admin.edit');

    	Route::get('delete', 'Admin\AdminController@getDelete')->name('admin.acc-admin.delete');
    });

    Route::prefix('posts')->group(function () {
    	Route::get('/', 'Admin\PostController@getList')->name('admin.posts');

    	Route::get('add', 'Admin\PostController@getAdd')->name('admin.posts.add');
    	Route::post('add', 'Admin\PostController@postAdd')->name('admin.posts.add');

    	Route::get('edit', 'Admin\PostController@getEdit')->name('admin.posts.edit');
    	Route::post('edit', 'Admin\PostController@postEdit')->name('admin.posts.edit');

    	Route::get('delete', 'Admin\PostController@getDelete')->name('admin.posts.delete');
    });

    Route::prefix('users')->group(function () {
    	Route::get('/', 'Admin\UserController@getList')->name('admin.users');

    	Route::get('add', 'Admin\UserController@getAdd')->name('admin.users.add');
    	Route::post('add', 'Admin\UserController@postAdd')->name('admin.users.add');

    	Route::get('edit', 'Admin\UserController@getEdit')->name('admin.users.edit');
    	Route::post('edit', 'Admin\UserController@postEdit')->name('admin.users.edit');

    	Route::get('delete', 'Admin\UserController@getDelete')->name('admin.users.delete');
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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/homepage','HomepageController@index')->name('layouts/master');