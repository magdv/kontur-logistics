<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class DocumentSignedByRecipientEventDetails
{
    /** Идентификатор подписанного документа. */
    #[Serializer\Type('string')]
    public ?string $documentId = null;

    /** Тип титула. Возможные значения совпадают с DocumentSignedBySenderEventDetails::$documentType. */
    #[Serializer\Type('string')]
    public ?string $documentType = null;

    /** Идентификатор ящика подписанта. */
    #[Serializer\Type('string')]
    public ?string $signedBy = null;

    /** Результат проверки подписи. */
    #[Serializer\Type('bool')]
    public ?bool $isSignatureValid = null;

    /** Идентификатор МЧД. Если МЧД не приложена, поле отсутствует. */
    #[Serializer\Type('string')]
    public ?string $powerOfAttorneyId = null;
}
