<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Organizations;

use MagDv\Logistics\BaseResponse;

class RequisitesResponse extends BaseResponse
{
    /**
     * @var \MagDv\Logistics\Entities\Organizations\Requisites[]|null $items
     */
    public ?array $items = null;
}
