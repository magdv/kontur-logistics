<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class Storekeeper
{
    /** Идентификатор пользователя. */
    #[Serializer\Type('string')]
    public ?string $userId = null;

    /** Фамилия. Отсутствует, если сотрудника уже нет в справочнике. */
    #[Serializer\Type('string')]
    public ?string $lastName = null;

    /** Имя. Отсутствует, если сотрудника уже нет в справочнике. */
    #[Serializer\Type('string')]
    public ?string $firstName = null;

    /** Отчество. Отсутствует, если сотрудника уже нет в справочнике. */
    #[Serializer\Type('string')]
    public ?string $middleName = null;
}
