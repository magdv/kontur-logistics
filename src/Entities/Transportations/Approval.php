<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Approval
{
    #[Serializer\Type('string')]
    public ?string $type = null;
    #[Serializer\Type('string')]
    public ?string $dateTime = null;
    #[Serializer\Type(Signer::class)]
    public ?Signer $signer = null;
    #[Serializer\Type('string')]
    public ?string $comment = null;
    #[Serializer\Type('bool')]
    public ?bool $isRejected = null;
}
