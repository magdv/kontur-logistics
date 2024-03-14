<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Resolutions
{
    #[Serializer\Type('array<' . Approval::class . '>')]
    public ?array $approvals = null;
}
