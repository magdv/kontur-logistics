<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Title
{
    /**
     * @Serializer\Type("string")
     * @var string $id
     */
    public $id;

    /**
     * @Serializer\Type("string")
     * @var string $type
     */
    public $type;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Signer")
     * @var \MagDv\Logistics\Entities\Transportations\Signer $signer
     */
    public $signer;

    /**
     * @Serializer\Type("bool")
     * @var bool $isSignatureRejected
     */
    public $isSignatureRejected;

    /**
     * @Serializer\Type("string")
     * @var string $createdAt
     */
    public $createdAt;
}
