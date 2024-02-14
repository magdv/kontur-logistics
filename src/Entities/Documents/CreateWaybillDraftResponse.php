<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Documents;

use JMS\Serializer\Annotation as Serializer;
use MagDv\Logistics\BaseResponse;

class CreateWaybillDraftResponse extends BaseResponse
{
    #[Serializer\Type("string")]
    public ?string $transportationId = null;

    #[Serializer\Type("string")]
    public ?string $draftId = null;
}
