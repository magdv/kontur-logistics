<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class MintransIdReceivedEventDetails
{
    /** УИД перевозки, присвоенный Минтрансом (ГИС ЭПД). */
    #[Serializer\Type('string')]
    public ?string $mintransId = null;
}
