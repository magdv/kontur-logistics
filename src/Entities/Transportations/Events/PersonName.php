<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class PersonName
{
    /** Фамилия. */
    #[Serializer\Type('string')]
    public ?string $lastName = null;

    /** Имя. */
    #[Serializer\Type('string')]
    public ?string $firstName = null;

    /** Отчество. */
    #[Serializer\Type('string')]
    public ?string $middleName = null;
}
