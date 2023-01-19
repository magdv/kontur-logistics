<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Transportations\PrintFormResponse;
use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;
use MagDv\Logistics\Entities\Transportations\TrasportationListResponse;

interface LogisticsTransportationsApiInterface
{
    /**
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function transportation(string $id): TrasportationResponse;

    /**
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function transportationsList(TransportationListRequest $requestList): TrasportationListResponse;

    public function transportationsPrintForm(string $transportationId): PrintFormResponse;
}
