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
    Route::get('/faqs', 'HomeControllers@faqs')->name('faqs');
    // Grouped case studies details
    Route::group(['prefix' => 'case-studies'], function () {
        Route::get('/municipal-it-service-desk-transformation-case-study', 'CaseStudiesController@municipal')->name('case-studies.municipal');
        Route::get('/usage-based-billing-modernisation-case-study', 'CaseStudiesController@usageBasedBilling')->name('case-studies.usage-based-billing');
        Route::get('/proactive-network-observability-case-study', 'CaseStudiesController@networkMonitoring')->name('case-studies.network-monitoring');
        Route::get('/unified-contact-centre-experience-case-study', 'CaseStudiesController@contactCentre')->name('case-studies.contactCentre');
    });

    // solution details
    Route::group(['prefix' => 'solutions'], function () {
        Route::get('/contact-centre-omnichannel', 'SolutionController@contactCentreOmnichannel')->name('solutions.contact-centre-omnichannel');
        Route::get('/it-service-management', 'SolutionController@itServiceManagement')->name('solutions.it-service-management');
        Route::get('/custom-software', 'SolutionController@customSoftware')->name('solutions.custom-software');
        Route::get('/billing-revenue-management', 'SolutionController@billingRevenueManagement')->name('solutions.billing-revenue-management');
        Route::get('/crm-platforms', 'SolutionController@crmPlatforms')->name('solutions.crm-platforms');
        Route::get('/isp-wifi-platforms', 'SolutionController@ispWifiPlatforms')->name('solutions.isp-wifi-platforms');
        Route::get('/network-monitoring', 'SolutionController@networkMonitoring')->name('solutions.network-monitoring');
        Route::get('/data-bi', 'SolutionController@dataBi')->name('solutions.data-bi');
        Route::get('/systems-integration-automation', 'SolutionController@systemsIntegrationAutomation')->name('solutions.systems-integration-automation');
        Route::get('/managed-saas', 'SolutionController@managedSaas')->name('solutions.managed-saas');
    });

    // insights details
    Route::group(['prefix' => 'insights'], function () {
        Route::get('/enterprise-it-service-management', 'InsightController@enterpriseItServiceManagement')->name('insights.enterprise-it-service-management');
        Route::get('/isp-billing-revenue-management', 'InsightController@ispBillingRevenueManagement')->name('insights.isp-billing-revenue-management');
        Route::get('/omnichannel-contact-centre', 'InsightController@omnichannelContactCentre')->name('insights.omnichannel-contact-centre');
        // Add more insight pages as needed
    });
});
