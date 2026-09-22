<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class InfoFieldsByTitle
{
    /** Тип титула, в котором заданы информационные поля. */
    #[Serializer\Type('string')]
    public ?string $titleType = null;

    /** Информационные поля титула. @var InfoField[]|null */
    #[Serializer\Type('array<' . InfoField::class . '>')]
    public ?array $infoFields = null;
}
