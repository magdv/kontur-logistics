<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class TransportationInfo
{
    /**
     * @Serializer\Type("string")
     * @var null|string $id
     */
    public $id;

    /**
     * @var null|\MagDv\Logistics\Entities\Transportations\Participants $participants
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Participants")
     */
    public $participants;

    /**
     * @Serializer\Type("string")
     * @var string $status
     */
    public $status;

    /**
     * @Serializer\Type("string")
     * @var null|string $statusDescription
     */
    public $statusDescription;

    /**
     * @Serializer\Type("string")
     * @var null|string $created
     */
    public $created;

    /**
     * @Serializer\Type("string")
     * @var null|string $lastModified
     */
    public $lastModified;

    /**
     * @Serializer\Type("string")
     * @var null|string $deliveryAddress
     */
    public $deliveryAddress;

    /**
     * @Serializer\Type("string")
     * @var null|string $receptionAddress
     */
    public $receptionAddress;

    /**
     * @var null|\MagDv\Logistics\Entities\Transportations\Document $orderDocument
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Document")
     */
    public $orderDocument;

    /**
     * @var null|\MagDv\Logistics\Entities\Transportations\Document $waybillDocument
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Document")
     */
    public $waybillDocument;

    /**
     * @var null|\MagDv\Logistics\Entities\Transportations\MintransStatus|null $mintransStatus
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\MintransStatus")
     */
    public $mintransStatus;
}
