<?php
namespace Vendasta\SalesOrders\V1;

class Config
{
    const ENVIRONMENT_PARAMS = [
        "PROD" => [
            'host' => 'sales-orders-api-prod.vendasta-internal.com:443',
            'scope' => 'https://sales-orders-api-prod.vendasta-internal.com',
            'url' => 'https://sales-orders-api-prod.vendasta-internal.com',
            'secure' => true,
        ],
        "DEMO" => [
            'host' => 'sales-orders-api-demo.vendasta-internal.com:443',
            'scope' => 'https://sales-orders-api-demo.vendasta-internal.com',
            'url' => 'https://sales-orders-api-demo.vendasta-internal.com',
            'secure' => true,
        ],
        "LOCAL" => [
            'host' => 'http://sales-orders-api.vendasta-local.com',
            'scope' => 'http://sales-orders-api.vendasta-local.com',
            'url' => 'http://sales-orders-api.vendasta-local.com',
            'secure' => false,
        ]
    ];
}
