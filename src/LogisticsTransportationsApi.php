<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;
use MagDv\Logistics\Entities\Transportations\TrasportationListResponse;
use MagDv\Logistics\Interfaces\LogisticsTransportationsApiInterface;
use Nyholm\Psr7\Request;

class LogisticsTransportationsApi extends BaseRequest implements LogisticsTransportationsApiInterface
{
    public function transportation(string $id): TrasportationResponse
    {
        $request = new Request('GET', $this->url . 'v1/transportations/' . $id);

        $response = $this->send($request);

        return $this->serializer->deserialize($response->getBody()->getContents(), TrasportationResponse::class, 'json');
    }

    public function transportationsList(TransportationListRequest $requestList): TrasportationListResponse
    {
        $request = new Request(
            'GET',
            $this->url . 'v1/transportations'
        );

        $response = $this->send($request);

        return $this->serializer->deserialize($response->getBody()->getContents(), TrasportationListResponse::class, 'json');
    }
}
