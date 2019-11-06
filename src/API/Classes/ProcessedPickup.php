<?php


namespace DigitalCloud\Aramex\API\Classes;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

/**
 * Class ProcessedPickup
 * @package DigitalCloud\Aramex\API\Classes
 */
class ProcessedPickup implements Normalize
{
    private $id;
    private $guid;
    private $reference1;
    private $reference2;
    private $processedShipments;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ProcessedPickup
     */
    public function setId(string $id): ProcessedPickup
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getGUID(): string
    {
        return $this->guid;
    }

    /**
     * @param string $guid
     * @return ProcessedPickup
     */
    public function setReference3(string $guid): ProcessedPickup
    {
        $this->guid = $guid;
    }

    /**
     * @return string
     */
    public function getReference1(): string
    {
        return $this->reference1;
    }

    /**
     * @param string $reference1
     * @return ProcessedPickup
     */
    public function setReference1(string $reference1): ProcessedPickup
    {
        $this->reference1 = $reference1;
    }

    /**
     * @return string
     */
    public function getReference2(): string
    {
        return $this->reference2;
    }

    /**
     * @param string $reference2
     * @return ProcessedPickup
     */
    public function setReference2(string $reference2): ProcessedPickup
    {
        $this->reference2 = $reference2;
    }

    /**
     * @return ProcessedShipment[]
     */
    public function getProcessedShipments(): array
    {
        return $this->processedShipments;
    }

    /**
     * @param ProcessedShipment[] $processedShipments
     * @return ProcessedPickup
     */
    public function setProcessedShipments(array $processedShipments): ProcessedPickup
    {
        $this->processedShipments = $processedShipments;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'ID' => $this->getId(),
            'GUID' => $this->getGUID(),
            'Reference1' => $this->getReference1(),
            'Reference2' => $this->getReference2(),
            'ProcessedShipments' => $this->getProcessedShipments() ? array_map(function ($item) {
                /** @var ProcessedPickup $item */
                return $item->normalize();
            }, $this->getProcessedShipments()) : [],
        ];
    }
}