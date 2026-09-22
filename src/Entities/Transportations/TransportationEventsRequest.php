<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

class TransportationEventsRequest
{
    /** Идентификатор события, начиная с которого следует вычитывать ленту. */
    public ?string $FromId = null;

    /** Дата и время, начиная с которых следует вычитывать ленту. */
    public ?\DateTimeImmutable $FromDt = null;

    /** Максимальное количество событий в ответе. */
    public ?int $Count = null;

    /** Идентификатор ящика Диадока организации. */
    public ?string $DiadocBoxId = null;
}
