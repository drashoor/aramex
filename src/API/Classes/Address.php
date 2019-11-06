<?php


namespace DigitalCloud\Aramex\API\Classes;

use DigitalCloud\Aramex\API\Interfaces\Normalize;

/**
 * The Address element contains several child elements that are validated before the request can be submitted successfully.
 *
 * Class Address
 * @package DigitalCloud\Aramex\API\Classes
 */
class Address implements Normalize
{
    private $line1;
    private $line2;
    private $line3;
    private $city;
    private $stateOfProvinceCode;
    private $postCode;
    private $countryCode;
    private $longitude;
    private $latitude;
    private $buildingNumber;
    private $buildingName;
    private $floor;
    private $apartment;
    private $poBox;
    private $description;

    /**
     * @return string
     */
    public function getLine1(): string
    {
        return $this->line1;
    }

    /**
     * Additional Address information, such as the building number, block, street name.
     * More than 3 characters
     *
     * @param string $line1
     * @return $this
     */
    public function setLine1(string $line1)
    {
        $this->line1 = $line1;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine2(): ?string
    {
        return $this->line2;
    }

    /**
     * Additional Address information.
     *
     * @param string $line2
     * @return $this
     */
    public function setLine2(string $line2 = null)
    {
        $this->line2 = $line2;
        return $this;
    }

    /**
     * @return string
     */
    public function getLine3(): ?string
    {
        return $this->line3;
    }

    /**
     * Additional Address information.
     *
     * @param string $line3
     * @return $this
     */
    public function setLine3(string $line3 = null)
    {
        $this->line3 = $line3;
        return $this;
    }

    /**
     * Address City. Conditional: Required if the post code is not given.
     *
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Address City.
     * Conditional: Required if the post code is not given.
     *
     * @param string $city
     * @return $this
     */
    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateOfProvinceCode(): ?string
    {
        return $this->stateOfProvinceCode;
    }

    /**
     * Address State or province code.
     * Required if The country code and city require a State or Province Code
     *
     * @param string $stateOfProvinceCode
     * @return $this
     */
    public function setStateOfProvinceCode(string $stateOfProvinceCode = null)
    {
        $this->stateOfProvinceCode = $stateOfProvinceCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    /**
     * Postal Code, if there is a postal code in the country code and city then it must be given.
     * If there are multiple cities for the same post code, the list of cities will be returned in the response.
     *
     * @param string $postCode
     * @return $this
     */
    public function setPostCode(string $postCode)
    {
        $this->postCode = $postCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * 2-Letter Standard ISO Country Code.
     *
     * @param string $countryCode
     * @return $this
     */
    public function setCountryCode(string $countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return $this
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return $this
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuildingNumber(): ?string
    {
        return $this->buildingNumber;
    }

    /**
     * @param string $buildingNumber
     * @return $this
     */
    public function setBuildingNumber(string $buildingNumber)
    {
        $this->buildingNumber = $buildingNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuildingName(): ?string
    {
        return $this->buildingName;
    }

    /**
     * @param string $buildingName
     * @return $this
     */
    public function setBuildingName(string $buildingName)
    {
        $this->buildingName = $buildingName;
        return $this;
    }

    /**
     * @return int
     */
    public function getFloor(): ?int
    {
        return $this->floor;
    }

    /**
     * @param int $floor
     * @return $this
     */
    public function setFloor(int $floor)
    {
        $this->floor = $floor;
        return $this;
    }

    /**
     * @return string
     */
    public function getApartment(): ?string
    {
        return $this->apartment;
    }

    /**
     * /**
     * @param string $apartment
     * @return $this
     */
    public function setApartment(string $apartment)
    {
        $this->apartment = $apartment;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoBox(): ?string
    {
        return $this->poBox;
    }

    /**
     * @param string $poBox
     * @return $this
     */
    public function setPoBox(string $poBox)
    {
        $this->poBox = $poBox;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function normalize(): array
    {
        return [
            'Line1' => $this->getLine1(),
            'Line2' => $this->getLine2(),
            'Line3' => $this->getLine3(),
            'City' => $this->getCity(),
            'StateOfProvinceCode' => $this->getStateOfProvinceCode(),
            'PostCode' => $this->getPostCode(),
            'CountryCode' => $this->getCountryCode(),
            'Longitude' => $this->getLongitude(),
            'Latitude' => $this->getLatitude(),
            'BuildingNumber' => $this->getBuildingNumber(),
            'BuildingName' => $this->getBuildingName(),
            'POBox' => $this->getPoBox(),
            'Description' => $this->getDescription(),
            'Apartment' => $this->getApartment(),
            'Floor' => $this->getFloor(),
        ];
    }
}