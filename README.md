# Discord-Laravel

[![Latest Version](https://img.shields.io/github/release/mfgustav0/discord-laravel.svg?style=flat-square)](https://github.com/mfgustav0/discord-laravel/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/mfgustav0/discord-laravel.svg?style=flat-square)](https://packagist.org/packages/mfgustav0/discord-laravel)

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