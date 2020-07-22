<?php

use Google\Protobuf\Timestamp;
use PHPUnit\Framework\TestCase;
use Sales\V1\LineItem;
use Sales\V1\LineItem_AppKey;
use Sales\V1\Revenue;
use Sales\V1\RevenueComponent;
use Salesorders\V1\CommonField;
use Salesorders\V1\CreateAndActivateOrderRequest;
use Salesorders\V1\CustomField;
use Salesorders\V1\Field;
use Salesorders\V1\FieldType;
use Salesorders\V1\Order;
use Vendasta\SalesOrders\V1\SalesOrdersClient;
use Vendasta\Vax\SDKException;

class SalesOrdersClientTest extends TestCase
{
    private function buildLineItem(string $appId): LineItem
    {
        $lineItem = new LineItem();

        $appKey = new LineItem_AppKey();
        $appKey->setAppId($appId);
        $lineItem->setAppKey($appKey);

        $lineItem->setQuantity(1);

        $currentRevenue = new Revenue();
        $lineItem->setCurrentRevenue($currentRevenue);

        $revenueComponent = new RevenueComponent();
        $revenueComponents = array($revenueComponent);
        $currentRevenue->setRevenueComponents($revenueComponents);

        $lineItem->setIsTrial(false);
        $lineItem->setCurrencyCode('USD');

        return $lineItem;
    }

    private function buildField(string $fieldId, string $fieldLabel, string $answer): Field
    {
        $field = new Field();
        $field->setFieldId($fieldId);
        $field->setFieldType(FieldType::TEXT);
        $field->setLabel($fieldLabel);
        $field->setAnswer("\"" . $answer . "\"");

        return $field;
    }

    public function testCreateAndActivateOrder()
    {
        $environment = "DEMO";
        $client = new SalesOrdersClient($environment);

        // Setup the request
        $req = new CreateAndActivateOrderRequest();

        // Setup the order
        $order = new Order();
        $req->setOrder($order);
        $order->setBusinessId("AG-123");
        $order->setMarketId('default');
        $order->setPartnerId('ABC');
        $now = new Timestamp();
        $now->setSeconds(time());
        $order->setRequestedActivation($now);

        // Setup the line items
        $gSuite = self::buildLineItem('MP-6XDHVMQ84K4THNNP2Z7W2GC28VLHRC4Q');
        $goDaddy = self::buildLineItem('MP-NNTJMBF6HPXR5XXC2JKCFWKJ64VZLBFQ');
        $lineItems = array($gSuite, $goDaddy);
        $order->setLineItems($lineItems);

        // Setup the common fields
        $businessID = new CommonField();
        $businessIDField = self::buildField('business_account_group_id', 'Business ID', 'AG-123');
        $businessID->setField($businessIDField);

        $commonFields = array();
        $order->setCommonFields($commonFields);

        // Setup G Suite custom fields
        $gSuiteCustomFields = new CustomField();
        $gSuiteCustomFields->setProductId('MP-6XDHVMQ84K4THNNP2Z7W2GC28VLHRC4Q');

        $gSuiteDomain = self::buildField('domain', 'Domain Name', 'testdomain123.com');
        $gSuiteUsername = self::buildField('username', 'Admin username', 'adminusername');
        $gSuiteAdminFirstName = self::buildField('admin_first_name', 'Admin First name', 'First');
        $gSuiteAdminLastName = self::buildField('admin_last_name', 'Admin Last name', 'Last');
        $gSuiteAlternateEmail = self::buildField('alternate_email', 'Admin alternate email', 'example@email.com');

        $gSuiteFields = array($gSuiteDomain, $gSuiteUsername, $gSuiteAdminFirstName, $gSuiteAdminLastName, $gSuiteAlternateEmail);
        $gSuiteCustomFields->setFields($gSuiteFields);

        // Setup GoDaddy custom fields
        $goDaddyCustomFields = new CustomField();
        $goDaddyCustomFields->setProductId('MP-NNTJMBF6HPXR5XXC2JKCFWKJ64VZLBFQ');

        $goDaddyDomain = self::buildField('domain', 'Domain Selection', 'testdomain123.com');
        $goDaddyAdminEmail = self::buildField('email', 'Admin Email Address', 'example@email.com');
        $goDaddyAdminFirstName = self::buildField('first_name', 'Admin First Name', 'First');
        $goDaddyAdminLastName = self::buildField('last_name', 'Admin Last Name', 'Last');
        $goDaddyAdminPhone = self::buildField('phone', 'Admin Phone Number', '3065555555');
        $goDaddyOwnerEmail = self::buildField('shopper_email', 'Domain Owner Email', 'example@email.com');
        $goDaddyOwnerFirstName = self::buildField('shopper_first_name', 'Domain Owner First Name', 'First');
        $goDaddyOwnerLastName = self::buildField('shopper_last_name', 'Domain Owner Last Name', 'Last');

        $goDaddyFields = array($goDaddyDomain, $goDaddyAdminEmail, $goDaddyAdminFirstName, $goDaddyAdminLastName, $goDaddyAdminPhone, $goDaddyOwnerEmail, $goDaddyOwnerFirstName, $goDaddyOwnerLastName);
        $goDaddyCustomFields->setFields($goDaddyFields);

        // Add custom fields to order
        $customFields = array($gSuiteCustomFields, $goDaddyCustomFields);
        $order->setCustomFields($customFields);

        try {
            $resp = $client->CreateAndActivateOrder($req);
        } catch (SDKException $e) {
            self::fail($e);
        }
        self::assertNotEmpty(
            $client,
            'expected order ID'
        );
    }
}
