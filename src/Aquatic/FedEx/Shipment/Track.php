<?php

namespace Aquatic\FedEx\Shipment;

use Aquatic\FedEx\Request;
use Exception;

class Track extends Request
{
    public $_version = '10';
    public $_serviceId = 'trck';
    public $_wsdl = 'TrackService_v10.wsdl';
    public $_soapMethod = 'track';

    public function __construct(int $tracking_code)
    {
        if(!$tracking_code)
            throw new Exception("You must pass a tracking code when creating a new Shipment Tracking request.");

        $this->data = [
            'SelectionDetails' => [
                'PackageIdentifier' => [
                    'Type' => 'TRACKING_NUMBER_OR_DOORTAG',
                    'Value' => $tracking_code
                ]
            ],
            'ProcessingOptions' => 'INCLUDE_DETAILED_SCANS'
        ];
    }

}