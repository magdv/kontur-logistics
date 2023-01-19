<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Driver
{
    /**
     * @Serializer\Type("string")
     * @var null|string $lastName
     */
    public $lastName;

    /**
     * @Serializer\Type("string")
     * @var null|string $firstName
     */
    public $firstName;

    /**
     * @Serializer\Type("string")
     * @var null|string $middleName
     */
    public $middleName;

    /**
     * @Serializer\Type("string")
     * @var null|string $licenseId
     */
    public $licenseId;

    /**
     * @Serializer\Type("string")
     * @var null|string $phone
     */
    public $phone;
}
