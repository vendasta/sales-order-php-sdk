<?php

namespace Vendasta\SalesOrders\V1;

use Google\Protobuf\Timestamp;
use Sales\V1\LineItem;
use Sales\V1\LineItem_AppKey;
use Sales\V1\Revenue;
use Sales\V1\RevenueComponent;
use Salesorders\V1\CustomField;
use Salesorders\V1\Field;
use Salesorders\V1\FieldType;
use Salesorders\V1\Order;

class SalesOrdersUtils {
    /**
     * Creates a line item for use in an Order
     *
     * @param string $appId the appID of the line item
     * @return LineItem an initialized line item; defaults to non-trial & USD
     */
    public static function buildLineItem(string $appId): LineItem
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

    /**
     * Creates a text field for an Order
     *
     * @param string $fieldId the ID of the field
     * @param string $fieldLabel the label of the field
     * @param string $answer the answer for this field on the Order
     * @param int $fieldType the type of field this is. Use the FieldType enumerator. Defaults to Text field.
     * @return Field an initialized Field
     */
    public static function buildField(string $fieldId, string $fieldLabel, string $answer, int $fieldType = FieldType::TEXT): Field
    {
        $formattedAnswer = $answer;
        if ($fieldType === FieldType::TEXT || $fieldType === FieldType::TEXTAREA) {
            $formattedAnswer = "\"" . $answer . "\"";
        }
        $field = new Field();
        $field->setFieldId($fieldId);
        $field->setFieldType($fieldType);
        $field->setLabel($fieldLabel);
        $field->setAnswer($formattedAnswer);

        return $field;
    }

    /**
     * Create a blank order for a business for a partner. Uses the default market.
     *
     * @param string $partnerId The partner ID for the business (eg. ABC)
     * @param string $businessId The ID for the business (eg. AG-12345ABCDE)
     * @param array $lineItems The line items for this order
     * @return Order An intialized order for the business
     */
    public static function buildOrder(string $partnerId, string $businessId, array $lineItems, array $customFields): Order
    {
        // Setup the order
        $order = new Order();
        $order->setBusinessId($businessId);
        $order->setMarketId("default");
        $order->setPartnerId($partnerId);
        $now = new Timestamp();
        $now->setSeconds(time());
        $order->setRequestedActivation($now);

        // Setup the common fields
        $commonFields = array();
        $order->setCommonFields($commonFields);

        // Set the line items
        $order->setLineItems($lineItems);

        // Add the custom fields
        $order->setCustomFields($customFields);

        return $order;
    }

    /**
     * Creates a CustomField for G Suite for an order
     *
     * @param string $productId the app/product ID for G Suite being provisioned
     * @param string $domain the domain to provision (ex. google.com)
     * @param string $username the username of the admin
     * @param string $firstName the first name of the admin
     * @param string $lastName the last name of the admin
     * @param string $alternateEmail the alternate email, not under the domain, of the admin (ex. user@exampele.com)
     * @return CustomField An initialized custom field for a G Suite order
     */
    public static function buildGSuiteCustomField(string $productId, string $domain, string $username, string $firstName, string $lastName, string $alternateEmail): CustomField
    {
        // Setup G Suite custom fields
        $gSuiteCustomField = new CustomField();
        $gSuiteCustomField->setProductId($productId);

        $gSuiteDomain = self::buildField('domain', 'Domain Name', $domain);
        $gSuiteUsername = self::buildField('username', 'Admin username', $username);
        $gSuiteAdminFirstName = self::buildField('admin_first_name', 'Admin First name', $firstName);
        $gSuiteAdminLastName = self::buildField('admin_last_name', 'Admin Last name', $lastName);
        $gSuiteAlternateEmail = self::buildField('alternate_email', 'Admin alternate email', $alternateEmail);

        $gSuiteFields = array($gSuiteDomain, $gSuiteUsername, $gSuiteAdminFirstName, $gSuiteAdminLastName, $gSuiteAlternateEmail);
        $gSuiteCustomField->setFields($gSuiteFields);

        return $gSuiteCustomField;
    }

    /**
     * Creates a CustomField for GoDaddy for an order
     *
     * @param string $productId the app/product ID for the GoDaddy product
     * @param string $domain the domain being purchased (ex. google.com)
     * @param string $adminEmail the email of the domain admin (ex. user@example.com)
     * @param string $adminFirstName the first name of the domain admin
     * @param string $adminLastName the last name of the domain admin
     * @param string $adminPhone the phone number for the domain admin
     * @param string $ownerEmail the email of the domain owner
     * @param string $ownerFirstName the first name of the domain owner
     * @param string $ownerLastName the last name of the domain owner
     * @return CustomField An initialized custom field for a GoDaddy order
     */
    public static function buildGoDaddyCustomFields(string $productId, string $domain, string $adminEmail, string $adminFirstName, string $adminLastName, string $adminPhone, string $ownerEmail, string $ownerFirstName, string $ownerLastName): CustomField
    {
        $goDaddyCustomField = new CustomField();
        $goDaddyCustomField->setProductId($productId);

        $goDaddyDomain = self::buildField('domain', 'Domain Selection', $domain);
        $goDaddyAdminEmail = self::buildField('email', 'Admin Email Address', $adminEmail);
        $goDaddyAdminFirstName = self::buildField('first_name', 'Admin First Name', $adminFirstName);
        $goDaddyAdminLastName = self::buildField('last_name', 'Admin Last Name', $adminLastName);
        $goDaddyAdminPhone = self::buildField('phone', 'Admin Phone Number', $adminPhone);
        $goDaddyOwnerEmail = self::buildField('shopper_email', 'Domain Owner Email', $ownerEmail);
        $goDaddyOwnerFirstName = self::buildField('shopper_first_name', 'Domain Owner First Name', $ownerFirstName);
        $goDaddyOwnerLastName = self::buildField('shopper_last_name', 'Domain Owner Last Name', $ownerLastName);

        $goDaddyFields = array($goDaddyDomain, $goDaddyAdminEmail, $goDaddyAdminFirstName, $goDaddyAdminLastName, $goDaddyAdminPhone, $goDaddyOwnerEmail, $goDaddyOwnerFirstName, $goDaddyOwnerLastName);
        $goDaddyCustomField->setFields($goDaddyFields);

        return $goDaddyCustomField;

    }
}
