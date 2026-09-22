<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class PowerOfAttorneyPermission
{
    /** Тип полномочия доверенного лица. */
    #[Serializer\Type('string')]
    public ?string $type = null;

    /** Текст полномочия доверенного лица. */
    #[Serializer\Type('string')]
    public ?string $permissionText = null;

    /** Машиночитаемое представление полномочия. */
    #[Serializer\Type(MachineReadablePermission::class)]
    public ?MachineReadablePermission $machineReadablePermission = null;
}
