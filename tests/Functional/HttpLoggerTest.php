<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\MintransGatewayApi;
use Ramsey\Uuid\Uuid;
use Test\base\BaseTest;
use Test\base\LocalConfig;
use Test\base\MemoryHttpLogger;

class HttpLoggerTest extends BaseTest
{
    public function testLoggerReceivesRequestAndResponse(): void
    {
        $logger = new MemoryHttpLogger();
        $mintrans = new MintransGatewayApi(new LocalConfig(null, $logger));

        $response = $mintrans->uuid();

        $this->assertNotEmpty($response->result);
        $this->assertTrue(Uuid::isValid($response->result));

        $this->assertCount(1, $logger->logs);

        $log = $logger->logs[0];
        $this->assertSame('GET', $log->method);
        $this->assertStringContainsString('v1/mintransgateway/uuid', $log->url);
        $this->assertSame(200, $log->statusCode);
        $this->assertNotEmpty($log->response);
        $this->assertStringContainsString($response->result, $log->response);
        $this->assertNull($log->params);
    }
}
