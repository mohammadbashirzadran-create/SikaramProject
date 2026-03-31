<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\UserController;
/*****************  Page Controller  *****************/
use App\Http\Controllers\PageController;        

/*****************  User Controller  *****************/
use App\Http\Controllers\UserController;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/services', 'services')->name('services');
    Route::get('/features', 'features')->name('feature');
    Route::get('/project', 'project')->name('project');
    Route::get('/team', 'team')->name('team');
    Route::get('/testimonial', 'testimonial')->name('testimonial');
    Route::get('/quote', 'quote')->name('quote');
    Route::get('/404', 'errorhandle')->name('404');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginSubmit')->name('login.submit');
    Route::get('/account', 'account')->name('account');
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard')->middleware('auth.check');
    Route::get('/users', 'user')->name('users');
    Route::get('/users/add_user', 'add_user')->name('add_user');
    Route::get('/services', 'services')->name('user.services');
    Route::get('/services/add_services', 'add_services')->name('add_services');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/add_product', 'add_product')->name('add_product');
    Route::get('/projects', 'projects')->name('projects');
    Route::get('/projects/add_project', 'add_project')->name('add_project');
    Route::get('/team', 'team')->name('user.team');
    Route::get('/team/add_team', 'add_team')->name('add_team');
    Route::get('/testimonials', 'testimonials')->name('testimonials');
    Route::get('/testimonials/add_testimonials', 'add_testimonials')->name('add_testimonials');
    Route::get('/quotes', 'quotes')->name('user.quotes');
    Route::get('/quotes/add_quotes', 'add_quotes')->name('add_quotes');
    Route::get('/contact', 'contact')->name('user.contacts');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/site_setting', 'site_setting')->name('site_setting');
    Route::get('/category','category')->name('category');
    Route::post('/users/store', 'storeuser')->name('users.store');
    Route::get('/users/edit/{id}', 'user_edit')->name('users.edit');
    Route::put('/users/update/{id}', 'user_update')->name('users.update');
    Route::delete('/users/delete/{id}', 'delete_user')->name('users.delete');
    
});