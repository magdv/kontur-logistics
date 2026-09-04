<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Http\HttpLogDto;

interface HttpLoggerInterface
{
    public function log(HttpLogDto $log): void;
}
