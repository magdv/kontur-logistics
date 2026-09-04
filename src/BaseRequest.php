<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use Http\Discovery\Psr17FactoryDiscovery;
use JMS\Serializer\Serializer;
use MagDv\Logistics\Entities\Http\HttpLogDto;
use MagDv\Logistics\Exception\LogisticsApiException;
use MagDv\Logistics\Interfaces\ClientConfigInterface;
use MagDv\Logistics\Interfaces\HttpLoggerInterface;
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

    private ?HttpLoggerInterface $logger;

    public function __construct(ClientConfigInterface $config)
    {
        $this->apikey = $config->getApiKey();
        $this->url = $config->getUrl();
        $this->client = $config->getClient();
        $this->serializer = $config->getSerializer();
        $this->logger = $config->getLogger();
    }

    protected function send(RequestInterface $request): ResponseInterface
    {
        $req = $request->withAddedHeader('x-kontur-apikey', $this->apikey);

        try {
            $response = $this->client->sendRequest($req);
        } catch (ClientExceptionInterface $clientException) {
            throw new LogisticsApiException('Logistics client exception: ' . $clientException->getMessage(), $clientException->getCode(), $clientException);
        }

        if ($this->logger !== null) {
            $response = $this->log($req, $response);
        }

        return $response;
    }

    private function log(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        if ($this->logger === null) {
            return $response;
        }
        $requestBody = $request->getBody();
        $params = $requestBody->getContents();
        if ($requestBody->isSeekable()) {
            $requestBody->rewind();
        }

        $responseBody = $response->getBody();
        $responseContents = $responseBody->getContents();
        if ($responseBody->isSeekable()) {
            $responseBody->rewind();
        } else {
            $response = $response->withBody(
                Psr17FactoryDiscovery::findStreamFactory()->createStream($responseContents)
            );
        }

        $dto = new HttpLogDto(
            url: (string) $request->getUri(),
            method: $request->getMethod(),
            response: $responseContents,
            statusCode: $response->getStatusCode(),
            params: $params !== '' ? $params : null,
        );

        $this->logger->log($dto);

        return $response;
    }
}
