<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class PowerOfAttorneyStatus
{
    /**
     * Тип статуса проверки МЧД.
     *
     * Возможные значения: UnknownStatus, CanNotBeValidated, IsValid,
     * IsNotValid, ValidationError, HasWarnings.
     */
    #[Serializer\Type('string')]
    public ?string $validationStatus = null;

    /** Человекочитаемый текст статуса. */
    #[Serializer\Type('string')]
    public ?string $statusText = null;

    /** Ошибки при проверке машиночитаемой доверенности. @var string[]|null */
    #[Serializer\Type('array<string>')]
    public ?array $errors = null;
}
