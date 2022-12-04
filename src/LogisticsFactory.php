<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Interfaces\MintransGatewayInteface;
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

    public function __construct(ClientInterface $client, string $apiKey, string $url = 'https://logist-api.kontur.ru/')
    {
        $this->apikey = $apiKey;
        $this->url = $url;
        $this->client = $client;
    }

    public function getDocuments(): LogisticsDocuments
    {
        return new LogisticsDocuments($this->client, $this->apikey, $this->url);
    }

    public function getMintrans(): MintransGatewayInteface
    {
        return new MintransGateway($this->client, $this->apikey, $this->url);
    }
}
