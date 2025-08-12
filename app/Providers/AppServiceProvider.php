<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;

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
        
    }
    // public function boot(): void
    // {

    //     Route::middleware('auth')->group(function () {
    //         Route::get('/redirect', function () {
    //             if (auth()->user()->role === 'admin') {
    //                 return redirect()->route('dashboard.admin');
    //             }
    //             return redirect()->route('dashboard.user');
    //         });
    //     });
    // }

}
