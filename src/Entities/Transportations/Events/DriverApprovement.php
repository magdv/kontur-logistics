<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class DriverApprovement
{
    /** Признак отказа водителя. */
    #[Serializer\Type('bool')]
    public ?bool $isDisapproved = null;

    /** Признак наличия замечаний. */
    #[Serializer\Type('bool')]
    public ?bool $hasRemarks = null;

    /** Признак внешнего согласования. */
    #[Serializer\Type('bool')]
    public ?bool $isOuterConfirmation = null;
}
