<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Crud_users\Application\Contracts\Container;
use Crud_users\Domain\UserRepository;
use Crud_users\Infraestructure\Bus\Contracts\CommandBus;
use Crud_users\Infraestructure\Bus\LaravelContainer;
use Crud_users\Infraestructure\Bus\SimpleCommandBus;
use Crud_users\Infraestructure\Eloquent\UserElocuentRepository;

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
            CommandBus::class,
            SimpleCommandBus::class
        );

        $this->app->bind(
            Container::class,
            LaravelContainer::class
        );


        $this->app->bind(
            UserRepository::class,
            UserElocuentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
