<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Titles
{
    #[Serializer\Type('array<' . Title::class . '>')]
    public ?array $items = null;
}
