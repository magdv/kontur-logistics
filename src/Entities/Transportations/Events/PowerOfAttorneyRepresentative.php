<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class PowerOfAttorneyRepresentative
{
    /** Тип доверенного лица. */
    #[Serializer\Type('string')]
    public ?string $type = null;

    /** ИНН доверенного лица. */
    #[Serializer\Type('string')]
    public ?string $inn = null;

    /** КПП доверенного лица. */
    #[Serializer\Type('string')]
    public ?string $kpp = null;

    /** Наименование организации-доверенного лица. */
    #[Serializer\Type('string')]
    public ?string $organizationName = null;

    /** ФИО доверенного лица. */
    #[Serializer\Type(PersonName::class)]
    public ?PersonName $personName = null;

    /** Физические лица в составе доверенного лица. @var PhysicalEntity[]|null */
    #[Serializer\Type('array<' . PhysicalEntity::class . '>')]
    public ?array $physicalEntities = null;
}
