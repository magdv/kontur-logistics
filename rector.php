<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Php74\Rector\Assign\NullCoalescingOperatorRector;
use Rector\Php74\Rector\Property\RestoreDefaultNullToNullableTypePropertyRector;
use Rector\Php84\Rector\Param\ExplicitNullableParamTypeRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromAssignsRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;

return static function (RectorConfig $rectorConfig): void {

    // register a single rule
    $rectorConfig->rules(
        [
            InlineConstructorDefaultToPropertyRector::class,
            NullCoalescingOperatorRector::class,
            TypedPropertyFromStrictConstructorRector::class,
            RestoreDefaultNullToNullableTypePropertyRector::class,
            ExplicitNullableParamTypeRector::class,
        ]
    );

    $rectorConfig->ruleWithConfiguration(TypedPropertyFromAssignsRector::class, ['inlinePublic' => true]);

    // define sets of rules
    $rectorConfig->sets(
        [
            LevelSetList::UP_TO_PHP_84,
            SetList::CODE_QUALITY,
            SetList::CODING_STYLE,
            SetList::PHP_80,
            SetList::DEAD_CODE
        ]
    );

    $rectorConfig->paths(
        [
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ]
    );
};
