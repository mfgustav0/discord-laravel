<?php

namespace MfGustav0\DiscordLaravel\Services\Shared;

use GuzzleHttp\Client;

abstract class BaseDiscordService
{
    protected mixed $last_request;

    protected mixed $response_body;
    
    public function __construct(
        protected readonly Client $client
    ) { }

    protected function postMultipart(string $end_point, array $payload=[]): array
    {
        $this->last_request = $payload;

        $response = $this->client->post($end_point, [
            'http_errors' => false,
            'multipart' => [
                $payload
            ]
        ]);

        $this->response_body = $response->getBody()->getContents();

        return [
            'data' => json_decode($this->response_body, true) ?? [],
            'code' => $response->getStatusCode(),
        ];
    }
}