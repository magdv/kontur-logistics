<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use MagDv\Logistics\Exception\LogisticsApiException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class BaseRequest
{
    /**
     * @var \Psr\Http\Client\ClientInterface
     */
    private $client;

    /** @var string */
    private $apikey;

    /** @var string  */
    protected $url;
    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    protected $serializer;

    public function __construct(
        ClientInterface $client,
        string $apiKey,
        ?string $serializerCachePath,
        string $url = 'https://logist-api.kontur.ru/',
        bool $serializerDebug = false
    ) {
        $this->apikey = $apiKey;
        $this->url = $url;
        $this->client = $client;
        $this->serializer = $this->createSerializer($serializerCachePath, $serializerDebug);
    }

    protected function send(RequestInterface $request): ResponseInterface
    {
        try {
            $req = $request->withAddedHeader('x-kontur-apikey', $this->apikey);
            $response = $this->client->sendRequest($req);
        } catch (ClientExceptionInterface $e) {
            throw new LogisticsApiException('Logistics client exception while sendRequest : ' . $e->getMessage());
        }

        return $response;
    }

    /**
     * @param string|null $serializerCachePath
     * @param bool $debug
     * @return \JMS\Serializer\SerializerInterface
     */
    private function createSerializer(?string $serializerCachePath, bool $debug): SerializerInterface
    {
        $serializer = SerializerBuilder::create()->setPropertyNamingStrategy(
            new SerializedNameAnnotationStrategy(
                new IdenticalPropertyNamingStrategy()
            )
        )
            ->addDefaultDeserializationVisitors()
            ->setDebug($debug);

        if ($serializerCachePath !== null) {
            $serializer->setCacheDir($serializerCachePath);
        }

        return $serializer->build();
    }
}
