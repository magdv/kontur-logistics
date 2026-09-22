<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class PowerOfAttorneyIssuer
{
    /** Тип доверителя. */
    #[Serializer\Type('string')]
    public ?string $type = null;

    /** ИНН доверителя. */
    #[Serializer\Type('string')]
    public ?string $inn = null;

    /** КПП доверителя. */
    #[Serializer\Type('string')]
    public ?string $kpp = null;

    /** Наименование организации-доверителя. */
    #[Serializer\Type('string')]
    public ?string $organizationName = null;

    /** ФИО доверителя. */
    #[Serializer\Type(PersonName::class)]
    public ?PersonName $personName = null;
}
