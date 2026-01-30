<?php

use Illuminate\Support\Facades\Route;
use App\Mail\EmailVerificationRequest;
use GuzzleHttp\Psr7\Request;


Route::get('/refresh-csrf', function () {
    return response()->json(['token' => csrf_token()]);
})->name('refresh.csrf');


Route::prefix('admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::get('/', 'AuthController@index')->name('login');
    Route::post('login', 'AuthController@login')->name('adminlogin');
    Route::get('logout', 'AuthController@logout')->name('logoutAdmin');
    Route::post('/send-forgot-password-link', 'AuthController@sendForgotPasswordEmail')->name('send-forgot-password-link');
    Route::group([], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('/profile', 'DashboardController@profile')->name('profile');
        Route::post('/site-settings', 'DashboardController@siteSettingsUpdate')->name('site-settings.update');
        Route::post('/change-password', 'AuthController@changePassword')->name('password.update');
        Route::post('/profile/update', 'AuthController@update')->name('profile.update');
       
       Route::get('contact-management', 'UserController@contactManagement')->name('contact.management');

       // category routes
       Route::get('category-list', 'CategoryController@index')->name('category.list');
       Route::post('add-category', 'CategoryController@store')->name('addcategory');
       Route::post('update-category', 'CategoryController@update')->name('updatecategory');
       Route::post('delete-category', 'CategoryController@destroy')->name('deletecategory');
        
       // blog routes
       Route::get('blog-list', 'BlogController@index')->name('blogs.list');
       Route::get('add-blog', 'BlogController@create')->name('blogs.create');
       Route::post('add-blog', 'BlogController@store')->name('blogs.store');
       Route::get('edit-blog/{id}', 'BlogController@edit')->name('blogs.edit');
       Route::get('view-blog/{id}', 'BlogController@view')->name('blogs.view');
       Route::put('update-blog/{id}', 'BlogController@update')->name('blogs.update');
       Route::post('delete-blog', 'BlogController@destroy')->name('blogs.delete');
    });
});
