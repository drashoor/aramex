<?php

namespace DigitalCloud\Aramex\API\Requests;

use DigitalCloud\Aramex\API\Classes\LabelInfo;
use DigitalCloud\Aramex\API\Interfaces\Normalize;
use DigitalCloud\Aramex\API\Response\LabelPrintingResponse;
use Exception;

/**
 * This method allows the user to print a label for an existing shipment.
 *
 * The required nodes to be filled are ClientInfo and ShipmentNumber.
 * If there is a duplicate Shipment Number then the ProductGroup and Origin Entity elements are required.
 *
 * Class LabelPrinting
 * @package DigitalCloud\Aramex\API\Requests
 */
class LabelPrinting extends API implements Normalize
{
    protected $live_wsdl = 'https://ws.aramex.net/shippingapi.v2/shipping/service_1_0.svc';
    protected $test_wsdl = 'https://ws.dev.aramex.net/shippingapi.v2/shipping/service_1_0.svc';

    private $shipmentNumber;
    private $productGroup;
    private $originEntity;
    private $labelInfo;

    /**
     * @return LabelPrintingResponse
     * @throws Exception
     */
    public function create(): LabelPrintingResponse
    {
        $this->validate();

        return LabelPrintingResponse::make($this->soapClient->CreateShipments($this->normalize()));
    }

    /**
     * @return string
     */
    public function getShipmentNumber(): string
    {
        return $this->shipmentNumber;
    }

    /**
     * @param string $shipmentNumber
     * @return LabelPrinting
     */
    public function setShipmentNumber(string $shipmentNumber): LabelPrinting
    {
        $this->shipmentNumber = $shipmentNumber;
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
     * @return LabelPrinting
     */
    public function setProductGroup(string $productGroup): LabelPrinting
    {
        $this->productGroup = $productGroup;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginEntity(): string
    {
        return $this->originEntity;
    }

    /**
     * @param string $originEntity
     * @return LabelPrinting
     */
    public function setOriginEntity(string $originEntity): LabelPrinting
    {
        $this->originEntity = $originEntity;
        return $this;
    }

    /**
     * @return LabelInfo
     */
    public function getLabelInfo(): LabelInfo
    {
        return $this->labelInfo;
    }

    /**
     * @param LabelInfo $labelInfo
     * @return LabelPrinting
     */
    public function setLabelInfo(LabelInfo $labelInfo): LabelPrinting
    {
        $this->labelInfo = $labelInfo;
        return $this;
    }

    public function normalize(): array
    {
        return array_merge([
            'ShipmentNumber' => $this->getShipmentNumber(),
            'ProductGroup' => $this->getProductGroup(),
            'OriginEntity' => $this->getOriginEntity(),
            'LabelInfo' => optional($this->getLabelInfo())->normalize(),
        ], parent::normalize());
    }
}