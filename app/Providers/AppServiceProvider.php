<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Designer;
use App\Models\User;
use App\Observer\PasswordObserver;
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
        User::observe(PasswordObserver::class);
        Admin::observe(PasswordObserver::class);
        Designer::observe(PasswordObserver::class);
    }
}
