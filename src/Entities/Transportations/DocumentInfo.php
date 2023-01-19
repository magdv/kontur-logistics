<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class DocumentInfo
{
    /**
     * @Serializer\Type("string")
     * @var null|string $id
     */
    public $id;

    /**
     * @Serializer\Type("string")
     * @var null|string $type
     */
    public $type;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Circulations")
     * @var null|\MagDv\Logistics\Entities\Transportations\Circulations $circulations
     */
    public $circulations;
}
