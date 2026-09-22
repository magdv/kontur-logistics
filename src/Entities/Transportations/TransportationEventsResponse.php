<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\BaseResponse;

class TransportationEventsResponse extends BaseResponse
{
    /** Перечень событий. @var TransportationEvent[]|null */
    #[Serializer\Type('array<' . TransportationEvent::class . '>')]
    public ?array $events = null;

    /** Идентификатор события, с которого следует продолжить вычитывание ленты. */
    #[Serializer\Type('string')]
    public ?string $continueFromId = null;
}
