<?php

require_once '../vendor/autoload.php';

require_once 'ExamplesConfig.php';

use Alexcherniatin\DHL\DHL24;
use Alexcherniatin\DHL\Structures\Item;

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

    print_r($packages);

} catch (\Throwable $th) {
    echo $th->getMessage();
}

