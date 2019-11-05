<?php


namespace DigitalCloud\Aramex\API\Response;


class ReserveRangeResponse extends Response
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
     * @return ReserveRangeResponse
     */
    public static function make($obj)
    {
        return (new self())->parse($obj);
    }
}