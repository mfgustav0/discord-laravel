<?php

namespace MfGustav0\DiscordLaravel\Contracts;

use MfGustav0\DiscordLaravel\Services\Contracts\WebhooksContract;

interface DiscordContract
{
    /**
     * Create instance webhook
     * 
     * @param string $id
     * @param string $token
     * @return \MfGustav0\DiscordLaravel\Services\Contracts\WebhooksContract
     */
    public function webhook(string $id, string $token): WebhooksContract;
}