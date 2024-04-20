<?php

namespace MfGustav0\DiscordLaravel;

use GuzzleHttp\Client;
use MfGustav0\DiscordLaravel\Contracts\DiscordContract;
use MfGustav0\DiscordLaravel\Services\Webhook\WebhookService;
use MfGustav0\DiscordLaravel\Services\Contracts\WebhooksContract;

class Discord implements DiscordContract
{
    /**
     * Create instance Discord
     * 
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(
        protected readonly Client $client
    ) { }

    /**
     * Create instance webhook
     * 
     * @param string $id
     * @param string $token
     * @return \MfGustav0\DiscordLaravel\Services\Contracts\WebhooksContract
     */
    public function webhook(string $id, string $token): WebhooksContract
    {
        return new WebhookService($this->client, $id, $token);
    }
}