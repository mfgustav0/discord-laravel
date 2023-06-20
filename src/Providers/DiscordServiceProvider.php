<?php

namespace MfGustav0\DiscordLaravel\Providers;

use GuzzleHttp\Client;
use MfGustav0\DiscordLaravel\Discord;
use Illuminate\Support\ServiceProvider;

class DiscordServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        if ($this->isLumen()) {
            return;
        }

        $this->publishes([
            __DIR__.'/../../config/discord.php' => \config_path('discord.php'),
        ], 'config');
    }

    /**
     * Register the service providers.
     *
     * @return void
     */
    public function register(): void
    {
        if ($this->isLumen()) {
            $this->app->configure('discord');
        }
        $this->mergeConfigFrom(__DIR__.'/../config/discord.php', 'discord');

        // Main Service        
        $this->app->bind('discord', function() {
            $client = new Client([
                'base_uri' => $this->app['config']->get('discord.url'),
                'timeout'  => 2.0,
            ]);

            return new Discord($client);
        });
    }

    private function isLumen()
    {
        return is_a(\app(), 'Laravel\Lumen\Application');
    }
}