<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class MintransStatus
{
    #[Serializer\Type('string')]
    public ?string $id = null;

    #[Serializer\Type('string')]
    public ?string $status = null;

    #[Serializer\Type('string')]
    public ?string $statusDescription = null;

    #[Serializer\Type('bool')]
    public ?bool $hasErrors = null;

    #[Serializer\Type('string')]
    public ?string $errorsDescription = null;
}
