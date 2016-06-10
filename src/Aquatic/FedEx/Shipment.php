<?php

namespace Aquatic\FedEx;

use Aquatic\FedEx\Contract\Shipment as Contract;
use Aquatic\FedEx\Contract\Shipment\Item;
use Aquatic\FedEx\Contract\Address;


class Shipment implements Contract
{
    public $items = [],
           $totalWeight = 0.00,
           $totalPrice = 0.00,
           $weightUnits = 'LB',
           $destination;

    public function __construct(Address $destination, array $items = [])
    {
        $this->destination = $destination;
        $this->addItems($items);
    }

    public function addItems(array $items): Shipment
    {
        foreach($items as $item)
            $this->addItem($item);

        return $this;
    }

    public function addItem(Item $item): Shipment
    {
        $this->items[] = $item;
        $this->totalWeight += $item->getWeight();
        $this->totalPrice += $item->getPrice();
    }

    public function getDestination(): Address
    {
        return $this->destination;
    }

    public function getTotalWeight(): float
    {
        return $this->totalWeight;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function getWeightUnits(): string
    {
        return $this->weightUnits;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}