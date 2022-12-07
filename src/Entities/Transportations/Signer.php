<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

use JMS\Serializer\Annotation as Serializer;

class Signer
{
    /**
     * @Serializer\Type("string")
     * @var string $lastName
     */
    public $lastName;

    /**
     * @Serializer\Type("string")
     * @var string $firstName
     */
    public $firstName;

    /**
     * @Serializer\Type("string")
     * @var string $middleName
     */
    public $middleName;

    /**
     * @Serializer\Type("string")
     * @var string $position
     */
    public $position;

    /**
     * @Serializer\Type("bool")
     * @var bool $isDriver
     */
    public $isDriver;

    /**
     * @Serializer\Type("string")
     * @var string $phone
     */
    public $phone;

    /**
     * @Serializer\Type("string")
     * @var string $driverLicense
     */
    public $driverLicense;
}
