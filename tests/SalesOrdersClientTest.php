<?php

use PHPUnit\Framework\TestCase;
use SalesOrders\V1\CreateAndActivateOrderRequest;
use Vendasta\SalesOrders\V1\SalesOrdersClient;

class SalesOrdersClientTest extends TestCase
{
    public function testGetDomainAvailableWhenDomainIsTaken()
    {
        $environment = "DEMO";
        $client = new SalesOrdersClient($environment);

        $req = new CreateAndActivateOrderRequest();

        $resp = $client->CreateAndActivateOrder($req);
        self::assertNotEmpty(
            $client,
            'expected order ID'
        );
    }
}