<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', [App\Http\Controllers\frontend\IndexController::class, 'index']);

Auth::routes();



// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);
// //Language Translation

// Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');

Route::get('/admin_login', [App\Http\Controllers\admin\AuthController::class, 'admin_login']);
Route::post('/admin_store', [App\Http\Controllers\admin\AuthController::class, 'admin_store'])->name('admin_store');
Route::get('/admin_dashboard', [App\Http\Controllers\admin\AuthController::class, 'admin_dashboard'])->name('admin_dashboard');
