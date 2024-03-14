<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Organizations;

use JMS\Serializer\Annotation as Serializer;

class Requisites
{
    #[Serializer\Type('string')]
    public string $inn;
    #[Serializer\Type('string')]
    public ?string $kpp = null;
    #[Serializer\Type('string')]
    public ?string $diadocBoxId = null;
    #[Serializer\Type('string')]
    public ?string $fullName = null;
    #[Serializer\Type('string')]
    public ?string $shortName = null;
    #[Serializer\Type('string')]
    public ?string $fnsParticipantId = null;
    #[Serializer\Type('bool')]
    public ?bool $isRoaming = null;
}
