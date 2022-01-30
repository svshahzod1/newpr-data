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

Auth::routes();

/**
 * Admistrator va director boshqara oladigan routlar
 */
Route::middleware('user-role')->prefix('admin')->name('admin.')->group(function (){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

/**
 * Director adminkasi routlari
 */
Route::middleware('user-role:director')->prefix('director')->name('director.')->group(function (){

Route::get('/',function (){echo auth()->user()->name;})->name('home');
Route::get('/',function (){echo auth()->user()->name;})->name('users');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('user-role','auth')
    ->name('home');

