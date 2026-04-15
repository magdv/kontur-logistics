<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\Entities\Documents\Enums\DraftAction;
use MagDv\Logistics\Entities\Transportations\DocumentsDraftRequest;
use MagDv\Logistics\Entities\Transportations\TransportationListRequest;
use MagDv\Logistics\Entities\Transportations\TrasportationResponse;
use MagDv\Logistics\Enums\TransportationStatus;
use MagDv\Logistics\LogisticsTransportationsApi;
use Test\base\BaseTest;
use Test\base\KdvLocalConfig;
use Test\base\LocalConfig;

class LogisticsTransportationDraftTest extends BaseTest
{
    protected function setUp(): void
    {
        // разархивируем, если есть в архиве
        $this->unArchive();
    }
    public function testCreatedWaybillDraft(): void
    {
        $xml = file_get_contents(dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'ECN_DRAFT_KDV.xml');

        $fileName = 'ON_TRNACLGROT_2BM-7715290822-332801001-201505310156089197087_2BM-7017094419-2012052808201742382630000000000_2BM-7017094419-2012052808201742382630000000000_1_20240617_03953037-e0ac-4658-8b0e-83def44756f4.xml';

        $request = new DocumentsDraftRequest(
            draftAction: DraftAction::APPROVED_FOR_SIGNATURE,
            draft: $xml,
            draftFileName: $fileName
        );

        $logistics = new LogisticsTransportationsApi(new KdvLocalConfig());
        $response = $logistics->createDraft($request);

        $this->assertEquals("Загрузка черновика Т1 доступна только в перевозке на статусах 'Накладная готова к подписанию и отправке'", $response->error?->message);
        $this->assertEquals("DocumentService.TitleDraftWrongStatus", $response->error?->code);
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
    }
}
