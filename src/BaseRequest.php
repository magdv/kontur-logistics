<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use JMS\Serializer\SerializerInterface;
use MagDv\Logistics\Exception\LogisticsApiException;
use MagDv\Logistics\Exception\LogisticsUnauthorizedException;
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
        SerializerInterface $serializer,
        string $url = 'https://logist-api.kontur.ru/'
    ) {
        $this->apikey = $apiKey;
        $this->url = $url;
        $this->client = $client;
        $this->serializer = $serializer;
    }

    protected function send(RequestInterface $request): ResponseInterface
    {
        try {
            $req = $request->withAddedHeader('x-kontur-apikey', $this->apikey);
            $response = $this->client->sendRequest($req);
        } catch (ClientExceptionInterface $e) {
            throw new LogisticsApiException('Logistics client exception while sendRequest : ' . $e->getMessage());
        }

        if ($response->getStatusCode() === 401) {
            throw new LogisticsUnauthorizedException($response->getBody()->getContents(), $response->getStatusCode());
        }

        if (!$this->isOk($response)) {
            throw new LogisticsApiException($response->getBody()->getContents(), $response->getStatusCode());
        }

        return $response;
    }

    private function isOk(ResponseInterface $rsp): bool
    {
        return $rsp->getStatusCode() >= 200 && $rsp->getStatusCode() < 300;
    }
}
