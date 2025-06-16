<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Signer
{
    #[Serializer\Type('string')]
    public ?string $lastName = null;

    #[Serializer\Type('string')]
    public ?string $firstName = null;

    #[Serializer\Type('string')]
    public ?string $middleName = null;

    #[Serializer\Type('string')]
    public ?string $position = null;

    #[Serializer\Type('bool')]
    public ?bool $isDriver = null;

    #[Serializer\Type('string')]
    public ?string $phone = null;

    #[Serializer\Type('string')]
    public ?string $driverLicense = null;
}
