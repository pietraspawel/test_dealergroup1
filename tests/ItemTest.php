<?php
namespace DealerGroup\Tests;

use PHPUnit\Framework\TestCase;
use DealerGroup\Product;
use DealerGroup\Item;

class ItemTest extends TestCase
{
    public function testSetQuantityTooLowExceptionUsingConstructor()
    {
        $this->expectException(\Exception::class);
        $product = new Product("nazwa", 999);
        $item = new Item($product, 0);
    }

    public function testSetQuantityTooLowException()
    {
        $this->expectException(\Exception::class);
        $product = new Product("nazwa", 999);
        $item = new Item($product, 10);
        $item->setQuantity(0);
    }
}
