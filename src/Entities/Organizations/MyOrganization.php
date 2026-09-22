<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Organizations;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\BaseResponse;

class MyOrganization extends BaseResponse
{
    /** ИНН организации. */
    #[Serializer\Type('string')]
    public ?string $inn = null;

    /** КПП организации. */
    #[Serializer\Type('string')]
    public ?string $kpp = null;

    /** Идентификатор ящика Диадока. */
    #[Serializer\Type('string')]
    public ?string $diadocBoxId = null;

    /** Полное наименование организации. */
    #[Serializer\Type('string')]
    public ?string $fullName = null;

    /** Краткое наименование организации. */
    #[Serializer\Type('string')]
    public ?string $shortName = null;

    /** Настройки, связанные с транспортными накладными. */
    #[Serializer\Type(TransportationsSettings::class)]
    public ?TransportationsSettings $transportationsSettings = null;

    /** Режимы работы ЭПЛ. */
    #[Serializer\Type(EplSettings::class)]
    public ?EplSettings $eplsSettings = null;

    /** Идентификатор справочника физических лиц. */
    #[Serializer\Type('string')]
    public ?string $personsDirectoryId = null;

    /** Разрешенные операции организации. @var string[]|null */
    #[Serializer\Type('array<string>')]
    public ?array $permittedOperations = null;

    /** Признак готовности организации к работе с ЭПД. */
    #[Serializer\Type('bool')]
    public ?bool $isReadyForEpd = null;
}
