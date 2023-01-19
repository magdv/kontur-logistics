<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Circulation
{
    /**
     * @Serializer\Type("string")
     */
    public ?string $type = null;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Titles")
     */
    public ?Titles $titles = null;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Resolutions")
     */
    public ?Resolutions $resolutions = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $status = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $deliveredAt = null;
}
