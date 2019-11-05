<?php

namespace DigitalCloud\Aramex\API\Requests;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

class LastReserveShipmentNumberRange extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/shipping/service_1_0.svc';

    private $entity;
    private $productGroup;

    /**
     * @return string
     */
    public function getEntity(): string
    {
        return $this->entity;
    }

    /**
     * @param string $entity
     * @return LastReserveShipmentNumberRange
     */
    public function setEntity(string $entity)
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductGroup(): string
    {
        return $this->productGroup;
    }

    /**
     * @param string $productGroup
     * @return LastReserveShipmentNumberRange
     */
    public function setProductGroup(string $productGroup)
    {
        $this->productGroup = $productGroup;
        return $this;
    }

    public function normalize(): array
    {
        return array_merge([
            'Entity' => $this->getEntity(),
            'ProductGroup' => $this->getProductGroup()
        ], parent::normalize());
    }
}