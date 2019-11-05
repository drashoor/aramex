<?php


namespace DigitalCloud\Aramex\API\Response;


use DigitalCloud\Aramex\API\Classes\Notification;
use DigitalCloud\Aramex\API\Classes\Shipment;

class PickupResponse extends Response
{
    private $reference1;
    private $reference2;
    private $processedShipments;

    /**
     * @return string
     */
    public function getReference1(): string
    {
        return $this->reference1;
    }

    /**
     * @param string $reference1
     * @return PickupResponse
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
     * @param string $reference2
     * @return PickupResponse
     */
    public function setReference2(string $reference2)
    {
        $this->reference2 = $reference2;
        return $this;
    }

    /**
     * @return Shipment[]
     */
    public function getShipments()
    {
        return $this->processedShipments;
    }

    /**
     * @param Shipment[] $shipments
     * @return PickupResponse
     */
    public function setShipments(array $shipments)
    {
        $this->processedShipments = $shipments;
        return $this;
    }

    /**
     * @param object $obj
     * @return self
     */
    protected function parse($obj)
    {
        parent::parse($obj);

        if ($obj->Shipments->ProcessedPickup->Notifications) {
            $newNotifications = Notification::parseArray($obj->Shipments->ProcessedPickup->Notifications);
            if ($newNotifications) {
                $this->setHasErrors(true)->addNotifications($newNotifications);
            }
        }

        $this->setShipments([$obj->Shipments->ProcessedPickup]);

        return $this;
    }

    /**
     * @param object $obj
     * @return PickupResponse
     */
    public static function make($obj)
    {
        return (new self())->parse($obj);
    }
}