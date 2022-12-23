<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use Psr\Http\Client\ClientInterface;

interface HttpClientInterface
{
    public function getClient(): ClientInterface;
}
