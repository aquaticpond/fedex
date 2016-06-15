<?php

namespace Aquatic\FedEx;

use Aquatic\FedEx\Response\Contract as ResponseContract;
use Aquatic\FedEx\Request\Contract as RequestContract;
use Aquatic\FedEx\Response\Mixin\NotificationParser;

class Response implements ResponseContract
{
    use NotificationParser;

    protected $_raw;
    protected $_request;

    public function parse($response, RequestContract $request): ResponseContract
    {
        $this->_raw = $response;
        $this->_request = $request;

        $this->parseNotifications($response);

        return $this;
    }

    public function getRaw()
    {
        return $this->_raw;
    }

    public function getRequest(): RequestContract
    {
        return $this->_request;
    }
}