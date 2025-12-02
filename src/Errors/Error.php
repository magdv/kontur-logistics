<?php

declare(strict_types=1);

namespace MagDv\Logistics\Errors;

use JMS\Serializer\Annotation as Serializer;

class Error
{
    #[Serializer\Type('string')]
    public ?string $code = null;

    #[Serializer\Type('string')]
    public ?string $message = null;

    #[Serializer\Type('string')]
    public ?string $target = null;

    /** @var Details[] */
    #[Serializer\Type('array<' . Details::class . '>')]
    public ?array $details = null;

    /**
     * На случай, если потребуется поучить полный список ошибок в виде текста с деталями
     */
    public function getAllErrorMessagesByJsonString(): ?string
    {
        $message = $this->message;
        if ($message !== null) {
            $message = json_encode(
                array_merge(
                    [
                        [
                            'target' => $this->target,
                            'message' => $this->message,
                        ]
                    ],
                    (array)$this->details
                ),
                JSON_THROW_ON_ERROR | JSON_BIGINT_AS_STRING | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            );
        }

        return $message;
    }
}
