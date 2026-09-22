<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class PhysicalEntity
{
    /** ИНН физического лица. */
    #[Serializer\Type('string')]
    public ?string $inn = null;

    /** ФИО физического лица. */
    #[Serializer\Type(PersonName::class)]
    public ?PersonName $personName = null;
}
