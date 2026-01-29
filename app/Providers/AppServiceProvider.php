<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\SiteSettingRepository;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share site settings globally
        try {
            if (\Schema::hasTable('site_settings')) {
                $repo = app(SiteSettingRepository::class);
                $settings = $repo->getAllSettings();
                view()->share('site_settings', $settings);
            }

            
        // Share country codes globally
        $countryCodes = app('App\Repositories\Eloquent\CountryRepository')->getAll();
        view()->share('countryCodes', $countryCodes);
        } catch (\Exception $e) {
            Log::error('Error in AppServiceProvider@boot: ' . $e->getMessage());
        }

    }
}
