<?php

declare(strict_types=1);

namespace Test\base;

use GuzzleHttp\Client;
use MagDv\Logistics\ClientConfig;
use Psr\Http\Client\ClientInterface;
use Test\enums\ConfigNames;

class LocalConfig extends ClientConfig
{
    private ?string $apiKey;

    public function __construct(?string $apiKey = null)
    {
        $this->apiKey = $apiKey;
    }

    public function getCachePath(): ?string
    {
        return null;
    }

    public function getIsDebug(): bool
    {
        return true;
    }

    public function getUrl(): string
    {
        return getenv(ConfigNames::URL);
    }

    public function getApiKey(): string
    {
        return $this->apiKey ?: getenv(ConfigNames::APIKEY);
    }

    public function getClient(): ClientInterface
    {
        return new Client(
            [
                'debug' => true,
            ]
        );
    }
}
