<?php

declare(strict_types=1);

namespace Test\base;

use MagDv\Logistics\LogisticsSerializer;

class LocalSerializer extends LogisticsSerializer
{
    public function getCachePath(): ?string
    {
        return null;
    }

    public function getIsDebug(): bool
    {
        return true;
    }
}
