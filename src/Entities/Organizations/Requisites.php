<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Organizations;

use JMS\Serializer\Annotation as Serializer;

class Requisites
{
    #[Serializer\Type('string')]
    public string $inn;

    #[Serializer\Type('string')]
    public ?string $kpp = null;

    #[Serializer\Type('string')]
    public ?string $diadocBoxId = null;

    #[Serializer\Type('string')]
    public ?string $fullName = null;

    #[Serializer\Type('string')]
    public ?string $shortName = null;

    /** Настройки, связанные с транспортными накладными */
    #[Serializer\Type(TransportationsSettings::class)]
    public ?TransportationsSettings $transportationsSettings = null;

    /** Режимы работы ЭПЛ */
    #[Serializer\Type(EplSettings::class)]
    public ?EplSettings $eplsSettings = null;

    #[Serializer\Type('string')]
    public ?string $fnsParticipantId = null;

    #[Serializer\Type('bool')]
    public ?bool $isRoaming = null;

    #[Serializer\Type('bool')]
    public ?bool $isLogistics = null;

    #[Serializer\Type('array<string>')]
    public ?array $roles = null;

    #[Serializer\Type('string')]
    public ?string $autoRelationMode = null;
}
