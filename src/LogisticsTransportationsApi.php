<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;
use MagDv\Logistics\Entities\Transportations\TrasportationListResponse;
use MagDv\Logistics\Interfaces\LogisticsTransportationsApiInterface;
use Nyholm\Psr7\Request;
use Nyholm\Psr7\Uri;

class LogisticsTransportationsApi extends BaseRequest implements LogisticsTransportationsApiInterface
{
    public function transportation(string $id): TrasportationResponse
    {
        $request = new Request('GET', $this->url . 'v1/transportations/' . $id);

        $response = $this->send($request);

        /** @var TrasportationResponse $dto */
        $dto = $this->serializer->deserialize($response->getBody()->getContents(), TrasportationResponse::class, 'json');
        $dto->statusCode = $response->getStatusCode();

        return $dto;
    }

    public function transportationsList(TransportationListRequest $requestList): TrasportationListResponse
    {
        $queryData = [];
        if ($requestList->From) {
            $queryData['From'] = $requestList->From->format('Y-m-d\TH:i:sP');
        }

        if ($requestList->To) {
            $queryData['To'] = $requestList->To->format('Y-m-d\TH:i:sP');
        }

        if ($requestList->Take) {
            $queryData['Take'] = $requestList->Take;
        }

        if ($requestList->Skip) {
            $queryData['Skip'] = $requestList->Skip;
        }

        if ($requestList->Status) {
            $queryData['Status'] = $requestList->Status;
        }

        if ($requestList->SortDirection) {
            $queryData['SortDirection'] = $requestList->SortDirection;
        }

        $uri = new Uri($this->url . 'v1/transportations' . ($queryData ? '?' . http_build_query($queryData) : ''));

        $request = new Request(
            'GET',
            $uri
        );

        $response = $this->send($request);

        /** @var TrasportationListResponse $dto */
        $dto = $this->serializer->deserialize($response->getBody()->getContents(), TrasportationListResponse::class, 'json');
        $dto->statusCode = $response->getStatusCode();

        return $dto;
    }
}
