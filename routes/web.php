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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/top', [App\Http\Controllers\HomeController::class, 'index'])->name('top');
Route::get('/adminCreate', [App\Http\Controllers\HomeController::class, 'adminCreate'])->name('adminCreate');
Route::post('/adminStore', [App\Http\Controllers\HomeController::class, 'adminStore'])->name('adminStore');
Route::get('/showWod/{id}', [App\Http\Controllers\HomeController::class, 'showWod'])->name('showWod');
Route::post('/storeRecord/{id}', [App\Http\Controllers\HomeController::class, 'storeRecord'])->name('storeRecord');
Route::post('/storeWeight/{id}', [App\Http\Controllers\HomeController::class, 'storeWeight'])->name('storeWeight');
Route::get('/mypage/{id}', [App\Http\Controllers\HomeController::class, 'mypage'])->name('mypage');
Route::post('/delete/{id}/{weightId}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');


