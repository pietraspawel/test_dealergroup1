<?php
namespace DealerGroup;

class Cart
{
    private $itemCollection;

    public function __construct()
    {
        $this->itemCollection = [];
    }

    public function countItems():int
    {
        return count($this->itemCollection);
    }

    private function getItemContainingProduct(Product $product):?Item
    {
        $item = null;
        foreach ($this->itemCollection as $key => $element) {
            if ($product === $element->getProduct()) {
                $item = $element;
                break;
            }
        }
        return $item;
    }

    public function addProduct(Product $product, int $quantity):void
    {
        $item = $this->getItemContainingProduct($product);
        if ($item === null) {
            $item = new Item($product, $quantity);
            $this->itemCollection[] = $item;
        } else {
            $item->setQuantity($item->getQuantity() + $quantity);
        }
    }

    public function removeProduct(Product $product):void
    {
        $item = $this->getItemContainingProduct($product);
        if ($item !== null) {
            $itemKey = array_search($item, $this->itemCollection);
            unset($this->itemCollection[$itemKey]);
        }
    }

    public function countProduct(Product $product):?int
    {
        $item = $this->getItemContainingProduct($product);
        if ($item === null) {
            return null;
        } else {
            return $item->getQuantity();
        }
    }

    public function getTotalPrice():int
    {
        $totalPrice = 0;
        foreach ($this->itemCollection as $item) {
            $product = $item->getProduct();
            $itemPrice = $product->getPrice() * $item->getQuantity();
            $totalPrice += $itemPrice;
        }
        return $totalPrice;
    }
}
