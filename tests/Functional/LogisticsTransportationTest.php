<?php

declare(strict_types=1);

namespace Test\Functional;

use GuzzleHttp\Client;
use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\LogisticsDocumentsApi;
use MagDv\Logistics\LogisticsTransportationsApi;
use Test\base\BaseTest;
use Test\enums\ConfigNames;

class LogisticsTransportationTest extends BaseTest
{
    /** @var string $id */
    private $id;

    /** @var Client $id */
    private $client;

    public function setUp(): void
    {
        $this->client = new Client(
            [
                'debug' => true,
            ]
        );
        // создать накладную
        $this->id = $this->createTransportation();
    }

    public function testTransportationByIdRequest(): void
    {

        // получить накладную
        $ligistics = new LogisticsTransportationsApi(
            $this->client,
            getenv(ConfigNames::APIKEY),
            $this->createSerializer(),
            getenv(ConfigNames::URL)
        );
        $response = $ligistics->transportation($this->id);

        // делаю просто проверку, что не пустое и что оно десериализовалось.
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response->documentInfo->id);
    }

    public function testTransportationListRequest(): void
    {
        // получить список накладных
        $ligistics = new LogisticsTransportationsApi(
            $this->client,
            getenv(ConfigNames::APIKEY),
            $this->createSerializer(),
            getenv(ConfigNames::URL)
        );

        $listRequest = new TransportationListRequest();

        $response = $ligistics->transportationsList($listRequest);

        $this->assertNotEmpty($response);
        $this->assertTrue(count($response->items) > 0);
    }

    /**
     * @return string
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     * @throws \MagDv\Logistics\Exception\LogisticsUnauthorizedException
     */
    private function createTransportation(): string
    {
        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.xml');

        $request = new SendWaybillRequest();
        $request->waybill = $xml;
        $request->waybillFileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246067913748_0_20221117_f31045c7-a0be-409e-bb89-a0d436053961.xml';

        $ligistics = new LogisticsDocumentsApi($this->client, getenv(ConfigNames::APIKEY), $this->createSerializer(), getenv(ConfigNames::URL));

        return $ligistics->sendWaybill($request)->transportationId;
    }
}
