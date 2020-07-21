<?php 
# Code generated by sdkgen
# Generated on 2020-07-21 17:12:54.85125721 +0000 UTC using container gcr.io/repcore-prod/sdkgen:latest
# DO NOT EDIT!

namespace Vendasta\SalesOrders\V1\internal;

interface NotificationsClientInterface
{ 
    /**
     * Auth wrapper for \SalesOrders\V1\NotificationsClient::Subscribe
     * @param \Salesorders\V1\SubscribeRequest $req proto request message
     * @param array $options optional options, possible keys:
     *              \Vendasta\Vax\RequestOptions::*
     * @return \Google\Protobuf\GPBEmpty proto response message
     * @throws \Vendasta\Vax\SDKException if this call encounters an error
     */
    public function Subscribe(\Salesorders\V1\SubscribeRequest $req, array $options = []): \Google\Protobuf\GPBEmpty;
    
    /**
     * Auth wrapper for \SalesOrders\V1\NotificationsClient::Unsubscribe
     * @param \Salesorders\V1\UnsubscribeRequest $req proto request message
     * @param array $options optional options, possible keys:
     *              \Vendasta\Vax\RequestOptions::*
     * @return \Google\Protobuf\GPBEmpty proto response message
     * @throws \Vendasta\Vax\SDKException if this call encounters an error
     */
    public function Unsubscribe(\Salesorders\V1\UnsubscribeRequest $req, array $options = []): \Google\Protobuf\GPBEmpty;
    
    /**
     * Auth wrapper for \SalesOrders\V1\NotificationsClient::GetSubscribedLocations
     * @param \Salesorders\V1\GetSubscribedLocationsRequest $req proto request message
     * @param array $options optional options, possible keys:
     *              \Vendasta\Vax\RequestOptions::*
     * @return \Salesorders\V1\GetSubscribedLocationsResponse proto response message
     * @throws \Vendasta\Vax\SDKException if this call encounters an error
     */
    public function GetSubscribedLocations(\Salesorders\V1\GetSubscribedLocationsRequest $req, array $options = []): \Salesorders\V1\GetSubscribedLocationsResponse;
    
    /**
     * Auth wrapper for \SalesOrders\V1\NotificationsClient::GetSubscribers
     * @param \Salesorders\V1\GetSubscribersRequest $req proto request message
     * @param array $options optional options, possible keys:
     *              \Vendasta\Vax\RequestOptions::*
     * @return \Salesorders\V1\GetSubscribersResponse proto response message
     * @throws \Vendasta\Vax\SDKException if this call encounters an error
     */
    public function GetSubscribers(\Salesorders\V1\GetSubscribersRequest $req, array $options = []): \Salesorders\V1\GetSubscribersResponse;
    
}
