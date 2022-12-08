<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

class TransportationListRequest
{
    /** @var \DateTimeImmutable|null $From */
    public $From;
    /** @var \DateTimeImmutable|null $To */
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
