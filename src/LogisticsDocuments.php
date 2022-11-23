<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\Entities\Documents\SendWaybillResponse;
use MagDv\Logistics\Exception\LogisticsApiException;
use MagDv\Logistics\Exception\LogisticsUnauthorizedException;
use Nyholm\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

class LogisticsDocuments
{
    /** @var string */
    private $apikey;

    private $url;
    /**
     * @var \Psr\Http\Client\ClientInterface
     */
    private $client;

    public function __construct(ClientInterface $client, string $apiKey, string $url = 'https://logist-api.kontur.ru/')
    {
        $this->apikey = $apiKey;
        $this->url = $url;
        $this->client = $client;
    }


    /**
     * Отправка титула с подписью
     *
     * @param \MagDv\Logistics\Entities\Documents\SendWaybillRequest $request
     * @return SendWaybillResponse
     * @throws \MagDv\Logistics\Exception\LogisticsApiException
     */
    public function sendWaybill(SendWaybillRequest $request): SendWaybillResponse
    {

        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $builder = new MultipartStreamBuilder($streamFactory);

        if ($request->waybill) {
            $builder
                ->addResource(
                    'formFiles',
                    $request->waybill,
                    [
                        'filename' => $request->waybillFileName,
                        'headers' => [
                            'Content-Type' => 'text/xml'
                        ]
                    ]
                );
        }

        if ($request->waybillSign) {
            $builder->addResource(
                'formFiles',
                $request->waybillSign,
                [
                    'filename' => $request->waybillSignFileName,
                    'headers' => [
                        'Content-Type' => 'application/pgp-signature'
                    ]
                ]
            );
        }


        $multipartStream = $builder->build();
        $boundary = $builder->getBoundary();

        $req = new Request(
            'POST',
            $this->url . 'v1/documents/waybill',
            [
                'x-kontur-apikey' => $this->apikey,
                'Content-Type' => 'multipart/form-data;boundary="' . $boundary . '"',
            ],
            $multipartStream
        );

        try {
            $response = $this->client->sendRequest($req);
        } catch (ClientExceptionInterface $e) {
            throw new LogisticsApiException('Logistics client exception while sendRequest : ' . $e->getMessage());
        }

        if ($response->getStatusCode() === 401) {
            throw new LogisticsUnauthorizedException($response->getReasonPhrase() . ' ' . $response->getBody(), $response->getStatusCode());
        }

        if (!$this->isOk($response)) {
            throw new LogisticsApiException('Error while send request: ' . $response->getReasonPhrase() . ' ' . $response->getBody());
        }

        $body = json_decode($response->getBody()->getContents(), true);

        return (new SendWaybillResponse($body['transportationId'] ?? null));
    }

    private function isOk(ResponseInterface $rsp): bool
    {
        return $rsp->getStatusCode() >= 200 && $rsp->getStatusCode() < 300;
    }
}
