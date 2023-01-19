<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Circulations
{
    /**
     * @Serializer\Type("array<MagDv\Logistics\Entities\Transportations\Circulation>")
     * @var null|\MagDv\Logistics\Entities\Transportations\Circulation[]
     */
    public $items;
}
