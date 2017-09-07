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
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'honeycombs');

        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias("honey_auth", "RomanPavliukov\Honeycombs\Http\Middlewares\HoneycombsMiddleware");
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
