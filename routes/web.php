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


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','HomeController@index')->name('index');

Route::get('/{slug}-p{id}.html','HomeController@postDetail')->name('posts.index')->where(['id'=>'\d+', 'slug'=> '.*']);

Route::get('/{slug}-c{id}','HomeController@categoryDetail')->name('categories.index')->where(['id'=>'\d+', 'slug'=> '.*']);

Route::get('/tim-kiem','HomeController@searchPostsName')->name('search.index');

Route::get('/{slug}-t{id}','HomeController@tagWithPost')->name('tags.index')->where(['id'=>'\d+', 'slug'=> '.*']);

Route::resource('home', 'HomeController');



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

    	Route::get('edit/{id}', 'Admin\PostController@getEdit')->name('admin.posts.edit');
    	Route::post('edit/{id}', 'Admin\PostController@postEdit')->name('admin.posts.edit');

    	Route::get('delete/{id}', 'Admin\PostController@getDelete')->name('admin.posts.delete');
    });

    Route::prefix('users')->group(function () {
    	Route::get('/', 'Admin\UserController@getList')->name('admin.users');

    	Route::get('add', 'Admin\UserController@getAdd')->name('admin.users.add');
    	Route::post('add', 'Admin\UserController@postAdd')->name('admin.users.add');

    	Route::get('edit/{id}', 'Admin\UserController@getEdit')->name('admin.users.edit');
    	Route::post('edit/{id}', 'Admin\UserController@postEdit')->name('admin.users.edit');

    	Route::get('delete', 'Admin\UserController@getDelete')->name('admin.users.delete');
    });

    Route::prefix('categories')->group(function () {
    	Route::get('/', 'Admin\CategoryController@getList')->name('admin.category');

    	Route::get('add', 'Admin\CategoryController@getAdd')->name('admin.category.add');
    	Route::post('add', 'Admin\CategoryController@postAdd')->name('admin.category.add');

    	Route::get('edit/{id}', 'Admin\CategoryController@getEdit')->name('admin.category.edit');
    	Route::post('edit/{id}', 'Admin\CategoryController@postEdit')->name('admin.category.edit');

    	Route::get('delete', 'Admin\CategoryController@getDelete')->name('admin.category.delete');
    });

    Route::prefix('tags')->group(function () {
    	Route::get('/', 'Admin\TagController@getList')->name('admin.tags');

    	Route::get('add', 'Admin\TagController@getAdd')->name('admin.tags.add');
    	Route::post('add', 'Admin\TagController@postAdd')->name('admin.tags.add');

    	Route::get('edit/{id}', 'Admin\TagController@getEdit')->name('admin.tags.edit');
    	Route::post('edit/{id}', 'Admin\TagController@postEdit')->name('admin.tags.edit');

    	Route::get('delete', 'Admin\TagController@getDelete')->name('admin.tags.delete');
    });

    Route::prefix('comments')->group(function () {
    	Route::get('/', 'Admin\CommentController@getList');

    	Route::get('add', 'Admin\CommentController@getAdd');
    	Route::post('add', 'Admin\CommentController@postAdd');

    	Route::get('edit/{id}', 'Admin\CommentController@getEdit');
    	Route::post('edit/{id}', 'Admin\CommentController@postEdit');

    	Route::get('delete', 'Admin\CommentController@getDelete');
    });

    Route::prefix('menu')->group(function () {
    	Route::get('/', 'Admin\MenuController@getList');

    	Route::get('add', 'Admin\MenuController@getAdd');
    	Route::post('add', 'Admin\MenuController@postAdd');

    	Route::get('edit/{id}', 'Admin\MenuController@getEdit');
    	Route::post('edit/{id}', 'Admin\MenuController@postEdit');

    	Route::get('delete', 'Admin\MenuController@getDelete');
    });
});
