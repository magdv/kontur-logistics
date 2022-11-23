<?php

declare(strict_types=1);

namespace Test\Functional;

use GuzzleHttp\Client;
use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\Exception\LogisticsApiException;
use MagDv\Logistics\Exception\LogisticsUnauthorizedException;
use MagDv\Logistics\LogisticsDocuments;
use Test\base\BaseTest;
use Test\enums\ConfigNames;

class LogisticsDocumentsTest extends BaseTest
{
    public function testSendWaybill()
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

        $ligistics = new LogisticsDocuments($client, getenv(ConfigNames::APIKEY), getenv(ConfigNames::URL));
        $response = $ligistics->sendWaybill($request);

        $this->assertNotEmpty($response->transportationId);
    }

    public function testSendWaybillSign()
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

        $ligistics = new LogisticsDocuments($client, getenv(ConfigNames::APIKEY), getenv(ConfigNames::URL));
        $this->expectException(LogisticsApiException::class);
        $ligistics->sendWaybill($request);
        $this->expectExceptionMessageMatches('/Идентификатор одного из участников ЭДО не соответствует организации, найденной по ИНН-КПП/m');
    }

    public function testSendWaybillUnathorized()
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

        $ligistics = new LogisticsDocuments($client, '', getenv(ConfigNames::URL));
        $this->expectException(LogisticsUnauthorizedException::class);
        $ligistics->sendWaybill($request);
        $this->expectExceptionMessageMatches('/Идентификатор одного из участников ЭДО не соответствует организации, найденной по ИНН-КПП/m');
    }
}
