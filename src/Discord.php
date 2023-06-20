<?php

namespace MfGustav0\DiscordLaravel;

use GuzzleHttp\Client;
use MfGustav0\DiscordLaravel\Contracts\DiscordContract;
use MfGustav0\DiscordLaravel\Services\Webhook\WebhookService;
use MfGustav0\DiscordLaravel\Services\Contracts\WebhooksContract;

class Discord implements DiscordContract
{
    public function __construct(
        protected readonly Client $client
    ) { }

    public function webhook(string $id, string $token): WebhooksContract
    {
        return new WebhookService($this->client, $id, $token);
    }
}