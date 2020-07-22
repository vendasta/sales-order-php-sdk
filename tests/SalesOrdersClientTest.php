<?php

use PHPUnit\Framework\TestCase;
use Salesorders\V1\CreateAndActivateOrderRequest;
use Salesorders\V1\Order;
use Vendasta\SalesOrders\V1\SalesOrdersClient;

class SalesOrdersClientTest extends TestCase
{
    public function testGetDomainAvailableWhenDomainIsTaken()
    {
        $environment = "DEMO";
        $client = new SalesOrdersClient($environment);

        $order = new Order();

        $req = new CreateAndActivateOrderRequest();
        $req->setOrder($order);

        $resp = $client->CreateAndActivateOrder($req);
        self::assertNotEmpty(
            $client,
            'expected order ID'
        );
    }
}