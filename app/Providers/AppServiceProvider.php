<?php

namespace App\Providers;

use App\Contracts\ParserContract;
use App\Models\News;
use App\Observers\NewsObserver;
use App\Services\ParserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ParserContract::class,
            ParserService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        News::observe(NewsObserver::class);
    }
}
