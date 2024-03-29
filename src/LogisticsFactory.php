<?php

declare(strict_types=1);

namespace MagDv\Logistics;

use MagDv\Logistics\Interfaces\ClientConfigInterface;
use MagDv\Logistics\Interfaces\LogisticsDocumentsApiInterface;
use MagDv\Logistics\Interfaces\LogisticsOrganizationsApiInterface;
use MagDv\Logistics\Interfaces\LogisticsTransportationsApiInterface;
use MagDv\Logistics\Interfaces\MintransGatewayApiInterface;

class LogisticsFactory
{
    public function __construct(private ClientConfigInterface $config)
    {
    }

    public function getDocuments(): LogisticsDocumentsApiInterface
    {
        return new LogisticsDocumentsApi($this->config);
    }

    public function getMintrans(): MintransGatewayApiInterface
    {
        return new MintransGatewayApi($this->config);
    }

    public function getTransportations(): LogisticsTransportationsApiInterface
    {
        return new LogisticsTransportationsApi($this->config);
    }

    public function getOrganizations(): LogisticsOrganizationsApiInterface
    {
        return new LogisticsOrganizationsApi($this->config);
    }
}
