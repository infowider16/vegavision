<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.php';
Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'name' => 'frontend'], function () {
    Route::get('/', 'HomeControllers@index')->name('home');
    Route::get('/about', 'HomeControllers@about')->name('about');

    // store contact us form data
    Route::get('/contact', 'HomeControllers@contact')->name('contact');
    Route::post('/contact/submit', 'HomeControllers@submitContactForm')->name('contact.submit');
    
    Route::get('/solutions', 'HomeControllers@solutions')->name('solutions');
    Route::get('/case-studies', 'HomeControllers@caseStudies')->name('case-studies');
    Route::get('/insights', 'HomeControllers@insights')->name('insights');
   
});
