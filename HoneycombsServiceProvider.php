<?php

namespace RomanPavliukov\Honeycombs;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class HoneycombsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'honeycombs');

        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias("honey_auth", "RomanPavliukov\Honeycombs\Middlewares\HoneycombsMiddleware");
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
