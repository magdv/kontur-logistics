<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use MagDv\Logistics\BaseResponse;
use JMS\Serializer\Annotation as Serializer;

final class PrintFormResponse extends BaseResponse
{
    #[Serializer\Type('string')]
    public ?string $data = null;
    #[Serializer\Type('string')]
    public ?string $type = null;
    #[Serializer\Type('string')]
    public ?string $fileName = null;
}
