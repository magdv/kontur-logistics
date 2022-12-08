<?php

declare(strict_types=1);

namespace Test\Functional;

use GuzzleHttp\Client;
use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\LogisticsDocumentsApi;
use Test\base\BaseTest;
use Test\enums\ConfigNames;

class LogisticsDocumentsTest extends BaseTest
{
    public function testSendWaybill(): void
    {

        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.xml');

        $client = new Client(
            [
                'debug' => true,
            ]
        );

        $request = new SendWaybillRequest();
        $request->waybill = $xml;
        $request->waybillFileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246067913748_0_20221117_f31045c7-a0be-409e-bb89-a0d436053961.xml';

        $ligistics = new LogisticsDocumentsApi($client, getenv(ConfigNames::APIKEY), $this->createSerializer(), getenv(ConfigNames::URL));
        $response = $ligistics->sendWaybill($request);

        $this->assertNotEmpty($response->transportationId);
    }

    public function testSendWaybillSign(): void
    {

        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.xml');
        $sig = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.sig');

        $client = new Client(
            [
                'debug' => true,
            ]
        );

        $request = new SendWaybillRequest();
        $request->waybill = $xml;
        $request->waybillFileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246067913748_0_20221117_f31045c7-a0be-409e-bb89-a0d436053961.xml';
        $request->waybillSignFileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246067913748_0_20221117_f31045c7-a0be-409e-bb89-a0d436053961.sig';
        $request->waybillSign = $sig;

        $ligistics = new LogisticsDocumentsApi($client, getenv(ConfigNames::APIKEY), $this->createSerializer(), getenv(ConfigNames::URL));
        $response = $ligistics->sendWaybill($request);
        $this->assertEquals(400, $response->statusCode);
        $this->assertEquals('MessageToPost.DocumentAttachments[0]: Invalid signature', $response->error->message);
    }

    public function testSendWaybillUnathorized(): void
    {

        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.xml');
        $sig = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.sig');

        $client = new Client(
            [
                'debug' => true,
            ]
        );

        $request = new SendWaybillRequest();
        $request->waybill = $xml;
        $request->waybillFileName = ' ';
        $request->waybillSignFileName = ' ';
        $request->waybillSign = $sig;

        $logisticsDocumentsApi = new LogisticsDocumentsApi($client, '', $this->createSerializer(), getenv(ConfigNames::URL));
        $response = $logisticsDocumentsApi->sendWaybill($request);
        $this->assertEquals(401, $response->statusCode);
        $this->assertStringContainsString('Please specify APIKEY in header x-kontur-apikey', $response->error->message);
    }
}
