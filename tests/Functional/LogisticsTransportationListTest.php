<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Enums\TransportationStatus;
use MagDv\Logistics\LogisticsDocumentsApi;
use MagDv\Logistics\LogisticsTransportationsApi;
use Test\base\BaseTest;
use Test\base\LocalHttpClient;
use Test\base\LocalSerializer;
use Test\enums\ConfigNames;

class LogisticsTransportationListTest extends BaseTest
{
    public string $id;

    /** @var \MagDv\Logistics\Interfaces\HttpClientInterface $id */
    private \Test\base\LocalHttpClient $client;

    protected function setUp(): void
    {
        $this->client = new LocalHttpClient();
        // создать накладную
        $this->id = $this->createTransportation();
    }

    public function testTransportationListRequest(): void
    {
        // получить список накладных
        $ligistics = new LogisticsTransportationsApi(
            $this->client,
            getenv(ConfigNames::APIKEY),
            new LocalSerializer(),
            getenv(ConfigNames::URL)
        );

        $listRequest = new TransportationListRequest();

        $response = $ligistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue((array) $response->items !== []);
        $this->assertTrue($response->totalCount > 0);
        $this->assertEquals(false, $response->hasMoreResults);

        // From - to Этот тест может в будущем падать, т.к. я не могу гарантировать, что на стенде будет что - то находиться
        $listRequest->From = (new \DateTimeImmutable("now - 5 year"));
        $listRequest->To = (new \DateTimeImmutable("now - 4 year"));
        $response = $ligistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue((array) $response->items === []);

        // Take
        $listRequest->From = null;
        $listRequest->To = null;
        $listRequest->Take = 1;
        $response = $ligistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue(count((array) $response->items) === 1);
        $this->assertEquals(false, $response->hasMoreResults);
        $id = $response->items[0]->documentInfo->id;

        // Skip
        $listRequest->Skip = 1;
        $response = $ligistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue(count((array) $response->items) === 1);
        $this->assertNotEquals($id, $response->items[0]->documentInfo->id);

        // Status тут тоже может отвалиться в будущем, если что - то изменится на стенде контура
        $listRequest->Skip = null;
        $listRequest->Take = null;
        $listRequest->Status = TransportationStatus::REVOKED;
        $response = $ligistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue((array) $response->items === []);
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

        $ligistics = new LogisticsDocumentsApi($this->client, getenv(ConfigNames::APIKEY), new LocalSerializer(), getenv(ConfigNames::URL));

        return $ligistics->sendWaybill($request)->transportationId;
    }
}
