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
        Route::get('/user', 'UserController@index')->name('incoming.user');
        Route::get('/user-list', 'UserController@userList')->name('user-list');
        Route::get('/approved-user-list', 'UserController@approvedUserList')->name('approved.user');
        Route::get('/approved-user-list-ajax', 'UserController@approvedUserList')->name('approved-user-list');
        Route::get('manage-comments/{id}', 'UserController@manageComments')->name('manage.comments');
        Route::get('/comments/data', 'UserController@getCommentsData')->name('comments.data');
        Route::post('/comments', 'UserController@storeComment')->name('comments.store');
        Route::post('/comments/update', 'UserController@updateComment')->name('comments.update');
        Route::post('/comments/delete', 'UserController@deleteComment')->name('comments.delete');
        Route::post('/user-toggle-status', 'UserController@toggleStatus')->name('user.toggleStatus');
        Route::get('/users/{id}', 'UserController@show')->name('user.Detail');
        Route::post('/users/make-paid', 'UserController@makePaid')->name('user.makePaid');

        Route::get('/category-list', 'DashboardController@categoryList')->name('category.management');
        Route::post('/create-category', 'DashboardController@createCategory')->name('addcategory');
        Route::post('/update-category', 'DashboardController@updateCategory')->name('updatecategory');
        Route::post('/delete-category', 'DashboardController@deleteCategory')->name('deletecategory');

        Route::post('/get-provinces', 'DashboardController@getProvinces')->name('get.provinces');
        Route::post('/get-municipalities', 'DashboardController@getMunicipalities')->name('get.municipalities');

        Route::get('/sub-category-list', 'DashboardController@subCategoryList')->name('subcategory.management');
        Route::post('/create-sub-category', 'DashboardController@createSubCategory')->name('subaddcategory');
        Route::post('/update-subcategory', 'DashboardController@updateSubCategory')->name('updatesubcategory');
        Route::post('/delete-subcategory', 'DashboardController@deleteSubCategory')->name('deletesubcategory');
        Route::put('/update-user-status/{id}', 'UserController@updateUserStatus')->name('update-user-status');
        Route::put('/block-user/{id}', 'UserController@blockUserStatus')->name('block-user');
        Route::get('contact-management', 'UserController@contactManagement')->name('contact.management');

        Route::get('plan-management', 'PlanController@index')->name('plan.management');
        Route::post('/plans/store', 'PlanController@store')->name('plans.store');
        Route::post('/plans/update', 'PlanController@update')->name('plans.update');
        Route::delete('/plans/{id}', 'PlanController@destroy')->name('plans.destroy');
        Route::get('plan-purchase-history', 'PlanController@planPurchaseHistory')->name('plan.history');
    });
});
