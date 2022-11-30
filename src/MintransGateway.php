<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Entities\Mintrans\Uuid;
use Nyholm\Psr7\Request;

class MintransGateway extends BaseRequest
{
    public function uuid() : Uuid
    {
        $req = new Request(
            'GET',
            $this->url . 'v1/mintransgateway/uuid'
        );

        $response = $this->send($req);

        $body = json_decode($response->getBody()->getContents(), true);

        return (new Uuid($body));
    }
}