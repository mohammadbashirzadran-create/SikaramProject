<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\UserController;
/*****************  Page Controller  *****************/
use App\Http\Controllers\PageController;

/*****************  User Controller  *****************/
use App\Http\Controllers\UserController;

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'index')->name('page.home');
    Route::get('/about', 'about')->name('page.about');
    Route::get('/contact', 'contact')->name('page.contact');
    Route::get('/services', 'services')->name('page.service');
    Route::get('/features', 'features')->name('page.feature');
    Route::get('/project', 'project')->name('page.project');
    Route::get('/team', 'team')->name('page.team');
    Route::get('/testimonial', 'testimonial')->name('page.testimonial');
    Route::get('/quote', 'quote')->name('page.quote');
    Route::get('/404', 'errorhandle')->name('page.404');
    Route::get('/login', 'login')->name('page.login');
    Route::post('/login', 'loginSubmit')->name('page.login.submit');
    Route::get('/account', 'account')->name('page.account');
    Route::get('/logout', 'logout')->name('page.logout');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard')->middleware('auth.check');
    Route::get('/users', 'user')->name('users');
    Route::get('/users/add_user', 'add_user')->name('add_user');
    Route::get('/admin/services', 'services')->name('services');
    Route::get('/admin/services/add_services', 'add_services')->name('add_services');
    Route::get('/products', 'products')->name('products');
    Route::get('/products/add_product', 'add_product')->name('add_product');
    Route::get('/projects', 'projects')->name('projects');
    Route::get('/projects/add_project', 'add_project')->name('add_project');
    Route::get('/admin/team', 'team')->name('team');
    Route::get('/admin/team/add_team', 'add_team')->name('add_team');
    Route::get('/testimonials', 'testimonials')->name('testimonials');
    Route::get('/testimonials/add_testimonials', 'add_testimonials')->name('add_testimonials');
    Route::get('/quotes', 'quotes')->name('quotes');
    Route::get('/quotes/add_quotes', 'add_quotes')->name('add_quotes');
    Route::get('/admin/contact', 'contact')->name('contacts');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/site_setting', 'site_setting')->name('site_setting');
    // Route::get('/category','category')->name('category');
    Route::post('/users/store', 'storeuser')->name('users.store');
    Route::get('/users/edit/{id}', 'user_edit')->name('users.edit');
    Route::put('/users/update/{id}', 'user_update')->name('users.update');
    Route::get('/users/toggle/{id}', 'toggle')->name('users.toggle');

    Route::get('/services/edit/{id}', 'service_edit')->name('edit_services');
    Route::get('/services/toggle/{id}', 'toggle_service')->name('toggle_service');
    Route::put('/services/update/{id}', 'user_service_update')->name('update_services');
    Route::post('/services/store', 'store_service')->name('services.store');
    Route::get('/category/toggle/{id}', 'toggle_category')->name('toggle_category');
    Route::post('/category/store', 'add_category')->name('category.store');
    Route::get('/category/edit/{id}', 'edit_category')->name('edit_category');
    Route::put('/category/update/{id}', 'update_category')->name('update_category');
    Route::get('/products/edit/{id}', 'product_edit')->name('edit_product');
    Route::get('/products/toggle/{id}', 'toggle_product')->name('toggle_product');
    Route::put('/products/update/{id}', 'update_product')->name('update_product');
    Route::post('/products/store', 'store_product')->name('products.store');
    //project routes
    Route::get('/projects', 'projects')->name('projects'); // list all projects
    Route::get('/projects/add_project', 'add_project')->name('add_project'); // show add form
    Route::post('/projects/store', 'store_project')->name('projects.store'); // save new project
    Route::get('/projects/edit/{id}', 'edit_project')->name('edit_project'); // show edit form
    Route::put('/projects/update/{id}', 'update_project')->name('update_project'); // update project
    Route::get('/projects/toggle/{id}', 'toggle_project')->name('toggle_project'); // optional enable/disable
    Route::delete('/projects/delete/{id}', 'delete_project')->name('delete_project'); // optional delete

    //end project routes

});

Route::get('/categories', [UserController::class, 'category'])->name('categories.index');




