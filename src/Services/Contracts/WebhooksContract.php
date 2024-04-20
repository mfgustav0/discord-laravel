<?php

namespace MfGustav0\DiscordLaravel\Services\Contracts;

interface WebhooksContract
{
    /**
     * Create message to discord
     * 
     * @param string $message
     * @return array
     */
    public function createMessage(string $message): array;
}