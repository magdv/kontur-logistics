<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Mintrans;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\BaseResponse;

class Uuid extends BaseResponse
{
    /**
     * @Serializer\Type("string")
     */
    public ?string $result = null;
}
