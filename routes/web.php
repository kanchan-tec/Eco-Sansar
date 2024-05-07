<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ResourceController;
use App\Http\Controllers\admin\WeightController;
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

Route::controller(IndexController::class)->group(function(){
    Route::get('/','index');
    Route::get('listings','listings')->name('listings');
    Route::get('con_listing_details/{id}','con_listing_details')->name('con_listing_details');
    Route::get('sabs_listing_details/{id}','sabs_listing_details')->name('sabs_listing_details');
    Route::get('bus_listing_details/{id}','bus_listing_details')->name('bus_listing_details');
    Route::get('business_login', 'business_login')->name('business_login');
    Route::post('business_store','business_store')->name('business.store');
    Route::get('business_details','business_details')->name('business_details');
    Route::post('business_post_save','business_post_save')->name('business_post_save');
    Route::get('business_listing_details/{id}','business_listing_details')->name('business_listing_details');
    Route::get('business_posts','business_posts')->name('business_posts');
    Route::get('sab_login', 'sab_login')->name('sab_login');
    Route::post('sab_store','sab_store')->name('sab.store');
    Route::get('sab_posts','sab_posts')->name('sab_posts');
    Route::get('sab_details','sab_details')->name('sab_details');
    Route::post('sab_post_save','sab_post_save')->name('sab_post_save');
    Route::get('sab_listing_details/{id}','sab_listing_details')->name('sab_listing_details');
    Route::get('consumer_login', 'consumer_login')->name('consumer_login');
    //Route::post('send_otp','sendOtp')->name('send_otp');
    Route::post('consumer_store','consumer_store')->name('consumer.store');
    Route::get('consumer_posts','consumer_posts')->name('consumer_posts');
    Route::get('consumer_details','consumer_details')->name('consumer_details');
    Route::post('consumer_post_save','consumer_post_save')->name('consumer_post_save');
    Route::get('consumer_listing_details/{id}','consumer_listing_details')->name('consumer_listing_details');

    Route::get('user_register', 'user_register')->name('user_register');
    Route::get('user_type', 'user_type')->name('user_type');
    Route::get('business_add', 'business_add')->name('business_add');
    Route::get('sab_add', 'sab_add')->name('sab_add');
    Route::get('consumer_add', 'consumer_add')->name('consumer_add');
    Route::post('business_save','business_save')->name('business.save');
    Route::post('sab_save','sab_save')->name('sab.save');
    Route::post('consumer_save','consumer_save')->name('consumer.save');
    Route::get('/user_logout', 'signOut')->name('user_logout');
});

Auth::routes();



// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index']);
// //Language Translation

// Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Route::post('/formsubmit', [App\Http\Controllers\HomeController::class, 'FormSubmit'])->name('FormSubmit');

Route::get('/admin_login', [App\Http\Controllers\admin\AuthController::class, 'admin_login'])->name('admin_login');
Route::post('/admin_store', [App\Http\Controllers\admin\AuthController::class, 'admin_store'])->name('admin_store');
Route::get('/admin_dashboard', [App\Http\Controllers\admin\AuthController::class, 'admin_dashboard'])->name('admin_dashboard');
Route::get('/admin_logout', [App\Http\Controllers\admin\AuthController::class, 'signOut'])->name('admin.admin_logout');
Route::get('/admin_profile/{id}', [App\Http\Controllers\admin\AuthController::class, 'admin_profile'])->name('admin.admin_profile');
Route::post('/admin_profile_update/{id}', [App\Http\Controllers\admin\AuthController::class, 'admin_profile_update'])->name('admin_profile_update');
Route::get('/changepassword/{id}', [App\Http\Controllers\admin\AuthController::class, 'changepassword'])->name('changepassword');
Route::post('/changepassword_store', [App\Http\Controllers\admin\AuthController::class, 'changepassword_store'])->name('changepassword_store');

Route::controller(AdminController::class)->group(function(){
    Route::get('user/businesslist','businesslist')->name('user.businesslist');
    Route::get('user/sablist','sablist')->name('user.sablist');
    Route::get('user/sabposts','sabposts')->name('user.sabposts');
    Route::get('user/sabpostsview/{id}','sabpostsview')->name('user.sabpostsview');
    Route::get('user/consumerlist','consumerlist')->name('user.consumerlist');
    Route::get('user/consumerposts','consumerposts')->name('user.consumerposts');
    Route::get('user/consumerpostsview/{id}','consumerpostsview')->name('user.consumerpostsview');
    Route::get('user/businessview/{id}','businessview')->name('user.businessview');
    Route::get('user/sabview/{id}','sabview')->name('user.sabview');
    Route::get('user/consumerview/{id}','consumerview')->name('user.consumerview');
    Route::get('user/businessposts','businessposts')->name('user.businessposts');
    Route::get('user/businesspostsview/{id}','businesspostsview')->name('user.businesspostsview');
});

Route::controller(ContactController::class)->group(function(){
    Route::get('contact/list','list')->name('contact.list');
    Route::get('contact/add', 'add')->name('contact.add');
    Route::post('contact/save','save')->name('contact.save');
    Route::get('contact/edit/{id}', 'edit')->name('contact.edit');
    Route::post('contact/update/{id}','update')->name('contact.update');
    Route::get('contact/delete/{id}','delete')->name('contact.delete');
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

Route::controller(CategoryController::class)->group(function(){
    Route::get('category/list','list')->name('category.list');
    Route::get('category/add', 'add')->name('category.add');
    Route::post('category/save','save')->name('category.save');
    Route::get('category/edit/{id}','edit')->name('category.edit');
    Route::post('category/update/{id}','update')->name('category.update');
    Route::get('category/delete/{id}','delete')->name('category.delete');
});
Route::controller(ResourceController::class)->group(function(){
    Route::get('resource/list','list')->name('resource.list');
    Route::get('resource/add', 'add')->name('resource.add');
    Route::post('resource/save','save')->name('resource.save');
    Route::get('resource/edit/{id}','edit')->name('resource.edit');
    Route::post('resource/update/{id}','update')->name('resource.update');
    Route::get('resource/delete/{id}','delete')->name('resource.delete');
});
Route::controller(WeightController::class)->group(function(){
    Route::get('weight/list','list')->name('weight.list');
    Route::get('weight/add', 'add')->name('weight.add');
    Route::post('weight/save','save')->name('weight.save');
    Route::get('weight/edit/{id}','edit')->name('weight.edit');
    Route::post('weight/update/{id}','update')->name('weight.update');
    Route::get('weight/delete/{id}','delete')->name('weight.delete');
});
