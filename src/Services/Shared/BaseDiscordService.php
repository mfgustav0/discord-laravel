<?php

namespace MfGustav0\DiscordLaravel\Services\Shared;

use GuzzleHttp\Client;

abstract class BaseDiscordService
{
    /**
     * Last Request
     * 
     * @var mixed
     */
    protected mixed $last_request;

    /**
     * Response Body
     * 
     * @return string
     */
    protected string $response_body;
    
    /**
     * Create instance base service
     * 
     * @param \GuzzleHttp\Client $client
     * @param string readonly $id
     * @param string readonly $token
     */
    public function __construct(
        protected readonly Client $client
    ) { }

    /**
     * Make Multipart request
     * 
     * @param string $end_point
     * @param array $payload
     * @return array
     */
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