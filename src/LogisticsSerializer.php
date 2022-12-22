<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use MagDv\Logistics\Interfaces\LogisticsSerializerInterface;

abstract class LogisticsSerializer implements LogisticsSerializerInterface
{
    public function getSerializer(): SerializerInterface
    {
        $serializer = SerializerBuilder::create()->setPropertyNamingStrategy(
            new SerializedNameAnnotationStrategy(
                new IdenticalPropertyNamingStrategy()
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
