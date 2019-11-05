<?php


namespace DigitalCloud\Aramex\API\Response;


class LastReservedShipmentNumberRangeResponse extends Response
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
     * @return LastReservedShipmentNumberRangeResponse
     */
    public static function make($obj)
    {
        return (new self())->parse($obj);
    }
}