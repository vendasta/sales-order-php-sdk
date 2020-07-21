<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: sales_orders/v1/sales_orders.proto

namespace Salesorders\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>salesorders.v1.Agreement</code>
 */
class Agreement extends \Google\Protobuf\Internal\Message
{
    /**
     * <pre>
     * The user who may have agreed to this agreement
     * </pre>
     *
     * <code>string user_id = 1;</code>
     */
    private $user_id = '';
    /**
     * <pre>
     * The term that the user may have agreed to
     * </pre>
     *
     * <code>string term = 2;</code>
     */
    private $term = '';
    /**
     * <pre>
     * Whether or not the user agreed
     * </pre>
     *
     * <code>bool agreed = 3;</code>
     */
    private $agreed = false;

    public function __construct() {
        \GPBMetadata\SalesOrders\V1\SalesOrders::initOnce();
        parent::__construct();
    }

    /**
     * <pre>
     * The user who may have agreed to this agreement
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
     * The user who may have agreed to this agreement
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
     * The term that the user may have agreed to
     * </pre>
     *
     * <code>string term = 2;</code>
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * <pre>
     * The term that the user may have agreed to
     * </pre>
     *
     * <code>string term = 2;</code>
     */
    public function setTerm($var)
    {
        GPBUtil::checkString($var, True);
        $this->term = $var;
    }

    /**
     * <pre>
     * Whether or not the user agreed
     * </pre>
     *
     * <code>bool agreed = 3;</code>
     */
    public function getAgreed()
    {
        return $this->agreed;
    }

    /**
     * <pre>
     * Whether or not the user agreed
     * </pre>
     *
     * <code>bool agreed = 3;</code>
     */
    public function setAgreed($var)
    {
        GPBUtil::checkBool($var);
        $this->agreed = $var;
    }

}

