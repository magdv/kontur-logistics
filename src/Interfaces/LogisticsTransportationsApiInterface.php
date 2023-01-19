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
     * @param string $id
     * @return \MagDv\Logistics\Entities\Transportations\TrasportationResponse
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function transportation(string $id): TrasportationResponse;

    /**
     * @param \MagDv\Logistics\Entities\Transportations\TransportationListRequest $requestList
     * @return \MagDv\Logistics\Entities\Transportations\TrasportationListResponse
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function transportationsList(TransportationListRequest $requestList): TrasportationListResponse;

    /**
     * @param string $transportationId
     * @return \MagDv\Logistics\Entities\Transportations\PrintFormResponse
     */
    public function transportationsPrintForm(string $transportationId): PrintFormResponse;
}
