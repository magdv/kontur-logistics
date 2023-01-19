<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Interfaces\HttpClientInterface;
use MagDv\Logistics\Interfaces\LogisticsDocumentsApiInterface;
use MagDv\Logistics\Interfaces\LogisticsSerializerInterface;
use MagDv\Logistics\Interfaces\LogisticsTransportationsApiInterface;
use MagDv\Logistics\Interfaces\MintransGatewayApiInterface;

class LogisticsFactory
{
    private \MagDv\Logistics\Interfaces\HttpClientInterface $client;

    private string $apikey;

    /** @var string  */
    protected $url;
    private \MagDv\Logistics\Interfaces\LogisticsSerializerInterface $serializer;

    public function __construct(
        HttpClientInterface $client,
        string $apiKey,
        LogisticsSerializerInterface $serializer,
        string $url = 'https://logist-api.kontur.ru/'
    ) {
        $this->apikey = $apiKey;
        $this->url = $url;
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function getDocuments(): LogisticsDocumentsApiInterface
    {
        return new LogisticsDocumentsApi(
            $this->client,
            $this->apikey,
            $this->serializer,
            $this->url
        );
    }

    public function getMintrans(): MintransGatewayApiInterface
    {
        return new MintransGatewayApi(
            $this->client,
            $this->apikey,
            $this->serializer,
            $this->url
        );
    }

    public function getTransportations(): LogisticsTransportationsApiInterface
    {
        return new LogisticsTransportationsApi(
            $this->client,
            $this->apikey,
            $this->serializer,
            $this->url
        );
    }
}
