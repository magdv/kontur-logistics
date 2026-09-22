<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\Entities\Transportations\TransportationEventsRequest;
use MagDv\Logistics\LogisticsTransportationsApi;
use Test\base\BaseTest;
use Test\base\KdvLocalConfig;

class LogisticsTransportationEventsTest extends BaseTest
{
    public function testTransportationEventsRequest(): void
    {
        $diadocBoxId = getenv('DIADOCBOXID');
        if (!is_string($diadocBoxId) || $diadocBoxId === '') {
            self::markTestSkipped('DIADOCBOXID is not configured.');
        }

        $logistics = new LogisticsTransportationsApi(new KdvLocalConfig());
        $request = new TransportationEventsRequest();
        $request->DiadocBoxId = $diadocBoxId;
        $request->FromDt = new \DateTimeImmutable('now - 1 day');
        $request->Count = 100;

        $response = $logistics->transportationEvents($request);

        self::assertNotEmpty($response);
        self::assertSame(200, $response->statusCode);
        self::assertIsArray($response->events);

        if ($response->events === []) {
            return;
        }

        self::assertNotEmpty($response->events[0]->id);
        self::assertNotEmpty($response->events[0]->eventType);

        $nextRequest = new TransportationEventsRequest();
        $nextRequest->DiadocBoxId = $diadocBoxId;
        $nextRequest->FromId = $response->events[0]->id;

        $nextResponse = $logistics->transportationEvents($nextRequest);

        self::assertNotEmpty($nextResponse);
        self::assertSame(200, $nextResponse->statusCode);
        self::assertIsArray($nextResponse->events);
    }
}
