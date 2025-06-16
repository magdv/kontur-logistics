<?php

declare(strict_types=1);

namespace Test\Functional;

use DateTimeImmutable;
use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;
use MagDv\Logistics\Enums\TransportationStatus;
use MagDv\Logistics\LogisticsDocumentsApi;
use MagDv\Logistics\LogisticsTransportationsApi;
use Test\base\BaseTest;
use Test\base\LocalConfig;

class LogisticsTransportationListTest extends BaseTest
{
    public string $id;

    private LocalConfig $config;

    protected function setUp(): void
    {
        $this->config = new LocalConfig();
        $this->unArchiveAll();
        // создать накладную
        $this->id = $this->createTransportation();
    }

    public function testTransportationListRequest(): void
    {
        // получить список накладных
        $logistics = new LogisticsTransportationsApi(
            $this->config
        );

        $listRequest = new TransportationListRequest();

        $response = $logistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue((array)$response->items !== []);
        $this->assertTrue($response->totalCount > 0);
        $this->assertEquals(false, $response->hasMoreResults);

        // From - to Этот тест может в будущем падать, т.к. я не могу гарантировать, что на стенде будет что - то находиться
        $listRequest->From = (new DateTimeImmutable("now - 5 year"));
        $listRequest->To = (new DateTimeImmutable("now - 4 year"));
        $response = $logistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue((array)$response->items === []);

        // Take
        $listRequest->From = null;
        $listRequest->To = null;
        $listRequest->Take = 1;
        $response = $logistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue(count((array)$response->items) === 1);
        $this->assertEquals(false, $response->hasMoreResults);
        $id = $response->items[0]->documentInfo->id;

        // Skip
        $listRequest->Skip = 1;
        $response = $logistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue(count((array)$response->items) === 1);
        $this->assertNotEquals($id, $response->items[0]->documentInfo->id);

        // Status тут тоже может отвалиться в будущем, если что - то изменится на стенде контура
        $listRequest->Skip = null;
        $listRequest->Take = null;
        $listRequest->Status = TransportationStatus::REVOKED;
        $response = $logistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue((array)$response->items === []);
    }

    /**
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    private function createTransportation(): string
    {
        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.xml');

        $request = new SendWaybillRequest();
        $request->waybill = $xml;
        $request->waybillFileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246067913748_0_20221117_f31045c7-a0be-409e-bb89-a0d436053961.xml';

        $logistics = new LogisticsDocumentsApi($this->config);

        return $logistics->sendWaybill($request)->transportationId;
    }

    private function unArchiveAll(): void
    {
        $logistics = new LogisticsTransportationsApi(
            $this->config
        );
        // разархивируем, если есть в архиве
        $listRequest = new TransportationListRequest();
        $listRequest->Status = TransportationStatus::ARCHIVED;
        $response = $logistics->transportationsList($listRequest);
        /** @var TrasportationResponse $transportation */
        foreach ((array)$response->items as $transportation) {
            $logistics->archive($transportation->transportationInfo->id, false);
        }
    }
}
