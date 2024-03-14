<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Organization
{
    #[Serializer\Type('string')]
    public ?string $diadocBoxId = null;
    #[Serializer\Type('string')]
    public ?string $name = null;
    #[Serializer\Type('string')]
    public ?string $inn = null;
    #[Serializer\Type('string')]
    public ?string $kpp = null;
    #[Serializer\Type('string')]
    public ?string $role = null;
}
