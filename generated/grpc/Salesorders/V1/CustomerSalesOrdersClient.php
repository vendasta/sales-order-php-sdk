<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Salesorders\V1;

/**
 * The Actions that a customer can take regarding orders
 */
class CustomerSalesOrdersClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Api for customer to create a sales order
     * @param \Salesorders\V1\CustomerCreateSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateSalesOrder(\Salesorders\V1\CustomerCreateSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.CustomerSalesOrders/CreateSalesOrder',
        $argument,
        ['\Salesorders\V1\CustomerCreateSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * A Customer approving a sales order
     * @param \Salesorders\V1\CustomerApproveSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ApproveSalesOrder(\Salesorders\V1\CustomerApproveSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.CustomerSalesOrders/ApproveSalesOrder',
        $argument,
        ['\Salesorders\V1\CustomerApproveSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update Answers for an Order
     * @param \Salesorders\V1\UpdateAnswersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdateAnswers(\Salesorders\V1\UpdateAnswersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.CustomerSalesOrders/UpdateAnswers',
        $argument,
        ['\Salesorders\V1\UpdateAnswersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Get data for a sales order
     * @param \Salesorders\V1\GetSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetSalesOrder(\Salesorders\V1\GetSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.CustomerSalesOrders/GetSalesOrder',
        $argument,
        ['\Salesorders\V1\GetSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * List sales orders
     * @param \Salesorders\V1\ListCustomerSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListSalesOrder(\Salesorders\V1\ListCustomerSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.CustomerSalesOrders/ListSalesOrder',
        $argument,
        ['\Salesorders\V1\ListSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * GetUsers gets the users for the agreements of the order
     * @param \Salesorders\V1\GetUsersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetUsers(\Salesorders\V1\GetUsersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.CustomerSalesOrders/GetUsers',
        $argument,
        ['\Salesorders\V1\GetUsersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * DeclineSalesOrder
     * CheckSalesOrderExists
     * GetConfig
     * InitiateOrderExport creates a downloadable CSV of ALL orders for a business
     * @param \Salesorders\V1\InitiateOrderExportRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function InitiateOrderExport(\Salesorders\V1\InitiateOrderExportRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.CustomerSalesOrders/InitiateOrderExport',
        $argument,
        ['\Salesorders\V1\InitiateOrderExportResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * A Customer wants to create an order with payment information that the Partner must look at and approve
     * @param \Salesorders\V1\CreateForPartnerApprovalRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateForPartnerApproval(\Salesorders\V1\CreateForPartnerApprovalRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.CustomerSalesOrders/CreateForPartnerApproval',
        $argument,
        ['\Salesorders\V1\CreateForPartnerApprovalResponse', 'decode'],
        $metadata, $options);
    }

}
