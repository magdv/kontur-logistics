<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\Entities\Documents\SendWaybillResponse;
use MagDv\Logistics\Exception\LogisticsUnauthorizedException;

interface LogisticsDocumentsApiInterface
{
    /**
     * @param \MagDv\Logistics\Entities\Documents\SendWaybillRequest $request
     * @return \MagDv\Logistics\Entities\Documents\SendWaybillResponse
     * @throws \MagDv\Logistics\Exception\LogisticsApiException|LogisticsUnauthorizedException
     */
    public function sendWaybill(SendWaybillRequest $request): SendWaybillResponse;
}
