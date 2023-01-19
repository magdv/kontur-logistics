<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Approval
{
    /**
     * @Serializer\Type("string")
     * @var null|string $type
     */
    public $type;

    /**
     * @Serializer\Type("string")
     * @var null|string$dateTime
     */
    public $dateTime;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Signer")
     * @var null|\MagDv\Logistics\Entities\Transportations\Signer $signer
     */
    public $signer;

    /**
     * @Serializer\Type("string")
     * @var null|string $comment
     */
    public $comment;

    /**
     * @Serializer\Type("bool")
     * @var null|bool $isRejected
     */
    public $isRejected;
}
