<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Documents;

class SendWaybillRequest
{
    public ?string $waybillFileName = null;

    public ?string $waybill = null;

    public ?string $waybillSign = null;

    public ?string $waybillSignFileName = null;
}
