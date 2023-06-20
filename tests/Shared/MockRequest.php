<?php

namespace MfGustav0\DiscordLaravel\Tests\Shared;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Handler\MockHandler;

trait MockRequest
{
    protected function mockedRequest(array $json, int $code, array $headers=[]): HandlerStack
    {
        $mock = new MockHandler([
            new Response($code, $headers, json_encode($json))
        ]);

        return HandlerStack::create($mock);
    }
}