<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Http;

class HttpLogDto
{
    public function __construct(
        public string $url,
        public string $method,
        public string $response,
        public int $statusCode,
        public ?string $params = null,
    ) {
    }
}
