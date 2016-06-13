<?php

namespace Aquatic\FedEx\Response;

use Aquatic\FedEx\Request\Contract as RequestContract;

interface Contract
{
    /*
     * Parse the FedEx api response into a format of your choice
     *
     * @param $response object: the raw response from FedEx SOAP API
     * @returns Response
     */
    public function parse($response, RequestContract $request): Contract;
    public function getRaw();
    public function getRequest(): RequestContract;
}