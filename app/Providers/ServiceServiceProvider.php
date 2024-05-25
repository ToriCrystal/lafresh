<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    protected $services = [
        'App\Services\Auth\AuthServiceInterface' => 'App\Services\Auth\AuthService',
        'App\Services\ManagerEmployee\ManagerEmployeeServiceInterface' => 'App\Services\ManagerEmployee\ManagerEmployeeService',
        'App\Services\Order\OrderServiceInterface' => 'App\Services\Order\OrderService'
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        foreach ($this->services as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
