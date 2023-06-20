# Discord-Laravel

Discord-Laravel criado para testes nas Api's do Discord.

```php
$webhook = discord()->webhook(
    id: config('discord.webhook.id'),
    token: config('discord.webhook.token'),
);
$webhook->createMessage('message');
```

## Instalação Discord-Laravel

Recomendado instalação via [Composer](https://getcomposer.org/).

```bash
composer require mfgustav0/discord-laravel
```

# Configuração Lumen

Necessário registrar o Provider.

```php
$app->register(\MfGustav0\DiscordLaravel\Providers\DiscordServiceProvider::class);
```