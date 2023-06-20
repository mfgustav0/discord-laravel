<?php

namespace MfGustav0\DiscordLaravel\Services\Webhook;

use GuzzleHttp\Client;
use MfGustav0\DiscordLaravel\Services\Shared\BaseDiscordService;
use MfGustav0\DiscordLaravel\Services\Contracts\WebhooksContract;

class WebhookService extends BaseDiscordService implements WebhooksContract
{
    public function __construct(
        Client $client,
        private readonly string $id,
        private readonly string $token
    ) {
        parent::__construct($client);
    }

    public function createMessage(string $message): array
    {
        $response = $this->postMultipart("webhooks/{$this->id}/{$this->token}", [
            'name' => 'content',
            'contents' => $message
        ]);

        return [
            'success' => $response['code'] === 204,
            'response' => $response 
        ];
    }
}