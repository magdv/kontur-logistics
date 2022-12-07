<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

class TransportationListRequest
{
    /** @var string|null $From */
    public $From;
    /** @var string|null $To */
    public $To;
    /** @var string|null $Status */
    public $Status;
    /** @var int|null $Skip */
    public $Skip;
    /** @var int|null $Take */
    public $Take;
    /** @var string|null */
    public $SortDirection;
}
