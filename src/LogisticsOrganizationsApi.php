<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Entities\Organizations\Requisites;
use MagDv\Logistics\Entities\Organizations\RequisitesResponse;
use MagDv\Logistics\Interfaces\LogisticsOrganizationsApiInterface;
use Nyholm\Psr7\Request;

class LogisticsOrganizationsApi extends BaseRequest implements LogisticsOrganizationsApiInterface
{
    public function requisites(string $inn, ?string $kpp = null): RequisitesResponse
    {
        $request = new Request('GET', $this->url . 'v1/organizations/requisites?' . http_build_query(['inn' => $inn, 'kpp' => $kpp]));
        $response = $this->send($request);
        $content = $response->getBody()->getContents();
        if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
            $result = new RequisitesResponse();
            $result->statusCode = $response->getStatusCode();
            /** @var Requisites[] $dto */
            $dto = $this->serializer->deserialize($content, "array<" . Requisites::class . ">", 'json');
            $result->items = $dto;
        } else {
            /** @var RequisitesResponse $result */
            $result = $this->serializer->deserialize($content, RequisitesResponse::class, 'json');
        }

        return $result;
    }
}
