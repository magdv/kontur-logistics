<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

class TransportationListRequest
{
    public ?\DateTimeImmutable $From = null;

    public ?\DateTimeImmutable $To = null;

    public ?string $Status = null;

    public ?int $Skip = null;

    public ?int $Take = null;

    public ?string $SortDirection = null;
}
