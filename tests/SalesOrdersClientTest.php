<?php

use PHPUnit\Framework\TestCase;
use Salesorders\V1\CreateAndActivateOrderRequest;
use Vendasta\SalesOrders\V1\SalesOrdersClient;
use Vendasta\Vax\SDKException;
use function Vendasta\SalesOrders\V1\buildGoDaddyCustomFields;
use function Vendasta\SalesOrders\V1\buildGSuiteCustomField;
use function Vendasta\SalesOrders\V1\buildLineItem;
use function Vendasta\SalesOrders\V1\buildOrder;

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
        $gSuite = buildLineItem('MP-6XDHVMQ84K4THNNP2Z7W2GC28VLHRC4Q');
        $goDaddy = buildLineItem('MP-NNTJMBF6HPXR5XXC2JKCFWKJ64VZLBFQ');
        $lineItems = array($gSuite, $goDaddy);

        // Create the custom field
        $gSuiteCustomField = buildGSuiteCustomField("", 'testdomain123.com', 'adminusername', 'First', 'Last', 'example@email.com');
        $goDaddyCustomField = buildGoDaddyCustomFields("", "testdomain123.com", "example@email.com", "First", "Last", "3065555555", "example@email.com", "First", "Last");
        $customFields = array($gSuiteCustomField, $goDaddyCustomField);

        // Create the order
        $order = buildOrder("ABC", "AG-123", $lineItems, $customFields);
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
