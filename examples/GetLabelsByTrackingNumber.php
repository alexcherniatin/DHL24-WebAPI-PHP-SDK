<?php

require_once '../vendor/autoload.php';

require_once 'ExamplesConfig.php';

use Alexcherniatin\DHL\DHL24;
use Alexcherniatin\DHL\Structures\Item;
use Alexcherniatin\DHL\Utils;
use Alexcherniatin\DHL\Structures\ItemToPrint;

$dhl = new DHL24(
    ExamplesConfig::LOGIN,
    ExamplesConfig::PASSWORD,
    ExamplesConfig::ACCOUNT_NUMBER,
    ExamplesConfig::SANDBOX
);

echo '<pre>';

try {
    $items = [];

    $items[] = (new Item())
        ->setPackageNumber('JJD000030094065000000000265')
        ->structure();

    $packages = $dhl->getPieceId($items);

    if (\count($packages) === 0) {
        throw new Exception("No packages");
    }

    $itemsToPrint = [];

    $itemsToPrint[] = (new ItemToPrint())
        ->setLabelType(ItemToPrint::LABEL_TYPE_LBLP)
        ->setShipmentId($packages[0]['shipmentNumber'])
        ->structure();

    $result = $dhl->getLabels($itemsToPrint);

    $savedLabelsName = Utils::saveLabels($result, 'labels/');

    //print_r($result);

    print_r($savedLabelsName);
} catch (\Throwable $th) {
    echo $th->getMessage();
}
