<?php

namespace App\Providers;

use App\Observers\PlanObserver;
use App\Models\Plan;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Plan::observe(PlanObserver::class);
    }
}
