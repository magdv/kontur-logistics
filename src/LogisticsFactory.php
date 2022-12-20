<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Interfaces\LogisticsDocumentsApiInterface;
use MagDv\Logistics\Interfaces\LogisticsTransportationsApiInterface;
use MagDv\Logistics\Interfaces\MintransGatewayApiInterface;
use Psr\Http\Client\ClientInterface;

class LogisticsFactory
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
     * @var null|string
     */
    protected $serializerCachePath;
    /**
     * @var bool
     */
    private $serializerDebug;

    public function __construct(
        ClientInterface $client,
        string $apiKey,
        ?string $serializerCachePath = null,
        string $url = 'https://logist-api.kontur.ru/',
        bool $serializerDebug = false
    ) {
        $this->apikey = $apiKey;
        $this->url = $url;
        $this->client = $client;
        $this->serializerCachePath = $serializerCachePath;
        $this->serializerDebug = $serializerDebug;
    }

    public function getDocuments(): LogisticsDocumentsApiInterface
    {
        return new LogisticsDocumentsApi(
            $this->client,
            $this->apikey,
            $this->serializerCachePath,
            $this->url,
            $this->serializerDebug
        );
    }

    public function getMintrans(): MintransGatewayApiInterface
    {
        return new MintransGatewayApi(
            $this->client,
            $this->apikey,
            $this->serializerCachePath,
            $this->url,
            $this->serializerDebug
        );
    }

    public function getTransportations(): LogisticsTransportationsApiInterface
    {
        return new LogisticsTransportationsApi(
            $this->client,
            $this->apikey,
            $this->serializerCachePath,
            $this->url,
            $this->serializerDebug
        );
    }
}
