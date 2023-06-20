<?php

namespace MfGustav0\DiscordLaravel\Facade;

use Illuminate\Support\Facades\Facade;

class DiscordFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * Don't use this. Just... don't.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'discord';
    }
}