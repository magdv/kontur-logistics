<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Organization
{
    /**
     * @Serializer\Type("string")
     * @var null|string $diadocBoxId
     */
    public $diadocBoxId;

    /**
     * @Serializer\Type("string")
     * @var null|string $name
     */
    public $name;

    /**
     * @Serializer\Type("string")
     * @var null|string $inn
     */
    public $inn;

    /**
     * @Serializer\Type("string")
     * @var null|string $kpp
     */
    public $kpp;

    /**
     * @Serializer\Type("string")
     * @var null|string $role
     */
    public $role;
}
