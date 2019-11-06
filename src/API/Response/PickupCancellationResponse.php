<?php


namespace DigitalCloud\Aramex\API\Response;

/**
 * Informs the user that the pickup was successfully canceled.
 *
 * Class PickupCancellationResponse
 * @package DigitalCloud\Aramex\API\Response
 */
class PickupCancellationResponse extends Response
{
    /**
     * @param object $obj
     * @return self
     */
    protected function parse($obj)
    {
        parent::parse($obj);

        return $this;
    }

    /**
     * @param object $obj
     * @return PickupCancellationResponse
     */
    public static function make($obj)
    {
        return (new self())->parse($obj);
    }
}