<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class PowerOfAttorneyMetadata
{
    /** Регистрационный номер доверенности. */
    #[Serializer\Type('string')]
    public ?string $registrationNumber = null;

    /** Дата и время начала действия доверенности. */
    #[Serializer\Type('string')]
    public ?string $validFrom = null;

    /** Дата и время окончания действия доверенности. */
    #[Serializer\Type('string')]
    public ?string $validTo = null;

    /** Доверитель — лицо, выдавшее доверенность. */
    #[Serializer\Type(PowerOfAttorneyIssuer::class)]
    public ?PowerOfAttorneyIssuer $issuer = null;

    /** Доверенные лица, которым выдана доверенность. @var PowerOfAttorneyRepresentative[]|null */
    #[Serializer\Type('array<' . PowerOfAttorneyRepresentative::class . '>')]
    public ?array $representatives = null;

    /** Полномочия доверенных лиц, указанные в доверенности. @var PowerOfAttorneyPermission[]|null */
    #[Serializer\Type('array<' . PowerOfAttorneyPermission::class . '>')]
    public ?array $permissions = null;
}
