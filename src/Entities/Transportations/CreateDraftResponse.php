<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use MagDv\Logistics\BaseResponse;
use JMS\Serializer\Annotation as Serializer;

final class CreateDraftResponse extends BaseResponse
{
    #[Serializer\Type('string')]
    public ?string $transportationId = null;

    #[Serializer\Type('string')]
    public ?string $draftId = null;

    #[Serializer\Type('string')]
    public ?string $draftAction = null;
}
