<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class TitleInfo
{
    /** Идентификатор титула. */
    #[Serializer\Type('string')]
    public ?string $entityId = null;

    /** Идентификатор подписанта. */
    #[Serializer\Type('string')]
    public ?string $signedBy = null;

    /** Признак отклонения подписи. */
    #[Serializer\Type('bool')]
    public ?bool $isSignatureRejected = null;
}
