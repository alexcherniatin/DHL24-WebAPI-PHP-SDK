<?php

namespace Alexcherniatin\DHL\Structures;

use Alexcherniatin\DHL\Exceptions\InvalidStructureException;

class Item
{
    /**
     * shipment ID
     *
     * @var string 
     */
    private $shipmentNumber = '';

    /**
     * cedex shipment ID
     *
     * @var string 
     */
    private $cedexNumber = '';

    /**
     * package ID
     *
     * @var string 
     */
    private $packageNumber = '';

    /**
     *  Set shipmentNumber
     *
     * @param string $shipmentNumber
     *
     * @return Item
     */
    public function setShipmentNumber(string $shipmentNumber): Item
    {
        $this->shipmentNumber = $shipmentNumber;

        return $this;
    }

    /**
     *  Set cedexNumber
     *
     * @param string $cedexNumber
     *
     * @return Item
     */
    public function setCedexNumber(string $cedexNumber): Item
    {
        $this->cedexNumber = $cedexNumber;

        return $this;
    }

    /**
     *  Set packageNumber
     *
     * @param string $packageNumber
     *
     * @return Item
     */
    public function setPackageNumber(string $packageNumber): Item
    {
        $this->packageNumber = $packageNumber;

        return $this;
    }

    /**
     * Input parameters to the Items structure in the getPieceId method. At least one required parameter.
     *
     * @throws InvalidStructureException
     *
     * @return array
     */
    public function structure(): array
    {
        if (
            \strlen($this->shipmentNumber) === 0 &&
            \strlen($this->cedexNumber) === 0 &&
            \strlen($this->packageNumber) === 0
        ) {
            throw new InvalidStructureException("At least one required parameter.");
        }

        $structure = [];

        $structure['shipmentNumber'] = $this->shipmentNumber;

        $structure['cedexNumber'] = $this->cedexNumber;

        $structure['packageNumber'] = $this->packageNumber;

        return $structure;
    }
}
