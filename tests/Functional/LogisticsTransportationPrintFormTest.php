<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\LogisticsDocumentsApi;
use MagDv\Logistics\LogisticsTransportationsApi;
use Test\base\BaseTest;
use Test\base\LocalHttpClient;
use Test\base\LocalSerializer;
use Test\enums\ConfigNames;

class LogisticsTransportationPrintFormTest extends BaseTest
{
    private ?string $id = null;

    private LocalHttpClient $client;

    protected function setUp(): void
    {
        $this->client = new LocalHttpClient();
        // создать накладную
        $this->id = $this->createTransportation();
    }

    public function testTransportationPrintForm(): void
    {
        // получить накладную
        $ligistics = new LogisticsTransportationsApi(
            $this->client,
            getenv(ConfigNames::APIKEY),
            new LocalSerializer(),
            getenv(ConfigNames::URL)
        );
        $response = $ligistics->transportationsPrintForm($this->id);

//         делаю просто проверку, что не пустое и что оно десериализовалось.
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response->data);
        $this->assertNotEmpty($response->fileName);
        $this->assertNotEmpty($response->type);

        // проверим, что есть ошибка в ответе
        $response = $ligistics->transportation('$this->id');

        $this->assertNotEmpty($response);
        $this->assertEquals(404, $response->statusCode);
        $this->assertStringContainsString('$this->id', $response->error->message);
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
