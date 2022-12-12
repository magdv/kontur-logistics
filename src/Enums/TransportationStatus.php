<?php

declare(strict_types=1);

namespace MagDv\Logistics\Enums;

// Некоторые подписи я придумал сам, т.к. нет нигде их описания
class TransportationStatus
{
    /**
     * Неизвестно
     */
    public const UNKNOWN = 'Unknown';
    /**
     * Создается на сервере
     */
    public const NEW_TRANSPORTATION = 'NewTransportation';
    /**
     * Обработка ФГИС Минтранс
     */
    public const REQUESTING_MINTRANS_ID = 'RequestingMintransId';
    /**
     * На подписи Грузоотправителя
     */
    public const WAYBILL_RECEPTION_WAIT_CONSIGNOR_SIGNATURE = 'WaybillReceptionWaitConsignorSignature';
    /**
     * Обработка подписи грузоотправителя
     */
    public const WAYBILL_RECEPTION_WAIT_CONSIGNOR_SIGNATURE_DELIVERY = 'WaybillReceptionWaitConsignorSignatureDelivery';
    /**
     * На подтверждении водителем
     */
    public const WAYBILL_RECEPTION_WAIT_DRIVER_CONFIRMATION = 'WaybillReceptionWaitDriverConfirmation';
    /**
     * На подтверждении Кладовщиком
     */
    public const WAYBILL_RECEPTION_WAIT_CONSIGNOR_CONFIRMATION = 'WaybillReceptionWaitConsignorConfirmation';
    /**
     * На подписи Перевозчика
     */
    public const WAYBILL_RECEPTION_WAIT_CARRIER_SIGNATURE = 'WaybillReceptionWaitCarrierSignature';
    /**
     * Обработка подписи Перевозчика
     */
    public const WAYBILL_RECEPTION_WAIT_CARRIER_SIGNATURE_DELIVERY = 'WaybillReceptionWaitCarrierSignatureDelivery';
    /**
     * В пути
     */
    public const ON_THE_WAY = 'OnTheWay';
    /**
     * На подписи Водителем
     */
    public const WAYBILL_DELIVERY_WAIT_DRIVER_CONFIRMATION = 'WaybillDeliveryWaitDriverConfirmation';
    /**
     * На подтверждении Кладовщиком (выгрузка)
     */
    public const WAYBILL_DELIVERY_WAIT_CONSIGNEE_CONFIRMATION = 'WaybillDeliveryWaitConsigneeConfirmation';
    /**
     * На подписи Грузополучателя
     */
    public const WAYBILL_DELIVERY_WAIT_CONSIGNEE_SIGNATURE = 'WaybillDeliveryWaitConsigneeSignature';
    /**
     * Обработка подписи Грузополучателя
     */
    public const WAYBILL_DELIVERY_WAIT_CONSIGNEE_SIGNATURE_DELIVERY = 'WaybillDeliveryWaitConsigneeSignatureDelivery';
    /**
     * На подписи Перевозчика (выгрузка)
     */
    public const WAYBILL_DELIVERY_WAIT_CARRIER_SIGNATURE = 'WaybillDeliveryWaitCarrierSignature';
    /**
     * Обработка подписи Перевозчика
     */
    public const WAYBILL_DELIVERY_WAIT_CARRIER_SIGNATURE_DELIVERY = 'WaybillDeliveryWaitCarrierSignatureDelivery';
    /**
     * Завершен
     */
    public const COMPLETED = 'Completed';
    /**
     * Отказ в подписи на выгрузке
     */
    public const WAYBILL_DELIVERY_SIGNATURE_REJECT = 'WaybillDeliverySignatureReject';
    /**
     * Аннулирован
     */
    public const REVOKED = 'Revoked';
    /**
     * Отказ в подписи на погрузке
     */
    public const WAYBILL_RECEPTION_SIGNATURE_REJECT = 'WaybillReceptionSignatureReject';
    /**
     * В архиве
     */
    public const ARCHIVED = 'Archived';
    /**
     * Передано другому водителю
     */
    public const TRANSFERRED_TO_ANOTHER_DRIVER = 'TransferredToAnotherDriver';
    /**
     * Передано другому Получателю
     */
    public const TRANSFERRED_TO_ANOTHER_CONSIGNEE = 'TransferredToAnotherConsignee';
    /**
     * Ожидание подписи COST накладная доставки перевозчика
     */
    public const WAIT_CARRIER_COST_SIGNATURE_DELIVERY = 'WaitCarrierCostSignatureDelivery';
    /**
     * Ожидание подписи COST накладная отправителя
     */
    public const WAIT_CONSIGNOR_COST_SIGNATURE = 'WaitConsignorCostSignature';
    /**
     * Ожидание подписи COST накладная доставки отправителя
     */
    public const WAIT_CONSIGNOR_COST_SIGNATURE_DELIVERY = 'WaitConsignorCostSignatureDelivery';
    /**
     * Отклонена COST накладная отправителя
     */
    public const WAYBILL_CONSIGNOR_COST_SIGNATURE_REJECT = 'WaybillConsignorCostSignatureReject';
    /**
     * Ошибка в ТРН
     */
    public const INVALID = 'Invalid';
    /**
     * Перевозчик ожидает подписи выписки накладной
     */
    public const CARRIER_WAITING_FOR_WAYBILL_RECEPTION_SIGNED = 'CarrierWaitingForWaybillReceptionSigned';
    /**
     * Перевозчик ожидает подписи накладной
     */
    public const CARRIER_WAITING_FOR_WAYBILL_DELIVERY_SIGNED = 'CarrierWaitingForWaybillDeliverySigned';

    /**
     * Получить список
     * @return array
     */
    public function getList(): array
    {

        return [
            self::UNKNOWN => 'Неизвестно',
            self::NEW_TRANSPORTATION => 'Создается на сервере',
            self::REQUESTING_MINTRANS_ID => 'Обработка ФГИС Минтранс',
            self::WAYBILL_RECEPTION_WAIT_CONSIGNOR_SIGNATURE => 'На подписи Грузоотправителя',
            self::WAYBILL_RECEPTION_WAIT_CONSIGNOR_SIGNATURE_DELIVERY => 'Обработка подписи грузоотправителя',
            self::WAYBILL_RECEPTION_WAIT_DRIVER_CONFIRMATION => 'На подтверждении водителем',
            self::WAYBILL_RECEPTION_WAIT_CONSIGNOR_CONFIRMATION => 'На подтверждении Кладовщиком',
            self::WAYBILL_RECEPTION_WAIT_CARRIER_SIGNATURE => 'На подписи Перевозчика',
            self::WAYBILL_RECEPTION_WAIT_CARRIER_SIGNATURE_DELIVERY => 'Обработка подписи Перевозчика',
            self::ON_THE_WAY => 'В пути',
            self::WAYBILL_DELIVERY_WAIT_DRIVER_CONFIRMATION => 'На подписи Водителем',
            self::WAYBILL_DELIVERY_WAIT_CONSIGNEE_CONFIRMATION => 'На подтверждении Кладовщиком (выгрузка)',
            self::WAYBILL_DELIVERY_WAIT_CONSIGNEE_SIGNATURE => 'На подписи Грузополучателя',
            self::WAYBILL_DELIVERY_WAIT_CONSIGNEE_SIGNATURE_DELIVERY => 'Обработка подписи Грузополучателя',
            self::WAYBILL_DELIVERY_WAIT_CARRIER_SIGNATURE => 'На подписи Перевозчика (выгрузка)',
            self::WAYBILL_DELIVERY_WAIT_CARRIER_SIGNATURE_DELIVERY => 'Обработка подписи Перевозчика',
            self::COMPLETED => 'Завершен',
            self::REVOKED => 'Аннулирован',
            self::WAYBILL_RECEPTION_SIGNATURE_REJECT => 'Отказ в подписи на погрузке',
            self::ARCHIVED => 'В архиве',
            self::TRANSFERRED_TO_ANOTHER_DRIVER => 'Передано другому водителю',
            self::TRANSFERRED_TO_ANOTHER_CONSIGNEE => 'Передано другому Получателю',
            self::WAIT_CARRIER_COST_SIGNATURE_DELIVERY => 'Ожидание подписи COST накладная доставки перевозчика',
            self::WAIT_CONSIGNOR_COST_SIGNATURE => 'Ожидание подписи COST накладная отправителя',
            self::WAIT_CONSIGNOR_COST_SIGNATURE_DELIVERY => 'Ожидание подписи COST накладная доставки отправителя',
            self::WAYBILL_CONSIGNOR_COST_SIGNATURE_REJECT => 'Отклонена COST накладная отправителя',
            self::INVALID => 'Ошибка в ТРН',
            self::CARRIER_WAITING_FOR_WAYBILL_RECEPTION_SIGNED => 'Перевозчик ожидает подписи выписки накладной',
            self::CARRIER_WAITING_FOR_WAYBILL_DELIVERY_SIGNED => 'Перевозчик ожидает подписи накладной',
            self::WAYBILL_DELIVERY_SIGNATURE_REJECT => 'Отказ в подписи на выгрузке'
        ];
    }

    /**
     * Получить название
     *
     * @param string $status
     * @return string
     */
    public function getName(string $status): ?string
    {
        return $this->getList()[$status] ?? null;
    }
}
