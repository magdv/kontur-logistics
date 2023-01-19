<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use MagDv\Logistics\BaseResponse;
use JMS\Serializer\Annotation as Serializer;

final class PrintFormResponse extends BaseResponse
{
    /**
     * @Serializer\Type("string")
     * @var null|string $data
     */
    public $data;
    /**
     * @Serializer\Type("string")
     * @var null|string $type
     */
    public $type;
    /**
     * @Serializer\Type("string")
     * @var null|string $fileName
     */
    public $fileName;
}
