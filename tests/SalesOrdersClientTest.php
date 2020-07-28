<?php

use PHPUnit\Framework\TestCase;
use Salesorders\V1\CreateAndActivateOrderRequest;
use Vendasta\SalesOrders\V1\SalesOrdersClient;
use Vendasta\SalesOrders\V1\SalesOrdersUtils;
use Vendasta\Vax\SDKException;

class SalesOrdersClientTest extends TestCase
{
    public function testCreateAndActivateOrder()
    {
        // Setup the client
        $environment = getenv("ENVIRONMENT");
        if ($environment == null) {
            $environment = "DEMO";
        }
        $client = new SalesOrdersClient($environment);

        // Create the request
        $req = new CreateAndActivateOrderRequest();

        // Create the line items
        $gSuite = SalesOrdersUtils::buildLineItem('MP-6XDHVMQ84K4THNNP2Z7W2GC28VLHRC4Q');
        $goDaddy = SalesOrdersUtils::buildLineItem('MP-NNTJMBF6HPXR5XXC2JKCFWKJ64VZLBFQ');
        $lineItems = array($gSuite, $goDaddy);

        // Create the custom field
        $gSuiteCustomField = SalesOrdersUtils::buildGSuiteCustomField("MP-6XDHVMQ84K4THNNP2Z7W2GC28VLHRC4Q", 'testdomain123.com', 'adminusername', 'First', 'Last', 'example@email.com');
        $goDaddyCustomField = SalesOrdersUtils::buildGoDaddyCustomFields("MP-NNTJMBF6HPXR5XXC2JKCFWKJ64VZLBFQ", "testdomain123.com", "example@email.com", "First", "Last", "3065555555", "example@email.com", "First", "Last");
        $customFields = array($gSuiteCustomField, $goDaddyCustomField);

        // Create the order
        $order = SalesOrdersUtils::buildOrder("ABC", "AG-123", $lineItems, $customFields);
        $req->setOrder($order);

        try {
            $resp = $client->CreateAndActivateOrder($req);
        } catch (SDKException $e) {
            self::fail($e);
        }
        self::assertNotEmpty(
            $resp->getOrderId(),
            'expected order ID'
        );
    }

    public function testCreateAndActivateOrderForAddon() {
        // Setup the client
        $environment = getenv("ENVIRONMENT");
        if ($environment == null) {
            $environment = "DEMO";
        }
        $client = new SalesOrdersClient($environment);

        // Create the request
        $req = new CreateAndActivateOrderRequest();
        // Create the line items
        $gSuite = SalesOrdersUtils::buildLineItem('MP-6XDHVMQ84K4THNNP2Z7W2GC28VLHRC4Q');
        $gSuiteAddon = SalesOrdersUtils::buildLineItem('A-JMJX3KJPT5');
        $lineItems = array(@$gSuite, $gSuiteAddon);

        // Create the order
        $order = SalesOrdersUtils::buildOrder("ABC", "AG-123", $lineItems, []);
        $req->setOrder($order);

        try {
            $resp = $client->CreateAndActivateOrder($req);
        } catch (SDKException $e) {
            self::fail($e);
        }
        self::assertNotEmpty(
            $resp->getOrderId(),
            'expected order ID'
        );

    }
}
