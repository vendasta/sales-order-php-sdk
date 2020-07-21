<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: sales_orders/v1/sales_orders.proto

namespace Salesorders\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * <pre>
 * Represents a status change on the order to determine who it was updated by and what time it was updated
 * </pre>
 *
 * Protobuf type <code>salesorders.v1.StatusHistoryItem</code>
 */
class StatusHistoryItem extends \Google\Protobuf\Internal\Message
{
    /**
     * <pre>
     * The unique identifier of the user that updated the status
     * </pre>
     *
     * <code>string user_id = 1;</code>
     */
    private $user_id = '';
    /**
     * <pre>
     * The status the order was changed to
     * </pre>
     *
     * <code>.salesorders.v1.Status status = 2;</code>
     */
    private $status = 0;
    /**
     * <pre>
     * The time the status was created
     * </pre>
     *
     * <code>.google.protobuf.Timestamp created = 3;</code>
     */
    private $created = null;
    /**
     * <pre>
     * The email fo the user that updated the status.
     * </pre>
     *
     * <code>string email = 4;</code>
     */
    private $email = '';
    /**
     * <pre>
     * The metadata is freeform json about the status history item. It's structure depends on the status
     * </pre>
     *
     * <code>string metadata = 5;</code>
     */
    private $metadata = '';

    public function __construct() {
        \GPBMetadata\SalesOrders\V1\SalesOrders::initOnce();
        parent::__construct();
    }

    /**
     * <pre>
     * The unique identifier of the user that updated the status
     * </pre>
     *
     * <code>string user_id = 1;</code>
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * <pre>
     * The unique identifier of the user that updated the status
     * </pre>
     *
     * <code>string user_id = 1;</code>
     */
    public function setUserId($var)
    {
        GPBUtil::checkString($var, True);
        $this->user_id = $var;
    }

    /**
     * <pre>
     * The status the order was changed to
     * </pre>
     *
     * <code>.salesorders.v1.Status status = 2;</code>
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * <pre>
     * The status the order was changed to
     * </pre>
     *
     * <code>.salesorders.v1.Status status = 2;</code>
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Salesorders\V1\Status::class);
        $this->status = $var;
    }

    /**
     * <pre>
     * The time the status was created
     * </pre>
     *
     * <code>.google.protobuf.Timestamp created = 3;</code>
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * <pre>
     * The time the status was created
     * </pre>
     *
     * <code>.google.protobuf.Timestamp created = 3;</code>
     */
    public function setCreated(&$var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->created = $var;
    }

    /**
     * <pre>
     * The email fo the user that updated the status.
     * </pre>
     *
     * <code>string email = 4;</code>
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * <pre>
     * The email fo the user that updated the status.
     * </pre>
     *
     * <code>string email = 4;</code>
     */
    public function setEmail($var)
    {
        GPBUtil::checkString($var, True);
        $this->email = $var;
    }

    /**
     * <pre>
     * The metadata is freeform json about the status history item. It's structure depends on the status
     * </pre>
     *
     * <code>string metadata = 5;</code>
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * <pre>
     * The metadata is freeform json about the status history item. It's structure depends on the status
     * </pre>
     *
     * <code>string metadata = 5;</code>
     */
    public function setMetadata($var)
    {
        GPBUtil::checkString($var, True);
        $this->metadata = $var;
    }

}

