<?php
/**
 * Created by PhpStorm.
 * User: MegaVolt
 * Date: 18.02.2021
 * Time: 19:08
 */

class Product
{
    /**
     * Код товара
     * @var int
     */
    protected $id;

    /**
     * Наименование товара
     * @var string
     */
    protected $name;

    /**
     * Цена товара
     * @var int
     */
    protected $price;

    /**
     * Product constructor.
     * @param int $id
     * @param string $name
     * @param int $price
     */
    public function __construct($id, $name, $price = 0.0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

}
