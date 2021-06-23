<?php

use PHPUnit\Framework\TestCase;
use Salesorders\V1\CreateAndActivateOrderRequest;
use Salesorders\V1\CustomField;
use Salesorders\V1\FieldType;
use Salesorders\V1\GetSalesOrderRequest;
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

    public function testCreateAndActivateTransferAppOrder()
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
        $gSuite = SalesOrdersUtils::buildLineItem('MP-7TMH5K8N7KNNRZ5NC4RNNS2JFK64HMNC');
        $lineItems = array($gSuite);

        // Create the custom field
        $gSuiteCustomField = new CustomField();
        $gSuiteCustomField->setProductId('MP-7TMH5K8N7KNNRZ5NC4RNNS2JFK64HMNC');

        $domain = SalesOrdersUtils::buildField('domain', 'Domain Name', "domain.com", FieldType::TEXT);
        $transferToken = SalesOrdersUtils::buildField('transfer_token',  'Transfer Token', "TOKEN123TOKEN", FieldType::TEXT);
        $autoTransfer = SalesOrdersUtils::buildField('auto_transfer', 'Automatic Transfer', "true", FieldType::CHECKBOX);

        $gSuiteFields = array($transferToken, $domain, $autoTransfer);
        $gSuiteCustomField->setFields($gSuiteFields);
        $customFields = array($gSuiteCustomField);

        // Create the order
        $order = SalesOrdersUtils::buildOrder("PID", "AG-123", $lineItems, $customFields);
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

    public function testCreateAndActivateGoDaddyTransferOrder()
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
        $goDaddy = SalesOrdersUtils::buildLineItem('MP-NNTJMBF6HPXR5XXC2JKCFWKJ64VZLBFQ');
        $lineItems = array($goDaddy);

        $zoneFile = '$ORIGIN example.com.\\r\\n\\r\\n; SOA Record\\r\\n@\\t3600\\t IN \\tSOA\\tns10.domaincontrol.com.\\tdns.example.net. (\\r\\n\\t\\t\\t\\t\\t1\\r\\n\\t\\t\\t\\t\\t900\\r\\n\\t\\t\\t\\t\\t7200\\r\\n\\t\\t\\t\\t\\t604800\\r\\n\\t\\t\\t\\t\\t3600\\r\\n\\t\\t\\t\\t\\t) \\r\\n\\r\\n; A Records\\r\\n@\\t3600\\t IN \\tA\\t100.100.100.100\\r\\n\\r\\n; CNAME Records\\r\\nwww\\t3600\\t IN \\tCNAME\\t@\\r\\n\\r\\n; MX Records\\r\\n\\r\\n; TXT Records\\r\\n@\\t1800\\t IN \\tTXT\\t\\"MS=ms1111111\\"\\r\\n\\r\\n; SRV Records\\r\\n\\r\\n; AAAA Records\\r\\n\\r\\n; CAA Records\\r\\n\\r\\n; NS Records\\r\\n@\\t3600\\t IN \\tNS\\tns39.domaincontrol.com.\\r\\n@\\t3600\\t IN \\tNS\\tns40.domaincontrol.com.\\r\\n\\r\\n';
        // Create the custom field
        $goDaddyCustomField = SalesOrdersUtils::buildGoDaddyCustomFieldsForTransfer("MP-NNTJMBF6HPXR5XXC2JKCFWKJ64VZLBFQ", "testdomain123.com", "example@email.com", "First", "Last", "3065555555", "example@email.com", "First", "Last", "AuthCode", $zoneFile, "NameServer1", "NameServer2", "NameServer3");
        $customFields = array($goDaddyCustomField);

        // Create the order
        $order = SalesOrdersUtils::buildOrder("VNDR", "AG-123", $lineItems, $customFields);
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
        $gSuiteAddon = SalesOrdersUtils::buildLineItem('A-JMJX3KJPT5');
        $lineItems = array($gSuiteAddon);

        // Create the order
        $order = SalesOrdersUtils::buildOrder("ABC", "AG-QWSGCJHZSL", $lineItems, []);
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

    public function  testCreateAndActivateOrderAndGetSalesOrder()
    {
        // Create response variables
        $resp1 = null;
        $resp2 = null;

        // Setup the client
        $environment = getenv("ENVIRONMENT");
        if ($environment == null) {
            $environment = "DEMO";
        }
        $client = new SalesOrdersClient($environment);
        // Create the request
        $req = new CreateAndActivateOrderRequest();
        // Create the line items
        $gSuiteAddon = SalesOrdersUtils::buildLineItem('A-JMJX3KJPT5');
        $lineItems = array($gSuiteAddon);

        // Create the order
        $order = SalesOrdersUtils::buildOrder("ABC", "AG-123", $lineItems, []);
        $req->setOrder($order);

        try {
            $resp1 = $client->CreateAndActivateOrder($req);
        } catch (SDKException $e) {
            self::fail($e);
        }
        self::assertNotEmpty(
            $resp1->getOrderId(),
            'expected order ID'
        );

        // Create second request to get first order
        $req2 = new GetSalesOrderRequest();
        $req2->setOrderId($resp1->getOrderId());
        $req2->setBusinessId("AG-123");
        try {
            $resp2 = $client->GetSalesOrder($req2);
        } catch (SDKException $e) {
            self::fail($e);
        }
        self::assertEquals($resp1->getOrderId(), $resp2->getOrder()->getOrderId());
        self::assertEquals("AG-123", $resp2->getOrder()->getBusinessId());
    }
}
