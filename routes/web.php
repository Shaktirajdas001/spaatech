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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'createPost'])->name('post');
Route::post('savepost', [App\Http\Controllers\HomeController::class, 'savePost'])->name('savepost');
Route::get('status/{type}/{id}', [App\Http\Controllers\HomeController::class, 'status']);


