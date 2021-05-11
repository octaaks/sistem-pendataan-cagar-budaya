<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::post('proses_login', 'AuthController@proses_login')->name('proses_login');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('/', function () {
    return view('home');
});

//ROLE ADMIN
Route::middleware('role:admin')->get('history', function () {
    return view('menu_admin.history');
})->name('history');

Route::middleware('role:admin')->get('backup', function () {
    return view('menu_admin.backup');
})->name('backup');

Route::middleware('role:admin')->get('user', 'UserController@index')->name('user');

//ROLE USER
Route::middleware('role:user')->get('cagar', 'CagarController@index')->name('cagar');
Route::middleware('role:user')->get('cagar/create', 'CagarController@create')->name('create_cagar');
Route::middleware('role:user')->post('cagar/store', 'CagarController@store')->name('store_cagar');
Route::middleware('role:user')->get('cagar/{id}', 'CagarController@show')->name('show_cagar');
Route::middleware('role:user')->post('cagar/update/{id}', 'CagarController@update')->name('update_cagar');
Route::middleware('role:user')->get('cagar/delete/{id}', 'CagarController@destroy')->name('delete_cagar');

//ROLE ADMIN
Route::middleware('role:admin')->get('user', 'UserController@index')->name('user');
Route::middleware('role:admin')->get('user/create', 'UserController@create')->name('create_user');
Route::middleware('role:admin')->post('user/store', 'UserController@store')->name('store_user');
Route::middleware('role:admin')->get('user/{id}', 'UserController@show')->name('show_user');
Route::middleware('role:admin')->post('user/update/{id}', 'UserController@update')->name('update_user');
Route::middleware('role:admin')->get('user/delete/{id}', 'UserController@destroy')->name('delete_user');

////////////////////////////////////////////////////////

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('menu_user.dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');