<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 18.02.2021
 * Time: 19:16
 */

class CartItem extends Product
{
    /**
     * Количество этого товара
     * @var int
     */
    private $quantity;

    /**
     * CartItem constructor.
     * @param $id
     * @param $name
     * @param $price
     * @param int $quantity
     */
    public function __construct($id, $name, $price = 0.0, $quantity = 0)
    {
        parent::__construct($id, $name, $price);
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getTotalSumma() {
        return $this->price * $this->quantity;
    }
}
