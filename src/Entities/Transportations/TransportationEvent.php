<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\Entities\Transportations\Events\EventDetails;

class TransportationEvent
{
    /** Идентификатор события. */
    #[Serializer\Type('string')]
    public ?string $id = null;

    /** Идентификатор перевозки. */
    #[Serializer\Type('string')]
    public ?string $transportationId = null;

    /** Дата-время события в UTC. */
    #[Serializer\Type('string')]
    public ?string $dateTimeUtc = null;

    /** Детали события. */
    #[Serializer\Type(EventDetails::class)]
    public ?EventDetails $details = null;

    /**
     * Новый статус перевозки.
     *
     * Возможные значения: Unknown, NewTransportation, RequestingMintransId,
     * WaybillReceptionWaitConsignorSignature, WaybillReceptionWaitConsignorSignatureDelivery,
     * WaybillReceptionWaitDriverConfirmation, WaybillReceptionWaitConsignorConfirmation,
     * WaybillReceptionWaitCarrierSignature, WaybillReceptionWaitCarrierSignatureDelivery,
     * OnTheWay, WaybillDeliveryWaitDriverConfirmation, WaybillDeliveryWaitConsigneeConfirmation,
     * WaybillDeliveryWaitConsigneeSignature, WaybillDeliveryWaitConsigneeSignatureDelivery,
     * WaybillDeliveryWaitCarrierSignature, WaybillDeliveryWaitCarrierSignatureDelivery,
     * Completed, Revoked, WaybillReceptionSignatureReject, Archived,
     * TransferredToAnotherDriver, TransferredToAnotherConsignee, WaitCarrierCostSignatureDelivery,
     * WaitConsignorCostSignature, WaitConsignorCostSignatureDelivery,
     * WaybillConsignorCostSignatureReject, WaybillReceptionForOtherOrgWaitConsignorConfirmation,
     * WaybillReceptionForOtherOrgWaitConsigneeConfirmation, WaybillReceptionForOtherOrgWaitCarrierConfirmation,
     * Invalid, CarrierWaitingForWaybillReceptionSigned, CarrierWaitingForWaybillDeliverySigned,
     * PartialDeliveryWaitCarrierReaddressSign, DeliveryRejectedWaitCarrierReaddressSign,
     * WaitCarrierReaddressResponse, ReaddressRejected.
     */
    #[Serializer\Type('string')]
    public ?string $newStatus = null;

    /**
     * Тип события.
     *
     * Возможные значения: TransportationCreated, DocumentSignedBySender,
     * DocumentSignedByRecipient, DraftAction, TransportationArchiveEvent,
     * DocumentApprovedByDriver, RelaySigned, ReaddressSigned, DocumentForwarded,
     * PowerOfAttorneyProcessed, SignatureRejected, MintransIdReceived, ReaddressInitiated.
     */
    #[Serializer\Type('string')]
    public ?string $eventType = null;
}
