<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use JMS\Serializer\Serializer;
use MagDv\Logistics\Exception\LogisticsApiException;
use MagDv\Logistics\Interfaces\ClientConfigInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class BaseRequest
{
    private ClientInterface $client;

    private string $apikey;

    protected string $url;

    protected Serializer $serializer;

    public function __construct(ClientConfigInterface $config)
    {
        $this->apikey = $config->getApiKey();
        $this->url = $config->getUrl();
        $this->client = $config->getClient();
        $this->serializer = $config->getSerializer();
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
