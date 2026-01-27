<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'name' => 'frontend'], function () {
    Route::get('/', 'HomeControllers@index')->name('home');
    Route::get('/about', 'HomeControllers@about')->name('about');
    Route::get('/contact', 'HomeControllers@contact')->name('contact');
    Route::get('/solutions', 'HomeControllers@solutions')->name('solutions');
    Route::get('/case-studies', 'HomeControllers@caseStudies')->name('case-studies');
    Route::get('/insights', 'HomeControllers@insights')->name('insights');
    // Add more routes as needed for other pages
});
