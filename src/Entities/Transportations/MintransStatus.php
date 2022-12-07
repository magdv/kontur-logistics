<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class MintransStatus
{
    /**
     * @Serializer\Type("string")
     * @var string $id
     */
    public $id;

    /**
     * @Serializer\Type("string")
     * @var int $status
     */
    public $status;

    /**
     * @Serializer\Type("string")
     * @var string $statusDescription
     */
    public $statusDescription;

    /**
     * @Serializer\Type("bool")
     * @var bool $hasErrors
     */
    public $hasErrors;

    /**
     * @Serializer\Type("string")
     * @var string $errorsDescription
     */
    public $errorsDescription;
}
