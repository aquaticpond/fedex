<?php

namespace Aquatic\FedEx\Request;

use Aquatic\FedEx\Response\Contract as Response;

interface Contract
{
    public function setCredentials(string $key, string $password, string $accountNumber, string $meterNumber);
    public function send(Response $response = null): Response;
}