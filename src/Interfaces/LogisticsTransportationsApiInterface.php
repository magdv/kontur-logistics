<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Transportations\PrintFormResponse;
use MagDv\Logistics\Entities\Transportations\TransportationArchiveResponse;
use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationListResponse;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;

interface LogisticsTransportationsApiInterface
{
    /**
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function transportation(string $id): TrasportationResponse;

    public function archive(string $id, bool $archive, ?string $diadocBoxId = null): TransportationArchiveResponse;

    /**
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function transportationsList(TransportationListRequest $requestList): TrasportationListResponse;

    public function transportationsPrintForm(string $transportationId): PrintFormResponse;
}
