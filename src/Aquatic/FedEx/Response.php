<?php

namespace Aquatic\FedEx;

use Aquatic\FedEx\Response\Contract;

class Response implements Contract
{
    public function parse($response)
    {
        foreach($response as $property => $value)
            $this->$property = $value;

        return $this;
    }
}