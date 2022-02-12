<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\ProcessDataRepository;
use App\Repository\ProcessDataEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
               $this->app->bind(ProcessDataRepository::class ,ProcessDataEloquent::class);
    }
}
