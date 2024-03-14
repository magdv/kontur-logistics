<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\Errors\Error;

class BaseResponse
{
    #[Serializer\Type('int')]
    public ?int $statusCode = null;
    #[Serializer\Type('string')]
    public ?int $code = null;
    #[Serializer\Type('string')]
    public ?string $traceId = null;
    #[Serializer\Type(Error::class)]
    public ?Error $error = null;
    public function isOk(): bool
    {
        return $this->statusCode >= 200 && $this->statusCode < 300;
    }
}
