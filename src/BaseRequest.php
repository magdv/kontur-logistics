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
    private \Psr\Http\Client\ClientInterface $client;

    private string $apikey;

    protected string $url;

    protected \JMS\Serializer\Serializer $serializer;

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
        } catch (ClientExceptionInterface $clientException) {
            throw new LogisticsApiException('Logistics client exception: ' . $clientException->getMessage(), $clientException->getCode(), $clientException);
        }

        return $response;
    }
}
