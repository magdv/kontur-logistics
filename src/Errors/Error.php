<?php

declare(strict_types=1);

namespace MagDv\Logistics\Errors;

use JMS\Serializer\Annotation as Serializer;

class Error
{
    /**
     * @Serializer\Type("string")
     */
    public ?string $code = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $message = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $target = null;

    /**
     * @Serializer\Type("array<string>")
     * @var null|string[]
     */
    public ?array $details;

    /**
     * @Serializer\Type("MagDv\Logistics\Errors\ErrorContext")
     */
    public ?ErrorContext $context = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $innerError = null;
}
