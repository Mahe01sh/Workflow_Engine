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

// user protected routes
Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
    Route::resource('customers', CustomerController::class);
    Route::get('/customers', 'CustomerController@index')->name('user_dashboard');
});

// admin protected routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    
    Route::get('/', 'HomeController@adminindex')->name('admin_dashboard');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/approve/{id}', 'HomeController@approve')->name('admin.approve');
Route::post('/approve/{id}', 'HomeController@approve')->name('admin.approve');

Route::get('/deny/{id}', 'HomeController@decline')->name('admin.deny');
Route::post('/deny/{id}', 'HomeController@decline')->name('admin.deny');


