<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\BaseResponse;

class TrasportationResponse extends BaseResponse
{
    #[Serializer\Type(TransportationInfo::class)]
    public ?TransportationInfo $transportationInfo = null;
    #[Serializer\Type(DocumentInfo::class)]
    public ?DocumentInfo $documentInfo = null;
}
