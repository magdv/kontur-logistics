<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use JMS\Serializer\SerializerInterface;

interface LogisticsSerializerInterface
{
    public function getSerializer(): SerializerInterface;
}
