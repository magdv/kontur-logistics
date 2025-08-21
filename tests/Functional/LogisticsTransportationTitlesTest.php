<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\Entities\Transportations\Circulation;
use MagDv\Logistics\Entities\Transportations\Title;
use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;
use MagDv\Logistics\Enums\TransportationStatus;
use MagDv\Logistics\LogisticsTransportationsApi;
use Test\base\BaseTest;
use Test\base\LocalConfig;

class LogisticsTransportationTitlesTest extends BaseTest
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

        /** @var Circulation[] $circulations */
        $circulations = $waybill->documentInfo->circulations->items;
        $circulation = null;
        foreach ($circulations as $item) {
            if ($item->type === 'Reception') {
                $circulation = $item;
            }
        }
        self::assertNotEmpty($circulation);

        $titleId = null;
        /** @var Title $title */
        foreach ($circulation->titles->items as $title) {
            if ($title->type === 'CarrierReceptionTitle') {
                $titleId = $title->id;
            }
        }
        self::assertNotEmpty($titleId);

        $title = $logistics->transportationTitle($waybill->transportationInfo->id, $titleId);
        self::assertNotEmpty($title);
        self::assertEquals(200, $title->statusCode);
        self::assertNotEmpty($title->data);
    }
}
