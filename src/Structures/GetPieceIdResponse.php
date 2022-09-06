<?php

namespace Alexcherniatin\DHL\Structures;

class GetPieceIdResponse
{
    /**
     *
     * @var string 
     */
    private $shipmentNumber = '';

    /**
     *
     * @var string 
     */
    private $packageNumber = '';

    /**
     *
     * @var string 
     */
    private $productType = '';

    /**
     *
     * @var float 
     */
    private $weightReal = 0;

    /**
     *
     * @var float
     */
    private $weightVoulmetric = 0;

    /**
     *
     * @var int 
     */
    private $width = 0;

    /**
     *
     * @var int 
     */
    private $length = 0;

    /**
     *
     * @var int 
     */
    private $height = 0;

    /**
     *
     * @param string $shipmentNumber
     *
     * @return GetPieceIdResponse
     */
    public function setShipmentNumber(string $shipmentNumber): GetPieceIdResponse
    {
        $this->shipmentNumber = $shipmentNumber;

        return $this;
    }

    /**
     *
     * @param string $packageNumber
     *
     * @return GetPieceIdResponse
     */
    public function setPackageNumber(string $packageNumber): GetPieceIdResponse
    {
        $this->packageNumber = $packageNumber;

        return $this;
    }

    /**
     *
     * @param string $productType
     *
     * @return GetPieceIdResponse
     */
    public function setProductType(string $productType): GetPieceIdResponse
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     *
     * @param float $weightReal
     *
     * @return GetPieceIdResponse
     */
    public function setWeightReal(float $weightReal): GetPieceIdResponse
    {
        $this->weightReal = $weightReal;

        return $this;
    }

    /**
     *
     * @param float $weightVoulmetric
     *
     * @return GetPieceIdResponse
     */
    public function setWeightVoulmetric(?float $weightVoulmetric): GetPieceIdResponse
    {
        $this->weightVoulmetric = $weightVoulmetric;

        return $this;
    }

    /**
     *
     * @param int $width
     *
     * @return GetPieceIdResponse
     */
    public function setWidth(int $width): GetPieceIdResponse
    {
        $this->width = $width;

        return $this;
    }

    /**
     *
     * @param int $length
     *
     * @return GetPieceIdResponse
     */
    public function setLength(int $length): GetPieceIdResponse
    {
        $this->length = $length;

        return $this;
    }

    /**
     *
     * @param int $length
     *
     * @return GetPieceIdResponse
     */
    public function setHeight(int $height): GetPieceIdResponse
    {
        $this->height = $height;

        return $this;
    }

    /**
     * The structure described is the result of the getPieceId method.
     *
     * @var array 
     */
    public function structure(): array
    {
        $structure = [];

        $structure['shipmentNumber'] = $this->shipmentNumber;

        $structure['packageNumber'] = $this->packageNumber;

        $structure['productType'] = $this->productType;

        $structure['weightReal'] = $this->weightReal;

        $structure['weightVoulmetric'] = $this->weightVoulmetric;

        $structure['width'] = $this->width;

        $structure['length'] = $this->length;

        $structure['height'] = $this->height;

        return $structure;
    }

    public function fromResponse(object $getPieceIdResult): array
    {
        $item = $getPieceIdResult->shipments->item;

        if (\is_array($item->packages->item)) {
            $packages = [];

            foreach ($item->packages->item as $element) {
                $packages[] = $this->structureFromObject($element, $item->shipmentNumber);
            }

            return $packages;
        }

        return [$this->structureFromObject($item->packages->item, $item->shipmentNumber)];
    }

    public function structureFromObject(object $package, string $shipmentNumber): array
    {
        return $this
            ->setShipmentNumber($shipmentNumber)
            ->setPackageNumber($package->packageNumber)
            ->setProductType($package->productType)
            ->setWeightReal($package->weightReal)
            ->setWeightVoulmetric($package->weighVolumetric)
            ->setWidth($package->width)
            ->setLength($package->length)
            ->setHeight($package->height)
            ->structure();
    }
}
