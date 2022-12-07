<?php

declare(strict_types=1);

namespace Test\base;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
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

    protected function createSerializer(): SerializerInterface
    {
        return SerializerBuilder::create()->setPropertyNamingStrategy(
            new SerializedNameAnnotationStrategy(
                new IdenticalPropertyNamingStrategy()
            )
        )
            ->addDefaultDeserializationVisitors()
            ->setDebug(true)
            ->build();
    }
}
