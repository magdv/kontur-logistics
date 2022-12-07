<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Entities\Mintrans\Uuid;
use MagDv\Logistics\Interfaces\MintransGatewayApiInterface;
use Nyholm\Psr7\Request;

class MintransGatewayApi extends BaseRequest implements MintransGatewayApiInterface
{
    /**
     * @return \MagDv\Logistics\Entities\Mintrans\Uuid
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     * @throws \MagDv\Logistics\Exception\LogisticsUnauthorizedException
     */
    public function uuid(): Uuid
    {
        $req = new Request(
            'GET',
            $this->url . 'v1/mintransgateway/uuid'
        );

        $response = $this->send($req);

        $body = json_decode($response->getBody()->getContents(), true);

        return (new Uuid($body['result']));
    }
}
