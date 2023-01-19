<?php

declare(strict_types=1);

namespace MagDv\Logistics\Errors;

use JMS\Serializer\Annotation as Serializer;

class ErrorContext
{
    /**
     * @Serializer\Type("string")
     */
    public ?string $additionalProp1 = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $additionalProp2 = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $additionalProp3 = null;
}
