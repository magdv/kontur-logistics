<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\BaseResponse;

class TransportationTitleResponse extends BaseResponse
{
    #[Serializer\Type('string')]
    public ?string $data = null;

    #[Serializer\Type('string')]
    public ?string $type = null;

    #[Serializer\Type('string')]
    public ?string $fileName = null;
}
