<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Mintrans\Uuid;
use MagDv\Logistics\Exception\LogisticsUnauthorizedException;

interface MintransGatewayApiInterface
{
    /**
     * @return \MagDv\Logistics\Entities\Mintrans\Uuid
     * @throws \MagDv\Logistics\Exception\LogisticsApiException|LogisticsUnauthorizedException
     */
    public function uuid(): Uuid;
}
