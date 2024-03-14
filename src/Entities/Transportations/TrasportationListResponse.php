<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\BaseResponse;

class TrasportationListResponse extends BaseResponse
{
    #[Serializer\Type('array<' . TrasportationResponse::class . '>')]
    public ?array $items = null;
    #[Serializer\Type('integer')]
    public ?int $totalCount = null;
    #[Serializer\Type('bool')]
    public ?bool $hasMoreResults = null;
}
