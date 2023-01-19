<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Title
{
    /**
     * @Serializer\Type("string")
     * @var null|string $id
     */
    public $id;

    /**
     * @Serializer\Type("string")
     * @var null|string $type
     */
    public $type;

    /**
     * @Serializer\Type("MagDv\Logistics\Entities\Transportations\Signer")
     * @var null|\MagDv\Logistics\Entities\Transportations\Signer $signer
     */
    public $signer;

    /**
     * @Serializer\Type("bool")
     * @var null|bool $isSignatureRejected
     */
    public $isSignatureRejected;

    /**
     * @Serializer\Type("string")
     * @var null|string $createdAt
     */
    public $createdAt;
}
