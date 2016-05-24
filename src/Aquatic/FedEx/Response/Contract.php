<?php

namespace Aquatic\FedEx\Response;

interface Contract
{
    /*
     * Parse the FedEx api response into a format of your choice
     *
     * @param $response object: the raw response from FedEx SOAP API
     * @returns Response
     */
    public function parse($response);
}