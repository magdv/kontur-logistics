<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Signer
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
     * @var null|string $position
     */
    public $position;

    /**
     * @Serializer\Type("bool")
     * @var null|bool $isDriver
     */
    public $isDriver;

    /**
     * @Serializer\Type("string")
     * @var null|string $phone
     */
    public $phone;

    /**
     * @Serializer\Type("string")
     * @var null|string $driverLicense
     */
    public $driverLicense;
}
