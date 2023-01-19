<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Circulation
{
    /**
     * @Serializer\Type("string")
     * @var null|string $type
     */
    public $type;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Titles")
     * @var null|\MagDv\Logistics\Entities\Transportations\Titles $titles
     */
    public $titles;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Resolutions")
     * @var null|\MagDv\Logistics\Entities\Transportations\Resolutions $resolutions
     */
    public $resolutions;

    /**
     * @Serializer\Type("string")
     * @var null|string $status
     */
    public $status;

    /**
     * @Serializer\Type("string")
     * @var null|string $deliveredAt
     */
    public $deliveredAt;
}
