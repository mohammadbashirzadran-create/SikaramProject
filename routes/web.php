<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Controller;
/*****************  Page Controller  *****************/
use App\Http\Controllers\pageController;

/*****************  User Controller  *****************/
use App\Http\Controllers\UserController;

Route::controller(pageController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/services', 'services')->name('service');
    Route::get('/features', 'features')->name('feature');
    Route::get('/project', 'project')->name('project');
    Route::get('/team', 'team')->name('team');
    Route::get('/testimonial', 'testimonial')->name('testimonial');
    Route::get('/quote', 'quote')->name('quote');
    Route::get('/404', 'errorhandle')->name('404');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');

    
});