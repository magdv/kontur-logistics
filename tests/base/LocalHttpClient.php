<?php

declare(strict_types=1);

namespace Test\base;

use GuzzleHttp\Client;
use MagDv\Logistics\Interfaces\HttpClientInterface;
use Psr\Http\Client\ClientInterface;

class LocalHttpClient implements HttpClientInterface
{
    public function getClient(): ClientInterface
    {
        return new Client(
            [
                'debug' => true,
            ]
        );
    }
}
