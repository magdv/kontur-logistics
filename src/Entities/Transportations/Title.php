<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Title
{
    #[Serializer\Type('string')]
    public ?string $id = null;
    #[Serializer\Type('string')]
    public ?string $type = null;
    #[Serializer\Type(Signer::class)]
    public ?Signer $signer = null;
    #[Serializer\Type('bool')]
    public ?bool $isSignatureRejected = null;
    #[Serializer\Type('string')]
    public ?string $createdAt = null;
}
