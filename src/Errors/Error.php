<?php

declare(strict_types=1);

namespace MagDv\Logistics\Errors;

class Error
{
    /** @var null|string */
    public $code;
    /** @var null|string */
    public $message;
    /** @var null|string */
    public $target;
    /** @var null|string[] */
    public $details;
    /** @var \MagDv\Logistics\Errors\ErrorContext|null */
    public $context;
    /** @var null|string */
    public $innerError;
}
