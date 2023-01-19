<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class MintransStatus
{
    /**
     * @Serializer\Type("string")
     * @var null|string $id
     */
    public $id;

    /**
     * @Serializer\Type("string")
     * @var null|int $status
     */
    public $status;

    /**
     * @Serializer\Type("string")
     * @var null|string $statusDescription
     */
    public $statusDescription;

    /**
     * @Serializer\Type("bool")
     * @var null|bool $hasErrors
     */
    public $hasErrors;

    /**
     * @Serializer\Type("string")
     * @var null|string $errorsDescription
     */
    public $errorsDescription;
}
