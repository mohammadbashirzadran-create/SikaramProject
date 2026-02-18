<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::get('/service', function () {
    return view('service');
})->name('service');


Route::get('/project', function () {
    return view('project');
})->name('project');

Route::get('/feature', function () {
    return view('feature');
})->name('feature');


Route::get('/quote', function () {
    return view('quote');
})->name('quote');

Route::get('/team', function () {
    return view('team');
})->name('team');


Route::get('/testimonial', function () {
    return view('testimonial');
})->name('testimonial');


Route::get('/404', function () {
    return view('404');
})->name('404');
