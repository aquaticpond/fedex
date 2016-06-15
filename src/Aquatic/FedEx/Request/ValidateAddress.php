<?php

namespace Aquatic\FedEx\Request;

use Aquatic\FedEx\Request;
use Aquatic\FedEx\Contract\Address;

class ValidateAddress extends Request
{
    public $_version = '4.0.0';
    public $_serviceId = 'aval';
    public $_wsdl = 'AddressValidationService_v4.wsdl';
    public $_soapMethod = 'addressValidation';


    public function __construct(Address $address)
    {
        $this->data = [
            'AddressesToValidate' => [
                'Address' => [
                    'StreetLines' => $address->getStreet(),
                    'City'        => $address->getCity(),
                    'StateOrProvinceCode' => $address->getStateCode(),
                    'PostalCode'  => $address->getPostCode(),
                    'CountryCode' => $address->getCountryCode(),
                ]
            ]
        ];
    }
}