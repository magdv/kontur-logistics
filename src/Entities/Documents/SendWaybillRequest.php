<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Documents;

class SendWaybillRequest
{
    /** @var null|string */
    public $waybillFileName;
    /** @var null|string */
    public $waybill;
    /** @var null|string */
    public $waybillSign;
    /** @var null|string */
    public $waybillSignFileName;
}
