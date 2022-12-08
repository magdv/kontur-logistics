<?php

declare(strict_types=1);

namespace MagDv\Logistics\Enums;

class TransportationStatus
{
    public const UNKNOWN = 'Unknown';
    public const NEW_TRANSPORTATION = 'NewTransportation';
    public const REQUESTING_MINTRANS_ID = 'RequestingMintransId';
    public const WAYBILL_RECEPTION_WAIT_CONSIGNOR_SIGNATURE = 'WaybillReceptionWaitConsignorSignature';
    public const WAYBILL_RECEPTION_WAIT_CONSIGNOR_SIGNATURE_DELIVERY = 'WaybillReceptionWaitConsignorSignatureDelivery';
    public const WAYBILL_RECEPTION_WAIT_DRIVER_CONFIRMATION = 'WaybillReceptionWaitDriverConfirmation';
    public const WAYBILL_RECEPTION_WAIT_CONSIGNOR_CONFIRMATION = 'WaybillReceptionWaitConsignorConfirmation';
    public const WAYBILL_RECEPTION_WAIT_CARRIER_SIGNATURE = 'WaybillReceptionWaitCarrierSignature';
    public const WAYBILL_RECEPTION_WAIT_CARRIER_SIGNATURE_DELIVERY = 'WaybillReceptionWaitCarrierSignatureDelivery';
    public const ON_THE_WAY = 'OnTheWay';
    public const WAYBILL_DELIVERY_WAIT_DRIVER_CONFIRMATION = 'WaybillDeliveryWaitDriverConfirmation';
    public const WAYBILL_DELIVERY_WAIT_CONSIGNEE_CONFIRMATION = 'WaybillDeliveryWaitConsigneeConfirmation';
    public const WAYBILL_DELIVERY_WAIT_CONSIGNEE_SIGNATURE = 'WaybillDeliveryWaitConsigneeSignature';
    public const WAYBILL_DELIVERY_WAIT_CONSIGNEE_SIGNATURE_DELIVERY = 'WaybillDeliveryWaitConsigneeSignatureDelivery';
    public const WAYBILL_DELIVERY_WAIT_CARRIER_SIGNATURE = 'WaybillDeliveryWaitCarrierSignature';
    public const WAYBILL_DELIVERY_WAIT_CARRIER_SIGNATURE_DELIVERY = 'WaybillDeliveryWaitCarrierSignatureDelivery';
    public const COMPLETED = 'Completed';
    public const REVOKED = 'Revoked';
    public const WAYBILL_RECEPTION_SIGNATURE_REJECT = 'WaybillReceptionSignatureReject';
    public const ARCHIVED = 'Archived';
    public const TRANSFERRED_TO_ANOTHER_DRIVER = 'TransferredToAnotherDriver';
    public const TRANSFERRED_TO_ANOTHER_CONSIGNEE = 'TransferredToAnotherConsignee';
    public const WAIT_CARRIER_COST_SIGNATURE_DELIVERY = 'WaitCarrierCostSignatureDelivery';
    public const WAIT_CONSIGNOR_COST_SIGNATURE = 'WaitConsignorCostSignature';
    public const WAIT_CONSIGNOR_COST_SIGNATURE_DELIVERY = 'WaitConsignorCostSignatureDelivery';
    public const WAYBILL_CONSIGNOR_COST_SIGNATURE_REJECT = 'WaybillConsignorCostSignatureReject';
    public const INVALID = 'Invalid';
    public const CARRIER_WAITING_FOR_WAYBILL_RECEPTION_SIGNED = 'CarrierWaitingForWaybillReceptionSigned';
    public const CARRIER_WAITING_FOR_WAYBILL_DELIVERY_SIGNED = 'CarrierWaitingForWaybillDeliverySigned';
}
