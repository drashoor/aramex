<?php

namespace DigitalCloud\Aramex\API\Requests;

use DigitalCloud\Aramex\API\Interfaces\Normalize;
use DigitalCloud\Aramex\API\Response\PickupCancellationResponse;
use Exception;

/**
 * This method allows you to cancel a pickup as long as it is un-assigned or pending details.
 *
 * Class PickupCancellation
 * @package DigitalCloud\Aramex\API\Requests
 */
class PickupCancellation extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';

    private $pickupGUID;
    private $comments;

    /**
     * @return PickupCancellationResponse
     * @throws Exception
     */
    public function create(): PickupCancellationResponse
    {
        $this->validate();

        return PickupCancellationResponse::make($this->soapClient->CreateShipments($this->normalize()));
    }

    /**
     * @return string
     */
    public function getPickupGUID(): string
    {
        return $this->pickupGUID;
    }

    /**
     * @param string $pickupGUID
     * @return PickupCancellation
     */
    public function setPickupGUID(string $pickupGUID)
    {
        $this->pickupGUID = $pickupGUID;
        return $this;
    }

    /**
     * @return string
     */
    public function getComments(): string
    {
        return $this->comments;
    }

    /**
     * @param string $comments
     * @return string
     */
    public function setComments(string $comments)
    {
        $this->comments = $comments;
        return $this->comments;
    }

    public function normalize(): array
    {
        return array_merge([
            'PickupGUID' => $this->getPickupGUID(),
            'Comments' => $this->getComments(),
        ], parent::normalize());
    }
}