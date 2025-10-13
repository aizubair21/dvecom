<?php

namespace App\Providers;

use App\Models\Carousel;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $carousel = Carousel::where('status', true)->with('slides')->get();
            $view->with('carousel', $carousel);
        });
    }
}
