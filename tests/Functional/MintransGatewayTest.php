<?php

declare(strict_types=1);

namespace Test\Functional;

use GuzzleHttp\Client;
use MagDv\Logistics\MintransGateway;
use Ramsey\Uuid\Uuid;
use Test\base\BaseTest;
use Test\enums\ConfigNames;

class MintransGatewayTest extends BaseTest
{
    public function testSendWaybill()
    {

        $client = new Client(
            [
                'debug' => true,
            ]
        );

        $mintrans = new MintransGateway($client, getenv(ConfigNames::APIKEY), getenv(ConfigNames::URL));
        $response = $mintrans->uuid();

        $this->assertNotEmpty($response->value);
        $this->assertTrue(Uuid::isValid($response->value));
    }
}
