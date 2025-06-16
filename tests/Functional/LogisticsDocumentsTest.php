<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\Entities\Documents\CreateWaybillDraftRequest;
use MagDv\Logistics\Entities\Documents\Enums\DraftAction;
use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;
use MagDv\Logistics\Enums\TransportationStatus;
use MagDv\Logistics\LogisticsDocumentsApi;
use MagDv\Logistics\LogisticsTransportationsApi;
use Test\base\BaseTest;
use Test\base\KdvLocalConfig;
use Test\base\LocalConfig;

class LogisticsDocumentsTest extends BaseTest
{
    public function testSendWaybill(): void
    {

        $this->unArchive();
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
        $this->assertEquals('Некорректное содержание титула. Токен не найден: СвДовер/@ИдентДовер', $response->error->message);
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

        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN_DRAFT_KDV.xml');

        $request = new CreateWaybillDraftRequest();
        $request->draft = $xml;
        $request->draftFileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017094419-2012052808201742382630000000000_1_20240617_03953037-e0ac-4658-8b0e-83def44756f4.xml';
        $request->draftAction = DraftAction::APPROVED_FOR_SIGNATURE;

        $logistics = new LogisticsDocumentsApi(new KdvLocalConfig());
        $response = $logistics->createWaybillDraft($request);

        $this->assertEquals("Загрузка черновика/титула Т1 доступна только в перевозки на статусе 'Накладная готова к подписанию и отправке'", $response->error?->message);
        $this->assertFalse($response->isOk());
        $this->assertEmpty($response->transportationId);
        $this->assertEmpty($response->draftId);
    }

    private function unArchive(): void
    {
        // разархивируем "взад"
        $logistics = new LogisticsTransportationsApi(
            new LocalConfig()
        );
        $listRequest = new TransportationListRequest();
        $listRequest->Status = TransportationStatus::ARCHIVED;
        $response = $logistics->transportationsList($listRequest);
        /** @var TrasportationResponse $transportation */
        foreach ((array)$response->items as $transportation) {
            $logistics->archive($transportation->transportationInfo->id, false);
        }

        $logistics = new LogisticsTransportationsApi(
            new KdvLocalConfig()
        );
        $listRequest = new TransportationListRequest();
        $listRequest->Status = TransportationStatus::ARCHIVED;
        $response = $logistics->transportationsList($listRequest);
        /** @var TrasportationResponse $transportation */
        foreach ((array)$response->items as $transportation) {
            $logistics->archive($transportation->transportationInfo->id, false);
        }
    }
}
