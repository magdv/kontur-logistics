<?php

declare(strict_types=1);

namespace MagDv\Logistics\Errors;

use JMS\Serializer\Annotation as Serializer;

class ErrorContext
{
    /**
     * @Serializer\Type("string")
     * @var null|string
     */
    public $additionalProp1;
    /**
     * @Serializer\Type("string")
     * @var null|string
     */
    public $additionalProp2;
    /**
     * @Serializer\Type("string")
     * @var null|string
     */
    public $additionalProp3;
}
