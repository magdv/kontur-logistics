<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\Entities\Documents\SendWaybillResponse;
use MagDv\Logistics\Interfaces\LogisticsDocumentsApiInterface;
use Nyholm\Psr7\Request;

class LogisticsDocumentsApi extends BaseRequest implements LogisticsDocumentsApiInterface
{
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
                'Content-Type' => 'multipart/form-data;boundary="' . $boundary . '"',
            ],
            $multipartStream
        );

        $response = $this->send($req);

        /** @var SendWaybillResponse $body */
        $body = $this->serializer->deserialize($response->getBody()->getContents(), SendWaybillResponse::class, 'json');
        $body->statusCode = $response->getStatusCode();

        return $body;
    }
}
