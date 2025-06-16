<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Documents;

class CreateWaybillDraftRequest
{
    public ?string $draft = null;

    public ?string $draftFileName = null;

    public ?string $draftAction = null;

    public ?string $transportationId = null;
}
