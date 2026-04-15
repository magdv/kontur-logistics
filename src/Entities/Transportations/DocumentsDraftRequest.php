<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Transportations;

class DocumentsDraftRequest
{
    public function __construct(
        public string $draftAction,
        public string $draft,
        public string $draftFileName,
        public ?string $transportationId = null,
        public ?string $initiatorBoxId = null,
        public bool $replaceAttachments = false,
    ) {
    }
}
