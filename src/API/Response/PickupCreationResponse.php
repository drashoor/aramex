<?php


namespace DigitalCloud\Aramex\API\Response;

use DigitalCloud\Aramex\API\Classes\ProcessedPickup;

/**
 * Informs the user on the status of their submitted pickup request.
 *
 * Success = a Collection (Pickup) reference is supplied
 * Failure = an error message specifically states the location of the error and its nature.
 * The Transaction Parameter is sent as filled in the request for identification purposes.
 *
 * Class PickupCreationResponse
 * @package DigitalCloud\Aramex\API\Response
 */
class PickupCreationResponse extends Response
{
    private $precessedPickup;

    /**
     * @return ProcessedPickup
     */
    public function getPrecessedPickup(): ProcessedPickup
    {
        return $this->precessedPickup;
    }

    /**
     * @param ProcessedPickup $precessedPickup
     * @return PickupCreationResponse
     */
    public function setPrecessedPickup(ProcessedPickup $precessedPickup): PickupCreationResponse
    {
        $this->precessedPickup = $precessedPickup;
        return $this;
    }

    /**
     * @param object $obj
     * @return self
     */
    protected function parse($obj)
    {
        parent::parse($obj);

        $obj = collect($obj->ProcessedPickup);
        $processedShipments = collect($obj['ProcessedShipments'])->toArray();

        $processedPickup = new ProcessedPickup();
        $processedPickup = $processedPickup
            ->setId($obj['ID'])
            ->setGUID($obj['GUID'])
            ->setReference1($obj['Reference1'])
            ->setReference2($obj['Reference2'])
            ->setProcessedShipments($processedShipments);

        $this->setPrecessedPickup($processedPickup);

        return $this;
    }

    /**
     * @param object $obj
     * @return PickupCreationResponse
     */
    public static function make($obj)
    {
        return (new self())->parse($obj);
    }
}