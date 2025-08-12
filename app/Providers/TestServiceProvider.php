<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\GreetingService;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    // provide class then bind
    {
        $this->app->bind('gretting', function (){
            return new GreetingService();
        });
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
