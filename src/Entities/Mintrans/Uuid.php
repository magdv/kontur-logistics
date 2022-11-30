<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Mintrans;

class Uuid
{
    /** @var string */
    public $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }
}