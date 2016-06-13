<?php

namespace Aquatic\FedEx\Response\Shipment;

use Aquatic\FedEx\Response;
use Aquatic\FedEx\Request\Shipment\CustomsAndDuties as Request;
use Aquatic\FedEx\Request\Contract as RequestContract;
use Aquatic\FedEx\Response\Contract as ResponseContract;

class CustomsAndDuties extends Response
{
    protected $_items = [];

    public function __construct($items = [])
    {
        $this->_items = $items;
    }

    public function parse($response, RequestContract $request): ResponseContract
    {
        parent::parse($response, $request);

        return $this;
    }

    public function getItems(): array
    {
        return $this->_items;
    }

}