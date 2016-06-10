<?php

namespace Aquatic\FedEx\Response\Shipment;

use Carbon\Carbon;
use Aquatic\FedEx\Request\Contract as RequestContract;
use Aquatic\FedEx\Response\Contract as ResponseContract;
use Aquatic\FedEx\Response\Mixin\NotificationParser;

class CustomsAndDuties implements ResponseContract
{
    use NotificationParser;
    
    protected $raw;

    public function parse($response, RequestContract $request): ResponseContract
    {
        $this->raw = $response;
        $this->request = $request;
        
        $this->parseNotifications($response);

    }

    public function getRaw()
    {
        return $this->raw;
    }

}