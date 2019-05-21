<?php
namespace DealerGroup\Tests;

use PHPUnit\Framework\TestCase;
use DealerGroup\Product;
use DealerGroup\Item;
use DealerGroup\Cart;

class CartTest extends TestCase
{
    protected $cart;
    protected $carrot;
    protected $onion;
    protected $apple;

    protected function setUp()
    {
        $this->carrot = new Product("marchewka", 199);
        $this->onion = new Product("cebula", 249);
        $this->apple = new Product("jabłko", 150);
        $this->cart = new Cart();
    }

    public function testAddProducts()
    {
        $this->assertEquals(0, $this->cart->countItems());
        $this->cart->addProduct($this->carrot, 10);
        $this->assertEquals(1, $this->cart->countItems());
        $this->cart->addProduct($this->onion, 5);
        $this->cart->addProduct($this->apple, 15);
        $this->assertEquals(3, $this->cart->countItems());
    }

    public function testAddTheSameProduct()
    {
        $this->cart->addProduct($this->carrot, 10);
        $this->cart->addProduct($this->onion, 5);
        $this->cart->addProduct($this->apple, 15);
        $this->assertEquals(10, $this->cart->countProduct($this->carrot));
        $this->cart->addProduct($this->carrot, 10);
        $this->assertEquals(20, $this->cart->countProduct($this->carrot));
    }

    public function testRemoveProducts()
    {
        $this->cart->addProduct($this->carrot, 10);
        $this->cart->addProduct($this->onion, 5);
        $this->cart->addProduct($this->apple, 15);
        $this->cart->removeProduct($this->carrot);
        $this->assertNull($this->cart->countProduct($this->carrot));
    }

    public function testGetTotalPrice()
    {
        $this->cart->addProduct($this->carrot, 10);
        $this->cart->addProduct($this->onion, 10);
        $this->cart->addProduct($this->apple, 10);
        $this->assertEquals(5980, $this->cart->getTotalPrice());
    }
}
