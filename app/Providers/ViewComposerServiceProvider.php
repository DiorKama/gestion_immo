<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\SettingService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $setting = resolve(SettingService::class)->getSetting();
            $view->with('_setting', $setting);
        });

        View::composer('*', function ($view) {
            $categories= resolve(CategoryService::class)->getHomeCategories();
            $view->with('_categories', $categories);
        });
    }
}