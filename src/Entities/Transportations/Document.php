<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Document
{
    /**
     * @Serializer\Type("string")
     */
    public ?string $number = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $date = null;
}
