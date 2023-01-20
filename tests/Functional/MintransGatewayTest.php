<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\MintransGatewayApi;
use Ramsey\Uuid\Uuid;
use Test\base\BaseTest;
use Test\base\LocalConfig;

class MintransGatewayTest extends BaseTest
{
    public function testUuid(): void
    {

        $mintrans = new MintransGatewayApi(new LocalConfig());
        $response = $mintrans->uuid();

        $this->assertNotEmpty($response->result);
        $this->assertTrue(Uuid::isValid($response->result));
    }
}
