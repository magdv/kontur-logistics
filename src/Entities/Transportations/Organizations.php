<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Organizations
{
    #[Serializer\Type('array<' . Organizations::class . '>')]
    public ?array $items = null;
}
