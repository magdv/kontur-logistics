<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Drivers
{
    /**
     * @Serializer\Type("array<MagDv\Logistics\Entities\Transportations\Driver>")
     * @var null|\MagDv\Logistics\Entities\Transportations\Driver[]
     */
    public $previousDrivers;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Driver")
     * @var null|\MagDv\Logistics\Entities\Transportations\Driver
     */
    public $currentDriver;
}
