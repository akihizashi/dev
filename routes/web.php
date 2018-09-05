<?php

use App\Task;
use App\Work;
use App\User;
use App\Shop;
use App\Http\Middleware\CheckPermission;
//Backend routes
Route::get('/admin', 'AdminController@index')->middleware(CheckPermission::class);

Route::get('/admin/posts', 'PostsController@indexAdmin')->middleware(CheckPermission::class);

Route::get('/admin/posts/create', 'PostsController@createAdmin')->middleware(CheckPermission::class);

Route::post('/admin/posts', 'PostsController@store')->middleware(CheckPermission::class);

Route::delete('/admin/posts/{post}/delete', 'PostsController@delete')->middleware(CheckPermission::class);

Route::get('/admin/posts/{post}/edit', 'PostsController@edit')->middleware(CheckPermission::class);

Route::post('/admin/posts/{post}', 'PostsController@update')->middleware(CheckPermission::class);

Route::get('/admin/users', 'UsersController@indexAdmin')->middleware(CheckPermission::class);

Route::get('/admin/shops', 'ShopsController@indexAdmin');

Route::get('/admin/shops/search', 'ShopsController@search');

Route::get('/admin/shops/create', 'ShopsController@create');

Route::post('/admin/shops', 'ShopsController@store');

Route::delete('/admin/shops/{product}/delete', 'ShopsController@delete');

Route::get('/admin/shops/{product}/edit', 'ShopsController@edit');

Route::post('/admin/shops/{product}', 'ShopsController@update');

Route::get('/admin/transactions', 'TransactionsController@index');

Route::get('/admin/transactions/{transaction}', 'TransactionsController@show');

//Frontend routes
Route::get('/login', 'SessionController@create');

Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

Route::get('/tasks', 'TasksController@index');

Route::get('/tasks/create', 'TasksController@create');

Route::post('/tasks', 'TasksController@store');

Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/tasks/{task}/create', 'WorkController@show');

Route::post('/tasks/{task}/create', 'WorkController@store');

Route::delete('/tasks/{task}/delete', 'WorkController@delete');

Route::get('/search', 'SearchController@index');

Route::get('/posts', 'PostsController@index');

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/shops', 'ShopsController@index');

Route::get('/shops/{product}', 'ShopsController@show');

Route::get('/cart', 'CartController@index');

Route::post('/cart/add', 'CartController@add');

Route::post('/cart/remove', 'CartController@remove');

Route::post('/cart/update', 'CartController@update');

Route::post('/cart/clear', 'CartController@clear');

Route::get('/cart/confirm', 'CartController@confirm');

Route::post('/cart/pay', 'CartController@store');
