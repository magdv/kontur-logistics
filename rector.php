<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Php74\Rector\Assign\NullCoalescingOperatorRector;
use Rector\Php74\Rector\MethodCall\ChangeReflectionTypeToStringToGetNameRector;
use Rector\Php74\Rector\Property\RestoreDefaultNullToNullableTypePropertyRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromAssignsRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
use Rector\TypeDeclaration\Rector\Property\VarAnnotationIncorrectNullableRector;

return static function (RectorConfig $rectorConfig): void {

    // register a single rule
    $rectorConfig->rules(
        [
            InlineConstructorDefaultToPropertyRector::class,
            ChangeReflectionTypeToStringToGetNameRector::class,
            NullCoalescingOperatorRector::class,
            TypedPropertyFromStrictConstructorRector::class,
            RestoreDefaultNullToNullableTypePropertyRector::class,
            VarAnnotationIncorrectNullableRector::class
        ]
    );

    $rectorConfig->ruleWithConfiguration(TypedPropertyFromAssignsRector::class, ['inlinePublic' => true]);

    // define sets of rules
    $rectorConfig->sets(
        [
            LevelSetList::UP_TO_PHP_74,
            SetList::CODE_QUALITY,
            SetList::CODING_STYLE,
            SetList::PHP_74,
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
