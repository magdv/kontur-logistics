<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Organizations;

use JMS\Serializer\Annotation as Serializer;

class TransportationsSettings
{
    /** Режимы работы транспортной накладной */
    #[Serializer\Type('string')]
    public ?string $workMode = null;
}
