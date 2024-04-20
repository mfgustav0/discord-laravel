<?php

use MfGustav0\DiscordLaravel\Contracts\DiscordContract;

if (! function_exists('discord')) {
    
    /**
     * Create instance Discord
     * 
     * @return \MfGustav0\DiscordLaravel\Contracts\DiscordContract
     */
    function discord(): DiscordContract
    {
        return app()->make('discord');
    }
}
