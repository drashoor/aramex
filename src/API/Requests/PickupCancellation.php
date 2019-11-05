<?php

namespace DigitalCloud\Aramex\API\Requests;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

class PickupCancellation extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/shipping/service_1_0.svc';

    private $pickupGUID;
    private $comments;

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