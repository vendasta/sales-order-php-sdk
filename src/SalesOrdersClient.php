<?php 
namespace Vendasta\SalesOrders\V1;

use Vendasta\SalesOrders\V1\internal\SalesOrdersGeneratedClient;

class SalesOrdersClient extends SalesOrdersGeneratedClient
{
    /**
     * SalesOrdersClient constructor.
     * @param string $env one of \Vendasta\Vax\Environment::<Env>
     * @param float $default_timeout
     */
    public function __construct(string $env, float $default_timeout = 10000)
    {
        parent::__construct($env, $default_timeout);
    }
}
