<?php

declare(strict_types=1);

namespace MagDv\Logistics\Logger;

use MagDv\Logistics\Entities\Http\HttpLogDto;
use MagDv\Logistics\Interfaces\HttpLoggerInterface;

/**
 * Simple logger that writes HTTP request/response details to STDOUT.
 */
class StdoutHttpLogger implements HttpLoggerInterface
{
    public function log(HttpLogDto $log): void
    {
        $message = sprintf(
            "[%s] %s %s => %d\nparams: %s\nresponse: %s\n",
            date('c'),
            $log->method,
            $log->url,
            $log->statusCode,
            $log->params ?? '',
            $log->response
        );

        fwrite(STDOUT, $message);
    }
}
