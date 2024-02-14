<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\Entities\Documents\CreateWaybillDraftRequest;
use MagDv\Logistics\Entities\Documents\Enums\DraftAction;
use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\LogisticsDocumentsApi;
use Test\base\BaseTest;
use Test\base\LocalConfig;

class LogisticsDocumentsTest extends BaseTest
{
    public function testSendWaybill(): void
    {

        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.xml');

        $request = new SendWaybillRequest();
        $request->waybill = $xml;
        $request->waybillFileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246067913748_0_20221117_f31045c7-a0be-409e-bb89-a0d436053961.xml';

        $ligistics = new LogisticsDocumentsApi(new LocalConfig());
        $response = $ligistics->sendWaybill($request);

        $this->assertNotEmpty($response->transportationId);
    }

    public function testSendWaybillSign(): void
    {

        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246227516489_0_20221223_2B8E3FA5-9FB2-48C9-9F4B-989E03B7A494.xml');
        $sig = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246227516489_0_20221223_2B8E3FA5-9FB2-48C9-9F4B-989E03B7A494.xml.sig');

        $request = new SendWaybillRequest();
        $request->waybill = $xml;
        $request->waybillFileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246227516489_0_20221223_2B8E3FA5-9FB2-48C9-9F4B-989E03B7A494.xml';
        $request->waybillSignFileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246227516489_0_20221223_2B8E3FA5-9FB2-48C9-9F4B-989E03B7A494.xml.sig';
        $request->waybillSign = $sig;

        $ligistics = new LogisticsDocumentsApi(new LocalConfig());
        $response = $ligistics->sendWaybill($request);
        $this->assertEquals(400, $response->statusCode);
        $this->assertEquals('Неверное содержимое XML-файла. Одна из сторон документооборота не найдена.', $response->error->message);
    }

    public function testSendWaybillUnathorized(): void
    {

        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.xml');
        $sig = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.sig');

        $request = new SendWaybillRequest();
        $request->waybill = $xml;
        $request->waybillFileName = ' ';
        $request->waybillSignFileName = ' ';
        $request->waybillSign = $sig;

        $logisticsDocumentsApi = new LogisticsDocumentsApi(new LocalConfig('d'));
        $response = $logisticsDocumentsApi->sendWaybill($request);
        $this->assertEquals(401, $response->statusCode);
        $this->assertStringContainsString('APIKEY authentication failed', $response->error->message);
    }

    public function testCreatedWaybillDraft(): void
    {

        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN.xml');

        $request = new CreateWaybillDraftRequest();
        $request->draft = $xml;
        $request->draftFileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017477919-701701001-202009220246067913748_0_20221117_f31045c7-a0be-409e-bb89-a0d436053961.xml';
        $request->draftAction = DraftAction::APPROVED_FOR_SIGNATURE;

        $logistics = new LogisticsDocumentsApi(new LocalConfig());
        $response = $logistics->createWaybillDraft($request);

        $this->assertNotEmpty($response->transportationId);
        $this->assertNotEmpty($response->draftId);
    }
}
