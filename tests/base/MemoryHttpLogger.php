<?php

declare(strict_types=1);

namespace Test\base;

use MagDv\Logistics\Entities\Http\HttpLogDto;
use MagDv\Logistics\Interfaces\HttpLoggerInterface;

class MemoryHttpLogger implements HttpLoggerInterface
{
    /** @var list<HttpLogDto> */
    public array $logs = [];

    public function log(HttpLogDto $log): void
    {
        $this->logs[] = $log;
    }
}
