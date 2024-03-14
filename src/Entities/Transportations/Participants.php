<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Participants
{
    #[Serializer\Type(Organizations::class)]
    public ?Organizations $organizations = null;
    #[Serializer\Type(Drivers::class)]
    public ?Drivers $drivers = null;
}
