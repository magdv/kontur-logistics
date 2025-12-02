<?php

declare(strict_types=1);

namespace MagDv\Logistics\Errors;

use JMS\Serializer\Annotation as Serializer;

class Details
{
    #[Serializer\Type('string')]
    public ?string $message = null;

    #[Serializer\Type('string')]
    public ?string $target = null;
}
