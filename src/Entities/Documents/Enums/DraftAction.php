<?php

declare(strict_types=1);

namespace MagDv\Logistics\Entities\Documents\Enums;

final class DraftAction
{
    /**
     * Сохранение черновика в ящик отправителя
     * @var string
     **/
    public const SAVED_DRAFT = 'SavedDraft';

    /**
     * Отправка черновика в Диадок в виде исходящего неотправленного документа
     * @var string
     */
    public const APPROVED_FOR_SIGNATURE = 'ApprovedForSignature';
}
