<?php

namespace Aquatic;

use Aquatic\FedEx\Contract\Address;
use Aquatic\FedEx\Contract\Shipment;
use Aquatic\FedEx\Response\Contract as ResponseContract;
use Aquatic\FedEx\Request\ValidateAddress as ValidateAddressRequest;
use Aquatic\FedEx\Response\ValidateAddress as ValidateAddressResponse;
use Aquatic\FedEx\Request\Shipment\Track as TrackShipmentRequest;
use Aquatic\FedEx\Response\Shipment\Track as TrackShipmentResponse;
use Aquatic\FedEx\Request\Shipment\CustomsAndDuties as CustomsAndDutiesRequest;
use Aquatic\FedEx\Response\Shipment\CustomsAndDuties as CustomsAndDutiesResponse;

// Facade for FedEx requests
class FedEx
{
    public static function trackShipment(int $tracking_number): ResponseContract
    {
        return (new TrackShipmentRequest($tracking_number))
            ->setCredentials(getenv('FEDEX_KEY'), getenv('FEDEX_PASSWORD'), getenv('FEDEX_ACCOUNT_NUMBER'), getenv('FEDEX_METER_NUMBER'))
            ->send(new TrackShipmentResponse);
    }
    
    public static function customsAndDuties(Shipment $shipment, Address $shipper)
    {
        return (new CustomsAndDutiesRequest($shipment, $shipper))
            ->setCredentials(getenv('FEDEX_KEY'), getenv('FEDEX_PASSWORD'), getenv('FEDEX_ACCOUNT_NUMBER'), getenv('FEDEX_METER_NUMBER'))
            ->send(new CustomsAndDutiesResponse($shipment->getItems()));
    }

    public static function validateAddress(Address $address)
    {
        return (new ValidateAddressRequest($address))
            ->setCredentials(getenv('FEDEX_KEY'), getenv('FEDEX_PASSWORD'), getenv('FEDEX_ACCOUNT_NUMBER'), getenv('FEDEX_METER_NUMBER'))
            ->send(new ValidateAddressResponse);
    }
}