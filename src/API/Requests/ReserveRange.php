<?php

namespace DigitalCloud\Aramex\API\Requests;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

class ReserveRange extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/shipping/service_1_0.svc';

    private $entity;
    private $productGroup;
    private $count;

    /**
     * @return string
     */
    public function getEntity(): string
    {
        return $this->entity;
    }

    /**
     * @param string $entity
     * @return ReserveRange
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
     * @return ReserveRange
     */
    public function setProductGroup(string $productGroup)
    {
        $this->productGroup = $productGroup;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return ReserveRange
     */
    public function setCount(int $count)
    {
        $this->count = $count;
        return $this;
    }

    public function normalize(): array
    {
        return array_merge([
            'Entity' => $this->getEntity(),
            'ProductGroup' => $this->getProductGroup(),
            'Count' => $this->getCount()
        ], parent::normalize());
    }

}