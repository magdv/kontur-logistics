<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Participants
{
    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Organizations")
     * @var \MagDv\Logistics\Entities\Transportations\Organizations $organizations
     */
    public $organizations;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Drivers")
     * @var \MagDv\Logistics\Entities\Transportations\Drivers $drivers
     */
    public $drivers;
}
