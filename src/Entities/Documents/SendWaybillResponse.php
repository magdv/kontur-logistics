<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Documents;

class SendWaybillResponse
{
    /** @var string */
    public $transportationId;

    public function __construct(?string $transportationId = null)
    {
        $this->transportationId = $transportationId;
    }
}
