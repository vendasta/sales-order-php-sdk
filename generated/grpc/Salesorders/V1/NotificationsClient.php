<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Salesorders\V1;

/**
 */
class NotificationsClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Subscribe subscribes the calling user to notifications of status changes to the order
     * @param \Salesorders\V1\SubscribeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Subscribe(\Salesorders\V1\SubscribeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.Notifications/Subscribe',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * Unsubscribe unsubscribes the calling user to notifications of status changes to the order
     * @param \Salesorders\V1\UnsubscribeRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Unsubscribe(\Salesorders\V1\UnsubscribeRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.Notifications/Unsubscribe',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * GetSubscribedLocations will return the locations the user is subscribed to
     * @param \Salesorders\V1\GetSubscribedLocationsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetSubscribedLocations(\Salesorders\V1\GetSubscribedLocationsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.Notifications/GetSubscribedLocations',
        $argument,
        ['\Salesorders\V1\GetSubscribedLocationsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * GetSubscribers will return the users that are subscribed to the order
     * @param \Salesorders\V1\GetSubscribersRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetSubscribers(\Salesorders\V1\GetSubscribersRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/salesorders.v1.Notifications/GetSubscribers',
        $argument,
        ['\Salesorders\V1\GetSubscribersResponse', 'decode'],
        $metadata, $options);
    }

}
