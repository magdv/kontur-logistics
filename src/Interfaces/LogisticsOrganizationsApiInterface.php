<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Organizations\RequisitesResponse;

interface LogisticsOrganizationsApiInterface
{
    public function requisites(string $inn, ?string $kpp = null): RequisitesResponse;
}
