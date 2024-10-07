<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Designer;
use App\Models\User;
use App\Observers\ModelActivityObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        User::observe(ModelActivityObserver::class);
        Brand::observe(ModelActivityObserver::class);
        Category::observe(ModelActivityObserver::class);
    }
}
