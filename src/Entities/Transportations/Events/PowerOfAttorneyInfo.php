<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class PowerOfAttorneyInfo
{
    /** Метаданные доверенности. */
    #[Serializer\Type(PowerOfAttorneyMetadata::class)]
    public ?PowerOfAttorneyMetadata $metadata = null;

    /** Результат проверки доверенности. */
    #[Serializer\Type(PowerOfAttorneyStatus::class)]
    public ?PowerOfAttorneyStatus $status = null;
}
