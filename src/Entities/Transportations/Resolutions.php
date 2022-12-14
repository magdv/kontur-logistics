<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Resolutions
{
    /**
     * @Serializer\Type("array<MagDv\Logistics\Entities\Transportations\Approval>")
     * @var \MagDv\Logistics\Entities\Transportations\Approval[]
     */
    public $approvals;
}
