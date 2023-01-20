<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Titles
{
    /**
     * @Serializer\Type("array<MagDv\Logistics\Entities\Transportations\Title>")
     * @var null|\MagDv\Logistics\Entities\Transportations\Title[]
     */
    public ?array $items = null;
}
