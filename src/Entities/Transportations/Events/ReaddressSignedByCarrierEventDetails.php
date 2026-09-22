<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class ReaddressSignedByCarrierEventDetails
{
    /** Адрес доставки при переадресовке, согласованной перевозчиком. */
    #[Serializer\Type('string')]
    public ?string $deliveryAddress = null;

    /** Идентификатор нового получателя. */
    #[Serializer\Type('string')]
    public ?string $consigneeBoxId = null;
}
