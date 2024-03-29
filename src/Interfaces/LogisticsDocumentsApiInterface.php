<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Documents\CreateWaybillDraftRequest;
use MagDv\Logistics\Entities\Documents\CreateWaybillDraftResponse;
use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\Entities\Documents\SendWaybillResponse;

interface LogisticsDocumentsApiInterface
{
    /**
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function sendWaybill(SendWaybillRequest $request): SendWaybillResponse;

    public function createWaybillDraft(CreateWaybillDraftRequest $request): CreateWaybillDraftResponse;
}
