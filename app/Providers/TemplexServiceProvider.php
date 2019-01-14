<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use \Ffcms\Templex\Engine;

/**
 * Class TemplexServiceProvider. Provide templex features for laravel lumen as service
 * @package App\Providers
 */
class TemplexServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $app = $this->app;
        // initialize templex engine
        $app->singleton('Ffcms\Templex\Engine', function() use ($app) {
            $path = base_path() . DIRECTORY_SEPARATOR .  'resources' . DIRECTORY_SEPARATOR . 'views';

            $templex = new Engine($path);
            $templex->loadDefaultExtensions();

            return $templex;
        });
    }
}