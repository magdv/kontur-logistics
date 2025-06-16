<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Driver
{
    #[Serializer\Type('string')]
    public ?string $lastName = null;

    #[Serializer\Type('string')]
    public ?string $firstName = null;

    #[Serializer\Type('string')]
    public ?string $middleName = null;

    #[Serializer\Type('string')]
    public ?string $licenseId = null;

    #[Serializer\Type('string')]
    public ?string $phone = null;
}
