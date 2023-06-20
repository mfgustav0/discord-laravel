<?php

namespace MfGustav0\DiscordLaravel\Contracts;

use MfGustav0\DiscordLaravel\Services\Contracts\WebhooksContract;

interface DiscordContract
{
    public function webhook(string $id, string $token): WebhooksContract;
}