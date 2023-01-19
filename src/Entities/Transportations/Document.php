<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Document
{
    /**
     * @Serializer\Type("string")
     * @var null|string $number
     */
    public $number;

    /**
     * @Serializer\Type("string")
     * @var null|string $date
     */
    public $date;
}
