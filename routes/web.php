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

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('/admin/users', 'UserController');
    //Route::resource('products', 'ProductController');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin/admin');
});
Route::get('/admin/dashboard', 'DashboardController@index');
Route::get('/admin/category/create', 'CategoryController@create')->name('categorycreate');
Route::post('/admin/category/store', 'CategoryController@store');
Route::get('/admin/category', 'CategoryController@index');
Route::get('/admin/category/show', 'CategoryController@show');
Route::get('/admin/category/{id}', 'CategoryController@show')->where('id', '[0-9]+');
Route::get('admin/category/{id}/edit', 'CategoryController@edit')->where('id', '[0-9]+');
Route::put('admin/category/{id}', 'CategoryController@update')->where('id', '[0-9]+');
Route::delete('admin/category/{id}', 'CategoryController@delete')->where('id', '[0-9]+');
//Biodata
Route::get('admin/biodata', 'BiodataController@index');
