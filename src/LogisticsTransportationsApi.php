<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Entities\Transportations\PrintFormResponse;
use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationListResponse;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;
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

    public function transportationsPrintForm(string $transportationId): PrintFormResponse
    {
        $request = new Request('GET', $this->url . 'v1/transportations/' . $transportationId . '/print-form');

        $response = $this->send($request);

        if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
            $disposition = $response->getHeader('Content-Disposition')[0] ?? [];
            $fileName = 'ТРН.pdf';
            if ($disposition && preg_match('/filename=\"(.+)\";/i', $disposition, $match)) {
                $fileName = $match[1];
            }

            $data = [
                'data' => $response->getBody()->getContents(),
                'type' => $response->getHeader('Content-Type')[0] ?? 'application/pdf',
                'fileName' => $fileName,
            ];

            $dto = $this->serializer->fromArray($data, PrintFormResponse::class);
        } else {
            $dto = $this->serializer->deserialize($response->getBody()->getContents(), PrintFormResponse::class, 'json');
        }
        $dto->statusCode = $response->getStatusCode();

        return $dto;
    }
}
