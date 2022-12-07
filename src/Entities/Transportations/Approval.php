<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Approval
{
    /**
     * @Serializer\Type("string")
     * @var string $type
     */
    public $type;

    /**
     * @Serializer\Type("string")
     * @var string$dateTime
     */
    public $dateTime;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Signer")
     * @var \MagDv\Logistics\Entities\Transportations\Signer $signer
     */
    public $signer;

    /**
     * @Serializer\Type("string")
     * @var string $comment
     */
    public $comment;

    /**
     * @Serializer\Type("bool")
     * @var bool $isRejected
     */
    public $isRejected;
}
