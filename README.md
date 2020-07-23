# sales-orders

## Description

This is Vendasta's official PHP SDK for API integration of sales-orders.

## Requirements

- PHP 5.5 and above or PHP 7.0 and above
- [PECL](https://pecl.php.net/) (may be used to install the required PHP extensions)
- [Composer](https://getcomposer.org/)
- [PHP gmp extension](http://php.net/manual/en/book.gmp.php)
- OPTIONAL (but recommended): [PHP grpc extension](https://cloud.google.com/php/grpc)

## Installation

Install the requirements from above, then:

```bash
composer require vendasta/sales-orders
```

## Authentication

To authenticate your SDK calls, you must provision a service account from within the Vendasta platform.

You must put this file on your server, and set an environment variable to it's path:

```bash
export VENDASTA_APPLICATION_CREDENTIALS=<path to credentials.json>
```

## Client Initialization

It is highly recommended that you use a singleton client instance. Each client initilization will open it's own connection, therefore using a singleton results in reusing a connection, saving time and resources.

Set an environment variable:

```bash
export ENVIRONMENT=<DEMO or PROD> 
```

To instantiate the client:

```php
$environment = getenv("ENVIRONMENT");
if ($environment == null) {
    $environment = "DEMO";
}
$client = new Vendasta\SalesOrders\V1\SalesOrdersClient($environment);
```

Notice that the environment will be set to DEMO if it is not specified.

## Creating and activate an order

Creating and activating an order on a business will purchase the appropriate products, included are helper functions which will allow for G Suite and GoDaddy provisioning.

```php
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

// Call CreateAndActivateOrder
$resp = $client->CreateAndActivateOrder($req);
```
