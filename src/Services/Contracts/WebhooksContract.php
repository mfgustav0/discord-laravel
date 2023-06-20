<?php

namespace MfGustav0\DiscordLaravel\Services\Contracts;

interface WebhooksContract
{
    public function createMessage(string $message): array;
}