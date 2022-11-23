<?php

declare(strict_types=1);

namespace MagDv\Logistics\Errors;

class ErrorResponse
{
    /** @var int */
    public $statusCode;
    /** @var string */
    public $traceId;
    /** @var \MagDv\Logistics\Errors\Error */
    public $error;
}
