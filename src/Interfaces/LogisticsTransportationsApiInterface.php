<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;
use MagDv\Logistics\Entities\Transportations\TrasportationListResponse;
use MagDv\Logistics\Exception\LogisticsUnauthorizedException;

interface LogisticsTransportationsApiInterface
{
    /**
     * @param string $id
     * @return \MagDv\Logistics\Entities\Transportations\TrasportationResponse
     * @throws \MagDv\Logistics\Exception\LogisticsApiException|LogisticsUnauthorizedException
     */
    public function transportation(string $id): TrasportationResponse;

    /**
     * @param \MagDv\Logistics\Entities\Transportations\TransportationListRequest $requestList
     * @return \MagDv\Logistics\Entities\Transportations\TrasportationListResponse
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     * @throws \MagDv\Logistics\Exception\LogisticsUnauthorizedException
     */
    public function transportationsList(TransportationListRequest $requestList): TrasportationListResponse;
}
