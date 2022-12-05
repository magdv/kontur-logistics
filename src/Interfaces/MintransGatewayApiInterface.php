<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Mintrans\Uuid;

interface MintransGatewayApiInterface
{
    public function uuid(): Uuid;
}
