<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View composer to be used by sidebar view
        // https://laracasts.com/series/laravel-from-scratch-2017/episodes/21?autoplay=true
        
        view()->composer('layouts.blog.sidebar', function ($view) {
            $view->with('archives', \App\Post::archives());
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // Below eximplifies use of service providers. See also .env file (strip keys) and 
        // app\billing\stripe.php files
        \App::singleton('App\Billing\Stripe', function () {

            return new \App\Billing\Stripe(config('services.stripe.secret'));

        });
    }
}
