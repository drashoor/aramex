<?php


namespace DigitalCloud\Aramex\API\Classes;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

/**
 * Class Pickup
 * @package DigitalCloud\Aramex\API\Classes
 */
class Pickup implements Normalize
{
    private $pickupAddress;
    private $pickupContact;
    private $pickupLocation;
    private $pickupDate;
    private $readyTime;
    private $lastPickupTime;
    private $closingTime;
    private $comments;
    private $reference1;
    private $reference2;
    private $vehicle;
    private $shipments;
    private $pickItems;
    private $status;

    /**
     * @return Address
     */
    public function getPickupAddress(): Address
    {
        return $this->pickupAddress;
    }

    /**
     * Pickup Address.
     *
     * @param Address $pickupAddress
     * @return Pickup
     */
    public function setPickupAddress(Address $pickupAddress)
    {
        $this->pickupAddress = $pickupAddress;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getPickupContact(): Contact
    {
        return $this->pickupContact;
    }

    /**
     * @param Contact $pickupContact
     * @return Pickup
     */
    public function setPickupContact(Contact $pickupContact)
    {
        $this->pickupContact = $pickupContact;
        return $this;
    }

    /**
     * @return string
     */
    public function getPickupLocation(): string
    {
        return $this->pickupLocation;
    }

    /**
     * @param string $pickupLocation
     * @return Pickup
     */
    public function setPickupLocation(string $pickupLocation)
    {
        $this->pickupLocation = $pickupLocation;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPickupDate()
    {
        return $this->pickupDate;
    }

    /**
     * @param mixed $pickupDate
     * @return Pickup
     */
    public function setPickupDate($pickupDate)
    {
        $this->pickupDate = $pickupDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReadyTime()
    {
        return $this->readyTime;
    }

    /**
     * Ready time should always be before latest and closingtime.
     * Date should not be before the current day or more than seven days in advance of the current date.
     * @param DateTime $readyTime
     * @return Pickup
     */
    public function setReadyTime(DateTime $readyTime)
    {
        $this->readyTime = $readyTime;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getLastPickupTime(): DateTime
    {
        return $this->lastPickupTime;
    }

    /**
     * @param mixed $lastPickupTime
     * @return Pickup
     */
    public function setLastPickupTime($lastPickupTime)
    {
        $this->lastPickupTime = $lastPickupTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClosingTime()
    {
        return $this->closingTime;
    }

    /**
     * @param mixed $closingTime
     * @return Pickup
     */
    public function setClosingTime($closingTime)
    {
        $this->closingTime = $closingTime;
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
     * @return Pickup
     */
    public function setComments(string $comments)
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference1(): string
    {
        return $this->reference1;
    }

    /**
     * Any general detail the customer would like to add about the shipment.
     *
     * @param string $reference1
     * @return Pickup
     */
    public function setReference1(string $reference1)
    {
        $this->reference1 = $reference1;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference2(): string
    {
        return $this->reference2;
    }

    /**
     * Any general detail the customer would like to add about the shipment.
     *
     * @param string $reference2
     * @return Pickup
     */
    public function setReference2(string $reference2)
    {
        $this->reference2 = $reference2;
        return $this;
    }

    /**
     * @return string
     */
    public function getVehicle(): string
    {
        return $this->vehicle;
    }

    /**
     * Type of Vehicle requested to transport the shipments.
     *
     * @param string $vehicle
     * @return Pickup
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;
        return $this;
    }

    /**
     * @return Shipment[]
     */
    public function getShipments(): array
    {
        return $this->shipments;
    }

    /**
     * @param Shipment[] $shipments
     * @return Pickup
     */
    public function setShipments(array $shipments)
    {
        $this->shipments = $shipments;
        return $this;
    }

    /**
     * @return PickupItem[]
     */
    public function getPickItems(): array
    {
        return $this->pickItems;
    }

    /**
     * @param PickupItem[] $pickItems
     * @return Pickup
     */
    public function setPickItems(array $pickItems)
    {
        $this->pickItems = $pickItems;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Ready or Pending
     * Pending: more information about the pickup needs to be added,
     * Ready: no further information is needed and the pickup request is ready to be assigned.
     *
     * @param string $status
     * @return Pickup
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'PickupAddress' => $this->getPickupAddress(),
            'PickupContact' => $this->getPickupContact(),
            'PickupLocation' => $this->getPickupLocation(),
            'PickupDate' => $this->getPickupDate(),
            'ReadyTime' => $this->getReadyTime(),
            'LastPickupTime' => $this->getLastPickupTime(),
            'ClosingTime' => $this->getClosingTime(),
            'Comments' => $this->getComments(),
            'Reference1' => $this->getReference1(),
            'Reference2' => $this->getReference2(),
            'Vehicle' => $this->getVehicle(),
            'Shipments' => $this->getShipments(),
            'PickItems' => $this->getPickItems(),
            'Status' => $this->getStatus(),
        ];
    }

}