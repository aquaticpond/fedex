<?php

namespace Aquatic\FedEx\Contract;

use Aquatic\FedEx\Contract\Address;

interface Shipment
{
    public function getDestination(): Address;
    public function getTotalWeight(): float;
    public function getTotalPrice(): float;
    public function getWeightUnits(): string;
    public function getItems(): array;
    public function getPackageCount(): int;
}