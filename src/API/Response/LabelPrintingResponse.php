<?php


namespace DigitalCloud\Aramex\API\Response;

/**
 * Returns the created label,
 * if all the required information in the request is inserted and validated correctly.
 * The Transaction and Shipment Number parameters are returned from the request for identification purposes.
 *
 * Class LabelPrintingResponse
 * @package DigitalCloud\Aramex\API\Response
 */
class LabelPrintingResponse extends Response
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
     * @return LabelPrintingResponse
     */
    public static function make($obj)
    {
        return (new self())->parse($obj);
    }
}