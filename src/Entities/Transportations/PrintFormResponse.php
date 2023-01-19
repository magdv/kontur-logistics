<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use MagDv\Logistics\BaseResponse;
use JMS\Serializer\Annotation as Serializer;

final class PrintFormResponse extends BaseResponse
{
    /**
     * @Serializer\Type("string")
     * @var string $data
     */
    public $data;
    /**
     * @Serializer\Type("string")
     * @var string $type
     */
    public $type;
    /**
     * @Serializer\Type("string")
     * @var string $fileName
     */
    public $fileName;
}
