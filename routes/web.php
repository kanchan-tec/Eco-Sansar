<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\AboutController;

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


Route::controller(ContactController::class)->group(function(){
    Route::get('contact/list','list')->name('contact.list');
    Route::get('contact/add', 'add')->name('contact.add');
    Route::post('contact/save','save')->name('contact.save');
});

Route::controller(FaqController::class)->group(function(){
    Route::get('faq/list','list')->name('faq.list');
    Route::get('faq/add', 'add')->name('faq.add');
    Route::post('faq/save','save')->name('faq.save');
    Route::get('faq/edit/{id}','edit')->name('faq.edit');
    Route::post('faq/update/{id}','update')->name('faq.update');
    Route::get('faq/delete/{id}','delete')->name('faq.delete');
});

Route::controller(AboutController::class)->group(function(){
    Route::get('about/list','list')->name('about.list');
    Route::get('about/add', 'add')->name('about.add');
    Route::post('about/save','save')->name('about.save');
    Route::get('about/edit/{id}','edit')->name('about.edit');
    Route::post('about/update/{id}','update')->name('about.update');
    Route::get('about/delete/{id}','delete')->name('about.delete');
});
