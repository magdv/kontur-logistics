<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Drivers
{
    #[Serializer\Type('array<' . Driver::class . '>')]
    public ?array $previousDrivers;
    #[Serializer\Type(Driver::class)]
    public ?Driver $currentDriver = null;
}
