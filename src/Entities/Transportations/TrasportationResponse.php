<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\BaseResponse;

class TrasportationResponse extends BaseResponse
{
    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\TransportationInfo")
     */
    public ?TransportationInfo $transportationInfo = null;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\DocumentInfo")
     */
    public ?DocumentInfo $documentInfo = null;
}
