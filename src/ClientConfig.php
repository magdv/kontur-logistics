<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Visitor\Factory\JsonSerializationVisitorFactory;
use MagDv\Logistics\Interfaces\ClientConfigInterface;

abstract class ClientConfig implements ClientConfigInterface
{
    public function getSerializer(): Serializer
    {
        $serializer = SerializerBuilder::create()->setPropertyNamingStrategy(
            new SerializedNameAnnotationStrategy(
                new IdenticalPropertyNamingStrategy()
            )
        )
            ->setSerializationVisitor(
                'json',
                (new JsonSerializationVisitorFactory())
                    ->setOptions(
                        JSON_UNESCAPED_UNICODE | JSON_PRESERVE_ZERO_FRACTION | ($this->getIsDebug() ? JSON_PRETTY_PRINT : 0)
                    )
            )
            ->addDefaultDeserializationVisitors()
            ->setDebug($this->getIsDebug());

        if ($this->getCachePath() !== null) {
            $serializer->setCacheDir($this->getCachePath());
        }

        return $serializer->build();
    }

    abstract public function getCachePath(): ?string;

    abstract public function getIsDebug(): bool;
}
