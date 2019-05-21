<?php
namespace DealerGroup;

class Product
{
    private $name;
    private $price;
    private $minOrderQuantity;

    public function __construct(string $name, int $price, int $minOrderQuantity = 1)
    {
        $this->name = $name;
        $this->price = $price;
        $this->minOrderQuantity = $minOrderQuantity;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function setName(string $name):self
    {
        $this->name = $name;
        return $this;
    }

    public function getPrice():int
    {
        return $this->price;
    }

    public function setPrice(int $price):self
    {
        $this->price = $price;
        return $this;
    }

    public function getMinOrderQuantity():int
    {
        return $this->minOrderQuantity;
    }

    public function setMinOrderQuantity(int $minOrderQuantity):self
    {
        $this->minOrderQuantity = $minOrderQuantity;
        return $this;
    }
}
