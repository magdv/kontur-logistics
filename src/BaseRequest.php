<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Exception\LogisticsApiException;
use MagDv\Logistics\Interfaces\HttpClientInterface;
use MagDv\Logistics\Interfaces\LogisticsSerializerInterface;
use Psr\Http\Client\ClientExceptionInterface;
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

    /** @var string */
    protected $url;
    /**
     * @var \JMS\Serializer\SerializerInterface
     */
    protected $serializer;

    public function __construct(
        HttpClientInterface $client,
        string $apiKey,
        LogisticsSerializerInterface $serializer,
        string $url = 'https://logist-api.kontur.ru/'
    ) {
        $this->apikey = $apiKey;
        $this->url = $url;
        $this->client = $client->getClient();
        $this->serializer = $serializer->getSerializer();
    }

    protected function send(RequestInterface $request): ResponseInterface
    {
        try {
            $req = $request->withAddedHeader('x-kontur-apikey', $this->apikey);
            $response = $this->client->sendRequest($req);
        } catch (ClientExceptionInterface $e) {
            throw new LogisticsApiException('Logistics client exception: ' . $e->getMessage(), $e->getCode(), $e);
        }

        return $response;
    }
}
