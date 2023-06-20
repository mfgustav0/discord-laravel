<?php

return [

    'url' => 'https://discord.com/api/',

    'webhook' => [
        'id' => env('DISCORD_WEBHOOK_ID', ''),

        'token' => env('DISCORD_WEBHOOK_TOKEN', '')
    ]

];