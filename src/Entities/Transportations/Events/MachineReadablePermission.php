<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class MachineReadablePermission
{
    /** Мнемоника машиночитаемого полномочия. */
    #[Serializer\Type('string')]
    public ?string $mnemonic = null;

    /** Код машиночитаемого полномочия. */
    #[Serializer\Type('string')]
    public ?string $code = null;

    /** Наименование машиночитаемого полномочия. */
    #[Serializer\Type('string')]
    public ?string $name = null;
}
