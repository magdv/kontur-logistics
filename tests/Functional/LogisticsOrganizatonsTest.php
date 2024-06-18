<?php

declare(strict_types=1);

namespace Test\Functional;

use MagDv\Logistics\LogisticsOrganizationsApi;
use Test\base\BaseTest;
use Test\base\LocalConfig;

class LogisticsOrganizatonsTest extends BaseTest
{
    private string $id;

    private LocalConfig $client;

    protected function setUp(): void
    {
        $this->client = new LocalConfig();
    }

    public function testGetRequisites(): void
    {
        $inn = '7017094419';

        $organizations = new LogisticsOrganizationsApi(
            $this->client
        );
        $response = $organizations->requisites($inn);

        // делаю просто проверку, что не пустое и что оно десериализовалось.
        $this->assertNotEmpty($response);
        $this->assertNotEmpty($response->items);
        $this->assertCount(1, $response->items);
        $kdv = $response->items[0];
        $this->assertEquals(997350001, $kdv->kpp);
        $this->assertEquals($inn, $kdv->inn);
        $this->assertEquals('74ccc554-36ad-4322-8790-9018665f981a', $kdv->diadocBoxId);
        $this->assertEquals('ООО "КДВ Групп"', $kdv->fullName);
        $this->assertEquals(null, $kdv->shortName);
        $this->assertEquals(false, $kdv->isRoaming);
        $this->assertEquals('2BM-7017094419-2012052808201742382630000000000', $kdv->fnsParticipantId);
        $this->assertEquals('enabled', $kdv->autoRelationMode);
        $this->assertEquals(true, $kdv->isLogistics);
        $this->assertEquals('Production', $kdv->eplsSettings->workMode);
        $this->assertEquals('Production', $kdv->transportationsSettings->workMode);
        $this->assertEquals(
            [
                'consignee',
                'consignor',
            ],
            $kdv->roles
        );

        $kpp = '701701001';
        // проверим, что есть ошибка в ответе
        $response = $organizations->requisites($inn, $kpp);

        $this->assertNotEmpty($response);
        $this->assertEquals(404, $response->statusCode);
        $this->assertStringContainsString("Организация c ИНН-КПП: '7017094419-701701001' не была найдена в системе", $response->error->message);
        $this->assertStringContainsString("NotFound", $response->error->code);
        $this->assertStringContainsString("v1/organization", $response->error->target);
    }
}
