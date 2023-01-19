<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class DocumentInfo
{
    /**
     * @Serializer\Type("string")
     */
    public ?string $id = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $type = null;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Circulations")
     */
    public ?Circulations $circulations = null;
}
