<?php

namespace Aquatic\FedEx\Contract;

interface Address
{
    public function getStreet(): array;
    public function getCity(): string;
    public function getPostCode(): string;
    public function getCountryCode(): string;
    public function getStateCode(): string;
}