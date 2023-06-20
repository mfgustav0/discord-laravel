<?php

namespace MfGustav0\DiscordLaravel\Tests;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use MfGustav0\DiscordLaravel\Discord;
use MfGustav0\DiscordLaravel\Contracts\DiscordContract;
use MfGustav0\DiscordLaravel\Services\Contracts\WebhooksContract;

class DiscordTest extends TestCase
{
    private Discord $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service = new Discord(new Client());
    }

    public function test_discord_contract(): void
    {
        $this->assertInstanceOf(DiscordContract::class, $this->service);
    }

    public function test_discord_webhooks_function(): void
    {
        $this->assertInstanceOf(DiscordContract::class, $this->service);
        $this->assertInstanceOf(WebhooksContract::class, $this->service->webhook(id: 'fake', token: 'stub'));
    }
}