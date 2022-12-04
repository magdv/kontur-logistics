<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Mintrans\Uuid;

interface MintransGatewayInteface
{
    public function uuid() : Uuid;
}