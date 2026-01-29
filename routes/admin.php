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

        
    });
});
