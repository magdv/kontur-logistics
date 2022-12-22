<?php

declare(strict_types=1);

namespace Test\Functional;

use GuzzleHttp\Client;
use MagDv\Logistics\MintransGatewayApi;
use Ramsey\Uuid\Uuid;
use Test\base\BaseTest;
use Test\base\LocalSerializer;
use Test\enums\ConfigNames;

class MintransGatewayTest extends BaseTest
{
    public function testUuid(): void
    {

        $client = new Client(
            [
                'debug' => true,
            ]
        );

        $mintrans = new MintransGatewayApi($client, getenv(ConfigNames::APIKEY), new LocalSerializer(), getenv(ConfigNames::URL));
        $response = $mintrans->uuid();

        $this->assertNotEmpty($response->result);
        $this->assertTrue(Uuid::isValid($response->result));
    }
}
