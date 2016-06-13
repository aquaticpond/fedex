# PHP7 wrapper for FedEx SOAP APIs

### Track a shipment
```php
use Aquatic\FedEx;

$tracking_code = 12345678987654321;
$response = FedEx::trackShipment($tracking_code);
```

### Get customs and duties for a shipment from USA to international
```php
use Aquatic\FedEx;
use Aquatic\FedEx\Address;
use Aquatic\FedEx\Shipment;
use Aquatic\FedEx\Shipment\Item;

$shipper = new Address( ... );
$destination = new Address( ... );

$items = [
  new Item( ... ),
  new Item( ... ),
  ...
];

$shipment = new Shipment($destination, $items);
$result = FedEx::customsAndDuties($shipment, $shipper);
```
