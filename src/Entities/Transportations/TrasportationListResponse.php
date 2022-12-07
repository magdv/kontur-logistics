<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class TrasportationListResponse
{
    /**
     * @var \MagDv\Logistics\Entities\Transportations\TrasportationResponse[]
     * @Serializer\Type("array<MagDv\Logistics\Entities\Transportations\TrasportationResponse>")
     */
    public $items;
}
