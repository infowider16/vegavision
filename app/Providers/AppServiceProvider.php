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
        // Site settings ko globally share karne ke liye repository aur logging ke sath
        try {
            if (\Schema::hasTable('site_settings')) {
                $repo = app(SiteSettingRepository::class);
                $settings = $repo->getAllSettings();
                view()->share('site_settings', $settings);
             
            }
        } catch (\Exception $e) {
            Log::error('Error in AppServiceProvider@boot: ' . $e->getMessage());
        }
    }
}
