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
        $field->setAnswer($answer);

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
        $order->setBusinessId("AG-GWMVH8HVJP");
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
        $businessIDField = self::buildField('business_account_group_id', 'Business ID', 'AG-GWMVH8HVJP');
        $businessID->setField($businessIDField);

        $businessName = new CommonField();
        $businessNameField = self::buildField('business_name', 'Business Name', 'Corey\'s NYC Bagel & Deli');
        $businessName->setField($businessNameField);

        $businessAddress = new CommonField();
        $businessAddressField = self::buildField('business_address', 'Business Address', '515 North Dearborn Street, Chicago, IL, 60654');
        $businessAddress->setField($businessAddressField);

        $businessPhoneNumber = new CommonField();
        $businessPhoneNumberField = self::buildField('business_phone_number', 'Business Phone Number', '(312) 923-9999');
        $businessPhoneNumber->setField($businessPhoneNumberField);

        $commonFields = array($businessID, $businessID);
        $order->setCommonFields($commonFields);

        // Setup G Suite custom fields
        $gSuiteCustomFields = new CustomField();
        $gSuiteCustomFields->setProductId('MP-6XDHVMQ84K4THNNP2Z7W2GC28VLHRC4Q');

        $gSuiteDomain = self::buildField('domain', 'Domain Name', 'coreyhickson200722-2.com');
        $gSuiteUsername = self::buildField('username', 'Admin username', 'chickson200722');
        $gSuiteAdminFirstName = self::buildField('admin_first_name', 'Admin First name', 'Corey');
        $gSuiteAdminLastName = self::buildField('admin_last_name', 'Admin Last name', 'Hickson');
        $gSuiteAlternateEmail = self::buildField('alternate_email', 'Admin alternate email', 'chickson+200722@vendasta.com');

        $gSuiteFields = array($gSuiteDomain, $gSuiteUsername, $gSuiteAdminFirstName, $gSuiteAdminLastName, $gSuiteAlternateEmail);
        $gSuiteCustomFields->setFields($gSuiteFields);

        // Setup GoDaddy custom fields
        $goDaddyCustomFields = new CustomField();
        $goDaddyCustomFields->setProductId('MP-NNTJMBF6HPXR5XXC2JKCFWKJ64VZLBFQ');

        $goDaddyDomain = self::buildField('domain', 'Domain Selection', 'coreyhickson200722-2.com');
        $goDaddyAdminEmail = self::buildField('email', 'Admin Email Address', 'chickson+200722@vendasta.com');
        $goDaddyAdminFirstName = self::buildField('first_name', 'Admin First Name', 'Corey');
        $goDaddyAdminLastName = self::buildField('last_name', 'Admin Last Name', 'Hickson');
        $goDaddyAdminPhone = self::buildField('phone', 'Admin Phone Number', '3069555512');
        $goDaddyOwnerEmail = self::buildField('shopper_email', 'Domain Owner Email', 'chickson+200722@vendasta.com');
        $goDaddyOwnerFirstName = self::buildField('shopper_first_name', 'Domain Owner First Name', 'Corey');
        $goDaddyOwnerLastName = self::buildField('shopper_last_name', 'Domain Owner Last Name', 'Hickson');

        $goDaddyFields = array($goDaddyDomain, $goDaddyAdminEmail, $goDaddyAdminFirstName, $goDaddyAdminLastName, $goDaddyAdminPhone, $goDaddyOwnerEmail, $goDaddyOwnerFirstName, $goDaddyOwnerLastName);
        $goDaddyCustomFields->setFields($goDaddyFields);

        // Add custom fields to order
        $customFields = array($gSuiteCustomFields, $goDaddyCustomFields);
        $order->setCustomFields($customFields);

        try {
            $resp = $client->CreateAndActivateOrder($req);
        } catch (\Vendasta\Vax\SDKException $e) {
            self::fail($e);
        }
        self::assertNotEmpty(
            $client,
            'expected order ID'
        );
    }
}
