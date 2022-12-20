<?php

declare(strict_types=1);

namespace Test\base;

use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        $params = parse_ini_file(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . '.env');

        foreach ($params as $name => $value) {
            putenv($name . '=' . $value);
        }
    }
}
