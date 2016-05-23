<?php

namespace Aquatic\FedEx;

\ini_set("soap.wsdl_cache_enabled", "0");

use Aquatic\FedEx\Request\Contract as RequestContract;
use Aquatic\FedEx\Response\Contract as ResponseContract;

abstract class Request implements RequestContract
{
    protected $_version;
    protected $_serviceId;
    protected $_wsdl;
    protected $_soapMethod;

    public $data = [];

    protected $_credentials = [
        'WebAuthenticationDetail' => [
            'UserCredential' => [
                'Key'      => null,
                'Password' => null,
            ]
        ],
        'ClientDetail'   => [
            'AccountNumber' => null,
            'MeterNumber'   => null,
        ],
        'Version' => [
            'ServiceId'    => null,
            'Major'        => null,
            'Intermediate' => '0',
            'Minor'        => '0'
        ]
    ];

    public function setCredentials(string $key, string $password, string $accountNumber, string $meterNumber)
    {
        $this->_credentials['WebAuthenticationDetail']['UserCredential']['Key'] = $key;
        $this->_credentials['WebAuthenticationDetail']['UserCredential']['Password'] = $password;
        $this->_credentials['ClientDetail']['AccountNumber'] = $accountNumber;
        $this->_credentials['ClientDetail']['MeterNumber'] = $meterNumber;

        $this->_credentials['Version']['ServiceId'] = $this->_serviceId;
        $this->_credentials['Version']['Major'] = $this->_version;
    }

    public function send(ResponseContract $response = null): ResponseContract
    {
        $soap = new \SoapClient($this->_getWsdl(), ['trace' => 1]);

        $method = $this->_soapMethod;
        $data = array_merge($this->_credentials, $this->data);

        $this->setCredentials(getenv('FEDEX_KEY'), getenv('FEDEX_PASSWORD'), getenv('FEDEX_ACCOUNT_NUMBER'), getenv('FEDEX_METER_NUMBER'));

        $result = $soap->$method($data);

        if(!$response)
            $response = new Response;

        return $response->parse($result);
    }

    protected function _getWsdl(): string
    {
        return dirname(__FILE__).'/wsdl/'.$this->_wsdl;
    }

}