<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Salesorders\V1;

/**
 * The service to interact with sales orders
 */
class SalesOrdersClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Create data for a sales order
     * @param \Salesorders\V1\CreateSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateSalesOrder(\Salesorders\V1\CreateSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/CreateSalesOrder',
        $argument,
        ['\Salesorders\V1\CreateSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Api for customer to create a sales order. [deprecated], use the one from the CustomerSalesOrders service instead
     * @param \Salesorders\V1\CustomerCreateSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CustomerCreateSalesOrder(\Salesorders\V1\CustomerCreateSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/CustomerCreateSalesOrder',
        $argument,
        ['\Salesorders\V1\CustomerCreateSalesOrderResponse', 'decode'],
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
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/GetSalesOrder',
        $argument,
        ['\Salesorders\V1\GetSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * List sales orders
     * @param \Salesorders\V1\ListSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListSalesOrder(\Salesorders\V1\ListSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/ListSalesOrder',
        $argument,
        ['\Salesorders\V1\ListSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * An admin approving a sales order
     * @param \Salesorders\V1\ApproveSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ApproveSalesOrder(\Salesorders\V1\ApproveSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/ApproveSalesOrder',
        $argument,
        ['\Salesorders\V1\ApproveSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * A Customer approving a sales order. [deprecated] use the one from the CustomerSalesOrders service instead
     * @param \Salesorders\V1\CustomerApproveSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CustomerApproveSalesOrder(\Salesorders\V1\CustomerApproveSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/CustomerApproveSalesOrder',
        $argument,
        ['\Salesorders\V1\CustomerApproveSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Decline a sales order
     * @param \Salesorders\V1\DeclineSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function DeclineSalesOrder(\Salesorders\V1\DeclineSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/DeclineSalesOrder',
        $argument,
        ['\Salesorders\V1\DeclineSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Activate products in a sales order
     * @param \Salesorders\V1\ActivateProductsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ActivateProducts(\Salesorders\V1\ActivateProductsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/ActivateProducts',
        $argument,
        ['\Salesorders\V1\ActivateProductsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Schedule activation for products in a sales order
     * @param \Salesorders\V1\ScheduleActivationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ScheduleActivation(\Salesorders\V1\ScheduleActivationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/ScheduleActivation',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * Archive a sales order
     * @param \Salesorders\V1\ArchiveSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ArchiveSalesOrder(\Salesorders\V1\ArchiveSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/ArchiveSalesOrder',
        $argument,
        ['\Salesorders\V1\ArchiveSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Check if an order exists for the given criteria
     * @param \Salesorders\V1\CheckSalesOrderExistsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CheckSalesOrderExists(\Salesorders\V1\CheckSalesOrderExistsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/CheckSalesOrderExists',
        $argument,
        ['\Salesorders\V1\CheckSalesOrderExistsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * SendForCustomerApproval creates an order and sends it to the SMB for approval
     * @param \Salesorders\V1\SendForCustomerApprovalRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SendForCustomerApproval(\Salesorders\V1\SendForCustomerApprovalRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/SendForCustomerApproval',
        $argument,
        ['\Salesorders\V1\SendForCustomerApprovalResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * SendExistingOrderToCustomerForApproval will send an existing order in the awaiting customer approval status to a user
     * @param \Salesorders\V1\SendExistingOrderToCustomerForApprovalRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SendExistingOrderToCustomerForApproval(\Salesorders\V1\SendExistingOrderToCustomerForApprovalRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/SendExistingOrderToCustomerForApproval',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * GetUsers gets the users that have taken action on a given order
     * @param \Salesorders\V1\GetUsersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetUsers(\Salesorders\V1\GetUsersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/GetUsers',
        $argument,
        ['\Salesorders\V1\GetUsersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Get an Order Config
     * @param \Salesorders\V1\GetConfigRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetConfig(\Salesorders\V1\GetConfigRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/GetConfig',
        $argument,
        ['\Salesorders\V1\GetConfigResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update an Order Config
     * @param \Salesorders\V1\UpdateConfigRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdateConfig(\Salesorders\V1\UpdateConfigRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/UpdateConfig',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * Delete an Order Config
     * @param \Salesorders\V1\DeleteConfigRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function DeleteConfig(\Salesorders\V1\DeleteConfigRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/DeleteConfig',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
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
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/UpdateAnswers',
        $argument,
        ['\Salesorders\V1\UpdateAnswersResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update Tags for an Order
     * @param \Salesorders\V1\UpdateTagsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdateTags(\Salesorders\V1\UpdateTagsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/UpdateTags',
        $argument,
        ['\Salesorders\V1\UpdateTagsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update Notes for an Order
     * @param \Salesorders\V1\UpdateNotesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdateNotes(\Salesorders\V1\UpdateNotesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/UpdateNotes',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * UpdateRequestedActivation will update the requested_activation of an order
     * @param \Salesorders\V1\UpdateRequestedActivationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdateRequestedActivation(\Salesorders\V1\UpdateRequestedActivationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/UpdateRequestedActivation',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * UpdateContractDuration will update the contract_duration of an order
     * @param \Salesorders\V1\UpdateContractDurationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdateContractDuration(\Salesorders\V1\UpdateContractDurationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/UpdateContractDuration',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * UpdateCurrentRevenue will update the revenue of all the LineItems of the order [deprecated] use UpdateLineItems instead
     * @param \Salesorders\V1\UpdateCurrentRevenueRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdateCurrentRevenue(\Salesorders\V1\UpdateCurrentRevenueRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/UpdateCurrentRevenue',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * UpdateLineItems will update the LineItems of the order
     * @param \Salesorders\V1\UpdateLineItemsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdateLineItems(\Salesorders\V1\UpdateLineItemsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/UpdateLineItems',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * ListTags returns the unique tags for the filters provided
     * @param \Salesorders\V1\ListTagsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListTags(\Salesorders\V1\ListTagsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/ListTags',
        $argument,
        ['\Salesorders\V1\ListTagsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * CreateDraftSalesOrder creates an order in a draft state
     * @param \Salesorders\V1\CreateDraftSalesOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateDraftSalesOrder(\Salesorders\V1\CreateDraftSalesOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/CreateDraftSalesOrder',
        $argument,
        ['\Salesorders\V1\CreateDraftSalesOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * SubmitDraftSalesOrder updates answers for a last time and changes the status to Submitted
     * @param \Salesorders\V1\SubmitDraftRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SubmitDraftSalesOrder(\Salesorders\V1\SubmitDraftRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/SubmitDraftSalesOrder',
        $argument,
        ['\Salesorders\V1\SubmitDraftResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * SubmitDraftForCustomerApproval updates answers for a last time and changes the status to SubmittedForCustomerApproval
     * @param \Salesorders\V1\SubmitDraftForApprovalRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function SubmitDraftForCustomerApproval(\Salesorders\V1\SubmitDraftForApprovalRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/SubmitDraftForCustomerApproval',
        $argument,
        ['\Salesorders\V1\SubmitDraftForApprovalResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * IgnoreProductActivationResponse marks a product activation as ignore errors
     * @param \Salesorders\V1\IgnoreProductActivationErrorRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function IgnoreProductActivationError(\Salesorders\V1\IgnoreProductActivationErrorRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/IgnoreProductActivationError',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * IgnoreAllProductActivationErrors marks all product activation as ignore errors for an order
     * @param \Salesorders\V1\IgnoreAllProductActivationErrorsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function IgnoreAllProductActivationErrors(\Salesorders\V1\IgnoreAllProductActivationErrorsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/IgnoreAllProductActivationErrors',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * Requesting a cancellation will submit the order to the administrator for cancellation
     * @param \Salesorders\V1\RequestCancellationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function RequestCancellation(\Salesorders\V1\RequestCancellationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/RequestCancellation',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * Declining a cancellation request will return the order to its previous status
     * @param \Salesorders\V1\DeclineCancellationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function DeclineCancellation(\Salesorders\V1\DeclineCancellationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/DeclineCancellation',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * PreviewOrderActivations will return the difference between what is already activated for an account and what is going to be activated in an order
     * @param \Salesorders\V1\PreviewOrderActivationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function PreviewOrderActivations(\Salesorders\V1\PreviewOrderActivationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/PreviewOrderActivations',
        $argument,
        ['\Salesorders\V1\PreviewOrderActivationsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * ApproveCancellation will set an order into the cancelled status
     * @param \Salesorders\V1\ApproveCancellationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ApproveCancellation(\Salesorders\V1\ApproveCancellationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/ApproveCancellation',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * ConvertToDraft will convert a sales order to the draft status
     * @param \Salesorders\V1\ConvertToDraftRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ConvertToDraft(\Salesorders\V1\ConvertToDraftRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/ConvertToDraft',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * GetStatusCounts returns the counts of the number of orders currently in each status based on the filters
     * @param \Salesorders\V1\GetStatusCountsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetStatusCounts(\Salesorders\V1\GetStatusCountsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/GetStatusCounts',
        $argument,
        ['\Salesorders\V1\GetStatusCountsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * CreateInvoice creates a billing invoice with the orders lineItems and returns the id
     * @param \Salesorders\V1\CreateInvoiceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateInvoice(\Salesorders\V1\CreateInvoiceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/CreateInvoice',
        $argument,
        ['\Salesorders\V1\CreateInvoiceResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * CreateAndActivateOrder creates an order that will go directly into activation
     * @param \Salesorders\V1\CreateAndActivateOrderRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function CreateAndActivateOrder(\Salesorders\V1\CreateAndActivateOrderRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/CreateAndActivateOrder',
        $argument,
        ['\Salesorders\V1\CreateAndActivateOrderResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Update customer notes for an order
     * @param \Salesorders\V1\UpdateCustomerNotesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdateCustomerNotes(\Salesorders\V1\UpdateCustomerNotesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.SalesOrders/UpdateCustomerNotes',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

}
