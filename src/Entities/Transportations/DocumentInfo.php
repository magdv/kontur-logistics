<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class DocumentInfo
{
    /**
     * @Serializer\Type("string")
     * @var string $id
     */
    public $id;

    /**
     * @Serializer\Type("string")
     * @var string $type
     */
    public $type;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Circulations")
     * @var \MagDv\Logistics\Entities\Transportations\Circulations $circulations
     */
    public $circulations;
}
