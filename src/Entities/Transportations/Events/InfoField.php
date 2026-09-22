<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class InfoField
{
    /** Ключ информационного поля. */
    #[Serializer\Type('string')]
    public ?string $key = null;

    /** Значение информационного поля. */
    #[Serializer\Type('string')]
    public ?string $infoValue = null;
}
