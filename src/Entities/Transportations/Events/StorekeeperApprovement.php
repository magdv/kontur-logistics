<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations\Events;

use JMS\Serializer\Annotation as Serializer;

class StorekeeperApprovement
{
    /** Дата и время действия в UTC. */
    #[Serializer\Type('string')]
    public ?string $dateTimeUtc = null;

    /** Сотрудник склада, выполнивший действие. */
    #[Serializer\Type(Storekeeper::class)]
    public ?Storekeeper $storekeeper = null;
}
