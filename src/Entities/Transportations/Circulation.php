<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Circulation
{
    /**
     * @Serializer\Type("string")
     * @var string $type
     */
    public $type;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Titles")
     * @var \MagDv\Logistics\Entities\Transportations\Titles $titles
     */
    public $titles;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Resolutions")
     * @var \MagDv\Logistics\Entities\Transportations\Resolutions $resolutions
     */
    public $resolutions;

    /**
     * @Serializer\Type("string")
     * @var string $status
     */
    public $status;

    /**
     * @Serializer\Type("string")
     * @var string $deliveredAt
     */
    public $deliveredAt;
}
