<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use JMS\Serializer\Serializer;

interface LogisticsSerializerInterface
{
    public function getSerializer(): Serializer;
}
