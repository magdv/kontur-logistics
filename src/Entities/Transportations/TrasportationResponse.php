<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\BaseResponse;

class TrasportationResponse extends BaseResponse
{
    /**
     * @var null|\MagDv\Logistics\Entities\Transportations\TransportationInfo
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\TransportationInfo")
     */
    public $transportationInfo;
    /**
     * @var null|\MagDv\Logistics\Entities\Transportations\DocumentInfo
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\DocumentInfo")
     */
    public $documentInfo;
}
