<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class SignatureRejectedEventDetails
{
    /** Идентификатор титула отказа. */
    #[Serializer\Type('string')]
    public ?string $documentId = null;

    /** Идентификатор титула, в подписании которого отказали. */
    #[Serializer\Type('string')]
    public ?string $rejectedDocumentId = null;

    /** Идентификатор ящика организации, которая опубликовала титул отказа. */
    #[Serializer\Type('string')]
    public ?string $postedBy = null;

    /** Причина отказа. */
    #[Serializer\Type('string')]
    public ?string $rejectionReason = null;
}
