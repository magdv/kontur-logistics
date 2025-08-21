<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;
use MagDv\Logistics\Enums\TransportationStatus;
use MagDv\Logistics\LogisticsTransportationsApi;
use Test\base\BaseTest;
use Test\base\LocalConfig;

class LogisticsTransportationFullDocFlowTest extends BaseTest
{
    protected function setUp(): void
    {
    }

    public function testTransportationTitle(): void
    {
        $listRequest = new TransportationListRequest();
        $listRequest->Status = TransportationStatus::COMPLETED;

        $logistics = new LogisticsTransportationsApi(new LocalConfig());
        $response = $logistics->transportationsList($listRequest);
        $this->assertNotEmpty($response);
        /** @var TrasportationResponse $waybill */
        $waybill = $response->items[0];

        $fileResponse = $logistics->fullDocFlow($waybill->transportationInfo->id);
        self::assertNotEmpty($fileResponse);
        self::assertEquals(200, $fileResponse->statusCode);
        self::assertNotEmpty($fileResponse->data);
    }
}
