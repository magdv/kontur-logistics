<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class DetailsExtended
{
    /** Признак черновика. Для события TransportationCreated. */
    #[Serializer\Type('bool')]
    public ?bool $isDraft = null;

    /** Идентификатор черновика. Для событий TransportationCreated и DraftAction. */
    #[Serializer\Type('string')]
    public ?string $draftId = null;

    /** Признак восстановления из архива. Для события TransportationArchiveEvent. */
    #[Serializer\Type('bool')]
    public ?bool $isRestoredFromArchive = null;

    /**
     * Адрес доставки.
     *
     * @deprecated Используй ReaddressSignedByCarrierEventDetails::$deliveryAddress.
     */
    #[Serializer\Type('string')]
    public ?string $deliveryAddress = null;

    /**
     * Идентификатор нового получателя.
     *
     * @deprecated Используй ReaddressSignedByCarrierEventDetails::$consigneeBoxId.
     */
    #[Serializer\Type('string')]
    public ?string $consigneeBoxId = null;

    /** Идентификатор другого черновика, в котором продолжено редактирование текущего. */
    #[Serializer\Type('string')]
    public ?string $continuedInDraftId = null;

    /**
     * Результат согласования или подтверждения водителем.
     * Заполняется для событий DraftAction и DocumentApprovedByDriver.
     */
    #[Serializer\Type(DriverApprovement::class)]
    public ?DriverApprovement $driverApprovement = null;

    /**
     * Сведения о сотруднике склада, передавшем титул на подпись или водителю на согласование.
     * Заполняется для DraftAction с действиями ApprovedForSignature и PassedForDriverApproval.
     */
    #[Serializer\Type(StorekeeperApprovement::class)]
    public ?StorekeeperApprovement $storekeeperApprovement = null;

    /**
     * Действие с черновиком.
     * Возможные значения: SavedDraft, PassedForDriverApproval, ApprovedByDriver,
     * ApprovedForSignature, ContinuedInOtherDraft, ResolvedAndSigned, Cancelled.
     */
    #[Serializer\Type('string')]
    public ?string $draftActionType = null;

    /** Идентификатор ящика Диадока, из которого был переслан документ. Для события DocumentForwarded. */
    #[Serializer\Type('string')]
    public ?string $senderBoxId = null;

    /** Идентификатор ящика Диадока, в который был переслан документ. Для события DocumentForwarded. */
    #[Serializer\Type('string')]
    public ?string $recipientBoxId = null;

    /**
     * Тип приемки при выгрузке.
     *
     * @deprecated Используй DocumentSignedBySenderEventDetails::$deliveryType.
     */
    #[Serializer\Type('string')]
    public ?string $deliveryType = null;

    /** Данные о подписании титула отправителем. */
    #[Serializer\Type(DocumentSignedBySenderEventDetails::class)]
    public ?DocumentSignedBySenderEventDetails $documentSignedBySenderEventDetails = null;

    /** Данные о подписании титула получателем. */
    #[Serializer\Type(DocumentSignedByRecipientEventDetails::class)]
    public ?DocumentSignedByRecipientEventDetails $documentSignedByRecipientEventDetails = null;

    /** Данные об отказе в подписании титула. */
    #[Serializer\Type(SignatureRejectedEventDetails::class)]
    public ?SignatureRejectedEventDetails $signatureRejectedEventDetails = null;

    /** Результат обработки машиночитаемой доверенности. */
    #[Serializer\Type(PowerOfAttorneyProcessedEventDetails::class)]
    public ?PowerOfAttorneyProcessedEventDetails $powerOfAttorneyProcessedEventDetails = null;

    /** УИД перевозки, присвоенный Минтрансом (ГИС ЭПД). */
    #[Serializer\Type(MintransIdReceivedEventDetails::class)]
    public ?MintransIdReceivedEventDetails $mintransIdReceivedEventDetails = null;

    /** Данные переадресовки, инициированной грузоотправителем. */
    #[Serializer\Type(ReaddressInitiatedByConsignorEventDetails::class)]
    public ?ReaddressInitiatedByConsignorEventDetails $readdressInitiatedByConsignorEventDetails = null;

    /** Детали переадресовки, согласованной перевозчиком. */
    #[Serializer\Type(ReaddressSignedByCarrierEventDetails::class)]
    public ?ReaddressSignedByCarrierEventDetails $readdressSignedByCarrierEventDetails = null;

    /** Информационные поля перевозки с указанием типов титулов. @var InfoFieldsByTitle[]|null */
    #[Serializer\Type('array<' . InfoFieldsByTitle::class . '>')]
    public ?array $infoFieldsByTitles = null;
}
