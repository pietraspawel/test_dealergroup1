<?php
namespace DealerGroup;

class Item
{
    private $product;
    private $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->setQuantity($quantity);
    }

    public function getQuantity():int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity):self
    {
        if ($quantity < $this->product->getMinOrderQuantity()) {
            throw new \Exception("Order quantity too low!");
        }
        $this->quantity = $quantity;
        return $this;
    }

    public function getProduct():Product
    {
        return $this->product;
    }
}
