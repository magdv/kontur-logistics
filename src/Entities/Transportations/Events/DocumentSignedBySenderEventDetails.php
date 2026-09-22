<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class DocumentSignedBySenderEventDetails
{
    /** Идентификатор подписанного документа. */
    #[Serializer\Type('string')]
    public ?string $documentId = null;

    /**
     * Тип титула.
     *
     * Возможные значения: ConsignorTitle, CarrierReceptionTitle, ConsigneeTitle,
     * CarrierDeliveryTitle, RedirectTitle, ConsignorReaddressTitle, RelayTitle,
     * CarrierPaymentTitle, ConsignorPaymentTitle, RejectTitle.
     */
    #[Serializer\Type('string')]
    public ?string $documentType = null;

    /** Идентификатор ящика подписанта. */
    #[Serializer\Type('string')]
    public ?string $signedBy = null;

    /** Признак исправительного титула: true — исправление, false — исходный титул. */
    #[Serializer\Type('bool')]
    public ?bool $isRevision = null;

    /** Тип приемки при выгрузке. Заполняется только для титула грузополучателя. */
    #[Serializer\Type('string')]
    public ?string $deliveryType = null;

    /** Результат проверки подписи. */
    #[Serializer\Type('bool')]
    public ?bool $isSignatureValid = null;

    /** Идентификатор МЧД. Если МЧД не приложена, поле отсутствует. */
    #[Serializer\Type('string')]
    public ?string $powerOfAttorneyId = null;
}
