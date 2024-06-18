<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Organizations;

use JMS\Serializer\Annotation as Serializer;

class EplSettings
{
    /** Режимы работы ЭПЛ */
    #[Serializer\Type('string')]
    public ?string $workMode = null;
}
