<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Organizations
{
    /**
     * @Serializer\Type("array<MagDv\Logistics\Entities\Transportations\Organization>")
     * @var null|\MagDv\Logistics\Entities\Transportations\Organization[] $items
     */
    public $items;
}
