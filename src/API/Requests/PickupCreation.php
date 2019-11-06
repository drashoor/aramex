<?php

namespace DigitalCloud\Aramex\API\Requests;

use DigitalCloud\Aramex\API\Classes\LabelInfo;
use DigitalCloud\Aramex\API\Classes\Pickup;
use DigitalCloud\Aramex\API\Interfaces\Normalize;
use DigitalCloud\Aramex\API\Response\PickupCreationResponse;
use Exception;

/**
 * This method allows users to create a pickup request.
 * The nodes required to be filled are as follows: ClientInfo and Pickup.
 *
 * Class PickupCreation
 * @package DigitalCloud\Aramex\API\Requests
 */
class PickupCreation extends API implements Normalize
{
    private $pickup;
    private $labelInfo;

    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';
    protected $test_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc?wsdl';

    /**
     * @return PickupCreationResponse
     * @throws Exception
     */
    public function create(): PickupCreationResponse
    {
        $this->validate();

        return PickupCreationResponse::make($this->soapClient->CreatePickup($this->normalize()));
    }

    protected function validate()
    {
        if (!sizeof($this->pickup)) {
            throw new Exception('Shipments are not provided');
        }
    }

    /**
     * @return Pickup
     */
    public function getPickup()
    {
        return $this->pickup;
    }

    /**
     * @param Pickup $pickup
     * @return $this
     */
    public function setPickup(Pickup $pickup)
    {
        $this->pickup = $pickup;
        return $this;
    }

    /**
     * @return LabelInfo|null
     */
    public function getLabelInfo()
    {
        return $this->labelInfo;
    }

    /**
     * @param LabelInfo $labelInfo
     * @return $this
     */
    public function setLabelInfo(LabelInfo $labelInfo)
    {
        $this->labelInfo = $labelInfo;
        return $this;
    }

    public function normalize(): array
    {
        return array_merge([
            'Pickup' => $this->getPickup(),
            'LabelInfo' => optional($this->getLabelInfo())->normalize(),
        ], parent::normalize());
    }
}