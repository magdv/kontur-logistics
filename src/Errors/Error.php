<?php

declare(strict_types=1);

namespace MagDv\Logistics\Errors;

use JMS\Serializer\Annotation as Serializer;

class Error
{
    /**
     * @Serializer\Type("string")
     * @var null|string
     */
    public $code;
    /**
     * @Serializer\Type("string")
     * @var null|string
     */
    public $message;
    /**
     * @Serializer\Type("string")
     * @var null|string
     */
    public $target;
    /**
     * @Serializer\Type("array<string>")
     * @var null|string[]
     */
    public $details;
    /**
     * @Serializer\Type("MagDv\Logistics\Errors\ErrorContext")
     * @var \MagDv\Logistics\Errors\ErrorContext|null
     */
    public $context;
    /**
     * @Serializer\Type("string")
     * @var null|string
     */
    public $innerError;
}
