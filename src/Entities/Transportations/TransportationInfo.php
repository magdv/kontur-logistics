<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class TransportationInfo
{
    /**
     * @Serializer\Type("string")
     */
    public ?string $id = null;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Participants")
     */
    public ?Participants $participants = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $status = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $statusDescription = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $created = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $lastModified = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $deliveryAddress = null;

    /**
     * @Serializer\Type("string")
     */
    public ?string $receptionAddress = null;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Document")
     */
    public ?Document $orderDocument = null;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Document")
     */
    public ?Document $waybillDocument = null;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\MintransStatus")
     */
    public ?MintransStatus $mintransStatus = null;
}
