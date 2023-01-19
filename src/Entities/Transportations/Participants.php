<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Participants
{
    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Organizations")
     */
    public ?Organizations $organizations = null;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Drivers")
     */
    public ?Drivers $drivers = null;
}
