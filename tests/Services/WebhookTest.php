<?php

namespace MfGustav0\DiscordLaravel\Tests\Services;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase;
use MfGustav0\DiscordLaravel\Tests\Shared\MockRequest;
use MfGustav0\DiscordLaravel\Services\Webhook\WebhookService;

class WebhookTest extends TestCase
{
    use MockRequest;

    public function test_cant_create_message_if_invalid_id(): void
    {
        //Prepare
        $client = new Client([
            'handler' => $this->fakeInvalidId()
        ]);

        $service = new WebhookService(
            client: $client,
            id: 'id',
            token: 'token'
        );

        //Act
        $result = $service->createMessage('teste');

        //Assert
        $this->assertEquals($result, [ 
            'success' => false,
            'response' => [
                'data' => [
                    'webhook_id' => [
                        'Value "id" is not snowflake.'
                    ]
                ],
                'code' => 400
            ] 
        ]);
    }
    
    public function test_cant_create_message_if_invalid_token(): void
    {
        //Prepare
        $client = new Client([
            'handler' => $this->fakeInvalidToken()
        ]);

        $service = new WebhookService(
            client: $client,
            id: 'id',
            token: 'token'
        );

        //Act
        $result = $service->createMessage('teste');

        //Assert
        $this->assertEquals($result, [ 
            'success' => false,
            'response' => [
                'data' => [
                    'message' => 'Invalid Webhook Token',
                    'code' => 50027
                ],
                'code' => 401
            ] 
        ]);
    }
    
    public function test_cant_create_message_if_not_send_data(): void
    {
        //Prepare
        $client = new Client([
            'handler' => $this->fakeInvalidMessage()
        ]);

        $service = new WebhookService(
            client: $client,
            id: 'id',
            token: 'token'
        );

        //Act
        $result = $service->createMessage('');

        //Assert
        $this->assertEquals($result, [ 
            'success' => false,
            'response' => [
                'data' => [
                    'message' => 'Cannot send an empty message',
                    'code' => 50006
                ],
                'code' => 400
            ] 
        ]);
    }

    public function test_should_create_message_send_data(): void
    {
        //Prepare
        $client = new Client([
            'handler' => $this->fakeSuccessRequest()
        ]);

        $service = new WebhookService(
            client: $client,
            id: 'id',
            token: 'token'
        );

        //Act
        $result = $service->createMessage('teste');

        //Assert
        $this->assertEquals($result, [ 
            'success' => true,
            'response' => [
                'data' => [],
                'code' => 204
            ] 
        ]);
    }

    private function fakeInvalidId(): HandlerStack
    {
        return $this->mockedRequest([
            'webhook_id' => [
                'Value "id" is not snowflake.'
            ]
        ], 400);
    }
    
    private function fakeInvalidToken(): HandlerStack
    {
        return $this->mockedRequest([
            'message' => 'Invalid Webhook Token',
            'code' => 50027
        ], 401);
    }

    private function fakeInvalidMessage(): HandlerStack
    {
        return $this->mockedRequest([
            'message' => 'Cannot send an empty message',
            'code' => 50006
        ], 400);
    }

    private function fakeSuccessRequest(): HandlerStack
    {
        return $this->mockedRequest([], 204);
    }
}