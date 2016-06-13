<?php

use Aquatic\FedEx;
use Aquatic\FedEx\Shipment\Item;
use Aquatic\FedEx\Address;
use Aquatic\FedEx\Shipment;

$shipper = new Address([
    'street' => ['Route 42 Main Street'],
    'city' => 'Aristes',
    'postCode' => '17920',
    'countryCode' => 'US',
    'stateCode' => 'PA'
]);

$destination = new Address([
    'street' => ['1502 Main St'],
    'city' => 'Saskatoon',
    'postCode' => 'S7H 0L7',
    'countryCode' => 'CA',
    'stateCode' => 'SK'
]);

$items = [
    new Item([
        'id' => 'SKU-123',
        'description' => 'Some kind of pants',
        'price' => 85.00,
        'qtyOrdered' => 2,
        'weight' => 0.2, // weight affects customs price so make sure they are accurate
        'weightUnits' => 'LB',
        'countryOfManufacture' => 'CN',
        'htsCode' => '6211110030', // hts codes are tied to recipient country, if you change the country the code changes
    ]),
    new Item([
        'id' => 'SKU-234',
        'description' => 'A shirt',
        'price' => 65.00,
        'qtyOrdered' => 1,
        'weight' => 0.1, // weight affects customs price so make sure they are accurate
        'weightUnits' => 'LB',
        'countryOfManufacture' => 'PE',
        'htsCode' => '6109100022', // hts codes are tied to recipient country, if you change the country the code changes
    ]),
    new Item([
        'id' => 'SKU-345',
        'description' => 'The same shirt but a different colour',
        'price' => 65.00,
        'qtyOrdered' => 1,
        'weight' => 0.1, // weight affects customs price so make sure they are accurate
        'weightUnits' => 'LB',
        'countryOfManufacture' => 'PE',
        'htsCode' => '6109100022', // hts codes are tied to recipient country, if you change the country the code changes
    ])
];


$shipment = new Shipment($destination, $items);
$result = FedEx::customsAndDuties($shipment, $shipper);

// Items with property holding array of taxes applied
$items = $result->getItems();

// The total customs and duties for the shipment
$result->getTotalCustomsAndDuties();