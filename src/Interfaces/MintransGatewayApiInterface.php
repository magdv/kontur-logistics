<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Mintrans\Uuid;

interface MintransGatewayApiInterface
{
    /**
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function uuid(): Uuid;
}
