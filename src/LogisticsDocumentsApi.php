<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use MagDv\Logistics\Entities\Documents\CreateWaybillDraftRequest;
use MagDv\Logistics\Entities\Documents\CreateWaybillDraftResponse;
use MagDv\Logistics\Entities\Documents\SendWaybillRequest;
use MagDv\Logistics\Entities\Documents\SendWaybillResponse;
use MagDv\Logistics\Interfaces\LogisticsDocumentsApiInterface;
use Nyholm\Psr7\Request;

class LogisticsDocumentsApi extends BaseRequest implements LogisticsDocumentsApiInterface
{
    /**
     * Отправка титула с подписью
     *
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

    /**
     * Отправка черновика титула ЭТрН
     */
    public function createWaybillDraft(CreateWaybillDraftRequest $request): CreateWaybillDraftResponse
    {
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $builder = new MultipartStreamBuilder($streamFactory);

        if ($request->draft !== '' && $request->draft !== '0') {
            $builder
                ->addResource(
                    'draft',
                    $request->draft,
                    [
                        'filename' => $request->draftFileName,
                        'headers' => [
                            'Content-Type' => 'text/xml'
                        ]
                    ]
                );
        }

        $multipartStream = $builder->build();
        $boundary = $builder->getBoundary();

        $req = new Request(
            'POST',
            $this->url . 'v1/documents/waybill/draft?' . http_build_query(['transportationId' => $request->transportationId, 'draftAction' => $request->draftAction]),
            [
                'Content-Type' => 'multipart/form-data;boundary="' . $boundary . '"',
            ],
            $multipartStream
        );

        $response = $this->send($req);

        /** @var CreateWaybillDraftResponse $body */
        $body = $this->serializer->deserialize($response->getBody()->getContents(), CreateWaybillDraftResponse::class, 'json');
        $body->statusCode = $response->getStatusCode();

        return $body;
    }
}
