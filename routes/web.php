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

Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

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

Route::middleware('role:admin')->get('user', function () {
    return view('menu_admin.user');
})->name('user');

//ROLE USER
Route::middleware('role:user')->get('cagar', 'App\Http\Controllers\CagarController@index')->name('cagar');
Route::middleware('role:user')->get('cagar/create', 'App\Http\Controllers\CagarController@create')->name('create_cagar');
Route::middleware('role:user')->post('cagar/store', 'App\Http\Controllers\CagarController@store')->name('store_cagar');
Route::middleware('role:user')->get('cagar/{id}', 'App\Http\Controllers\CagarController@show')->name('show_cagar');
Route::middleware('role:user')->post('cagar/update/{id}', 'App\Http\Controllers\CagarController@update')->name('update_cagar');
Route::middleware('role:user')->get('cagar/delete/{id}', 'App\Http\Controllers\CagarController@destroy')->name('delete_cagar');

////////////////////////////////////////////////////////

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('user_menu.dashboard');
// })->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');