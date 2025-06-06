<?php

namespace App\Providers;

use App\Data\Foo;
use App\Service\HelloService;
use App\Service\HelloServiceIndonesia;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FooServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });

        $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function provides(): array
    {
        return [
            HelloService::class,
            HelloServiceIndonesia::class,
            Foo::class,
        ];
    }
}
