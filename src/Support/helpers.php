<?php

use MfGustav0\DiscordLaravel\Contracts\DiscordContract;

if (! function_exists('discord')) {
    function discord(): DiscordContract
    {
        return app()->make('discord');
    }
}
