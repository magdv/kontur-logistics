<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use JMS\Serializer\Annotation as Serializer;

class BaseResponse
{
    /**
     * @Serializer\Type("int")
     * @var int
     */
    public $statusCode;
    /**
     * @Serializer\Type("string")
     * @var string
     */
    public $traceId;
    /**
     * @Serializer\Type("MagDv\Logistics\Errors\Error")
     * @var \MagDv\Logistics\Errors\Error
     */
    public $error;
}
