<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class PowerOfAttorneyProcessedEventDetails
{
    /** Идентификатор доверенности в Диадоке. */
    #[Serializer\Type('string')]
    public ?string $poaId = null;

    /** Идентификатор участника, которому принадлежит доверенность. */
    #[Serializer\Type('string')]
    public ?string $poaOwnerId = null;

    /** Идентификатор титула в Диадоке, в рамках которого обработана доверенность. */
    #[Serializer\Type('string')]
    public ?string $titleId = null;

    /** Информация о МЧД, ее реквизиты, метаданные и результат проверки. */
    #[Serializer\Type(PowerOfAttorneyInfo::class)]
    public ?PowerOfAttorneyInfo $powerOfAttorneyInfo = null;
}
