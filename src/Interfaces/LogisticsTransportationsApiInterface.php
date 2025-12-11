<?php

declare(strict_types=1);

namespace MagDv\Logistics\Interfaces;

use MagDv\Logistics\Entities\Transportations\FullDocFlowResponse;
use MagDv\Logistics\Entities\Transportations\PrintFormResponse;
use MagDv\Logistics\Entities\Transportations\TransportationArchiveResponse;
use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TransportationTitleResponse;
use MagDv\Logistics\Entities\Transportations\TrasportationListResponse;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;

interface LogisticsTransportationsApiInterface
{
    /**
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function transportation(string $id): TrasportationResponse;

    public function transportationTitle(string $transportationId, string $titleId): TransportationTitleResponse;

    public function fullDocFlow(string $transportationId): FullDocFlowResponse;

    public function archive(string $id, bool $archive, ?string $diadocBoxId = null): TransportationArchiveResponse;

    /**
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function transportationsList(TransportationListRequest $requestList): TrasportationListResponse;

    public function transportationsPrintForm(string $transportationId): PrintFormResponse;
}
