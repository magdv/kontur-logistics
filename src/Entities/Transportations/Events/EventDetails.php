<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class EventDetails
{
    /** Данные титула. */
    #[Serializer\Type(TitleInfo::class)]
    public ?TitleInfo $titleInfo = null;

    /** Дополнительные поля события. */
    #[Serializer\Type(DetailsExtended::class)]
    public ?DetailsExtended $detailsExtended = null;
}
